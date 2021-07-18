<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuridModel extends Model
{
    public $timestamps = false;
    protected $table = "tb_murid";
    protected $primaryKey = "id_murid";
    protected $fillable =[
        'nama_murid',
        'nisn_murid',
        'jk_murid',
        'kelas_murid',
        'nohp_murid',
    ];
}
