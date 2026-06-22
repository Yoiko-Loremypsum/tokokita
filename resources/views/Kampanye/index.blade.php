@extends('layouts.app3')

@section('content')
<h2>Data Kampanye</h2>

<a href="/kampanye/create" class="btn btn-primary mb-3">Tambah Kampanye</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Judul</th>
            <th>Penyelenggara</th>
            <th>Target Dana</th>
            <th>Tanggal Berakhir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->kode_kampanye }}</td>
            <td>{{ $item->judul_program }}</td>
            <td>{{ $item->penyelenggara }}</td>
            <td>Rp {{ number_format($item->target_dana) }}</td>
            <td>{{ $item->tgl_berakhir }}</td>
            <td>
    <a href="/kampanye/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

    <form action="/kampanye/{{ $item->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('Yakin ingin hapus?')">
            Hapus
        </button>
    </form>
</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection