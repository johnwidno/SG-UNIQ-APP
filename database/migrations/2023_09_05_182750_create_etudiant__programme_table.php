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
        Schema::create('etudiant__programme', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codeProgramme');
            $table-> String('codeEtudiant');
            $table-> String('regime')->default('none');
            $table->foreign('codeEtudiant')->references('codeEtudiant')->on('etudiants')->onDelete('cascade');
            $table->foreign('codeProgramme')->references('codeProgramme')->on('programmes')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::drpo('etudiant__programme', function (Blueprint $table) {
            $table->id();
            $table->dropForeign('codeEtudiant');
            $table->dropForeign('codeProgramme');

             });
        Schema::dropIfExists('etudiant__programme');
    }
};
