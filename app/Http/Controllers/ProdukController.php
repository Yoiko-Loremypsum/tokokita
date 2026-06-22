<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class ProdukController extends Controller
{
    public function index()
{
    $data_produk = Produk::all();

    return view('produk.index', compact('data_produk'));
}
public function create()
    {
        return view('produk.create');
    }
    public function store(Request $request)
{
    $validated=$request->validate([
'nama_produk'=>'required|alpha',
'harga'=>'required|numeric',
'gambar'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ],[
        'nama_produk.required'=>'nama produk wajib diisi',
        'nama_produk.alpha'=>'nama produk harus berupa huruf',
        'harga.required'=>'harga produk wajib diisi',
        'harga.numeric'=>'harga produk harus berupa angka'
    ]);
    // 2. Mengecek apakah user mengunggah file gambar
    if ($request->hasFile('gambar')) {
        // Proses Upload:
        // Method store() akan menyimpan file ke storage/app/public/produk_images
        // Sekaligus menghasilkan nama file acak (hash) yang aman agar file tidak tertimpa
        $path = $request->file('gambar')->store('produk_images', 'public');
 
    
        $validated['gambar'] = $path;
    }


    


    Produk::create([
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        'Stok' => $request->Stok,
        'gambar' => $path ?? null
    ]);
    return redirect('/produk')->with('success','data berhasil disimpan!');
}
public function edit($id){
    $tampil=Produk::findOrFail($id);
    return view('produk.edit',compact('tampil'));
}
public function update(Request $request,$id){
    $nama_produk = $request->nama_produk;
        $harga =$request->harga;
        $deskripsi = $request->deskripsi;
    $stok = $request->Stok;
    $cari= Produk::findOrFail($id);
    $cari->update([
      'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        'Stok' => $request->Stok  
    ]);
    return redirect('/produk');
}
public function destroy($id){
    $cari= Produk::findOrFail($id);
    $cari->delete();
    return redirect('/produk');
}
public function cetakPdf(){
    $data_produk = Produk::all();
    $pdf = Pdf::loadView('produk.pdf', compact('data_produk'));
    return $pdf->download('produk.pdf');
    // retrurn $pdf->stream('laporan-Inventaris-Tokokita.pdf');
    }
    
}
