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
        Schema::create('item_pengawasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_kategori_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('pengawasan_id');

            $table->unsignedBigInteger('user_id');

            $table->string('ket'); // S , SC , PB
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pengawasan');
    }
};
