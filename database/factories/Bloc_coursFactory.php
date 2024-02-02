<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bloc_cours>
 */
class Bloc_coursFactory extends Factory
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
            'heures' =>fake()->randomElement(['11110000000000001111', '11110000111100001111','11111111000000001111','00000000000000001111']),
        ];
    }
}
