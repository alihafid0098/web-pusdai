<!-- resources/views/layanan/show.blade.php (Chunk 2) -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $layanan['judul'] }} - PUSDAI Jawa Barat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Figtree', sans-serif; }
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
                    <a href="{{ route('kajian.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Kajian</a>
                    <a href="{{ route('layanan.index') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 bg-emerald-50 rounded-xl">Layanan Umat</a>
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
    <header class="pt-32 pb-8 px-4">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('layanan.index') }}" class="text-sm text-emerald-600 font-medium hover:underline mb-2 inline-block">← Kembali ke Layanan</a>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $layanan['judul'] }}</h1>
            <p class="text-gray-600 text-lg mb-6">{{ $layanan['deskripsi'] }}</p>
        </div>
    </header>

    <!-- Detail Content -->
    <section class="py-12 px-4">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <div class="prose prose-lg prose-slate max-w-none">
                    {!! $layanan['deskripsi'] !!}
                </div>
            </div>

            <div class="mt-8 flex items-center gap-3">
                <a href="{{ route('layanan.index') }}" class="px-5 py-2 bg-white border border-slate-200 text-gray-700 rounded-xl text-sm font-medium hover:bg-slate-50 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </a>
                <button onclick="document.getElementById('ai-chat-window').classList.toggle('hidden'); document.getElementById('ai-input-layanan-detail').value='Pertanyaan tentang {{ $layanan['judul'] }}';" class="px-5 py-2 bg-emerald-600 text-white rounded-xl text-sm font-medium hover:bg-emerald-700 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Tanya AI
                </button>
            </div>
        </div>
    </section>

    <!-- AI Chat Widget -->
    <div id="ai-chat-window" class="fixed bottom-24 right-6 w-full max-w-md z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl border border-slate-200 flex flex-col h-[500px]">
            <div class="bg-emerald-600 px-4 py-3 rounded-t-2xl flex justify-between items-center">
                <h3 class="text-white font-bold">Tanya PUSDAI AI</h3>
                <button onclick="document.getElementById('ai-chat-window').classList.add('hidden')" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div id="chat-content-layanan-detail" class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50"></div>
            <div class="p-3 border-t border-slate-200">
                <div class="flex gap-2">
                    <input type="text" id="ai-input-layanan-detail" placeholder="Tanya tentang layanan ini..." class="flex-1 px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none">
                    <button onclick="sendLayananDetailMessage()" class="bg-emerald-600 text-white px-4 py-2 rounded-xl hover:bg-emerald-700 transition">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendLayananDetailMessage() {
            const input = document.getElementById('ai-input-layanan-detail');
            const content = document.getElementById('chat-content-layanan-detail');
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
        document.getElementById('ai-input-layanan-detail').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendLayananDetailMessage();
        });
    </script>

</body>
</html>