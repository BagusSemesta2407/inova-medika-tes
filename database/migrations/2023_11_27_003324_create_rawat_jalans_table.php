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
        Schema::create('rawat_jalans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poli_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('data_pasien_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tindakan_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('no_register')->nullable();
            $table->bigInteger('biaya_pelayanan')->nullable();
            $table->string('image')->nullable()->comment('upload-bukti-pembayaran');
            $table->enum('status', ['Menunggu Antrian', 'Menunggu Pembayaran Pelayanan','Menunggu Konfirmasi Kasir', 'Pemeriksaan', 'Menunggu Pembayaran Resep', 'Menunggu Obat', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawat_jalans');
    }
};
