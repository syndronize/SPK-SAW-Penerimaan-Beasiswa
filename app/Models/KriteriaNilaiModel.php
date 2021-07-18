<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaNilaiModel extends Model
{
    public $timestamps = false;
    protected $table = "tb_kriteria_nilai";
    protected $primaryKey = "id_kriteria_nilai";
    protected $fillable =[
        'id_kriteria',
        'tanggungan_nilai',
        'pendapatan_nilai',
        'rata_nilai',
        'transportasi_nilai',
    ];
}
