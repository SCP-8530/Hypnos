<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @author Philippe Bertrand
     */
    public function up(): void
    {
        Schema::create('cheminements', function (Blueprint $table) {
            $table->id();
            $table->string('nom',50);
            $table->integer('no_session');
            $table->unsignedBigInteger('horaire_id');
            $table->timestamps();

            $table->foreign('horaire_id')->references('id')->on('horaires');
        });

        /**@author Guillaume Paoli
         * relation 1,N accepter par la prof
         */
        Schema::create('cheminement_contrainte', function (Blueprint $table) {
            $table->foreignId('contrainte_id');
            $table->foreignId('cheminement_id');

            $table->primary(['contrainte_id','cheminement_id']);
            $table->foreign('contrainte_id')->references('id')->on('contraintes')->onDelete('cascade');
            $table->foreign('cheminement_id')->references('id')->on('cheminements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheminement_contrainte');
        Schema::dropIfExists('cheminements');
    }
};
