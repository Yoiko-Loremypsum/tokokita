@extends('layouts.app2')
@section('title', 'Edit Buku')

@section('content')
<div class="row mt-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Buku </h4>
            </div>
            <div class="card-body">
                <!-- Action mengarah ke URL proses penyimpanan -->
                <form action="/buku/{{ $tampil->id }}" method="POST">
                    @csrf <!-- WAJIB ADA UNTUK KEAMANAN LARAVEL! -->
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="Judul" class="form-control" value="{{ $tampil->Judul }}">
                        @error('Judul')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pengarang</label>
                        <input type="text" name="Pengarang" class="form-control" value="{{ $tampil->Pengarang }}">
                        @error('Pengarang')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Tahun Terbit</label>
                        <input type="text" name="Tahun_terbit" class="form-control" value="{{ $tampil->Tahun_terbit }}">
                        @error('Tahun_terbit')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label class="form-label">Sinopsis</label>

                        <textarea name="Sinopsis" class="form-control" rows="3"> "{{$tampil->Sinopsis  }}"</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="/buku" class="btn btn-secondary">Batal / Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection