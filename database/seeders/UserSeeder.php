<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /** @author Guillaume Paoli
     * Run the database seeds.
     */
    public function run(): void
    {
        // insert des comptes de test
        DB::table('users')->insertOrIgnore([
            [
                'name'=>'admin',
                'email'=>'0admin@cegepoutaouais.qc.ca',
                'email_verified_at'=>now(),
                'password'=>bcrypt('H23info!'),
                'remember_token' => Str::random(10),
                'admin' => true,
                'prof' => false,
                'gestionnaire' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=>'Gestionnaire',
                'email'=>'0geste@cegepoutaouais.qc.ca',
                'email_verified_at'=>now(),
                'password'=>bcrypt('H23info!'),
                'remember_token' => Str::random(10),
                'admin' => false,
                'prof' => false,
                'gestionnaire' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=>'Prof',
                'email'=>'0prof@cegepoutaouais.qc.ca',
                'email_verified_at'=>now(),
                'password'=>bcrypt('H23info!'),
                'remember_token' => Str::random(10),
                'admin' => false,
                'prof' => true,
                'gestionnaire' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        //insert des profs (email fictif)
        //CENSURED
        DB::table('users')->insertOrIgnore([
            ['name'=>'FP','email'=>'012345@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt('H23info!'),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'ML','email'=>'678901@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'FP','email'=>'234567@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'RM','email'=>'890123@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'VL','email'=>'456789@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'DB','email'=>'012346@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'MM','email'=>'789012@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'AB','email'=>'345678@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'FB','email'=>'901234@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'HH','email'=>'567890@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'PG','email'=>'123456@cegepoutaouais.qc.ca','email_verified_at'=>now(),'password'=>bcrypt(Str::random(16)),'remember_token'=>Str::random(10),'admin'=>false,'prof'=>true,'gestionnaire'=>false,'created_at'=>now(),'updated_at'=>now()]
        ]);
    }
}
