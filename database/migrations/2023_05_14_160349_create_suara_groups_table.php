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
            $table->string('suara1');
            $table->string('suara2');
            $table->string('suara3');
            $table->string('suara4');
            $table->string('suara5');
            $table->string('suara6');
            $table->string('suara7');
            $table->string('suara8');
            $table->string('suara9');
            $table->string('suara10');
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
