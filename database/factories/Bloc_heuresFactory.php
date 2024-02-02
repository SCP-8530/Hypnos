<?php

namespace Database\Factories;

use App\Models\Contrainte;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bloc_heures>
 */
class Bloc_heuresFactory extends Factory
{
    /** @author Philippe Bertrand et Guillaume Paoli
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jour' => fake()->numberBetween(1,5),
            'heures' =>fake()->randomElement(['00000000000000001111', '11110000111100000000','11110000000000001111','00000000000011111111']),
            'contrainte_id' => Contrainte::inRandomOrder()->first()->id
        ];
    }
}
