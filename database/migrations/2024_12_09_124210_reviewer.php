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
        Schema::create('reviewer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pkm');
            $table->string('komentar');
            $table->integer('nilai1');
            $table->integer('nilai2');
            $table->integer('nilai3');
            $table->integer('nilai4');
            $table->integer('nilai5');
            $table->integer('skor');
            

            $table->timestamps();
$table->foreign('id_user')->references('id')->on('users');
$table->foreign('id_pkm')->references('id')->on('pkm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewer');
    }
};
