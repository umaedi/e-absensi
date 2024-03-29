<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opd_id');
            $table->foreignId('pegawai_id');
            $table->date('tanggal');
            $table->string('jam_masuk');
            $table->string('jam_pulang')->nullable();
            $table->string('lat_long_masuk');
            $table->string('lat_long_pulang')->nullable();
            $table->string('photo_masuk');
            $table->string('photo_pulang')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('absents');
    }
};
