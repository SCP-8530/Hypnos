<?php

namespace Database\Seeders;

use App\Models\Horaires;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalSeeder extends Seeder
{
    /** @author Philippe Bertrand
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locals')->insert([
            [
                'no_local'=> "1.063",
                'capacite'=> "20",
                'horaire_id' => Horaires::factory()->createOne()->id
            ],
            [
                'no_local'=> "1.105A",
                'capacite'=> "18",
                'horaire_id' => Horaires::factory()->createOne()->id
            ],
            [
                'no_local'=> "1.073",
                'capacite'=> "30",
                'horaire_id' => Horaires::factory()->createOne()->id
            ],
            [
                'no_local'=> "1.085",
                'capacite'=> "28",
                'horaire_id' => Horaires::factory()->createOne()->id
            ],
            [
                'no_local'=> "2.708",
                'capacite'=> "25",
                'horaire_id' => Horaires::factory()->createOne()->id
            ]
        ]);
    }
}
