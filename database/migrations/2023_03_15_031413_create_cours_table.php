<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @author Guillaume Paoli
     */
    public function up(): void
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string("code",20);
            $table->string("nom",100);
            $table->string("ponderation",10);
            $table->string("bloc",10);
            $table->timestamps();
        });

        /**
         * @author Guillaume Paoli
         * Table intermedaire entre les cours et les cheminements pour les relations
         */
        Schema::create('cheminement_cours', function (Blueprint $table) {
            $table->foreignId('cours_id');
            $table->foreignId('cheminement_id');

            $table->primary(['cours_id','cheminement_id']);
            $table->foreign('cours_id')->references('id')->on('cours')->cascadeOnDelete();
            $table->foreign('cheminement_id')->references('id')->on('cheminements')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheminement_cours');
        Schema::dropIfExists('cours');
    }
};
