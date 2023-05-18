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
            $table->foreignId('kelurahan_id');
            $table->foreignId('partai_id');
            $table->string('suara1')->nullable();
            $table->string('suara2')->nullable();
            $table->string('suara3')->nullable();
            $table->string('suara4')->nullable();
            $table->string('suara5')->nullable();
            $table->string('suara6')->nullable();
            $table->string('suara7')->nullable();
            $table->string('suara8')->nullable();
            $table->string('suara9')->nullable();
            $table->string('suara10')->nullable();
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
