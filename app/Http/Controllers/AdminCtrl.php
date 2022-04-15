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












class AdminCtrl extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('/login')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }
    public function __invoke(Request $request)
    {
       

    }

    function index(){
          return view('admin.admin');
    }


    // pasien
    function pasien(){
        return view('pasien.pasien');
    }

    function pasien_act(Request $request){
         $request->validate([
            'nama' => 'required',
            'nik' => 'required'
        ]);

         $date=date('Y-m-d');

         DB::table('pasien')->insert([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'tang gal_lahir'=> $request->tgl_lhr,
            'tempat_lahir' => $request->tmp_lhr,
            'agama'=> $request->agama,
            'pekerjaan'=> $request->kerja,
            'alamat'=> $request->alamat,
            'nama_kepala'=> $request->kepala,
            'tgl_registrasi' => $date,
            'status' => 1
        ]);

        return redirect('/dashboard/pasien/data')->with('alert-success','Data diri anda sudah terkirim');

    }

     function pasien_data(){
         $data = Pasien::orderBy('id','desc')->get();
        return view('admin.pasien_data',[
            'data' =>$data
        ]);
    }
    function pasien_edit($id){
          $data = Pasien::where('id',$id)->get();
        return view('admin.pasien_edit',[
            'data' =>$data
        ]);
    }

    function pasien_update(){
        
    }
    function pasien_delete(){
               Pasien::where('id',$id)->delete();
        return redirect('/dashboard/pasien/data')->with('alert-success','Data Berhasil');  
    }


//paket

function paket_data(){
    $data=Paket::orderBy('id','asc')->get();
    return view('admin.paket_data',[
        'data'=> $data
    ]);
}
function paket_act(Request $request){
        $request->validate([
            'nama' => 'required',
            'jangka' => 'required'
        ]);

         DB::table('paket')->insert([
            'nama' => $request->nama,
            'jangka_waktu' =>$request->jangka,
            'harga' =>$request->harga,
            'deskripsi' =>$request->deskripsi,
            'status' => 1
        ]);

        return redirect('/dashboard/paket/data')->with('alert-success','Data sudah terkirim');


}

function paket_edit($id){
    $data=Paket::orderBy('id','asc')->get();
    $data_paket=Paket::where('id',$id)->get();
    return view('admin.paket_edit',[
        'data'=> $data,
        'data_paket' => $data_paket
    ]);  
}

function paket_update(Request $request){

         $request->validate([
            'nama' => 'required',
            'jangka' => 'required'
        ]);
         $id=$request->id;

         DB::table('paket')->where('id',$id)->update([
            'nama' => $request->nama,
            'jangka_waktu' =>$request->jangka,
            'harga' =>$request->harga,
            'deskripsi' =>$request->deskripsi,
   
        ]);

        return redirect('/dashboard/paket/data')->with('alert-success','Data sudah terbaru');



}

function paket_delete($id){
        Paket::where('id',$id)->delete();
        return redirect('/dashboard/paket/data')->with('alert-success','Data Berhasil');  
}




// pengunjung
function pengunjung_data(){
    $data=Pengunjung::orderBy('id','desc')->get();
    return view('admin.pengunjung_data',[
        'data'=> $data
    ]);
}
function pengunjung_add(){
    return view('admin.pengunjung_add');
}
function pengunjung_act(Request $request){
    
         $request->validate([
            'nama' => 'required',
            'nik' => 'required'
        ]);

         DB::table('pengunjung')->insert([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'jenis_kelamin' =>$request->kelamin,
            'tanggal_lahir' =>$request->tgl_lhr,
            'tempat_lahir' =>$request->tmp_lhr,
            'alamat' => $request->alamat,
            'no_hp' =>$request->no_hp,
            'lvl' => 1,
            'status' => 1,
        ]);

        return redirect('/dashboard/pengunjung/data')->with('alert-success','Data sudah tersimpan');

}

function pengunjung_edit($id){
    $data=Pengunjung::where('id',$id)->get();
    
 return view('admin.pengunjung_edit',[
        'data'=> $data
    ]);
}
function pengunjung_update(Request $request){

         $request->validate([
            'nama' => 'required',
            'nik' => 'required'
        ]);
         $id=$request->id;

         DB::table('pengunjung')->where('id',$id)->update([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'jenis_kelamin' =>$request->kelamin,
            'tanggal_lahir' =>$request->tgl_lhr,
            'tempat_lahir' =>$request->tmp_lhr,
            'alamat' => $request->alamat,
            'no_hp' =>$request->no_hp,
   
        ]);

        return redirect('/dashboard/pengunjung/data')->with('alert-success','Data sudah terbaru');

}
function pengunjung_delete($id){
        Pengunjung::where('id',$id)->delete();
        return redirect('/dashboard/pengunjung/data')->with('alert-success','Data Berhasil');  
}



// member
function member_data(){
    $data=Member::orderBy('id','desc')->get();
    return view('admin.member_data',[
        'data' => $data
    ]);
}

function member_act(Request $request){
     $request->validate([
            'member' => 'required',
        ]);
        $kode_member= "MB-".mt_rand(1000, 9999);
        $kode_trs= "TRS-".mt_rand(10000, 99999);

         DB::table('member')->insert([
            'kode_member' => $kode_member,
            'id_pengunjung' =>$request->member,
            'kode_transaksi' =>$kode_trs,
            'status' => 1
        ]);

        $cek_paket=Paket::where('id',$request->paket)->first();
        

          DB::table('transaksi')->insert([
            'kode_transaksi' =>$kode_trs,
            'id_member' => $request->member,
            'id_paket' =>$request->paket,
            'nama_paket' => $cek_paket->nama,
            'harga' => $cek_paket->harga,

            'status' => 1
        ]);



        return redirect('/dashboard/paket/data')->with('alert-success','Data sudah terkirim');

}
 
function member_edit(){}
function member_update(Request $request){}
function member_delete(){}


// absensi

function absesnsi_data(){}
function absesnsi_add(){}
function absesnsi_act(Request $request){}

function absesnsi_edit(){}
function absesnsi_update(Request $request){}
function absesnsi_delete(){}




 function pengaturan(){
     $username= Session::get('adm_username');
    $data= Admin::where('username',$username)->first();
    return view('admin.pengaturan',[
        'data'=> $data
    ]);

 }

  function pengaturan_update(Request $request){
     $username= Session::get('adm_username');
   
     if($request->password == ""){
        return redirect('/dashboard')->with('alert-success','Tidak Ada perubahan');
     }else{
         Admin::where('level','1')->update([
             'password' =>bcrypt($request->password)
         ]);
        return redirect('/dashboard/pengaturan/data')->with('alert-success','Password telah berubah');

     }

 }






}
