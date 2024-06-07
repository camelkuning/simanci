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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->char('id_karyawan',5);
            $table->primary('id_karyawan');
            $table->string('nama_karyawan', 50);

            $table->char('kode_jabatan', 5);
            $table->foreign('kode_jabatan')->references('kode_jabatan')->on('jabatan');

            $table->string('no_tlp_karyawan', 15);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
