<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahanDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
			$table->unsignedBigInteger('id_kecamatan');
			$table->foreign('id_kecamatan')
				->references('id')->on('kecamatan')
				->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan_desa');
    }
}
