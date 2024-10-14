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
        Schema::create('kasir', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Kolom nama kasir
            $table->string('no_telp'); // Kolom no telpon
            $table->string('alamat'); // Kolom alamat
            $table->date('tgl_lahir'); // Kolom tgl lahir
            $table->string('tempat_lahir'); // Kolom tempat lahir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Kasir');
    }
};
