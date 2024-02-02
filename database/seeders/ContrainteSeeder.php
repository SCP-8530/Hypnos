<?php

namespace Database\Seeders;

use App\Models\Contrainte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContrainteSeeder extends Seeder
{
    /** @author Philippe Bertrand et Guillaume Paoli
     * Run the database seeds.
     */
    public function run(): void
    {
        $noms = ['Départementale', 'Conciliation travail-famille', 'TA', 'SN', 'TGM', 'CE'];

        foreach ($noms as $nom) {
            Contrainte::create([
                'nom' => $nom,
                'stricte' => random_int(0, 1) == 1,
                'enseignant_id' => random_int(1,12)
            ]);
        }
    }
}
