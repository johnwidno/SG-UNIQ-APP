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
        Schema::create('programmes', function (Blueprint $table) {
            $table->unsignedBigInteger('codeProgramme')->primary()->unique();
             $table->String('nomProgramme');
             $table->String('option');
             $table->String('codeFaculte');
             $table->foreign('codeFaculte')->references('codeFaculte')->on('facultes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drpo('programmes', function (Blueprint $table) {
            $table->id();
        $table->dropForeign('codeFaculte');
             });
        Schema::dropIfExists('programmes');
    }
};
