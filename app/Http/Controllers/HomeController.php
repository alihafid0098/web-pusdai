<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Wajib dipanggil untuk akses API
use App\Models\Agenda;
use App\Models\Berita;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data Agenda dan Berita
        $agendas = Agenda::where('tanggal', '>=', now()->toDateString())
                         ->orderBy('tanggal', 'asc')
                         ->take(3)
                         ->get();
                         
        $beritas = Berita::orderBy('created_at', 'desc')
                         ->take(3)
                         ->get();

        // 2. Integrasi API MyQuran untuk Jadwal Shalat (Kota Bandung ID: 1301)
        $jadwalShalat = [];
        $kotaId = '1301'; 
        
        // Dapatkan format tahun, bulan, tanggal hari ini
        $tahun = now()->format('Y');
        $bulan = now()->format('m');
        $tanggal = now()->format('d');

        try {
            // Tambahkan withoutVerifying() untuk mem-bypass error SSL di Laragon
            $response = Http::withoutVerifying()
                            ->timeout(5)
                            ->get("https://api.myquran.com/v2/sholat/jadwal/{$kotaId}/{$tahun}/{$bulan}/{$tanggal}");
            
            if ($response->successful()) {
                $jadwalShalat = $response->json()['data']['jadwal'];
            } else {
                $jadwalShalat = $this->defaultJadwal();
            }
        } catch (\Exception $e) {
            $jadwalShalat = $this->defaultJadwal();
        }

        // 3. Kirim semua variabel ke view
        return view('welcome', compact('agendas', 'beritas', 'jadwalShalat'));
    }

    /**
     * Live Search Agenda (AJAX)
     */
    public function searchAgenda(Request $request)
    {
        $q = $request->query('q');

        $agendas = Agenda::where('tanggal', '>=', now()->toDateString())
            ->when($q, function ($query) use ($q) {
                $query->where('judul', 'like', "%{$q}%")
                      ->orWhere('deskripsi', 'like', "%{$q}%");
            })
            ->orderBy('tanggal', 'asc')
            ->take(10)
            ->get();

        return response()->json($agendas);
    }

    /**
     * Halaman Kajian & Kegiatan (daftar semua agenda)
     */
    public function kajian()
    {
        $agendas = Agenda::orderBy('tanggal', 'asc')->paginate(12);
        return view('kajian.index', compact('agendas'));
    }

    /**
     * Detail Kajian (single agenda)
     */
    public function detailKajian(Agenda $agenda)
    {
        return view('kajian.show', compact('agenda'));
    }

    /**
     * Halaman Layanan Umat
     */
    public function layanan()
    {
        $layanan = [
            [
                'slug' => 'nikah',
                'judul' => 'Pernikahan / Nikah',
                'ikon' => '💍',
                'deskripsi' => 'Informasi dan persyaratan pelayanan pernikahan di PUSDAI Jawa Barat.',
                'fitur' => ['Persyaratan Nikah', 'Alur Pelayanan', 'Jadwal Akad', 'Kontak Panitia'],
            ],
            [
                'slug' => 'mualaf',
                'judul' => 'Bimbingan Mualaf',
                'ikon' => '🤝',
                'deskripsi' => 'Pendampingan dan pembinaan untuk mualaf baru dalam menjalani ajaran Islam.',
                'fitur' => ['Pendampingan Mualaf', 'Persyaratan', 'Alur Pendaftaran', 'Kontak Pembina'],
            ],
            [
                'slug' => 'haji',
                'judul' => 'Haji & Umrah',
                'ikon' => '🕋',
                'deskripsi' => 'Panduan, informasi, dan pendaftaran jemaah haji serta umrah.',
                'fitur' => ['Informasi Haji', 'Manasik Haji & Umrah', 'Panduan Pendaftaran', 'Kontak'],
            ],
            [
                'slug' => 'perpustakaan',
                'judul' => 'Mini Perpustakaan',
                'ikon' => '📚',
                'deskripsi' => 'Koleksi buku, e-book, artikel, dan konten keislaman untuk dibaca dan dipelajari.',
                'fitur' => ['E-Book', 'Artikel', 'Audio Kajian', 'Video Kajian'],
            ],
        ];
        return view('layanan.index', compact('layanan'));
    }

    /**
     * Detail Layanan Umat (berdasarkan slug)
     */
    public function detailLayanan($slug)
    {
        $layanan = [
            'nikah' => [
                'judul' => 'Pernikahan / Nikah',
                'ikon' => '💍',
                'deskripsi' => 'PUSDAI Jawa Barat menyediakan layanan pernikahan yang meliputi konsultasi, persyaratan, jadwal akad, dan bimbingan calon pasangan.',
                'persyaratan' => ['Fotokopi KTP calon suami & istri', 'Fotokopi KK', 'Akta lahir', 'Surat keterangan dari RT/RW', 'Surat keterangan catatan kepolisian (SKCK)', 'Foto 4x6 berpasangan 2 lembar'],
                'alur' => ['Konsultasi awal ke Panitia Nikah', 'Pengajuan berkas persyaratan', 'Penetapan jadwal akad', 'Pelaksanaan akad nikah'],
                'kontak' => 'Panitia Nikah PUSDAI Jawa Barat',
            ],
            'mualaf' => [
                'judul' => 'Bimbingan Mualaf',
                'ikon' => '🤝',
                'deskripsi' => 'Program pendampingan bagi mualaf baru untuk memahami ajaran Islam, shalat, dan beribadah dengan benar.',
                'persyaratan' => ['Fotokopi KTP', 'Surat keterangan mualaf baru (jika ada)', 'Foto 3x4 2 lembar'],
                'alur' => ['Pendaftaran pendampingan', 'Pembinaan agama rutin', 'Bimbingan shalat dan ibadah', 'Sertifikasi selesai pendampingan'],
                'kontak' => 'Pembina Mualaf PUSDAI Jawa Barat',
            ],
            'haji' => [
                'judul' => 'Haji & Umrah',
                'ikon' => '🕋',
                'deskripsi' => 'Informasi lengkap mengenai pendaftaran jemaah haji, manasik haji dan umrah, serta panduan keberangkatan.',
                'fitur' => ['Jadwal pendaftaran haji', 'Panduan manasik', 'Biaya dan paket', 'Konsultasi keberangkatan'],
                'kontak' => 'Bagian Haji & Umrah PUSDAI Jawa Barat',
            ],
            'perpustakaan' => [
                'judul' => 'Mini Perpustakaan',
                'ikon' => '📚',
                'deskripsi' => 'Tempat berkunjung untuk membaca koleksi buku Islam, e-book, artikel, serta menonton video dan mendengarkan audio kajian.',
                'fitur' => ['Koleksi buku fisik', 'E-Book download', 'Artikel keislaman', 'Audio & video kajian'],
                'kontak' => 'Administrasi Perpustakaan PUSDAI Jawa Barat',
            ],
        ];

        $data = $layanan[$slug] ?? null;

        if (!$data) {
            abort(404, 'Layanan tidak ditemukan.');
        }

        $layanan = $data;

        return view('layanan.show', compact('layanan', 'slug'));
    }

    /**
     * Halaman Mini Perpustakaan
     */
    public function perpustakaan()
    {
        $koleksi = [
            [
                'judul' => 'Fiqih Shalat Lengkap',
                'kategori' => 'Fiqih',
                'tipe' => 'E-Book',
                'cover' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abdac?w=300&h=400&fit=crop',
            ],
            [
                'judul' => 'Aqidah Ahlussunnah Wal Jamaah',
                'kategori' => 'Aqidah',
                'tipe' => 'E-Book',
                'cover' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=300&h=400&fit=crop',
            ],
            [
                'judul' => 'Tafsir Surah Al-Fatihah',
                'kategori' => 'Tafsir',
                'tipe' => 'E-Book',
                'cover' => 'https://images.unsplash.com/photo-1507003211169-0a1272e8e0ca?w=300&h=400&fit=crop',
            ],
            [
                'judul' => 'Sejarah Peradaban Islam',
                'kategori' => 'Sejarah',
                'tipe' => 'Buku',
                'cover' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=300&h=400&fit=crop',
            ],
            [
                'judul' => 'Kajian Ramadan 2026',
                'kategori' => 'Audio',
                'tipe' => 'Audio Kajian',
                'cover' => 'https://images.unsplash.com/photo-1585317631862-d262b87960a2?w=300&h=400&fit=crop',
            ],
            [
                'judul' => 'Sholat Jumahan & Khutbah',
                'kategori' => 'Video',
                'tipe' => 'Video Kajian',
                'cover' => 'https://images.unsplash.com/photo-1539967953117-7ed3e9936933?w=300&h=400&fit=crop',
            ],
        ];
        return view('perpustakaan.index', compact('koleksi'));
    }

    /**
     * Halaman Berita (daftar semua berita)
     */
    public function berita()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->paginate(12);
        return view('berita.index', compact('beritas'));
    }

    /**
     * Detail Berita (single berita)
     */
    public function detailBerita(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    /**
     * Halaman Tentang PUSDAI
     */
    public function tentang()
    {
        return view('tentang');
    }

    /**
     * Fungsi fallback (cadangan) jika API gagal dimuat.
     * Mencegah website error dan menampilkan tanda strip (-).
     */
    private function defaultJadwal()
    {
        return [
            'imsak' => '-', 
            'subuh' => '-', 
            'dzuhur' => '-', 
            'ashar' => '-', 
            'maghrib' => '-', 
            'isya' => '-',
            'tanggal' => Carbon::now()->translatedFormat('l, d F Y')
        ];
    }
}