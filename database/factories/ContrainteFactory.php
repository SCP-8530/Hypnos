<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrainte>
 */
class ContrainteFactory extends Factory
{
    /** @author Philippe Bertrand
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->randomElement(['Départementale','Conciliation travail-famille', 'TA','SN','TGM','CE']),
            'stricte' => $this->faker->randomElement([true, false]),
        ];
    }
}
