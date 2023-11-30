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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('kecamatan_id')->constrained('master_kecamatans');
            $table->foreignId('kelurahan_id')->constrained('master_kelurahans');
            $table->foreignId('caleg_group_id')->constrained('caleg_groups');
            $table->foreignId('suara_group_id')->constrained('suara_groups');
            $table->foreignId('partai_id')->constrained('master_partais');
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
