<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /** 
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kunci', function (Blueprint $table) {
            $table->char('id_kunci', 5);
            $table->primary('id_kunci');
            $table->string('nama_kunci', 50)->nullable();
    
            $table->char('kode_kantor', 5);
            $table->foreign('kode_kantor')->references('kode_kantor')->on('kantor');
            $table->string('status', 20)->nullable();
            $table->timestamps();
        });
    }
    
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunci');
    }
};
