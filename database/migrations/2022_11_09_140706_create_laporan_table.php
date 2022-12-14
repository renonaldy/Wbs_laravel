<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('')->nullable();
            $table->string('kejadian1');
            $table->string('lokasi');
            $table->timestamp('tanggal');
            $table->string('nama_pelapor');
            $table->string('jabatan1');
            $table->string('terlibat');
            $table->string('jabatan2');
            $table->string('saksi');
            $table->string('jabatan3');
            $table->string('kejadian');
            $table->string('kerugian');
            $table->string('jumlah_kerugian');
            $table->string('pernah');
            $table->string('bukti');
            $table->string('jabatan_terlapor');
            $table->string('berbicara');
            $table->string('jabatan4');
            $table->string('posisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
