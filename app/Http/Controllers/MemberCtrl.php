<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
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


class MemberCtrl extends Controller
{
   	public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-mb')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }

    function index(){
        return view('member.member');
    }

    function beli_act(Request $request){

          $request->validate([
            'id' => 'required',
        ]);
        $id=$request->id;
        $id_pengunjung=Session::get('id_unik');

        $pengunjung=Pengunjung::where('id',$id_pengunjung)->first();
        $paket=Paket::where('id',$id)->first();

        $kode_trs= "TRS-".mt_rand(10000, 99999);


         DB::table('transaksi')->insert([
            'kode_transaksi' => $kode_trs,
            'id_member' => $id_pengunjung,
            'id_paket' => $id,
            'nama_paket' =>$paket->nama,
            'harga' => $paket->harga,
            'status_member' => 2,
            'status' => 0
        ]);

        return redirect('/dashboard/member')->with('alert-success','Harap segera melakukan pembayaran');

    } 


    // transaksi

    function transaksi(){
        $id=Session::get('mb_id');
        $data=Transaksi::where('id_member',$id)->get();
        return view('member.transaksi_member',[
            'data' =>$data
        ]);
    }

    function cetak_transaksi(){
         $id=Session::get('mb_id');
         $year=date('Y');
  
        $data=Transaksi::where('id_member',$id)->whereYear('tgl_awal',$year)->get();
        return view('member.cetak_transaksi',[
            'data' =>$data
        ]);
    }



    function pengaturan(){
        return view('member.pengaturan');
    }

    function pengaturan_update(Request $request){
    $request->validate([
        'password' => 'required',
    ]); 
    
    $nik=Session::get('mb_id');

        if($request->password != ""){
            Admin::where('id',$nik)->update([
                'password' => bcrypt($request->password)
            ]);
        }
        return redirect('/dashboard/member/pengaturan')->with('alert-success','Password telah diubah');

    }





}
