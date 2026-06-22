<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kampanye extends Model
{
    protected $table='kampanyes';
    protected $fillable = [
         'kode_kampanye',
        'judul_program',
        'penyelenggara',
        'target_dana',
        'tgl_berakhir'
    ];
}
