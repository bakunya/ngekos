<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('koss', 'pemilik_id')) {
            Schema::table('koss', function (Blueprint $table) {
                $table->unsignedBigInteger('pemilik_id');
                $table->foreign('pemilik_id')->references('id')->on('pemiliks')->onDelete('restrict')->onUpdate('cascade');
            });
        }

        if (!Schema::hasColumn('kamars', 'kos_id')) {
            Schema::table('kamars', function (Blueprint $table) {
                $table->unsignedBigInteger('kos_id');
                $table->foreign('kos_id')->references('id')->on('koss')->onDelete('restrict')->onUpdate('cascade');
            });
        }

        Schema::table('kontraks', function (Blueprint $table) {
            if (!Schema::hasColumn('kontraks', 'kamar_id')) {
                $table->unsignedBigInteger('kamar_id');
                $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('restrict')->onUpdate('cascade');
            }
            if (!Schema::hasColumn('kontraks', 'penyewa_id')) {
                $table->unsignedBigInteger('penyewa_id');
                $table->foreign('penyewa_id')->references('id')->on('penyewa')->onDelete('restrict')->onUpdate('cascade');
            }
        });
    }


    public function down(): void
    {
        Schema::table('koss', function (Blueprint $table) {
            $table->dropForeign(['pemilik_id']);
            $table->dropColumn('pemilik_id');
        });

        Schema::table('kamars', function (Blueprint $table) {
            $table->dropForeign(['kos_id']);
            $table->dropColumn(['kos_id']);
        });

        Schema::table('kontraks', function (Blueprint $table) {
            $table->dropForeign(['kamar_id']);
            $table->dropForeign(['penyewa_id']);
            $table->dropColumn(['kamar_id', 'penyewa_id']);
        });
    }
};
