<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cheminement_ContrainteSeeder extends Seeder
{
    /** @author Philippe Bertrand
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('cheminement_contrainte')->insertOrIgnore([
                'cheminement_id' => random_int(1, 10),
                'contrainte_id' => random_int(1, 5),
            ]);
        }
    }
}
