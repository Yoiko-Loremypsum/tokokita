@extends('layouts.app4')

@section('content')
<h2>Tambah Pasien</h2>

<form action="/pasien" method="POST">
    @csrf

    <div class="mb-3">
        <label>No Rekam Medis</label>
        <input type="text" name="no_rekam_medis" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Umur</label>
        <input type="number" name="umur" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection