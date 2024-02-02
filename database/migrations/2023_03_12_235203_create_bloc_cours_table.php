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
        Schema::create('bloc_cours', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('jour');
            $table->string('heures',50);
            $table->timestamps();
            $table->foreignId('local_id')->nullable();/**@author Guillaume Paoli*/
            $table->foreignId('groupe_cours_id')->nullable();/**@author Guillaume Paoli*/



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloc_cours');
    }
};
