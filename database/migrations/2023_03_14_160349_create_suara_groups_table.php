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
        Schema::create('suara_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('no_tps');
            $table->foreignId('kelurahan_id')->constrained('master_kelurahans');
            $table->foreignId('partai_id')->constrained('master_partais');
            $table->integer('suara1')->nullable();
            $table->integer('suara2')->nullable();
            $table->integer('suara3')->nullable();
            $table->integer('suara4')->nullable();
            $table->integer('suara5')->nullable();
            $table->integer('suara6')->nullable();
            $table->integer('suara7')->nullable();
            $table->integer('suara8')->nullable();
            $table->integer('suara9')->nullable();
            $table->integer('suara10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suara_groups');
    }
};
