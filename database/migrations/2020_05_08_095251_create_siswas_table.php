<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string("nis");
            $table->string("nama");
            $table->date("tgl_lahir");
            $table->integer("tahun_ajar");
            $table->unsignedBigInteger("kelas_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
