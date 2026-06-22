@extends('layouts.app2')

@section('title', 'Daftar Buku')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1 class="h3">Daftar Buku Tersedia</h1>
    </div>
</div>

<div class="row">
    @if (session('success'))
    <div class="alert alert-success fade show alert-dismissible">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    @foreach($data_buku as $item)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            @if($item->sampul_buku)
                    <img src="{{ asset('storage/' . $item->sampul_buku) }}" class="card-img-top" alt="{{ $item->Judul }}" style="height: 200px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/300x200?text=Tidak+Ada+Foto" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                @endif
            <div class="card-body">

                <h5 class="card-title">{{ $item->Judul }}</h5>

                <h6 class="card-subtitle mb-2 text-muted">
                    <b>Pengarang:</b>{{$item->Pengarang }}
                </h6>
                <h6 class="card-subtitle mb-1 text-muted">
                    <b>Tahun terbit:</b> {{$item->Tahun_terbit }}
                </h6>
                <p class="card-text text-success">
                    <b>Sinopsis: </b> {{ $item->Sinopsis }}
                </p>

            </div>
            @auth
            @can('isPustakawan')
          
            <a href="/buku/edit/{{ $item->id }}" class="btn btn-secondary mb-3 mt-2 w-50 d-block mx-auto">Edit</a>
            <form action="/buku/delete/{{ $item->id }}" method="POST" class="d-flex justify-content-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-3 mt-2 w-50 "
                    onclick="return confirm('Yakin Ingin Hapus?')">
                    Hapus
                </button>
            </form>
            @endcan
            @endauth

        </div>
    </div>
    @endforeach
    @auth
    @can('isPustakawan')
    <a href="{{ Route('buku.create') }}" class="btn btn-mb4 btn-primary">Tambah Buku</a>
     <a href="{{ route('buku.cetak_pdf') }}" class="btn btn-danger btn-mx-auto mb-4">
    <i class="fa-solid fa-file-pdf"></i> Ekspor PDF
</a>
    @endauth
    @endcan

</div>
@endsection