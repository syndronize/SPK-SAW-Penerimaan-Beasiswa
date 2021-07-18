<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaModel extends Model
{
    public $timestamps = false;
    protected $table = "tb_kriteria";
    protected $primaryKey = "id_kriteria";
    protected $fillable =[
        'id_murid',
        'tanggungan_kriteria',
        'pendapatan_kriteria',
        'rata_kriteria',
        'transportasi_kriteria',
    ];
}
