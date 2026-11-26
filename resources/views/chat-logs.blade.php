<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Log AI - PUSDAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10 min-h-screen">

    <div class="max-w-7xl mx-auto bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-slate-200">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-emerald-700">Riwayat Percakapan AI</h1>
                <p class="text-sm text-slate-500 mt-1">Pantau pertanyaan jamaah untuk memahami kebutuhan informasi umat.</p>
            </div>
            <a href="/" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-semibold transition-colors">
                Kembali ke Beranda
            </a>
        </div>

        <div class="overflow-x-auto rounded-xl border border-slate-200">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-100 text-slate-600 font-semibold">
                    <tr>
                        <th class="px-6 py-4 border-b border-slate-200 w-40">Waktu</th>
                        <th class="px-6 py-4 border-b border-slate-200 w-32">ID Sesi</th>
                        <th class="px-6 py-4 border-b border-slate-200 w-1/3">Pertanyaan Jamaah</th>
                        <th class="px-6 py-4 border-b border-slate-200">Balasan AI (Cohere)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($logs as $log)
                    <tr class="hover:bg-slate-50 transition-colors align-top">
                        <td class="px-6 py-4 whitespace-nowrap text-slate-500">
                            {{ $log->created_at->format('d M Y') }}<br>
                            <span class="text-xs">{{ $log->created_at->format('H:i') }} WIB</span>
                        </td>
                        <td class="px-6 py-4 text-xs font-mono text-slate-400">
                            {{ Str::limit($log->session_id, 8, '...') }}
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-800">
                            {{ $log->user_message }}
                        </td>
                        <td class="px-6 py-4 text-slate-600">
                            {{ Str::limit($log->ai_response, 150) }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-slate-500 italic">Belum ada riwayat percakapan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $logs->links() }}
        </div>
    </div>

</body>
</html>