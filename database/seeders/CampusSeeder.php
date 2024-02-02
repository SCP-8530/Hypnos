<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @author Guillaume Paoli
     */
    public function run(): void
    {
        // Pour insérer plusieurs enregistrements, s'il n'existent pas déjà
        DB::table('campus')->insertOrIgnore([
            ['nom'=>'Campus Gabrielle-Roy'],
            ['nom'=>'Campus Felix-Leclerc'],
            ['nom'=>'Campus Louis-Reboul'],
            ['nom'=>'Poudlard'],
          //  ['nom'=>'Campus Nicolas-Gatineau']
        ]);
    }
}
