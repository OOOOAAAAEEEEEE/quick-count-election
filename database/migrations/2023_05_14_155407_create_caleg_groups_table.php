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
            $table->foreignId('kelurahan_id');
            $table->foreignId('partai_id');
            $table->string('caleg1');
            $table->string('caleg2');
            $table->string('caleg3');
            $table->string('caleg4');
            $table->string('caleg5');
            $table->string('caleg6');
            $table->string('caleg7');
            $table->string('caleg8');
            $table->string('caleg9');
            $table->string('caleg10');
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
