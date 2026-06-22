@extends('layouts.app')
@section('judul')
Halaman Mahasiswa
@endsection
@section('konten')
<h1>Halaman Mahasiswa</h1>
    <p>Program studi : Teknik Informatika</p>
    <ul>
        @foreach ($mahasiswa as $data)

                <li>{{ $data['nim'] }} - {{ $data['nama'] }} - 
                    @if($data['Prodi']=='TI')
                        Teknik Informatika
                        @elseif($data['Prodi']=='SI')
                        Sistem Informasi
                        @else
                        Pendidikan Teknologi Informasi
                        @endif
                </li>

        
        @endforeach
    </ul>
@endsection