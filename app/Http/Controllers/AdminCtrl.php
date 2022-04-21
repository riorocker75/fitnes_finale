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
            'tanggal' =>date('Y-m-d'),
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
        $tgl_awal=Carbon::now();
        $tgl_akhir=Carbon::now()->addMonths($cek_paket->jangka_waktu);

          DB::table('transaksi')->insert([
            'kode_transaksi' =>$kode_trs,
            'id_member' => $request->member,
            'id_paket' =>$request->paket,
            'nama_paket' => $cek_paket->nama,
            'harga' => $cek_paket->harga,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'status' => 1
        ]);

        return redirect('/dashboard/member/data')->with('alert-success','Data sudah terkirim');

}
 
function member_edit($id){
     $data=Member::orderBy('id','desc')->get();
    return view('admin.member_edit',[
        'data' => $data
    ]);
}
function member_update(Request $request){}
function member_delete($id){
    $member=Member::where('id',$id)->first();
   Pengunjung::where('id',$member->id_pengunjung)->update([
       'lvl' => 1
   ]);
     Member::where('id',$id)->delete();
        return redirect('/dashboard/member/data')->with('alert-success','Data Berhasil');  
}


// penjaga
function penjaga_data(){
    $data=Penjaga::orderBy('id','desc')->get();
    return view('admin.penjaga_data',[
        'data' => $data
    ]);
}
function penjaga_add(){
    return view('admin.penjaga_add');
}
function penjaga_act(Request $request){
        $request->validate([
            'nama' => 'required',
            'nik' => 'required'
        ]);

         DB::table('penjaga')->insert([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'jenis_kelamin' =>$request->kelamin,
            'tanggal_lahir' =>$request->tgl_lhr,
            'tempat_lahir' =>$request->tmp_lhr,
            'alamat' => $request->alamat,
            'no_hp' =>$request->no_hp,
            'lvl' => 0,
            'status' => 1,
        ]);

        return redirect('/dashboard/penjaga/data')->with('alert-success','Data sudah tersimpan');

}

function penjaga_edit($id){
       $data=penjaga::where('id',$id)->get();
    
 return view('admin.penjaga_edit',[
        'data'=> $data
    ]); 
}
function penjaga_update(Request $request){
       $request->validate([
            'nama' => 'required',
            'nik' => 'required'
        ]);
         $id=$request->id;

         DB::table('penjaga')->where('id',$id)->update([
            'nama' => $request->nama,
            'nik' =>$request->nik,
            'jenis_kelamin' =>$request->kelamin,
            'tanggal_lahir' =>$request->tgl_lhr,
            'tempat_lahir' =>$request->tmp_lhr,
            'alamat' => $request->alamat,
            'no_hp' =>$request->no_hp,
   
        ]);

        return redirect('/dashboard/penjaga/data')->with('alert-success','Data sudah terbaru');

}

function penjaga_delete($id){
    Penjaga::where('id',$id)->delete();
        return redirect('/dashboard/penjaga/data')->with('alert-success','Data sudah terhapus');
}







// absensi

function absensi_data(){
    $data= Absensi::orderBy('id','desc')->get();
    return view('admin.absensi_data',[
        'data' =>$data
    ]);
}
function absensi_add(){}
function absensi_act(Request $request){

        $request->validate([
            'cek_member' => 'required'
        ]);

        $id=$request->cek_member;
        $pengunjung=Pengunjung::where('id',$id)->first();

        if($pengunjung->lvl == 1){
            $kode_trs= "TRSP-".mt_rand(10000, 99999);
            DB::table('transaksi')->insert([
                'kode_transaksi' => $kode_trs,
                'id_member' => $id,
                'id_paket' => 0,
                'nama_paket' => "Harian",
                'harga' => $request->bayar,
                'tgl_awal' => date('Y-m-d'),
                'tgl_akhir' => date('Y-m-d'),
                 'status' => 0   
            ]);
        }

         DB::table('absensi')->insert([
            'id_pengunjung' => $request->cek_member,
            'tanggal' => date('Y-m-d'),
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
        ]);

        return redirect('/')->with('alert-success','Data sudah tersimpan');


}

