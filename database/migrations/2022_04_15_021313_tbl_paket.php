<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPaket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema::hasTable('paket')) {
           Schema::create('paket', function (Blueprint $table) {
               $table->bigIncrements('id');
                $table->text('nama');
                $table->text('jangka_waktu')->nullable();
                $table->text('harga')->nullable();                
                $table->text('deskripsi')->nullable();  
                $table->text('status')->nullable();  
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
        Schema::dropIfExists('paket');
    }
}
