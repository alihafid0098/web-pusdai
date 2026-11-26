<!-- resources/views/welcome.blade.php (Redesain PUSDAI Digital Hub - Chunk 1) -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Portal Informasi & Agenda - PUSDAI Jawa Barat') }}</title>
    <meta name="description" content="PUSDAI Digital Hub - Temukan informasi keislaman, jadwal shalat, kajian, dan layanan umat di Masjid PUSDAI Jawa Barat">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Figtree', sans-serif; }
        .islamic-pattern { mask-image: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='12' cy='12' r='2'/%3E%3C/svg%3E"); -webkit-mask-image: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='12' cy='12' r='2'/%3E%3C/svg%3E"); }
        .bento-card { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .bento-card:hover { transform: translate-y(-4px); }
    </style>
</head>
<body class="bg-slate-50 text-gray-900 antialiased">

    <!-- ========================================== -->
    <!-- NAVBAR (Sticky)                            -->
    <!-- ========================================== -->
    <nav class="fixed top-0 left-0 right-0 z-40 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
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

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Beranda</a>
                    <a href="{{ route('kajian.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Kajian</a>
                    <a href="{{ route('layanan.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Layanan Umat</a>
                    <a href="{{ route('perpustakaan.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-colors">Perpustakaan</a>
                    <a href="{{ route('tentang') }}" class="px-4 py-2 text-sm font-medium text-emerald-600 bg-emerald-50 rounded-xl">Tentang</a>
                    <a href="#" onclick="document.getElementById('ai-chat-btn').click()" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 text-sm font-medium rounded-xl shadow-lg shadow-emerald-200 transition-all transform hover:scale-105">Tanya AI PUSDAI</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-gray-600 hover:text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200">
            <div class="px-4 py-3 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-emerald-50 rounded-xl">Beranda</a>
                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-emerald-50 rounded-xl">Kajian</a>
                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-emerald-50 rounded-xl">Layanan Umat</a>
                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-emerald-50 rounded-xl">Perpustakaan</a>
                <a href="#" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-emerald-50 rounded-xl">Tentang</a>
                <a href="#" onclick="document.getElementById('ai-chat-btn').click()" class="block px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-xl">Tanya AI PUSDAI</a>
            </div>
        </div>
    </nav>

    <!-- ========================================== -->
    <!-- HERO SECTION                               -->
    <!-- ========================================== -->
    <header class="relative pt-32 pb-12 lg:pt-40 lg:pb-16 overflow-hidden">
        <div class="absolute inset-0 -z-10 bg-emerald-900/5 opacity-50 islamic-pattern"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold mb-4 border border-emerald-200">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                PUSDAI Digital Hub
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-gray-900 tracking-tight leading-tight mb-6">
                Temukan Informasi<br>
                <span class="text-emerald-600">Keislaman di PUSDAI</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                Cari informasi keislaman, jadwal shalat, kajian rutin, dan layanan umat dengan cepat melalui asisten AI PUSDAI.
            </p>

            <!-- AI Search Bar -->
            <div class="max-w-2xl mx-auto">
                <div class="relative group">
                    <div class="absolute left-3 top-1/2 -translate-y-1/2 text-emerald-400 group-focus-within:text-emerald-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" id="hero-search" placeholder="Ketik pertanyaan tentang PUSDAI..." class="w-full pl-10 pr-12 py-4 bg-white border border-slate-200 rounded-2xl text-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent shadow-lg transition-all">
                    <button id="hero-ask-ai" class="absolute right-3 top-1/2 -translate-y-1/2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl text-sm font-bold shadow-lg shadow-emerald-200 transition-all transform active:scale-95">Tanya AI</button>
                </div>
                <p class="mt-3 text-xs text-gray-400">Contoh: "Jadwal shalat hari ini", "Agenda kajian terdekat", "Cara donasi"</p>
            </div>

            <!-- Quick Actions -->
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="#" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl text-sm font-bold shadow-lg shadow-emerald-200 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Kajian Terdekat
                </a>
                <a href="{{ route('layanan.index') }}" class="px-6 py-3 border border-slate-200 hover:border-emerald-300 text-gray-700 hover:text-emerald-600 rounded-2xl text-sm font-medium transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Layanan Umat
                </a>
            </div>
        </div>
    </header>

    <!-- ========================================== -->
    <!-- BENTO GRID SECTION                         -->
    <!-- ========================================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- KARTU 1: JADWAL SHALAT (2 kolom) -->
            <div class="lg:col-span-4 bento-card bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden p-6 lg:p-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-emerald-600 uppercase tracking-wider">Jadwal Shalat</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $jadwalShalat['tanggal'] ?? \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('kajian.index') }}" class="text-emerald-600 text-xs font-bold hover:underline">Lengkap</a>
                </div>
                <div class="grid grid-cols-3 gap-3 text-center">
                    @foreach(['Imsak' => 'imsak', 'Subuh' => 'subuh', 'Dzuhur' => 'dzuhur', 'Ashar' => 'ashar', 'Maghrib' => 'maghrib', 'Isya' => 'isya'] as $label => $key)
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <p class="text-[10px] font-semibold text-gray-400 uppercase">{{ $label }}</p>
                            <p class="text-xl font-bold text-gray-900">{{ $jadwalShalat[$key] ?? '-' }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 flex items-center gap-2 text-xs text-emerald-600 font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Kota Bandung
                </div>
            </div>

            <!-- KARTU 2: KAJIAN MINGGU INI (2 kolom) -->
            <div class="lg:col-span-4 bento-card bg-emerald-900 rounded-3xl overflow-hidden p-6 lg:p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-10">
                    <svg class="w-32 h-32 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2z"></path></svg>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-3 h-3 bg-emerald-400 rounded-full"></div>
                        <h3 class="text-lg font-bold text-white">Kajian Minggu Ini</h3>
                    </div>
                    @forelse($agendas as $agenda)
                        <div class="mb-5 last:mb-0">
                            <p class="text-emerald-200 text-sm font-semibold uppercase tracking-wider mb-1">{{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('d F Y') }}</p>
                            <h4 class="text-white font-semibold mb-1 line-clamp-1">{{ $agenda->judul }}</h4>
                            <p class="text-emerald-300/80 text-xs">{{ \Carbon\Carbon::parse($agenda->waktu)->format('H:i') }} WIB · {{ $agenda->lokasi }}</p>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <p class="text-emerald-300 text-sm">Belum ada jadwal kajian minggu ini.</p>
                        </div>
                    @endforelse
                    <a href="{{ route('kajian.index') }}" class="mt-6 inline-flex items-center gap-2 text-emerald-200 text-xs font-bold hover:text-white transition-colors">
                        Lihat Semua Kajian <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>

            <!-- KARTU 3: LAYANAN UMAT - Nikah (1 kolom) -->
            <div class="lg:col-span-2 bento-card bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between group cursor-pointer" onclick="location.href='{{ route('layanan.index') }}'">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 8.048 9.246 9.748 8 11.753 5.591 13.769 3 17.098 3 21c0 1.11.89 2 2 2h14a2 2 0 002-2c0-3.902-2.591-7.231-5-9.247C13.754 11.748 12.168 8.048 12 6.253z"></path>
                    </svg>
                </div>
                <h4 class="mt-4 text-lg font-bold text-gray-900">Nikah</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Konsultasi dan pendaftaran pernikahan di PUSDAI Jawa Barat.</p>
            </div>

            <!-- KARTU 4: LAYANAN UMAT - Mualaf (1 kolom) -->
            <div class="lg:col-span-2 bento-card bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between group cursor-pointer" onclick="location.href='{{ route('layanan.index') }}'">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h4 class="mt-4 text-lg font-bold text-gray-900">Bimbingan Mualaf</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Pendampingan dan pembelajaran islam untuk mualaf baru.</p>
            </div>

            <!-- KARTU 5: LAYANAN UMAT - Haji (1 kolom) -->
            <div class="lg:col-span-2 bento-card bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between group cursor-pointer" onclick="location.href='{{ route('layanan.index') }}'">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path>
                    </svg>
                </div>
                <h4 class="mt-4 text-lg font-bold text-gray-900">Jemaah Haji</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Informasi pendaftaran dan bimbingan ibrah haji &amp; umroh.</p>
            </div>

            <!-- KARTU 6: LAYANAN UMAT - Library/Perpustakaan (1 kolom) -->
            <div class="lg:col-span-2 bento-card bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between group cursor-pointer" onclick="location.href='{{ route('layanan.index') }}'">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 8.048 9.246 9.748 8 11.753 5.591 13.769 3 17.098 3 21c0 1.11.89 2 2 2h14a2 2 0 002-2c0-3.902-2.591-7.231-5-9.247C13.754 11.748 12.168 8.048 12 6.253z"></path>
                    </svg>
                </div>
                <h4 class="mt-4 text-lg font-bold text-gray-900">Mini Perpustakaan</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Koleksi buku keislaman untuk dibaca di PUSDAI.</p>
            </div>

            <!-- KARTU 7: MINI PERPUSTAKAAN (2 kolom) -->
            <div class="lg:col-span-4 bento-card bg-slate-900 rounded-3xl overflow-hidden p-6 lg:p-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-emerald-500/20 rounded-xl flex items-center justify-center text-emerald-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-white">Mini Perpustakaan</h3>
                    </div>
                    <a href="{{ route('perpustakaan.index') }}" class="text-emerald-400 text-xs font-bold hover:text-emerald-300">Koleksi</a>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 py-2 border-b border-slate-800 last:border-0">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-sm text-slate-300">Fiqih Ibadah &amp; Muamalah</span>
                    </div>
                    <div class="flex items-center gap-3 py-2 border-b border-slate-800 last:border-0">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-sm text-slate-300">Sejarah &amp; Peradaban Islam</span>
                    </div>
                    <div class="flex items-center gap-3 py-2 border-b border-slate-800 last:border-0">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-sm text-slate-300">Al-Qur'an &amp; Tafsir</span>
                    </div>
                </div>
            </div>

            <!-- KARTU 8: PENGUMUMAN & EVENT (2 kolom) -->
            <div class="lg:col-span-4 bento-card bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden p-6 lg:p-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Pengumuman &amp; Event</h3>
                    </div>
                </div>
                <div class="space-y-4">
                    @forelse($beritas as $berita)
                        <div class="flex gap-3 p-3 rounded-2xl border border-slate-100 hover:bg-emerald-50 transition-colors group">
                            @if(!empty($berita->gambar))
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-16 h-16 object-cover rounded-lg">
                            @else
                                <div class="w-16 h-16 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-300">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                </div>
                            @endif
                            <div>
                                <p class="text-xs font-semibold text-emerald-600 uppercase mb-1">{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}</p>
                                <a href="{{ route('berita.show', $berita->slug ?? $berita->id) }}" class="text-sm font-medium text-gray-900 hover:text-emerald-600 line-clamp-1 group-hover:text-emerald-600">{{ $berita->judul }}</a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500 text-sm">Belum ada pengumuman terbaru.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

    <!-- ========================================== -->
    <!-- FOOTER                                     -->
    <!-- ========================================== -->
    <footer class="bg-slate-900 border-t border-slate-800 py-12 mt-16 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
                <div class="col-span-full md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-7 h-7 bg-emerald-600 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-white leading-tight">PUSDAI</div>
                            <div class="text-[10px] font-semibold text-emerald-500 tracking-wider uppercase">Jawa Barat</div>
                        </div>
                    </div>
                    <p class="text-sm text-slate-500 max-w-sm">Pusat Dakwah Islam Jawa Barat — wadah informasi keislaman, kajian rutin, dan layanan umat untuk masyarakat.</p>
                </div>
                <div>
                    <h5 class="text-white font-semibold mb-4">Layanan</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Kajian Rutin</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Nikah &amp; Mualaf</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Haji &amp; Umroh</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Mini Perpustakaan</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-semibold mb-4">Tentang</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Profil PUSDAI</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Struktur Organisasi</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 text-center text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Masjid Pusat Dakwah Islam (PUSDAI) Jawa Barat. Hak Cipta Terpelihara.</p>
            </div>
        </div>
    </footer>

    <!-- ========================================== -->
    <!-- WIDGET AI ASSISTANT (CHATBOT)              -->
    <!-- ========================================== -->
    <!-- Tombol Floating AI -->
    <div class="fixed bottom-6 right-6 z-50">
        <button id="ai-chat-btn" class="bg-emerald-600 hover:bg-emerald-700 text-white p-4 rounded-full shadow-2xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center border-4 border-emerald-50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
        </button>
    </div>

    <!-- Jendela Chat AI -->
    <div id="ai-chat-window" class="hidden fixed bottom-24 right-6 w-[340px] sm:w-[380px] bg-white rounded-2xl shadow-2xl border border-gray-100 z-50 overflow-hidden flex flex-col transform transition-all duration-300 origin-bottom-right">
        <!-- Header Chat -->
        <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 text-white px-5 py-4 font-semibold flex justify-between items-center shadow-sm">
            <div class="flex items-center gap-2.5">
                <div class="bg-white/20 p-1.5 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <div>
                    <span class="block leading-none">Tanya AI PUSDAI</span>
                    <span class="text-[10px] font-normal text-emerald-100 mt-1 block">Selalu sedia membantu anda</span>
                </div>
            </div>
            <div class="flex items-center gap-1">
                <button id="reset-ai-btn" title="Mulai Percakapan Baru" class="text-emerald-100 hover:text-white hover:bg-white/10 p-1.5 rounded-lg transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                </button>
                <button id="close-ai-btn" title="Tutup Chat" class="text-emerald-100 hover:text-white hover:bg-white/10 p-1.5 rounded-lg transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
        <!-- Ruang Obrolan -->
        <div id="chat-content" class="p-5 h-80 overflow-y-auto bg-slate-50 text-sm flex flex-col gap-4">
            <div class="self-start max-w-[85%] bg-white border border-gray-100 text-gray-700 p-3.5 rounded-2xl rounded-tl-sm shadow-sm leading-relaxed">
                Assalamu'alaikum! Saya asisten virtual PUSDAI. Ada informasi tentang layanan, jadwal, atau fasilitas yang bisa saya bantu carikan?
            </div>
        </div>
        <!-- Area Quick Replies -->
        <div class="px-3.5 pt-2 bg-white flex gap-2 overflow-x-auto pb-2 scrollbar-hide" id="quick-replies-container">
            <button onclick="sendQuickReply('Jadwal shalat hari ini')" class="whitespace-nowrap px-3 py-1.5 text-xs font-medium text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full hover:bg-emerald-100 transition-colors">⏱️ Jadwal Shalat</button>
            <button onclick="sendQuickReply('Kumaha carana bade donasi ka masjid?')" class="whitespace-nowrap px-3 py-1.5 text-xs font-medium text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full hover:bg-emerald-100 transition-colors">💳 Info Donasi</button>
            <button onclick="sendQuickReply('Apakah ada agenda atau kajian terdekat?')" class="whitespace-nowrap px-3 py-1.5 text-xs font-medium text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-full hover:bg-emerald-100 transition-colors">📅 Agenda Kajian</button>
        </div>
        <!-- Input Form -->
        <div class="p-3.5 border-t border-gray-100 bg-white flex gap-2">
            <input type="text" id="ai-input" class="flex-1 border-none bg-gray-100 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/50 transition-shadow" placeholder="Ketik pertanyaan Anda...">
            <button id="send-ai-btn" class="bg-emerald-600 text-white w-10 h-10 rounded-xl hover:bg-emerald-700 transition-colors flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 transform rotate-45 ml-[-2px] mt-[-2px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
            </button>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS JAVASCRIPT GABUNGAN                -->
    <!-- ========================================== -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // --- Mobile Menu Toggle ---
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            }

            // --- SCRIPT 1: HERO AI SEARCH ---
            const heroInput = document.getElementById('hero-search');
            const heroBtn = document.getElementById('hero-ask-ai');
            if (heroInput && heroBtn) {
                const ask = () => {
                    const q = heroInput.value.trim();
                    if (!q) return;
                    document.getElementById('ai-chat-btn').click();
                    setTimeout(() => {
                        const inp = document.getElementById('ai-input');
                        if (inp) inp.value = q;
                    }, 300);
                };
                heroBtn.addEventListener('click', ask);
                heroInput.addEventListener('keypress', function (e) {
                    if (e.key === 'Enter') ask();
                });
            }

            // --- SCRIPT 2: PENCARIAN LIVE AGENDA (AJAX) ---
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('keyup', async function() {
                    let query = this.value;
                    let container = document.getElementById('agendaContainer');
                    try {
                        let response = await fetch(`/api/search-agenda?q=${query}`);
                        let data = await response.json();
                        container.innerHTML = '';
                        if(data.length === 0) {
                            container.innerHTML = `
                                <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                                    <div class="w-16 h-16 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-1">Tidak ada hasil</h3>
                                    <p class="text-gray-500 max-w-sm mx-auto">Pencarian untuk "${query}" tidak ditemukan.</p>
                                </div>`;
                            return;
                        }
                        data.forEach(agenda => {
                            let time = agenda.waktu.substring(0, 5);
                            container.innerHTML += `
                                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="flex items-center text-emerald-600 mb-4 bg-emerald-50 w-max px-3 py-1.5 rounded-lg">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span class="font-semibold text-sm">${agenda.tanggal}</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">${agenda.judul}</h3>
                                    <div class="text-gray-600 text-sm mb-4 space-y-2.5">
                                        <p class="flex items-center"><svg class="w-4 h-4 mr-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> ${time} WIB</p>
                                        <p class="flex items-start"><svg class="w-4 h-4 mr-2.5 mt-0.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> ${agenda.lokasi}</p>
                                    </div>
                                </div>`;
                        });
                    } catch (e) {
                        console.error(e);
                    }
                });
            }

            // --- SCRIPT 3: AI CHAT (Cohere) ---
            const chatWindow = document.getElementById('ai-chat-window');
            const chatBtn = document.getElementById('ai-chat-btn');
            const closeBtn = document.getElementById('close-ai-btn');
            const resetBtn = document.getElementById('reset-ai-btn');
            const sendBtn = document.getElementById('send-ai-btn');
            const input = document.getElementById('ai-input');
            const content = document.getElementById('chat-content');
            const quickContainer = document.getElementById('quick-replies-container');

            if (chatBtn) chatBtn.addEventListener('click', () => {
                chatWindow.classList.toggle('hidden');
                if (!chatWindow.classList.contains('hidden')) input.focus();
            });
            if (closeBtn) closeBtn.addEventListener('click', () => chatWindow.classList.add('hidden'));
            if (resetBtn) resetBtn.addEventListener('click', () => {
                fetch('/reset-ai-chat', { method: 'POST' });
                content.innerHTML = '';
                quickContainer.style.display = 'flex';
                addBotMessage('Assalamu\'alaikum! Percakapan baru dimulai. Ada yang bisa saya bantu?');
            });

            function addBotMessage(text) {
                const div = document.createElement('div');
                div.className = 'self-start max-w-[85%] bg-white border border-gray-100 text-gray-700 p-3.5 rounded-2xl rounded-tl-sm shadow-sm leading-relaxed';
                div.textContent = text;
                content.appendChild(div);
                content.scrollTop = content.scrollHeight;
            }
            function addUserMessage(text) {
                const div = document.createElement('div');
                div.className = 'self-end max-w-[85%] bg-emerald-600 text-white p-3.5 rounded-2xl rounded-tr-sm shadow-sm leading-relaxed';
                div.textContent = text;
                content.appendChild(div);
                content.scrollTop = content.scrollHeight;
            }
            async function sendMessage() {
                const text = input.value.trim();
                if (!text) return;
                addUserMessage(text);
                input.value = '';
                quickContainer.style.display = 'none';
                try {
                    const res = await fetch('/ask-ai', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                        body: JSON.stringify({ message: text })
                    });
                    const data = await res.json();
                    addBotMessage(data.reply ?? 'Maaf, saya belum bisa menjawab saat ini.');
                } catch (e) {
                    addBotMessage('Terjadi kesalahan koneksi. Coba lagi nanti.');
                }
            }
            if (sendBtn) sendBtn.addEventListener('click', sendMessage);
            if (input) input.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });
            window.sendQuickReply = (text) => { input.value = text; sendMessage(); };

        });
    </script>
</body>
</html>