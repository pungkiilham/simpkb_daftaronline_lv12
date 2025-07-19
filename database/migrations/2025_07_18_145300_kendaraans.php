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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('nopol')->nullable();
            $table->string('nouji')->nullable();
            $table->string('nama')->nullable();
            $table->string('ktp')->nullable();
            $table->date('tanggal_layanan')->nullable();
            $table->tinyInteger('status_pendaftaran')->nullable();
            $table->string('keterangan_ditolak', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
