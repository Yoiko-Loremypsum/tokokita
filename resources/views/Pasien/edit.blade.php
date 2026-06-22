@extends('layouts.app4')

@section('content')
<h2>Edit Data Pasien</h2>

<form action="/pasien/{{ $data->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>No Rekam Medis</label>
        <input type="text" name="no_rekam_medis" class="form-control"
            value="{{ $data->no_rekam_medis }}" required>
    </div>

    <div class="mb-3">
        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" class="form-control"
            value="{{ $data->nama_pasien }}" required>
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="L" {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Umur</label>
        <input type="number" name="umur" class="form-control"
            value="{{ $data->umur }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection