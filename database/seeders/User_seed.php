<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use DB;
class User_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('user')->delete();
        Admin::create([
          'id' => 1,
          'username' => "admin",
          'password' =>bcrypt("admin"),
          'id_unik' => "123456789",
          'level' =>1,
          'status'=> 1
        ]);

        Admin::create([
          'id' => 2,
          'username' => "member",
          'password' =>bcrypt("member"),
           'id_unik' => "789456123",
          'level' =>2,
          'status'=> 1
        ]);

        
    }
}
