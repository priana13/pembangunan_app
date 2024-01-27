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
        Schema::create('pengawasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyek_id');
            $table->unsignedBigInteger('kategori_id');
            $table->date('tanggal');
            $table->unsignedBigInteger('user_id');
            $table->string('pelaksana')->nullable();
            $table->text('catatan')->nullable();
            $table->string('status', 50)->default('Aktif'); // Dijadwalkan , Aktif, Selesai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengawasan');
    }
};
