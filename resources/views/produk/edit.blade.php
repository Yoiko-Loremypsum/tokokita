@extends('layouts.app2')
@section('title', 'Tambah Produk')

@section('content')
<div class="row mt-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Produk Baru</h4>
            </div>
            <div class="card-body">
                <!-- Action mengarah ke URL proses penyimpanan -->
                <form action="/produk/{{ $tampil->id }}" method="POST">
                    @csrf <!-- WAJIB ADA UNTUK KEAMANAN LARAVEL! -->
@method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required value="{{$tampil->nama_produk }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" required value="{{ $tampil->harga  }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3">"{{ $tampil->deskripsi }}"</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok Awal</label>
                        <!-- Nilai default 0 jika dibiarkan -->
                        <input type="number" name="Stok" value="0" class="form-control" value="{{  $tampil->Stok }}">
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="/produk" class="btn btn-secondary">Batal / Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection