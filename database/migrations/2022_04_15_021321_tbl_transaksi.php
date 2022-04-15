<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema::hasTable('transaksi')) {
           Schema::create('transaksi', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('kode_transaksi')->nullable();
                $table->text('id_member');  
                $table->text('id_paket');
                $table->text('nama_paket')->nullable();    
                $table->text('harga')->nullable();    
                
                $table->dateTime('tgl_awal')->nullable();
                $table->dateTime('tgl_akhir')->nullable();
                $table->text('status')->comment('1=mulai, 0=berakhir')->nullable();                

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
        Schema::dropIfExists('transaksi');
    }
}
