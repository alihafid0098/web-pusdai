<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\AiAssistantController; // <-- Wajib ditambahkan untuk AI Assistant

// --------------------------------------------------
// RUTE HALAMAN PENGUNJUNG (FRONTEND)
// --------------------------------------------------

// Rute Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute Live Search Agenda (AJAX)
Route::get('/api/search-agenda', [HomeController::class, 'searchAgenda'])->name('api.agenda.search');

// Halaman Kajian & Kegiatan
Route::get('/kajian', [HomeController::class, 'kajian'])->name('kajian.index');
Route::get('/kajian/{agenda}', [HomeController::class, 'detailKajian'])->name('kajian.show');

// Halaman Layanan Umat
Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan.index');
Route::get('/layanan/{slug}', [HomeController::class, 'detailLayanan'])->name('layanan.show');

// Halaman Perpustakaan
Route::get('/perpustakaan', [HomeController::class, 'perpustakaan'])->name('perpustakaan.index');

// Halaman Berita
Route::get('/berita', [HomeController::class, 'berita'])->name('berita.index');
Route::get('/berita/{berita}', [HomeController::class, 'detailBerita'])->name('berita.show');

// Halaman Tentang PUSDAI
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');

// Rute Chatbot AI Assistant (POST)
// Membatasi maksimal 10 permintaan per 1 menit untuk setiap alamat IP
Route::post('/ask-ai', [AiAssistantController::class, 'ask'])
    ->middleware('throttle:10,1')
    ->name('ai.ask');


// --------------------------------------------------
// RUTE AUTENTIKASI & DASHBOARD (BACKEND)
// --------------------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route khusus untuk kelola konten PUSDAI
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('agenda', AgendaController::class);
    // Route::resource('berita', BeritaController::class); // Buka komentar jika BeritaController sudah dibuat
});
// Melindungi halaman log agar hanya bisa dibuka oleh user yang sudah login
Route::get('/admin/chat-logs', [AiAssistantController::class, 'logs'])
    ->name('admin.chat_logs')
    ->middleware('auth');
Route::post('/reset-ai-chat', [AiAssistantController::class, 'resetChat'])->name('ai.reset');

require __DIR__.'/auth.php';