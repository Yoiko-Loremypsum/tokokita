<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table='pasiens';
    protected $fillable = [
        'no_rekam_medis','nama_pasien','jenis_kelamin','umur'
    ];
}
