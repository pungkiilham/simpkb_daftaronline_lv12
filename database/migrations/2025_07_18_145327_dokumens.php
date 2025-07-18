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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('id_kendaraan', 36)->nullable();
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
            // $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
