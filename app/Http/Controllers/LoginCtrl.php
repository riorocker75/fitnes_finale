<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Penjaga;
use App\Models\Pengunjung;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Transaksi;
use App\Models\Option;
use App\Models\Absensi;
class LoginCtrl extends Controller
{
   
    

    public function index(){
        return view('login.login');
    }
    
    function cek_login(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = Admin::where('username',$username)->first();

        if($data){
           if($data->level == "1"){
            Session::flush();
                
                if(Hash::check($password,$data->password)){
                    Session::put('adm_username', $data->username);
                    Session::put('level', 1);
                    Session::put('login-adm',TRUE);
                    return redirect('/dashboard/admin')->with('alert-success','Selamat Datang Kembali Admin');
                }else{
                    return redirect('/login')->with('alert-danger','Password atau Email, Salah !');
                }
           }elseif($data->level == "2"){
                Session::flush();
                
                if(Hash::check($password,$data->password)){
                    Session::put('mb_username', $data->username);
                    Session::put('nik_member',$data->id_unik);
                    Session::put('level', 2);
                    Session::put('login-mb',TRUE);
                    return redirect('/dashboard/member')->with('alert-success','Selamat Datang Kembali');
                }else{
                    return redirect('/login')->with('alert-danger','Password atau Email, Salah !');
                }
           }     

        }else{
            return redirect('/login')->with('alert-danger','Password atau Email, Salah !');
        }



    }

    function logout(){
         Session::flush();
        return redirect('/login')->with('alert-success','Logout berhasil');
    }

    function daftar_act(Request $request){
           $request->validate([
            'nama' => 'required',
            'nik' => 'required'
        ]);

         DB::table('pengunjung')->insert([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'jenis_kelamin' =>$request->kelamin,
            'lvl' => 1,
            'status' => 1,
        ]);

        DB::table('user')->insert([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'id_unik' => $request->nik,
            'level' => 2,
            'status' => 1
        ]);

        return redirect('/login')->with('alert-success','Selamat bergabung di Gym kami, Silahkan Login');

    }





}
