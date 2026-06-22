<?php

namespace App\Http\Controllers;
use App\Models\Kampanye;

use Illuminate\Http\Request;

class KampanyeController extends Controller
{
     // Tampilkan data (READ)
    public function index()
    {
        $data = Kampanye::all();
        return view('kampanye.index', compact('data'));
    }

    // Form tambah
    public function create()
    {
        return view('kampanye.create');
    }

    // Simpan data (CREATE)
    public function store(Request $request)
    {
        Kampanye::create($request->all());

        return redirect('/kampanye')->with('success', 'Data berhasil ditambahkan');
    }
    // Form edit
public function edit($id)
{
    $data = Kampanye::findOrFail($id);
    return view('kampanye.edit', compact('data'));
}

// Proses update
public function update(Request $request, $id)
{
    $kampanye = Kampanye::findOrFail($id);

    $kampanye->update($request->only([
        'kode_kampanye',
        'judul_program',
        'penyelenggara',
        'target_dana',
        'tgl_berakhir'
    ]));

    return redirect('/kampanye')->with('success', 'Data berhasil diupdate');
}

// Hapus data
public function destroy($id)
{
    $kampanye = Kampanye::findOrFail($id);
    $kampanye->delete();

    return redirect('/kampanye')->with('success', 'Data berhasil dihapus');
}
}
