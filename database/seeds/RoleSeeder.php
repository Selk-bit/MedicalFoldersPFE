<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([

            [
                'id' => 1,
                'nom' => 'patient',
            ],

            [
                'id' => 2,
                'nom' => 'medcineSpecialise',
            ],
    
            [
                'id' => 3,
                'nom' => 'radioAnalyse.',
            ],
    
            [
                'id' => 4,
                'nom' => 'pharmacie.',
            ],
        
        ]);
    }
}
 