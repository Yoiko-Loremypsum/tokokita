@extends('layouts.app3')

@section('content')
<h2>Tambah Kampanye</h2>

<form action="/kampanye/store" method="POST">
    @csrf

    <div class="mb-3">
        <label>Kode Kampanye</label>
        <input type="text" name="kode_kampanye" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Judul Program</label>
        <input type="text" name="judul_program" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Penyelenggara</label>
        <input type="text" name="penyelenggara" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Target Dana</label>
        <input type="number" name="target_dana" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Berakhir</label>
        <input type="date" name="tgl_berakhir" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection