<?php

namespace Database\Factories;

use App\Models\Bloc_cours;
use App\Models\Campus;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupeCours>
 */
class GroupeCoursFactory extends Factory
{
    /**@author Guillaume Paoli
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_groupe'=>fake()->numberBetween(0,30),
            'nb_etudiants'=>fake()->numberBetween(10,30),
            'campus_id'=>fake()->numberBetween(1,3),
            'session_id'=>fake()->numberBetween(1,3),
            'cours_id'=>fake()->numberBetween(1,34)
        ];
    }
}
