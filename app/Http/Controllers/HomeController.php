<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\KriteriaModel;
use Illuminate\Http\Request;
use App\Models\MuridModel;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $kriteria = DB::table('tb_kriteria')
        ->leftJoin('tb_murid','tb_murid.id_murid','=','tb_kriteria.id_murid')
        ->orderBy('nilai_akhir_kriteria','desc')
        ->get();
        return view('backend/home',compact('kriteria'));
    }
}
