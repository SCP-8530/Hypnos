<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /** @author Philippe Bertrand
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Faire en sorte que si un utilisateur est Prof, il ne peut pas être administrateur simultanément

        $isProfesseur = fake()->boolean(70); // Choisir aléatoirement si l'utilisateur est un professeur
        $isAdmin = !$isProfesseur && fake()->boolean(20);
        $isGestionnaire = !$isAdmin && !$isProfesseur && fake()->boolean(100);
        $name = $isProfesseur ? 'Prof. ' . fake()->firstName : fake()->name();

        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('mdp1234!'), // password
            'remember_token' => Str::random(10),
            'admin' => $isAdmin,
            'prof' => $isProfesseur,
            'gestionnaire' => $isGestionnaire,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
