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
        Schema::create('diplomes', function (Blueprint $table) {
            $table->id();
            $table->string('codeEtudiant');
            $table->string('cheminVerfichier');
            $table->unsignedBigInteger('categorie_id');
            $table->date('DateEmission');
            $table->date('DateLivraison')->nullable();
            $table->string('NumeroEnrUniq');
            $table->string('CodeMNFP');
            $table->string('etat',15);
            $table->unsignedBigInteger('codeProgramme');
            $table->string('Receveur');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('codeEtudiant')->references('codeEtudiant')->on('etudiants')->onDelete('cascade');
            $table->foreign('codeProgramme')->references('codeProgramme')->on('Programmes')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void

    {
        Schema::create('diplomes', function (Blueprint $table) {
            $table->dropForeign("codeEtudiant");
            $table->dropForeign("user_id");
            $table->dropForeign("categorie_id");
            $table->dropForeign("codeProgramme");


        });
        Schema::dropIfExists('diplomes');
    }
};
