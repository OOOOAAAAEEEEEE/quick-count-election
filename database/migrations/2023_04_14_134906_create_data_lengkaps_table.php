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
        Schema::create('data_lengkaps', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id');
            $table->foreignId('kecamatan_id');
            $table->foreignId('kelurahan_id');
            $table->foreignId('caleg_group_id');
            $table->foreignId('suara_group_id');
            $table->foreignId('partai_id');
            $table->string('rt');
            $table->string('rw');
            $table->integer('no_tps');
            $table->string('total_dpt');
            $table->string('total_sss');
            $table->string('total_ssts');
            $table->string('total_ssr');
            $table->string('pemilih_hadir');
            $table->string('pemilih_tidak_hadir');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_lengkaps');
    }
};
