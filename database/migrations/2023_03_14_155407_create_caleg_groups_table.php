<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**j
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('caleg_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('no_tps');
            $table->foreignId('kelurahan_id')->constrained('master_kelurahans');
            $table->foreignId('partai_id')->constrained('master_partais');
            $table->string('caleg1')->nullable();
            $table->string('caleg2')->nullable();
            $table->string('caleg3')->nullable();
            $table->string('caleg4')->nullable();
            $table->string('caleg5')->nullable();
            $table->string('caleg6')->nullable();
            $table->string('caleg7')->nullable();
            $table->string('caleg8')->nullable();
            $table->string('caleg9')->nullable();
            $table->string('caleg10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caleg_groups');
    }
};
