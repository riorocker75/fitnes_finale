<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use DB;
use Carbon\Carbon;
class TransaksiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('transaksi')->delete();
        Transaksi::create([
          'id' => 1,
          'kode_transaksi' => "TR-123",
          'id_member' => "1",
          'id_paket' => "1",
          'harga'=> "100000",
          'tgl_awal' => Carbon::now()->format('Y-m-d'),
          'tgl_akhir' => Carbon::now()->addMonth()->format('Y-m-d'),
        'status' => 1
        ]);
    }
}
