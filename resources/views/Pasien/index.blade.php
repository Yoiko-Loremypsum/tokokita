@extends('layouts.app4')

@section('content')
<h2>Data Pasien</h2>

<a href="/pasien/create" class="btn btn-success mb-3">Tambah pasien Baru</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No Rekam Medis</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->no_rekam_medis }}</td>
            <td>{{ $item->nama_pasien }}</td>
            <td>
                {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
            </td>
            <td>{{ $item->umur }}</td>
            <td>
                <a href="/pasien/{{ $item->id }}/edit" class="btn btn-primary btn-sm ">Edit</a>

                <form action="/pasien/{{ $item->id }}" method="POST" style="display:inline;"
                    onsubmit="return confirm('Yakin hapus data pasien ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection