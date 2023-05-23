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
        Schema::table('image_urls', function (Blueprint $table)
        {
            $table->foreignId('id_post')->constrained('post')->onDelete('cascade')->onUpdate('restrict');
        });

        Schema::table('pemilik', function (Blueprint $table)
        {
            $table->foreignId('id_user')->unique()->constrained('users')->onDelete('cascade')->onUpdate('restrict');
        });
        
        Schema::table('penyewa', function (Blueprint $table)
        {
            $table->foreignId('id_user')->unique()->constrained('users')->onDelete('cascade')->onUpdate('restrict');
        });

        Schema::table('kontrak_sewa', function (Blueprint $table)
        {
            $table->foreignId('id_kos')->constrained('kos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('id_kamar')->constrained('kamar')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('id_penyewa')->constrained('penyewa')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('id_metode_bayar')->constrained('metode_bayar')->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('post', function (Blueprint $table)
        {
            $table->foreignId('id_child_post')->nullable()->default(null)->constrained('post')->onDelete('cascade')->onUpdate('restrict');
        });

        Schema::table('kamar', function (Blueprint $table)
        {
            $table->foreignId('id_post')->unique()->constrained('post')->onDelete('cascade')->onUpdate('restrict');
        });
        
        Schema::table('kos', function (Blueprint $table)
        {
            $table->foreignId('id_post')->unique()->constrained('post')->onDelete('cascade')->onUpdate('restrict');
        });
        
        Schema::table('rating', function (Blueprint $table)
        {
            $table->foreignId('id_post')->unique()->constrained('post')->onDelete('cascade')->onUpdate('restrict');
        });

        Schema::table('sent_mails', function (Blueprint $table)
        {
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
