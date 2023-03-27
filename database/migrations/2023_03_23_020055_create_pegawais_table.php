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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opd_id');
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('jabatan');
            $table->string('email')->unique();
            $table->string('no_tlp')->nullable();
            $table->string('password');
            $table->string('radius')->nullable();
            $table->integer('role')->default(1);
            $table->string('image')->default('avatar.jpg');
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
};
