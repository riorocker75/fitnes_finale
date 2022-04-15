<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use DB;
use Carbon\Carbon;
class MemberSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('member')->delete();
        Member::create([
          'id' => 1,
          'kode_member' => "MB-1309",
          'id_pengunjung' => "1",
          'kode_transaksi' => "TR-123",
          'status'=> 1
        ]);
    }
}
