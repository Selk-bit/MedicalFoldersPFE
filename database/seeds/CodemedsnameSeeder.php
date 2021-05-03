<?php

use Illuminate\Database\Seeder;

class CodemedsnameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codemedsnames')->insert([
            [
                'id' => 1,
                'code' => '6118001101269',
                'Nom' => 'NazAir 50ug',
            ],

            [    
                'id' => 2,
                'code' => '6118000011330',
                'Nom' => 'Primalan 5mg',
            ],
    
        ]);
    }
}
