<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rotasikunci', function (Blueprint $table) {
            $table->bigIncrements('no_rotasi');

            // $table->unsignedInteger('id_satpam');
            // $table->foreign('id_satpam')->references('id')->on('users')->onDelete('cascade');
            
            $table->char('id_kunci',5);
            $table->foreign('id_kunci')->references('id_kunci')->on('kunci');

            $table->char('id_karyawan',5)->nullable();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');

            $table->char('id_karyawan_pengembali', 5)->nullable();
            $table->foreign('id_karyawan_pengembali')->references('id_karyawan')->on('karyawan');

            $table->dateTime('waktu_peminjaman');
            $table->dateTime('waktu_pengembalian')->nullable();

            $table->string('status_kunci', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotasikunci');
    }
};
