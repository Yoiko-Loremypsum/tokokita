<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaControler extends Controller
{
    public function index(){
        $mahasiswa=[
            ['nim'=> '224510024', 'nama'=>'Susi','Prodi'=>'TI'],
            ['nim'=> '224510023', 'nama'=>'Johan','Prodi'=>'SI'],
            ['nim'=> '224510022', 'nama'=>'Yudi ','Prodi'=>'PTI'],
        ];
        $data["teks"] = "Halo Selamat Belajar Laravel!";
        return view('mahasiswa',compact('mahasiswa'));
    }
    public function show($nim){
        return 'Nim : ' . $nim;
    }
}
