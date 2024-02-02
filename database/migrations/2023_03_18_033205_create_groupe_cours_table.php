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
     * @author Philippe
     */
    public function up(): void
    {
        Schema::create('groupe_cours', function (Blueprint $table) {
            $table->id();
            $table->smallInteger("no_groupe");
            $table->integer("nb_etudiants");
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->unsignedBigInteger('session_id')->nullable();
            $table->foreignId('cours_id')->nullable();/**@author Guillaume Paoli*/
            $table->timestamps();

            $table->foreign('cours_id')->references('id')->on('cours')->nullOnDelete();/**@author Guillaume Paoli*/
            $table->foreign('campus_id')->references('id')->on('campus')->nullOnDelete();
            $table->foreign('session_id')->references('id')->on('sessions')->nullOnDelete();
        });

        /**@author Guillaume Paoli*/
        Schema::table('bloc_cours', function (Blueprint $table) {
            $table->foreign('groupe_cours_id')->references('id')->on('groupe_cours')->nullOnDelete();
        });

        /**
         * @author Guillaume Paoli
         * Table intermedaire entre les enseignant et les groupes cours pour les relations
         */
        Schema::create('enseignant_groupe_cours', function (Blueprint $table) {
            $table->foreignId('groupe_cours_id');
            $table->foreignId('enseignant_id');

            $table->primary(['groupe_cours_id','enseignant_id']);
            $table->foreign('groupe_cours_id')->references('id')->on('groupe_cours')->onDelete('cascade');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloc_cours');
        Schema::dropIfExists('enseignant_groupe_cours');
        Schema::dropIfExists('groupe_cours');
    }
};
