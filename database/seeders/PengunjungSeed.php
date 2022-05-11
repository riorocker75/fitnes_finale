<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengunjung;
use DB;
use Carbon\Carbon;
class PengunjungSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  DB::table('pengunjung')->delete();
        // Pengunjung::create([
        //   'id' => 1,
        //   'nama' => "Sumail",
        //   'jenis_kelamin' => "1",
        //   'tanggal_lahir' =>  Carbon::now()->format('Y-m-d'),
        //   'Alamat' => "Medan Kota",
        //   'no_hp' => "085885207894",
        //   'tanggal' =>date('Y-m-d'),
        //   'lvl' => "1",
        //   'status'=> 1
        // ]);

 
        // Pengunjung::create([
        //   'id' => 2,
        //   'nama' => "Taehyung",
        //   'jenis_kelamin' => "1",
        //   'tanggal_lahir' =>  Carbon::now()->format('Y-m-d'),
        //   'Alamat' => "Medan Kota",
        //   'no_hp' => "0854654789",
        //   'tanggal' =>date('Y-m-d'),
        //   'lvl' => "2",
        //   'status'=> 1
        // ]);
    }
}
