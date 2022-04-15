<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('absensi')) {
          Schema::create('absensi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('id_pengunjung');
            $table->date('tanggal');
            $table->string('jam_masuk')->nullable();
            $table->string('jam_keluar')->nullable();
          });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
