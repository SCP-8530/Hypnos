<?php

namespace Database\Factories;

use App\Models\Bloc_cours;
use App\Models\Horaires;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalFactory extends Factory
{

    /**
     * @author Philippe Bertrand
     * @inheritDoc
     */
    public function definition()
    {
        return [
            'no_local' => fake()->randomElement(['1.105A', '1.063', '1.085', '2.431', '2.708']),
            'capacite' => fake()->numberBetween(10,35),
            'horaire_id' => Horaires::factory()->createOne()->id
        ];
    }
}
