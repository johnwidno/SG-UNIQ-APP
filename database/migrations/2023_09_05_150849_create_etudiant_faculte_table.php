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
        Schema::create('etudiant_faculte', function (Blueprint $table) {
            $table->id();
            $table->string('codeEtudiant');
            $table->string('CodeFaculte');
            $table->foreign('codeEtudiant')->references('codeEtudiant')->on('etudiants')->onDelete('cascade');
            $table->foreign('CodeFaculte')->references('CodeFaculte')->on('facultes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drpo('etudiant_faculte', function (Blueprint $table) {
            $table->id();
            $table->dropForeign('codeEtudiant');
            $table->dropForeign('CodeFaculte');
             });
        Schema::dropIfExists('etudiant_faculte');
    }
};
