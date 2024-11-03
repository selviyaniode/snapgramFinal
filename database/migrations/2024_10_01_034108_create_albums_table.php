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
        Schema::create('albums', function (Blueprint $table) {
            $table->bigIncrements('albumID'); // Menggunakan bigIncrements untuk auto-increment bigint
            $table->string('namaAlbum');
            $table->text('deskripsi')->nullable(); 
            $table->date('tanggalDibuat');
            $table->unsignedBigInteger('userID'); // Menggunakan unsignedBigInteger untuk foreign key
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
