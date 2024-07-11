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
        Schema::table('proyek', function (Blueprint $table) {
            $table->string('nama_donatur')->nullable();
            $table->string('nama_perantara')->nullable();
            $table->string('akad_donatur')->nullable();
            $table->string('nama_pelaksana')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('luas')->nullable();
            $table->string('cp')->nullable();
            $table->string('koordinat')->nullable();
            $table->integer('tahun')->nullable();
            $table->text('rincian')->nullable();
            $table->text('keterangan')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('bayan')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyek', function (Blueprint $table) {
            $table->dropColumn('nama_donatur');
            $table->dropColumn('nama_perantara');
            $table->dropColumn('akad_donatur');
            $table->dropColumn('nama_pelaksana');
            $table->dropColumn('ukuran');
            $table->dropColumn('luas');
            $table->dropColumn('cp');
            $table->dropColumn('koordinat');
            $table->dropColumn('tahun');
            $table->dropColumn('rincian');
            $table->dropColumn('keterangan');
            $table->dropColumn('tanggal_mulai');
            $table->dropColumn('tanggal_selesai');
            $table->dropColumn('bayan');
            $table->dropColumn('status');
        });
    }
};
