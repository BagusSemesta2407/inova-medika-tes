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
        Schema::create('data_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('provinsi_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kota_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kecamatan_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('desa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('nik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('agama', ['Islam', 'Kristen', 'Hindu', 'Buddha', 'Konghucu']);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat')->nullable();
            $table->bigInteger('telepon')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pasiens');
    }
};
