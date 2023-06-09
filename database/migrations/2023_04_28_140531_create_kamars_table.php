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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nama');
            $table->text('fasilitas');
            $table->string('harga');
            $table->string('status');
            $table->unsignedBigInteger('kos_id');
            $table->foreign('kos_id')->references('id')->on('koss')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kamars', function (Blueprint $table) {
            $table->dropForeign(['kos_id']);
            $table->dropColumn(['kos_id']);
        });
    }
};
