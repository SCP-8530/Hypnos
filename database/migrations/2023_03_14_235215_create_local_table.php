<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('no_local',50);
            $table->smallInteger('capacite');
            $table->foreignId('horaire_id')->nullable();
            $table->timestamps();

            $table->foreign('horaire_id')->references('id')->on('horaires')->onDelete('cascade');
        });

        /**@author Guillaume Paoli*/
        Schema::table('bloc_cours', function (Blueprint $table) {
            $table->foreign('local_id')->references('id')->on('locals')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
