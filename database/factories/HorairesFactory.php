<?php

namespace Database\Factories;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horaires>
 */
class HorairesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @author Guillaume Paoli
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lundi'    => '00000000000000000000',
            'mardi'    => '00000000000000000000',
            'mercredi' => '00000011111100000000',
            'jeudi'    => '00000000000000000000',
            'vendredi' => '00000000000000000000',
        ];
    }
    function generateRandomSchedule() {
        $schedule = "";
        for ($i = 0; $i < 20; $i++) {
            $schedule .= rand(0,1);
        }
        return $schedule;
    }
}
