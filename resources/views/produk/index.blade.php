@extends('layouts.app2')

@section('title', 'Daftar Produk')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1 class="h3">Daftar Produk Tersedia</h1>
    </div>
</div>

<div class="row">
    @if (session('success'))
        <div class="alert alert-success fade show alert-dismissible">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div> 
    @endif

    @foreach($data_produk as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_produk }}" style="height: 200px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/300x200?text=Tidak+Ada+Foto" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_produk }}</h5>

                    <h6 class="card-subtitle mb-2 text-muted">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </h6>

                    {{-- Catatan: Mengubah penyamaan sintaks properti dari $item['Stok'] menjadi $item->Stok agar konsisten menggunakan Object Operator --}}
                    @if($item->Stok > 0)
                        <p class="card-text text-success">
                            Stok: {{ $item->Stok }} (Tersedia)
                        </p>
                        <a href="#" class="btn btn-primary w-100">
                            Beli Sekarang
                        </a>
                    @else
                        <p class="card-text text-danger">
                            Stok Habis
                        </p>
                        <button class="btn btn-secondary w-100" disabled>
                            Beli Sekarang
                        </button>
                    @endif

                    @can('isAdmin')
                        <a href="/produk/edit/{{ $item->id }}" class="btn btn-info mt-3 w-100">edit</a>
                        <form action="/produk/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100 mt-3" onclick="return confirm('Yakin Ingin Hapus')">Hapus</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    @endforeach

    @can('isAdmin')
        <div class="col-12 mb-4">
            <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah</a>
            <a href="{{ route('produk.cetak_pdf') }}" class="btn btn-danger">
    <i class="fa-solid fa-file-pdf"></i> Ekspor PDF
</a>
        </div>

    @endcan
</div>
@endsection