function absensi_edit(){}
function absensi_update(Request $request){}
function absensi_delete($id){
        Absensi::where('id',$id)->delete();
    return redirect('/dashboard/absensi/data')->with('alert-success','Data telah terhapus');

}


//pengecekan pembayaran

function pembayaran_data(){
    $data=Transaksi::where('status_member',2)->orderBy('id','desc')->get();
    return view('admin.pembayaran_data',[
        'data' => $data
    ]);
}

function pembayaran_edit($id){
    $data= Transaksi::where('id',$id)->get();
    return view('admin.pembayaran_edit',[
        'data' => $data
    ]);
}


function pembayaran_delete($id){
    Transaksi::where('id',$id)->delete();
    return redirect('/dashboard/pembayaran/data')->with('alert-success','Data telah terhapus');

}


// transaksi
function transaksi_data(){
    $data=Transaksi::where('status',1)->orderBy('id','desc')->get();
    return view('admin.transaksi_data',[
        'data' => $data
    ]);
}

function transaksi_delete($id){
    Transaksi::where('id',$id)->delete();
    return redirect('/dashboard/transaksi/data')->with('alert-success','Data telah terhapus');

}



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


//  konfirmasi bayar
function konfirmasi_bayar(Request $request){
    $id=$request->id;
    $transaksi=Transaksi::where('id',$id)->first();
    $paket=Paket::where('id',$transaksi->id_paket)->first();
    $member=Pengunjung::where('id',$transaksi->id_member)->first();

      $jangka= $paket->jangka_waktu;
        $tgl_awal=Carbon::now();
        $tgl_akhir=Carbon::now()->addMonths($jangka);

        $kode_member= "MB-".mt_rand(1000, 9999);



    Transaksi::where('id',$id)->update([
        'tgl_awal' =>$tgl_awal,
        'tgl_akhir' =>$tgl_akhir,
        'status_member' => 1,
        'status' =>1
    ]);

    Member::insert([
        'kode_member' => $kode_member,
        'id_pengunjung' => $transaksi->id_member,
        'kode_transaksi' =>$transaksi->kode_transaksi,
        'status' => 1
    ]);




}


//  cek member absesni
function cek_member(Request $request){
    $id=$request->cek_member;
    $pengunjung=Pengunjung::where('id',$id)->first();

    if($pengunjung->lvl == 2){

    }else{
          echo"
         <div class='form-group'>
            <label >Bayar Harian</label>
            <input type='number' class='form-control' name='bayar'>
         </div>
        ";
    }

}


// cetak

function cetak_absensi(){
    $year=date('Y');
    $data=Absensi::whereYear('tanggal',$year)->get();
    return view('cetak.cetak_absensi',[
        'data'=> $data
    ]);
}

function cetak_pengunjung(){
    $year=date('Y');
    $data=Pengunjung::whereYear('tanggal',$year)->get();
    return view('cetak.cetak_pengunjung',[
        'data'=> $data
    ]);
}

function cetak_transaksi(){
        $data=Transaksi::where('status',1)->orderBy('id','desc')->get();
        return view('cetak.cetak_transaksi',[
            'data' => $data
        ]);
}

function role(){
     $data=Admin::orderBy('id','asc')->where('level',1)->get();
     return view('admin.r_role_data',[
         'data' =>$data
     ]);
 }



  function role_update(Request $request){
    $request->validate([
         'penjaga' => 'required',
        
    ]);

 
        Admin::where('level',1)->update([
            'id_unik' => $request->penjaga,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
  

     return redirect('/dashboard/role/data')->with('alert-success','Data sudah berubah');

 }




}
