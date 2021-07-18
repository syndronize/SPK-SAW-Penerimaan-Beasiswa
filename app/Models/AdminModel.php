<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    public $timestamps =  false;
    protected $table = "tb_admin";
    protected $primaryKey = "id_admin";
    protected $fillable =[
        'nama_admin',
        'username_admin',
        'nohp_admin',
        'password_admin',
    ];

    public function CheckLoginPengguna($username_admin, $password_admin)
    {
        $data_admin = $this->where("username_admin", $username_admin)->get();
        if(count($data_admin) == 1){
            if(Hash::check($password_admin, $data_admin[0]->password_admin)){
                unset($data_admin[0]->password_admin);
                return $data_admin[0];
            }
        }
        return false;
    }
}
