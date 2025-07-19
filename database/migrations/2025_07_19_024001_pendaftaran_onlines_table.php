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
        Schema::create('pendaftaran_onlines', function (Blueprint $table) {
            $table->string('id', 36)->primary();

            $table->string('jenis_layanan')->nullable();
            $table->string('nopol')->nullable();
            $table->string('nouji')->nullable();
            $table->string('nama')->nullable();
            $table->string('ktp')->nullable();
            $table->date('tanggal_layanan')->nullable();
            $table->tinyInteger('status_pendaftaran')->nullable();
            $table->string('keterangan_ditolak', 500)->nullable();

            $table->string('surat_kuasa')->nullable();
            $table->string('stnk')->nullable();
            $table->string('srut')->nullable();
            $table->string('fiskal')->nullable();
            $table->string('kartu_uji')->nullable();
            $table->string('surat_rekom_asal')->nullable();
            $table->string('surat_permohonan')->nullable();
            $table->string('surat_keterangan')->nullable();
            $table->string('izin_trayek')->nullable();
            $table->string('tera')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_onlines');

    }
};
