<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @author Guillaume Paoli
     */
    public function run(): void
    {
        DB::table('horaires')->insertOrIgnore([
            [
                'lundi'=>00000000000000000000,
                'mardi'=>00000000000000000000,
                'mercredi'=>00000000000000000000,
                'jeudi'=>00000000000000000000,
                'vendredi'=>00000000000000000000
            ],
            [
                'lundi'=>00000000000000000000,
                'mardi'=>00000000000000000000,
                'mercredi'=>00000000000000000000,
                'jeudi'=>00000000000000000000,
                'vendredi'=>00000000000000000000
            ],
            [
                'lundi'=>00000000000000000000,
                'mardi'=>00000000000000000000,
                'mercredi'=>00000000000000000000,
                'jeudi'=>00000000000000000000,
                'vendredi'=>00000000000000000000
            ],
            [
                'lundi'=>00000000000000000000,
                'mardi'=>00000000000000000000,
                'mercredi'=>00000000000000000000,
                'jeudi'=>00000000000000000000,
                'vendredi'=>00000000000000000000
            ],
            [
                'lundi'=>00000000000000000000,
                'mardi'=>00000000000000000000,
                'mercredi'=>00000000000000000000,
                'jeudi'=>00000000000000000000,
                'vendredi'=>00000000000000000000
            ]
        ]);
    }
}
