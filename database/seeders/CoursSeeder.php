<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @author Guillaume Paoli
     */
    public function run(): void
    {
        DB::table('cours')->insertOrIgnore([
            [
                'code' => '420-1G1-HU',
                'nom' => 'ORDINATEURS ET RÉSEAUX DE PME',
                'ponderation' => '2-4-4',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-1G2-HU',
                'nom' => 'LOGIQUE DE PROGRAMMATION',
                'ponderation' => '2-4-4',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-2G1-HU',
                'nom' => 'INFRASTRUCTURE ET SERVICES RÉSEAUX',
                'ponderation' => '3-4-6',
                'bloc' => '3-2-2'
            ],
            [
                'code' => '420-2G4-HU',
                'nom' => 'PROGRAMMATION ORIENTÉ OBJET',
                'ponderation' => '3-4-4',
                'bloc' => '2-3-2'
            ],
            [
                'code' => '420-3G7-HU',
                'nom' => 'SÉCURITÉ ET CHOIX DES TECHNOLOGIES',
                'ponderation' => '2-1-3',
                'bloc' => '3'
            ],
            [
                'code' => '420-3P1-HU',
                'nom' => 'DÉVELOPPEMENT D\'APPLICATIONS WINDOWS',
                'ponderation' => '2-2-1',
                'bloc' => '2-2'
            ],
            [
                'code' => '420-3P4-HU',
                'nom' => 'PROGRAMMATION D\'INTERFACE WEB',
                'ponderation' => '2-3-1',
                'bloc' => '3-2'
            ],
            [
                'code' => '420-2G0-HU',
                'nom' => 'OUTILS ET CARRIÈRE',
                'ponderation' => '2-2-3',
                'bloc' => '2-2'
            ],
            [
                'code' => '420-4P2-HU',
                'nom' => 'DÉVELOPPEMENT WEB EN PHP',
                'ponderation' => '2-2-1',
                'bloc' => '2-2'
            ],
            [
                'code' => '420-4G3-HU',
                'nom' => 'SOUTIEN INFORMATIQUE',
                'ponderation' => '1-2-3',
                'bloc' => '3'
            ],
            [
                'code' => '420-4G7-HU',
                'nom' => 'VEILLE TECHNOLOGIQUE',
                'ponderation' => '1-2-3',
                'bloc' => '3'
            ],
            [
                'code' => '420-3G2-HU',
                'nom' => 'EXPLOITATION DE BASE DE DONNÉES',
                'ponderation' => '2-2-2',
                'bloc' => '2-2'
            ],
            [
                'code' => '420-4P5-HU',
                'nom' => 'DÉVELOPPEMENT D\'APPLICATIONS MOBILES',
                'ponderation' => '2-2-2',
                'bloc' => '4'
            ],
            [
                'code' => '420-1G1-HU',
                'nom' => 'DÉVELOPPEMENT D\'APPLICATIONS CLIENTS/SERVEUR',
                'ponderation' => '2-3-1',
                'bloc' => '3-2'
            ],
            [
                'code' => '420-5A4-HU',
                'nom' => 'CONCEPTION DE LOGICIELS',
                'ponderation' => '3-3-2',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-5A3-HU',
                'nom' => 'PROJET SYNTHÈSE',
                'ponderation' => '3-5-2',
                'bloc' => '3-3-2'
            ],
            [
                'code' => '420-5P0-HU',
                'nom' => 'INTÉGRATION D\'OBJETS CONNECTÉS',
                'ponderation' => '2-4-2',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-5T1-HU',
                'nom' => 'SÉCURITÉ DES APPLICATIONS CLIENT/SERVEUR',
                'ponderation' => '2-4-2',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-5T2-HU',
                'nom' => 'SÉCURITÉ D\'APPLICATIONS WEB EN JSP',
                'ponderation' => '2-4-2',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-6P0-HU',
                'nom' => 'STAGE EN PROGRAMMATION ET SÉCURITÉ',
                'ponderation' => '0-22-2',
                'bloc' => '4-4-4-5-5'
            ],
            [
                'code' => '420-3N1-HU',
                'nom' => 'RÉSEAUX LOCAUX',
                'ponderation' => '2-3-1',
                'bloc' => '2-3'
            ],
            [
                'code' => '420-3S1-HU',
                'nom' => 'SERVEURS WINDOWS INTRANET',
                'ponderation' => '2-3-1',
                'bloc' => '3-2'
            ],
            [
                'code' => '420-4N1-HU',
                'nom' => 'ROUTAGE ET COMMUTATION',
                'ponderation' => '2-4-1',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-4S1-HU',
                'nom' => 'SERVEUR LINUX INTRANET',
                'ponderation' => '2-4-1',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-4S2-HU',
                'nom' => 'SERVEUR WINDOWS INTRANET',
                'ponderation' => '2-4-1',
                'bloc' => '3-3'
            ],
            [
                'code' => '420-5N2-HU',
                'nom' => 'IMPLÉMANTATION DE L\'INFRASTRUCTURE ET DES SERVICES',
                'ponderation' => '2-3-2',
                'bloc' => '2-3'
            ],
            [
                'code' => '420-5P1-HU',
                'nom' => 'AUTOMATISATION ET SCRIPTS',
                'ponderation' => '2-2-2',
                'bloc' => '2-2'
            ],
            [
                'code' => '420-5P3-HU',
                'nom' => 'AUTOMATISATION ET CONTENEURS',
                'ponderation' => '2-2-2',
                'bloc' => '2-2'
            ],
            [
                'code' => '420-5N3-HU',
                'nom' => 'RÉSEAUX D\'ENTREPRISE',
                'ponderation' => '2-2-2',
                'bloc' => '2-2'
            ],
            [
                'code' => '420-5S2-HU',
                'nom' => 'SERVEURS LINUX INTERNET',
                'ponderation' => '2-3-3',
                'bloc' => '3-2'
            ],
            [
                'code' => '420-5T3-HU',
                'nom' => 'Cybersécurité offensive',
                'ponderation' => '2-2-2',
                'bloc' => '2-2'
            ],
            [
                'code' => '420-5T4-HU',
                'nom' => 'Cybersécurité défensive',
                'ponderation' => '2-3-2',
                'bloc' => '2-3'
            ],
            [
                'code' => '420-6S0-HU',
                'nom' => 'STAGE EN RÉSEAUX ET CYBERSÉCURITÉ',
                'ponderation' => '0-22-2',
                'bloc' => '4-4-4-5-5'
            ],
            [
                'code' => '420-4P3-HU',
                'nom' => 'DÉVELOPPEMENT WEB EN ASP.NET',
                'ponderation' => '3-2-2',
                'bloc' => '3-2'
            ]
        ]);
    }
}
