<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('member')) {
            Schema::create('member', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('kode_member');
                $table->text('id_pengunjung')->nullable();
                $table->text('kode_transaksi')->nullable();

                $table->text('status')->nullable()->comment('1=aktif,0=nonaktif');
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
        Schema::dropIfExists('member');
    }
}
