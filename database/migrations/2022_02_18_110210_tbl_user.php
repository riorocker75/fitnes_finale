<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user')) {
            Schema::create('user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('username')->nullable();
                $table->text('password')->nullable();
                $table->text('id_unik')->nullable()->comment('nik setiap pengunjung dan penjaga');
               $table->text('level')->comment('1=admin,2=pengunjung');
               $table->text('status')->comment('1=aktif, 0=non');
            });
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
             Schema::dropIfExists('user');
    }
}
