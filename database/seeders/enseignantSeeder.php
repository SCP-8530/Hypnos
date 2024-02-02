<?php

namespace Database\Seeders;

use App\Models\Enseignant;
use App\Models\Horaires;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class enseignantSeeder extends Seeder
{
    /** @author Philippe Bertrand
     * Run the database seeds.
     */
    public function run(): void
    {
      //CENSURED
      DB::table('enseignants')->insert([
          [
              'prenom'=> 'F.......',
              'nom'=> 'P...',
              'bureau'=>'1.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 4
          ],
          [
              'prenom'=> 'M......',
              'nom'=> 'L......',
              'bureau'=>'2.000',
              'poste'=> 1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 5
          ],
          [
              'prenom'=> 'F.....',
              'nom'=> 'P.............',
              'bureau'=>'2.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 6
          ],
          [
              'prenom'=> 'R......',
              'nom'=> 'M................',
              'bureau'=>'1.000',
              'poste'=> 1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 7
          ],
          [
              'prenom'=> 'V......',
              'nom'=> 'L........',
              'bureau'=>'1.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 8
          ],
          [
              'prenom'=> 'D......',
              'nom'=> 'B..........',
              'bureau'=>'1.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 9
          ],
          [
              'prenom'=> 'M.....',
              'nom'=> 'M......',
              'bureau'=>'1.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 10
          ],
          [
              'prenom'=> 'A....',
              'nom'=> 'B.......',
              'bureau'=>'1.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 11
          ],
          [
              'prenom'=> 'F.....',
              'nom'=> 'B.........',
              'bureau'=>'1.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 12
          ],
          [
              'prenom'=> 'H....',
              'nom'=> 'H......',
              'bureau'=>'1.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 13
          ],
          [
              'prenom'=> 'P.....',
              'nom'=> 'G.......',
              'bureau'=>'1.000',
              'poste'=>1234,
              'horaire_id' => Horaires::factory()->createOne()->id,
              'user_id' => 14
          ],
          ]);
    }
}
