@extends('layouts.app2')
@section('title', 'Tambah Buku')

@section('content')
<div class="row mt-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Buku Baru</h4>
            </div>
            <div class="card-body">
                <!-- Action mengarah ke URL proses penyimpanan -->
                <form action="{{ route('buku.store') }}" method="POST"   enctype="multipart/form-data">
                    @csrf <!-- WAJIB ADA UNTUK KEAMANAN LARAVEL! -->

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="Judul" class="form-control" value="{{ old('Judul') }}">
                        @error('Judul')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pengarang</label>
                        <input type="text" name="Pengarang" class="form-control" value="{{ old('Pengarang') }}">
                        @error('Pengarang')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Tahun Terbit</label>
                        <input type="text" name="Tahun_terbit" class="form-control" value="{{ old('Tahun_terbit') }}">
                        @error('Tahun_terbit')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Sinopsis</label>

                        <textarea name="Sinopsis" class="form-control" rows="3"></textarea>
                    </div>
<div class="mb-3">
        <label class="form-label">Upload Sampul Buku</label>
        <input type="file" name="sampul_buku" class="form-control @error('sampul_buku') is-invalid @enderror" accept="image/*">
        
        <div class="form-text">Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal: 2MB.</div>
    
    
    @error('sampul_buku')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="/buku" class="btn btn-secondary">Batal / Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection