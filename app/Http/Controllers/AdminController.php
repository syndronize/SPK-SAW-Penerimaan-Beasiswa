<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\AdminModel;
use session;
use DB;

class AdminController extends Controller
{
    public function indexExt(){
        if(session('id_admin') != null){
            return view('backend/home')->with('pesan','Selamat Datang');
        }else{
            return view('backend/auth/index');
        }
    }

    public function aksilogin(Request $request){

        $validator = Validator::make($request->all(),$this->rules);
        if($validator->fails()){
            return back()->with('message','Silahkan Login Kembali');
        }else{
            $username_admin = $request->username_admin;
            $password_admin = $request->password_admin;

            $cek = DB::table('tb_admin')->where('username_admin',$username_admin)->where('password_admin',$password_admin)->first();
            // dd($cek);
            if($cek == TRUE){
                $request->session()->put("id_admin", $cek->id_admin);
                $request->session()->put("nama_admin",$cek->nama_admin);
                return redirect()->route('welcome')->with('message','Selamat Datang');
            }else{
                return back()->with('message','Silahkan Login Kembali');
            }
        }
    }

    public function logout(Request $request){

        $request->session()->forget('id_admin');
        $request->session()->forget('nama_admin');
        $request->session()->flush();
        return redirect("/")->with('message','Sukses Logout.');
    }

    public function __construct(){
        $this->rules = [
            'username_admin' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'password_admin' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
        ];
    }

    public function index(){
        $admin = DB::table('tb_admin')
        ->orderBy('id_admin')
        ->get();
        return view('backend/pages/admin/index',compact('admin'));
    }

    public function create(){
        return view (
            'backend/pages/admin/form',
            [
                'url'=>'admin.store'
            ]
            );
    }

    public function store(Request $request, AdminModel $admin){
        $validator = Validator::make($request->all(),[
            'nama_admin'=>'required',
            'username_admin'=>'required',
            'nohp_admin'=>'required',
            'password_admin'=>'required'

        ]);

        if($validator->fails()){
            return redirect()
            ->route('admin.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $admin->nama_admin = $request->input('nama_admin');
            $admin->username_admin = $request->input('username_admin');
            $admin->nohp_admin = $request->input('nohp_admin');
            $admin->password_admin = $request->input('password_admin');
            $admin->save();

            return redirect()
            ->route('admin')
            ->with('pesan','Data Berhasil Disimpan');
        }
    }

    public function edit(AdminModel $admin){
        return view(
            'backend/pages/admin/form',compact('admin')
        );
    }

    public function update(Request $request,AdminModel $admin){
        $validator = Validator::make($request->all(),[
            'nama_admin'=>'required',
            'username_admin'=>'required',
            'nohp_admin'=>'required',
            'password_admin'=>'required'
        ]);

        if($validator->fails()){
            return redirect()
            ->route('admin.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $admin->nama_admin = $request->input('nama_admin');
            $admin->username_admin = $request->input('username_admin');
            $admin->nohp_admin = $request->input('nohp_admin');
            $admin->password_admin = $request->input('password_admin');
            $admin->save();

            return redirect()
            ->route('admin')
            ->with('pesan','Data Berhasil Diedit');
        }
    }

    public function destroy(AdminModel $admin){
        $admin->forceDelete();
        return redirect()
        ->route('admin')
        ->with('pesan','Data Berhasil Dihapus');
    }
}
