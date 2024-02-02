<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**@author Guillaume Paoli*/
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horaires', function (Blueprint $table) {
            $table->id();
            $table->string("lundi",20);
            $table->string("mardi",20);
            $table->string("mercredi",20);
            $table->string("jeudi",20);
            $table->string("vendredi",20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
        Schema::dropIfExists('cheminements');
        Schema::dropIfExists('horaires');
    }
};
