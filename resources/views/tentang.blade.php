<!-- resources/views/tentang.blade.php (Chunk 2) -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang PUSDAI Jawa Barat</title>
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
                    <a href="{{ route('layanan.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Layanan Umat</a>
                    <a href="{{ route('perpustakaan.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Perpustakaan</a>
                    <a href="{{ route('tentang') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 bg-emerald-50 rounded-xl">Tentang</a>
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
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2 leading-tight">Tentang PUSDAI</h1>
            <p class="text-gray-600">Pusat Studi dan Pengembangan Agama Islam (PUSDAI) Jawa Barat</p>
        </div>
    </header>

    <!-- Content -->
    <section class="py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Visi &amp; Misi</h2>
                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <div class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">Visi</h3>
                                    <p class="text-gray-600 text-sm">Menjadi pusat studi dan pengembangan agama Islam yang terpercaya bagi umat Muslim di Jawa Barat.</p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">Misi</h3>
                                    <p class="text-gray-600 text-sm">Menyelenggarakan kajian, layanan umat, dan perpustakaan untuk memperkaya pemahaman keislaman.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Kontak Kami</h2>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <span class="text-gray-600">Jl. Ahmad Yani No. 123, Bandung, Jawa Barat</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 011 1.168l5.215 8.215a1 1 0 01-.144 1.433l-2.147 2.147a1 1 0 01-1.433.144l-4.284-1.071a1 1 0 01-.816-.816l-1.071-4.284A1 1 0 014.168 2.168A1 1 0 015.436 1H7a2 2 0 012 2v13a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
                                <span class="text-gray-600">(022) 1234567</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <span class="text-gray-600">info@pusdai.jabar.id</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm h-full flex flex-col justify-center">
                        <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Selamat Datang di PUSDAI</h2>
                        <p class="text-gray-600 text-lg mb-6">Pusat Studi dan Pengembangan Agama Islam (PUSDAI) Jawa Barat hadir sebagai wadah belajar, berkontemplasi, dan beramal untuk seluruh umat Muslim.</p>
                        <div class="space-y-3 text-sm text-gray-600">
                            <p>• Kajian rutin setiap minggu</p>
                            <p>• Layanan nikah, bimbingan mualaf, dan jemaah haji</p>
                            <p>• Koleksi buku keislaman di perpustakaan kami</p>
                            <p>• Asisten AI untuk menjawab pertanyaan agama</p>
                        </div>
                    </div>
                </div>
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
            <div id="chat-content-tentang" class="flex-1 overflow-y-auto p-4 space-y-3 bg-slate-50"></div>
            <div class="p-3 border-t border-slate-200">
                <div class="flex gap-2">
                    <input type="text" id="ai-input-tentang" placeholder="Tanya tentang PUSDAI..." class="flex-1 px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none">
                    <button onclick="sendTentangMessage()" class="bg-emerald-600 text-white px-4 py-2 rounded-xl hover:bg-emerald-700 transition">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendTentangMessage() {
            const input = document.getElementById('ai-input-tentang');
            const content = document.getElementById('chat-content-tentang');
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
        document.getElementById('ai-input-tentang').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendTentangMessage();
        });
    </script>

</body>
</html>