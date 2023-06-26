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
        Schema::create('kontraks', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 25)->unique()->nullable();
            $table->timestamps();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->date('tgl_bayar')->nullable();
            $table->string('status', 25)->nullable();
            $table->string('metode', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraks');
    }
};
