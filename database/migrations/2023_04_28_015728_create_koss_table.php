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
        Schema::create('koss', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telp');
            $table->unsignedBigInteger('pemilik_id');
            $table->foreign('pemilik_id')->references('id')->on('pemiliks')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('koss', function (Blueprint $table) {
            $table->dropForeign('pemilik_id');
            $table->dropColumn('pemilik_id');
        });
    }
};
