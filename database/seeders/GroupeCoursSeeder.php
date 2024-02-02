<?php

namespace Database\Seeders;

use App\Models\Bloc_cours;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeCoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @author Guillaume Paoli
     */
    public function run(): void
    {
        DB::table('groupe_cours')->insertOrIgnore([
            [
                'no_groupe'=>00001,
                'nb_etudiants'=>20,
                'created_at'=>now()
            ],
            [
                'no_groupe'=>00002,
                'nb_etudiants'=>24,
                'created_at'=>now()
            ],
            [
                'no_groupe'=>00003,
                'nb_etudiants'=>18,
                'created_at'=>now()
            ],
            [
                'no_groupe'=>00004,
                'nb_etudiants'=>22,
                'created_at'=>now()
            ],
            [
                'no_groupe'=>00005,
                'nb_etudiants'=>25,
                'created_at'=>now()
            ]
        ]);
    }
}
