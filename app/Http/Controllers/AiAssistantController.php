<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Agenda;
use App\Models\ChatLog;

class AiAssistantController extends Controller
{
    public function ask(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        // KODE SEMENTARA: Paksa hapus memori setiap kali bertanya (agar murni menggunakan prompt baru)
        //Session::forget('cohere_chat_history');

        $userMessage = $request->input('message');
        
        // ... (kode ke bawahnya biarkan sama)
        
        // 1. API KEY COHERE
        $apiKey = 'f1gFs8z1LoNxlQKespcc7nxVXvljRRXsP2OpLkme'; 

        $hariIni = Carbon::now()->translatedFormat('l, d F Y');

        // 2. AMBIL JADWAL SHALAT DINAMIS
        $kotaId = '1301'; 
        $tahun = now()->format('Y');
        $bulan = now()->format('m');
        $tanggal = now()->format('d');
        
        $jadwalHariIni = "Imsak 04:10, Subuh 04:20, Dzuhur 11:44, Ashar 14:46, Maghrib 17:49, Isya 18:58";
        try {
            $resJadwal = Http::withoutVerifying()->timeout(3)->get("https://api.myquran.com/v2/sholat/jadwal/{$kotaId}/{$tahun}/{$bulan}/{$tanggal}");
            if ($resJadwal->successful()) {
                $j = $resJadwal->json()['data']['jadwal'];
                $jadwalHariIni = "Imsak {$j['imsak']}, Subuh {$j['subuh']}, Dzuhur {$j['dzuhur']}, Ashar {$j['ashar']}, Maghrib {$j['maghrib']}, Isya {$j['isya']}";
            }
        } catch (\Exception $e) {
        }

        // 3. AMBIL AGENDA & JAM DARI DATABASE
        $agendaTeks = "Belum ada agenda dalam waktu dekat.";
        try {
            $agendas = Agenda::where('tanggal', '>=', now()->toDateString())
                             ->orderBy('tanggal', 'asc')
                             ->take(3)
                             ->get();
                             
            if ($agendas->count() > 0) {
                $agendaTeks = "";
                foreach ($agendas as $agenda) {
                    $tglAgenda = Carbon::parse($agenda->tanggal)->translatedFormat('l, d F Y');
                    $jam = $agenda->jam ?? $agenda->waktu ?? 'Waktu belum ditentukan'; 
                    $agendaTeks .= "- {$agenda->judul} (Jadwal: {$tglAgenda}, Jam: {$jam})\n";
                }
            }
        } catch (\Exception $e) {
        }

      // 4. INFORMASI SPESIFIK PUSDAI (Label diubah menjadi ID dan SU)
        $infoPusdai = "DATA LAYANAN:\n"
                    . "[Topik: Makan Gratis / Jumat Berkah]\n"
                    . "ID: Program makan gratis dilaksanakan sekitar jam 10.00 WIB pagi, sebelum sholat Jumat.\n"
                    . "SU: Program tuang gratis dinten Jumaah kawitan tabuh 10 enjing sateuacan shalat Jumaah.\n\n"
                    . "[Topik: Donasi / Zakat]\n"
                    . "ID: Untuk layanan donasi, silakan klik tombol 'Donasi' di web atau transfer ke BSI 1234567890 a.n Masjid PUSDAI Jabar.\n"
                    . "SU: Kanggo donasi atanapi zakat, mangga klik tombol 'Donasi' di luhur atanapi transfer ka BSI 1234567890 a.n Masjid PUSDAI Jabar.\n\n"
                    . "[Topik: Sewa Gedung Bale Asri]\n"
                    . "ID: Gedung Bale Asri berkapasitas 2000 orang. Untuk sewa, silakan datang ke kantor sekretariat PUSDAI pada jam kerja (Senin-Jumat, 08.00-15.00 WIB).\n"
                    . "SU: Kanggo pesen atanapi sewa Gedung Bale Asri, mangga sumping langsung ka kantor sekretariat PUSDAI dina dinten damel (Senen dugi ka Jumaah, tabuh 08.00-15.00 WIB).\n\n"
                    . "[Topik: Perpustakaan]\n"
                    . "ID: Perpustakaan gratis untuk umum. Buka Senin-Kamis (09.00-15.00 WIB).\n"
                    . "SU: Perpustakaan PUSDAI kabuka kanggo umum sareng gratis. Jadwalna Senen dugi ka Kemis, tabuh 09.00-15.00 WIB.";

        // 5. SYSTEM PROMPT (Ditambahkan larangan membocorkan label dan panduan deteksi bahasa)
        $systemPrompt = "Anda adalah asisten virtual PUSDAI Jawa Barat. Hari ini adalah " . $hariIni . ".\n"
                      . "ATURAN MUTLAK:\n"
                      . "1. Jika pengguna bertanya menggunakan bahasa Indonesia (misal: 'jam berapa', 'apakah', 'bagaimana'), gunakan teks berlabel ID.\n"
                      . "2. Jika pengguna bertanya menggunakan bahasa Sunda (misal: 'bade naros', 'sabaraha', 'kumaha'), gunakan teks berlabel SU persis seperti data tanpa diubah.\n"
                      . "3. SANGAT PENTING: JANGAN PERNAH menyertakan awalan label 'ID:' atau 'SU:' dalam balasan Anda. Langsung berikan isi kalimatnya saja.\n\n"
                      . "REFERENSI:\n"
                      . "- Jadwal Sholat: " . $jadwalHariIni . "\n"
                      . "- Agenda Terdekat: \n" . $agendaTeks . "\n\n"
                      . $infoPusdai;
                      
        // 6. FITUR INGATAN FORMAT COHERE
        $history = Session::get('cohere_chat_history', []);

        // 7. REQUEST KE API COHERE
        try {
            $response = Http::withoutVerifying()
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])->post("https://api.cohere.ai/v1/chat", [
                    'model' => 'command-r-08-2024', 
                    'preamble' => $systemPrompt,
                    'chat_history' => $history, 
                    'message' => $userMessage, 
                    'temperature' => 0.6,
                ]);

