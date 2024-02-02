<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cheminement_CoursSeeder extends Seeder
{
    /** @author Philippe Bertrand
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cheminement_cours')->insertOrIgnore([

            // Informatique ****************************************************
            [ // Ordi et Réseaux PME
                'cours_id' => 1,
                'cheminement_id' => 1,
            ],
            [ // Logique prog
                'cours_id' => 2,
                'cheminement_id' => 1,
            ],
            [ // Infrastructure service réseaux
                'cours_id' => 3,
                'cheminement_id' => 2,
            ],
            [ // Prog orienté objet
                'cours_id' => 4,
                'cheminement_id' => 2,
            ],
            [ // Outils et carrière
                'cours_id' => 8,
                'cheminement_id' => 2,
            ],
            // Programmation ********************************************************
            [ // Sécurité/ choix technologiques
                'cours_id' => 5,
                'cheminement_id' => 3,
            ],
            [ // Applications WINDOWS
                'cours_id' => 6,
                'cheminement_id' => 3,
            ],
            [ // Interface WEB
                'cours_id' => 7,
                'cheminement_id' => 3,
            ],
            [ // Exploitation BD
                'cours_id' => 12,
                'cheminement_id' => 3,
            ],
            [ // Soutien informatique
                'cours_id' => 10,
                'cheminement_id' => 4,
            ],
            [ // Veille technologique
                'cours_id' => 11,
                'cheminement_id' => 4,
            ],
            [ // Développement mobiles
                'cours_id' => 13,
                'cheminement_id' => 4,
            ],
            [ // Développement PHP
                'cours_id' => 9,
                'cheminement_id' => 4,
            ],
            [ // Développement ASP
                'cours_id' => 34,
                'cheminement_id' => 4,
            ],
            [ // Développement Client/Serveur
                'cours_id' => 14,
                'cheminement_id' => 4,
            ],
            [ // Projet Synthèse
                'cours_id' => 16,
                'cheminement_id' => 5,
            ],
            [ // Conception logiciel
                'cours_id' => 15,
                'cheminement_id' => 5,
            ],
            [ // Objects connectés
                'cours_id' => 17,
                'cheminement_id' => 5,
            ],
            [ // Sécurité en client/serveur
                'cours_id' => 18,
                'cheminement_id' => 5,
            ],
            [ // Sécurité Web en JSP
                'cours_id' => 19,
                'cheminement_id' => 5,
            ],
            [ // Stage en prog
                'cours_id' => 20,
                'cheminement_id' => 6,
            ],
            // Réseaux ************************************************************
            [ // Exploitation BD
                'cours_id' => 12,
                'cheminement_id' => 7,
            ],
            [ // Sécurité et choix technologiques
                'cours_id' => 5,
                'cheminement_id' => 7,
            ],
            [ // Serveur Windows Intranet
                'cours_id' => 22,
                'cheminement_id' => 7,
            ],
            [ // Réseaux locaux
                'cours_id' => 21,
                'cheminement_id' => 7,
            ],
            [ // Soutien informatique
                'cours_id' => 10,
                'cheminement_id' => 8,
            ],
            [ // Veille technologique
                'cours_id' => 11,
                'cheminement_id' => 8,
            ],
            [ // Routage et commutation
                'cours_id' => 23,
                'cheminement_id' => 8,
            ],
            [ // Serveurs Linux Intranet
                'cours_id' => 24,
                'cheminement_id' => 8,
            ],
            [ // Serveurs Windows Internet
                'cours_id' => 25,
                'cheminement_id' => 8,
            ],
            [ // IMPLÉMANTATION DE L'INFRASTRUCTURE ET DES SERVICES
                'cours_id' => 26,
                'cheminement_id' => 9,
            ],
            [ // RÉSEAUX D'ENTREPRISE
                'cours_id' => 29,
                'cheminement_id' => 9,
            ],
            [ // AUTOMATISATION ET SCRIPTS
                'cours_id' => 27,
                'cheminement_id' => 9,
            ],
            [ // AUTOMATISATION ET CONTENEURS
                'cours_id' => 28,
                'cheminement_id' => 9,
            ],
            [ // SERVEURS LINUX INTERNET
                'cours_id' => 30,
                'cheminement_id' => 9,
            ],
            [ // Cybersécurité offensive
                'cours_id' => 31,
                'cheminement_id' => 9,
            ],
            [ // Cybersécurité défensive
                'cours_id' => 32,
                'cheminement_id' => 9,
            ],
            [ // Stage réseaux
                'cours_id' => 33,
                'cheminement_id' => 10,
            ],
        ]);
    }
}
