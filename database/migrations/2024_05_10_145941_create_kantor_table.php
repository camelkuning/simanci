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
        Schema::create('kantor', function (Blueprint $table) {
            $table->char("kode_kantor", 5)->primary();
            $table->string('nama_unit', 50);
            $table->string('lokasi_unit', 50);
            $table->integer('nomor_ruangan');
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kantor');
    }
};
