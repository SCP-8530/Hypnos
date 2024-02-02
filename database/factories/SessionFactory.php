<?php

namespace Database\Factories;

use App\Models\GroupeCours;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /** @author Philippe Bertrand
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'annee' => fake()->numberBetween(2022,2024),
            'session' => fake()->randomElement(['Été', 'Automne','Hiver']),
            //'groupe_cours_id' => GroupeCours::factory()->createOne()->id
        ];
    }
}
