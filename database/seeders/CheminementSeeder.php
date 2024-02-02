<?php

namespace Database\Seeders;

use App\Models\Horaires;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheminementSeeder extends Seeder
{
    /** @author Philippe Bertrand
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            DB::table('cheminements')->insert([
                'no_session' => $i,
                'nom' => 'Informatique',
                'horaire_id' => Horaires::factory()->createOne()->id

            ]);
        }
        for ($i = 3; $i <= 6; $i++) {
            DB::table('cheminements')->insert([
                'no_session' => $i,
                'nom' => 'Programmation',
                'horaire_id' => Horaires::factory()->createOne()->id
            ]);
        }
        for ($i = 3; $i <= 6; $i++) {
            DB::table('cheminements')->insert([
                'no_session' => $i,
                'nom' => 'Réseaux',
                'horaire_id' => Horaires::factory()->createOne()->id
            ]);
        }
    }
}
