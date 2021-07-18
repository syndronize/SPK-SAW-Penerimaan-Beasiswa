<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\KriteriaModel;
use Illuminate\Http\Request;
use App\Models\MuridModel;
use DB;

class KriteriaController extends Controller
{
    public function index()
    {
        // data kirteria
        $kriteria = DB::table('tb_kriteria')
        ->leftJoin('tb_murid','tb_murid.id_murid','=','tb_kriteria.id_murid')
        ->orderBy('id_kriteria')
        ->get();

        //Nilai Pembobotan
        $maxc1=DB::table('tb_kriteria')->min('tanggungan_kriteria');
        $minc2=DB::table('tb_kriteria')->min('pendapatan_kriteria');
        $maxc3=DB::table('tb_kriteria')->max('rata_kriteria');
        $minc4=DB::table('tb_kriteria')->min('transportasi_kriteria');
        // dd($minc2);
        foreach ($kriteria as $no => $row) {
            //Pembobotan
            $bobotc1 = 0.2;
            $bobotc2 = 0.35;
            $bobotc3 = 0.3;
            $bobotc4 = 0.15;


            //Penilaian 1
            $nilaic1 = ($row->tanggungan_kriteria != null ? $maxc1/$row->tanggungan_kriteria : 0);
            $nilaic2 = ($row->pendapatan_kriteria != null ? $minc2/$row->pendapatan_kriteria : 0);
            $nilaic3 = ($row->rata_kriteria != null ? $row->rata_kriteria/$maxc3 : 0);
            $nilaic4 = ($row->transportasi_kriteria != null ? $minc4/$row->transportasi_kriteria : 0);

            //Penilaian Akhir
            $nilaiakhir=($nilaic1*$bobotc1)+($nilaic2*$bobotc2)+($nilaic3*$bobotc3)+($nilaic4*$bobotc4);
            // dd($nilaiakhir);
            $save=DB::table('tb_kriteria')->where('id_kriteria', $row->id_kriteria)
            ->update([
                'nilai_akhir_kriteria' =>$nilaiakhir
            ]);
        }

        return view('backend/pages/kriteria/index',compact('kriteria'));
    }

    public function store(Request $request, KriteriaModel $kriteria){
        $validator = Validator::make($request->all(), [
            'id_murid'=>'required',
            'tanggungan_kriteria'=>'required',
            'pendapatan_kriteria'=>'required',
            'rata_kriteria'=>'required',
            'transportasi_kriteria'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('kriteria.create')
            ->withErrors($validator)
            ->withInput();
        }else {
            $kriteria->id_murid = $request->input('id_murid');
            $kriteria->tanggungan_kriteria = $request->input('tanggungan_kriteria');
            $kriteria->pendapatan_kriteria = $request->input('pendapatan_kriteria');
            $kriteria->rata_kriteria = $request->input('rata_kriteria');
            $kriteria->transportasi_kriteria = $request->input('transportasi_kriteria');
            $kriteria->save();

            return redirect()
            ->route('kriteria')
            ->with('pesan','Data Berhasil Ditambahkan');
        }
    }

    public function edit(KriteriaModel $kriteria){
        // dd($kriteria);
        $kriteria = DB::table('tb_kriteria')
        ->leftJoin('tb_murid','tb_murid.id_murid','=','tb_kriteria.id_murid')
        ->where('tb_kriteria.id_murid',$kriteria->id_murid)
        ->first();
        return view(
            'backend/pages/kriteria/form',[
                'kriteria'=>$kriteria
            ]
        );
    }

    public function update(Request $request, KriteriaModel $kriteria){
        $request->validate([
            "tanggungan_kriteria" => ["required"],
            "pendapatan_kriteria" => ["required"],
            "rata_kriteria" => ["required"],
            "transportasi_kriteria" => ["required"],
        ]);


        $kriteria->tanggungan_kriteria = $request->input('tanggungan_kriteria');
        $kriteria->pendapatan_kriteria = $request->input('pendapatan_kriteria');
        $kriteria->rata_kriteria = $request->input('rata_kriteria');
        $kriteria->transportasi_kriteria = $request->input('transportasi_kriteria');
        $kriteria->save();

        return redirect()
        ->route('kriteria')
        ->with('pesan','Data Berhasil Diedit');
    }

    public function destroy(KrtiteriaModel $kriteria){

        $kriteria->forceDelete();
        return redirect()
        ->route('kriteria')
        ->with('pesan','Data Berhasil Dihapus');
    }
}
