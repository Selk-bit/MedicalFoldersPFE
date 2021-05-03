<?php

use Illuminate\Database\Seeder;

class MutuelleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mutuelles')->insert([
            [
                'id' => 1,
                'nom' => 'Sans',
            ],

            [    
                'id' => 2,
                'nom' => 'CNOPS',
            ],
    
            [
                'id' => 3,
                'nom' => 'CNSS',
            ],
    
            [
                'id' => 4,
                'nom' => 'Ramed',
            ]
        ]);
    }
}
