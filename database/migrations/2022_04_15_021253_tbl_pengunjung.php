<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPengunjung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema::hasTable('pengunjung')) {
           Schema::create('pengunjung', function (Blueprint $table) {
               $table->bigIncrements('id');
                $table->text('nik');
                $table->text('nama');
                $table->text('jenis_kelamin')->nullable();
                $table->dateTime('tanggal_lahir')->nullable();
                $table->text('tempat_lahir')->nullable();
                $table->text('alamat')->nullable();
                $table->text('no_hp')->nullable();
                $table->text('lvl')->nullable()->comment('1=pengunjung, 2=member');
                $table->text('status')->nullable()->comment('1=aktif, 0=non');

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
        Schema::dropIfExists('pengunjung');
    }
}
