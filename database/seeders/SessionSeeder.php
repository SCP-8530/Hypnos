<?php

namespace Database\Seeders;

use App\Models\GroupeCours;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /** @author Philippe Bertrand
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sessions')->insert([
            [
                'annee' => 2022,
                'session' => 'Été'
            ],
            [
                'annee' => 2022,
                'session' => 'Automne'
            ],
            [
                'annee' => 2023,
                'session' => 'Hiver'
            ],
            [
                'annee' => 2023,
                'session' => 'Été'
            ]
        ]);
    }
}
