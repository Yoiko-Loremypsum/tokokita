<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table='bukus';
    protected $fillable = ['id','Judul','Pengarang','Tahun_terbit','Sinopsis','sampul_buku'];
}
