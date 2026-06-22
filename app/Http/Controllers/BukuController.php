<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Route;
use Barryvdh\DomPDF\Facade\Pdf;

class BukuController extends Controller
{
    public function index()
    {
        $data_buku = Buku::all();
        return view('Buku.index', compact('data_buku'));
    }
    public function create()
    {
        return view('buku.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Judul' => 'required|min:5',
            'Pengarang' => 'required|alpha',
            'Tahun_terbit' => 'required|integer|min:1900',
            'sampul_buku'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048'

        ], [
            'Judul.required' => 'Judul Buku Wajib Diisi',
            'Judul.min' => 'Judul Buku Minimal 5 karakter',
            'Pengarang.required' => 'Pengarang Wajib Diisi',
            'Pengarang.alpha' => 'Pengarang harus berupa huruf',
            'Tahun_terbit.required' => 'Tahun Terbit Wajib Diisi',
            'Tahun_terbit.min' => 'Tahun Terbit Minimal tahun 1900',
        ]);
   if($request->hasFile('sampul_buku')) {
    $path = $request->file('sampul_buku')->store('produk_images', 'public');
     $validated['sampul_buku'] = $path;
   }

   


        Buku::create([
            'Judul' => $request->Judul,
            'Pengarang' => $request->Pengarang,
            'Tahun_terbit' => $request->Tahun_terbit,
            'Sinopsis' => $request->Sinopsis,
            'sampul_buku' => $path ?? null
        ]);
        return redirect('/buku')->with('success','data berhasil ditambahkan!');
    }

    public function detail($id)
    {
        return 'Anda sedang melihat detail buku dengan ID ' . $id;
    }
    public function kategori($genre)
    {
        return 'Menampilkan daftar buku dengan kategori ' . $genre;
    }
    public function edit($id)
    {
        $tampil = Buku::findOrFail($id);
        return view('buku.edit', compact('tampil'));
    }
    public function update(request $request, $id)
    {
        $Judul = $request->Judul;
        $Pengarang = $request->Pengarang;
        $Tahun_terbit = $request->Tahun_terbit;
        $Sinopsis = $request->Sinopsis;
         $validated = $request->validate([
            'Judul' => 'required|min:5',
            'Pengarang' => 'required|alpha',
            'Tahun_terbit' => 'required|integer|min:1900',

        ], [
            'Judul.required' => 'Judul Buku Wajib Diisi',
            'Judul.min' => 'Judul Buku Minimal 5 karakter',
            'Pengarang.required' => 'Pengarang Wajib Diisi',
            'Pengarang.alpha' => 'Pengarang hanya boleh berupa huruf',
            'Tahun_terbit.required' => 'Tahun Terbit Wajib Diisi',
            'Tahun_terbit.min' => 'Tahun Terbit Minimal tahun 1900',
        ]);
        $find = Buku::findOrFail($id);
        $find->UPDATE([
            'Judul' => $request->Judul,
            'Pengarang' => $request->Pengarang,
            'Tahun_terbit' => $request->Tahun_terbit,
            'Sinopsis' => $request->Sinopsis
        ]);
        return redirect('/buku')->with('success','data berhasil diubah!');
    }
    public function hapus($id)
    {
        $find = Buku::findOrFail($id);
        $find->DELETE();
        return redirect('/buku')->with('success','data berhasil dihapus!');
    }
    public function cetakPdf(){
    $data_buku = buku::all();
    $pdf = Pdf::loadView('Buku.pdf', compact('data_buku'));
    return $pdf->download('buku.pdf');
    // retrurn $pdf->stream('laporan-Inventaris-Tokokita.pdf');
    }
}
