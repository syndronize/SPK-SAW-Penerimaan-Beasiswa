<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\MuridModel;
use App\Models\KriteriaModel;
use DB;

class MuridController extends Controller
{
    public function index()
    {
        $murid = DB::table('tb_murid')
        ->orderBy('id_murid')
        ->get();
        return view('backend/pages/murid/index',compact('murid'));
    }

    public function create(){
        return view(
            'backend/pages/murid/form',
            [
                'url' => 'murid.store',
            ]
            );
    }

    public function store(Request $request, MuridModel $murid){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_murid'=>'required',
            'nisn_murid'=>'required',
            'jk_murid'=>'required',
            'kelas_murid'=>'required',
            'nohp_murid'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('murid.create')
            ->withErrors($validator)
            ->withInput();
        }else {
            $murid->nama_murid = $request->input('nama_murid');
            $murid->nisn_murid = $request->input('nisn_murid');
            $murid->jk_murid = $request->input('jk_murid');
            $murid->kelas_murid = $request->input('kelas_murid');
            $murid->nohp_murid = $request->input('nohp_murid');
            $murid->save();

            $id=$murid->id_murid;
            DB::table('tb_kriteria')->insert([
                'id_murid'=>$id
            ]);

            return redirect()
            ->route('murid')
            ->with('pesan','Data Berhasil Ditambahkan');
        }
    }

    public function edit(MuridModel $murid){

        return view(
            'backend/pages/murid/form',compact('murid')
        );
    }

    public function update(Request $request, MuridModel $murid){

        $request->validate([
            "nama_murid" => ["required"],
            "nisn_murid" => ["required"],
            "jk_murid" => ["required"],
            "kelas_murid" => ["required"],
            "nohp_murid" => ["required"],
        ]);

        $murid -> nama_murid = $request->input('nama_murid');
        $murid -> nisn_murid = $request->input('nisn_murid');
        $murid -> jk_murid = $request->input('jk_murid');
        $murid -> kelas_murid = $request->input('kelas_murid');
        $murid -> nohp_murid = $request->input('nohp_murid');
        $murid -> save();

        return redirect()
        ->route('murid')
        ->with('pesan','Data Berhasil Diedit');
    }

    public function destroy(MuridModel $murid){
        $id=$murid->id_murid;
        DB::table('tb_kriteria')->where('id_murid',$id)->delete();
        $murid->forceDelete();
        return redirect()
        ->route('murid')
        ->with('pesan','Data Berhasil Dihapus');
    }
}
