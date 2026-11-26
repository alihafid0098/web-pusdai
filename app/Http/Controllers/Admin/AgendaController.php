<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Menampilkan daftar agenda di dashboard
    public function index()
    {
        $agendas = Agenda::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.agenda.index', compact('agendas'));
    }

    // Menampilkan form tambah agenda
    public function create()
    {
        return view('admin.agenda.create');
    }

    // Menyimpan data agenda baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string',
            'deskripsi' => 'nullable|string'
        ]);

        Agenda::create($request->all());

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan!');
    }

    // (Anda bisa melanjutkan untuk method edit, update, dan destroy nanti)
}