<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('PKM', function (Blueprint $table) {
            $table->id();
            $table->text('anggota');
            $table->unsignedBigInteger('id_user');
            $table->boolean('diedit');
            $table->integer('tahun_usulan');
            $table->integer('tahun_pelaksana');
            $table->string('jangka_waktu');
            $table->string('judul_pkm');
            $table->string('jenis_pkm');
            $table->string('abstrak');
            $table->string('dana');
            $table->text('proposal_file');
            $table->enum('status',['menunggu','sedang direview','sudah direview','ditolak','lolos']);
            $table->timestamps();
$table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PKM');
    }
};
