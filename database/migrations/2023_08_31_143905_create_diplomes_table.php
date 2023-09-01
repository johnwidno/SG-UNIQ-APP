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
            $table->string('categorie');
            $table->date('DateEmission')->nullable();
            $table->string('NumeroEnrUniq');
            $table->string('CodeMNFP');
            $table->tinyInteger('status')->default('0')->comment('1="remis , non-remis');;
            $table->string('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('codeEtudiant')->references('codeEtudiant')->on('etudiants')->onDelete('cascade');
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
            

        });
        Schema::dropIfExists('diplomes');
    }
};
