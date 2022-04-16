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





}
