<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          $this->call(User_seed::class);
          $this->call(PenjagaSeed::class);
          $this->call(MemberSeed::class);
          $this->call(PaketSeed::class);
          $this->call(PengunjungSeed::class);
          $this->call(TransaksiSeed::class);

    }
}
