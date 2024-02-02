<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enseignant>
 */
class EnseignantFactory extends Factory
{
    /** @author Philippe Bertrand
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prenom' => fake()->randomElement(['Philippe', 'Guillaume', 'Matthieu', 'Ginette']),
            'nom' => fake()->randomElement(['Bertrand', 'Paoli', 'Trembley', 'Reneau']),
            'poste' => fake()->numberBetween(1,15),
            'bureau' => fake()->numerify('#-###'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
