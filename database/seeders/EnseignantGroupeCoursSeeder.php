<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class EnseignantGroupeCoursSeeder extends Seeder
{
    /** @author Guillaume Paoli
     * Run the database seeds.
     */
    public function run(): void
    {
        $ChiffreUn = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
        $ChiffreDeux= [1,2,3,4,5,6,7,8,9,10,11];
        $liste = array();
        for($x=0;$x<=40;$x++)
        {
            DB::table("enseignant_groupe_cours")->insertOrIgnore([
                "groupe_cours_id" => Arr::random($ChiffreUn),
                "enseignant_id" => Arr::random($ChiffreDeux),
            ]);
        }
    }
}
