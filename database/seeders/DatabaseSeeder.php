<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
{
    \App\Models\Agenda::create([
        'judul' => 'Kajian Rutin Tafsir Al-Quran',
        'tanggal' => now()->addDays(2),
        'waktu' => '09:00:00',
        'lokasi' => 'Ruang Utama Masjid PUSDAI',
        'deskripsi' => 'Kajian rutin bersama KH. Badrudjaman'
    ]);
    
    // Tambahkan data dummy lainnya...
}
}
