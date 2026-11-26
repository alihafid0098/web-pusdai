<!-- resources/views/kajian/index.blade.php (Chunk 2) -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kajian & Kegiatan - PUSDAI Jawa Barat</title>
    <meta name="description" content="Daftar kajian dan kegiatan keagamaan di PUSDAI Jawa Barat">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .bento-card { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .bento-card:hover { transform: translate-y(-4px); }
    </style>
</head>
<body class="bg-slate-50 text-gray-900 antialiased">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-2 group cursor-pointer" onclick="window.location.href='{{ route('home') }}'">
                    <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center shadow-lg shadow-emerald-200 group-hover:shadow-emerald-400/50 transition-shadow">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm font-bold text-gray-900 leading-tight">PUSDAI</div>
                        <div class="text-[10px] font-semibold text-emerald-600 tracking-wider uppercase">Jawa Barat</div>
                    </div>
                </div>

                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Beranda</a>
                    <a href="{{ route('kajian.index') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 bg-emerald-50 rounded-xl">Kajian</a>
                    <a href="{{ route('layanan.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Layanan Umat</a>
                    <a href="{{ route('perpustakaan.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Perpustakaan</a>
                    <a href="{{ route('tentang') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Tentang</a>
                </div>

                <div class="flex items-center gap-3">
                    <button onclick="document.getElementById('ai-chat-window').classList.toggle('hidden')" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-full text-sm font-medium shadow-lg shadow-emerald-200 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Tanya AI
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="pt-32 pb-12 px-4">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">Kajian &amp; Kegiatan</h1>
            <p class="text-gray-600 text-lg">Jadwal kajian rutin dan kegiatan keagamaan di PUSDAI Jawa Barat</p>
        </div>
    </header>

    <!-- Agenda List -->
    <section class="py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Semua Kajian</h2>
                    <p class="text-gray-600">{{ $agendas->total() }} kegiatan tersedia</p>
                </div>
                <div class="hidden md:flex gap-2">
                    <a href="#" class="px-4 py-2 bg-emerald-600 text-white rounded-xl text-sm font-medium hover:bg-emerald-700 transition">Lihat Semua</a>
                    <a href="#" class="px-4 py-2 bg-white border border-slate-200 text-gray-700 rounded-xl text-sm font-medium hover:bg-slate-50 transition">Filter</a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($agendas as $agenda)
                    <a href="{{ route('kajian.show', $agenda->id) }}" class="block bento-card bg-white rounded-2xl border border-slate-200 p-6 hover:border-emerald-300 hover:shadow-xl">
                        <div class="flex items-start justify-between mb-4">
                            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full uppercase tracking-tight">
                                {{ \Carbon\Carbon::parse($agenda->tanggal)->locale('id')->isoFormat('dddd') }}
                            </span>
                            <span class="text-xs font-semibold text-gray-400 bg-slate-100 px-3 py-1 rounded-full">
                                {{ \Carbon\Carbon::parse($agenda->tanggal)->locale('id')->isoFormat('DD MMM YYYY') }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight">{{ $agenda->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $agenda->deskripsi }}</p>
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $agenda->waktu ?? '-' }}
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $agenda->lokasi ?? '-' }}
                            </span>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100">
                            <span class="text-emerald-600 text-sm font-medium flex items-center gap-1">
                                Lihat Detail <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Belum ada jadwal kajian</h3>
                        <p class="text-gray-500">Segera akan ada jadwal kajian baru. Kunjungi kembali nanti.</p>
                    </div>
                @endforelse
            </div>

            {{ $agendas->links() }}
        </div>
    </section>

    <!-- AI Chat Widget (simplified, same as welcome) -->
    <div id="ai-chat-window" class="fixed bottom-24 right-6 w-full max-w-md z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl border border-slate-200 flex flex-col h-[500px]">
            <div class="bg-emerald-600 px-4 py-3 rounded-t-2xl flex justify-between items-center">
                <h3 class="text-white font-bold">Tanya PUSDAI AI</h3>
                <button onclick="document.getElementById('ai-chat-window').classList.add('hidden')" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div id="chat-content-kajian" class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50"></div>
            <div class="p-3 border-t border-slate-200">
                <div class="flex gap-2">
                    <input type="text" id="ai-input-kajian" placeholder="Tanya tentang kajian..." class="flex-1 px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none">
                    <button onclick="sendKajianMessage()" class="bg-emerald-600 text-white px-4 py-2 rounded-xl hover:bg-emerald-700 transition">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendKajianMessage() {
            const input = document.getElementById('ai-input-kajian');
            const content = document.getElementById('chat-content-kajian');
            const text = input.value.trim();
            if (!text) return;
            const userDiv = document.createElement('div');
            userDiv.className = 'self-end max-w-[85%] bg-emerald-600 text-white p-3 rounded-2xl rounded-tr-sm';
            userDiv.textContent = text;
            content.appendChild(userDiv);
            input.value = '';
            content.scrollTop = content.scrollHeight;

            fetch('/ask-ai', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                body: JSON.stringify({ message: text })
            }).then(res => res.json()).then(data => {
                const botDiv = document.createElement('div');
                botDiv.className = 'self-start max-w-[85%] bg-white border border-slate-200 text-gray-700 p-3 rounded-2xl rounded-tl-sm';
                botDiv.textContent = data.reply ?? 'Maaf, saya belum bisa menjawab saat ini.';
                content.appendChild(botDiv);
                content.scrollTop = content.scrollHeight;
            });
        }
        document.getElementById('ai-input-kajian').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendKajianMessage();
        });
    </script>

</body>
</html>