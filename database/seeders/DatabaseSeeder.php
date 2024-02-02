<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bloc_cours;
use App\Models\Bloc_heures;
use App\Models\Cheminements;
use App\Models\Contrainte;
use App\Models\Contraintes;
use App\Models\Enseignant;
use App\Models\GroupeCours;
use App\Models\Horaires;
use App\Models\Local;
use Database\Factories\EnseignantGroupeCoursFactory;
use Database\Factories\HorairesFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /** @author Philippe Bertrand et Guillaume Paoli
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
        //Enseignant::factory(5)->create();
        //Horaires::factory(5)->create();
        //Local::factory(5)->create();
        $this->call([
            UserSeeder::class,
            CampusSeeder::class,
            CoursSeeder::class,
            SessionSeeder::class,
            CheminementSeeder::class,
            enseignantSeeder::class,
            //GroupeCoursSeeder::class,
            LocalSeeder::class,
            Cheminement_CoursSeeder::class,
            ContrainteSeeder::class,
        ]);
        GroupeCours::factory(20)->create();
        $this->call(EnseignantGroupeCoursSeeder::class);
        Bloc_heures::factory(5)->create();
        $this->call(Cheminement_ContrainteSeeder::class);
        Bloc_cours::factory(5)->create();

    }
}
