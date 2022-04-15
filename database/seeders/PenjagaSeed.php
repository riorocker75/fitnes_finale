<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjaga;
use DB;
use Carbon\Carbon;
class PenjagaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('penjaga')->delete();
        Penjaga::create([
          'id' => 1,
          'nik' => 123456789,
          'nama' => "tria",
          'jenis_kelamin' => "2",
          'tanggal_lahir' =>  Carbon::now()->format('Y-m-d'),
          'Alamat' => "Medan Kota",
          'no_hp' => "085885207894",
          'lvl' => "1",
          'status'=> 1
        ]);

        Penjaga::create([
          'id' => 2,
          'nik' => 545566552,
          'nama' => "ade rai",
          'jenis_kelamin' => "1",
          'tanggal_lahir' =>  Carbon::now()->format('Y-m-d'),
          'Alamat' => "Medan Kota",
          'no_hp' => "085885207894",
          'lvl' => "2",
          'status'=> 1
        ]);


    }
}
