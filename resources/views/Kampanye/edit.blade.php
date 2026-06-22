@extends('layouts.app3')

@section('content')
<h2>Edit Kampanye</h2>

<form action="/kampanye/{{ $data->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kode Kampanye</label>
        <input type="text" name="kode_kampanye" class="form-control"
            value="{{ $data->kode_kampanye }}" required>
    </div>

    <div class="mb-3">
        <label>Judul Program</label>
        <input type="text" name="judul_program" class="form-control"
            value="{{ $data->judul_program }}" required>
    </div>

    <div class="mb-3">
        <label>Penyelenggara</label>
        <input type="text" name="penyelenggara" class="form-control"
            value="{{ $data->penyelenggara }}" required>
    </div>

    <div class="mb-3">
        <label>Target Dana</label>
        <input type="number" name="target_dana" class="form-control"
            value="{{ $data->target_dana }}" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Berakhir</label>
        <input type="date" name="tgl_berakhir" class="form-control"
            value="{{ $data->tgl_berakhir }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