            // Blok respons yang sudah diperbaiki (tidak ganda lagi)
            if ($response->successful()) {
                $reply = $response->json()['text'] ?? 'Maaf, saya tidak dapat merespons saat ini.';
                
                // Simpan ke Database
                ChatLog::create([
                    'session_id' => Session::getId(),
                    'user_message' => $userMessage,
                    'ai_response' => $reply
                ]);
                
                // Simpan ke riwayat session
                $history[] = [
                    'role' => 'USER',
                    'message' => $userMessage
                ];
                $history[] = [
                    'role' => 'CHATBOT',
                    'message' => $reply
                ];

                if (count($history) > 20) {
                    $history = array_slice($history, -20);
                }
                Session::put('cohere_chat_history', $history);

                return response()->json(['reply' => $reply]);
            }

            $errorMessage = $response->json()['message'] ?? 'Error Code: ' . $response->status();
            return response()->json(['reply' => 'Pesan dari Cohere: ' . $errorMessage], 500);

        } catch (\Exception $e) {
            Log::error('AI Assistant Error: ' . $e->getMessage());
            return response()->json(['reply' => 'Maaf, layanan AI sedang tidak tersedia.'], 500);
        }
    }

    public function logs()
    {
        // Variabel dikembalikan menjadi $logs agar tidak error di Blade
        $logs = ChatLog::latest()->paginate(20);
        
        // Nama view disesuaikan dengan file yang Anda buat di langkah terminal sebelumnya
        return view('chat-logs', compact('logs'));
    }
    public function resetChat()
    {
        // Menghapus riwayat memori AI dari session
        Session::forget('cohere_chat_history');
        return response()->json(['status' => 'success', 'message' => 'Memori dibersihkan']);
    }
}