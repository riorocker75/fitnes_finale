<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;
use DB;
use Carbon\Carbon;
class PaketSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              DB::table('paket')->delete();
        Paket::create([
          'id' => 1,
          'nama' => "Paket Sehat",
          'jangka_waktu' => "1",
          'harga' => "100000",
          'deskripsi'=> "lorem isup",
          'status' => 1
        ]);
          Paket::create([
          'id' => 2,
          'nama' => "Paket Sehat Mid",
          'jangka_waktu' => "3",
          'harga' => "280000",
          'deskripsi'=> "lorem isup",
          'status' => 1
        ]);
          Paket::create([
          'id' => 3,
          'nama' => "Paket Sehat Super",
          'jangka_waktu' => "6",
          'harga' => "550000",
          'deskripsi'=> "lorem isup",
          'status' => 1
        ]);
    }
}
