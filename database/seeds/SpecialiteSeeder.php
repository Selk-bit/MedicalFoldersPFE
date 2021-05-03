<?php

use Illuminate\Database\Seeder;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialites')->insert([

            [
                'id' => 1,
                'nom' => 'Radiologie',
            ],

            [
                'id' => 2,
                'nom' => 'Laboratoir d\'Analyse',
            ],
    
            [
                'id' => 3,
                'nom' => 'L’anesthésiologie.',
            ],
    
            [
                'id' => 4,
                'nom' => 'L’andrologie',
            ],
    
            [
                'id' => 5,
                'nom' => 'Cardiologie',
            ],

            [
                'id' => 6,
                'nom' => 'Chirurgie cardiaque',
            ],

            [
                'id' => 7,
                'nom' => 'chirurgie esthétique, plastique et reconstructive',
            ],

            [
                'id' => 8,
                'nom' => 'Chirurgie générale',
            ],

            [
                'id' => 9,
                'nom' => 'Chirurgie maxillo-faciale',
            ],

            [
                'id' => 10,
                'nom' => 'Chirurgie pédiatrique',
            ],

            [
                'id' => 11,
                'nom' => 'Chirurgie thoracique',
            ],

            [
                'id' => 12,
                'nom' => 'Chirurgie vasculaire',
            ],

            [
                'id' => 13,
                'nom' => 'Neurochirurgie',
            ],

            [
                'id' => 14,
                'nom' => 'Dermatologie',
            ],

            [
                'id' => 15,
                'nom' => 'L’endocrinologie',
            ],

            [
                'id' => 16,
                'nom' => 'Gastro-entérologie',
            ],

            [
                'id' => 17,
                'nom' => 'Gériatrie',
            ],

            [
                'id' => 18,
                'nom' => 'Gynécologie',
            ],

            [
                'id' => 19,
                'nom' => 'L’hématologie',
            ],

            [
                'id' => 20,
                'nom' => 'L’hépatologie',
            ],

            [
                'id' => 21,
                'nom' => 'L’infectiologie',
            ],

            [
                'id' => 22,
                'nom' => 'Médecine aiguë',
            ],

            [
                'id' => 23,
                'nom' => 'Médecine du travail',
            ],

            [
                'id' => 24,
                'nom' => 'Médecine générale',
            ],

            [
                'id' => 25,
                'nom' => 'Médecine interne',
            ],

            [
                'id' => 26,
                'nom' => 'Médecine nucléaire',
            ],

            [
                'id' => 27,
                'nom' => 'Médecine palliative',
            ],

            [
                'id' => 28,
                'nom' => 'Médecine physique',
            ],

            [
                'id' => 29,
                'nom' => 'Médecine préventive',
            ],

            [
                'id' => 30,
                'nom' => 'Néonatologie',
            ],

            [
                'id' => 31,
                'nom' => 'Neurologie',
            ],

            [
                'id' => 32,
                'nom' => 'L’odontologie',
            ],

            [
                'id' => 33,
                'nom' => 'L’oncologie',
            ],

            [
                'id' => 34,
                'nom' => 'L’obstétrique',
            ],

            [
                'id' => 35,
                'nom' => 'L’ophtalmologie',
            ],

            [
                'id' => 36,
                'nom' => 'L’orthopédie',
            ],

            [
                'id' => 37,
                'nom' => 'L’Oto-rhino-laryngologie',
            ],

            [
                'id' => 38,
                'nom' => 'Pédiatrie',
            ],

            [
                'id' => 39,
                'nom' => 'Pneumologie',
            ],

            [
                'id' => 40,
                'nom' => 'Psychiatrie',
            ],

            [
                'id' => 41,
                'nom' => 'L’allergologie',
            ],

            [
                'id' => 42,
                'nom' => 'Radiothérapie',
            ],

            [
                'id' => 43,
                'nom' => 'Rhumatologie',
            ],

            [
                'id' => 44,
                'nom' => 'L’urologie',
            ],

            [    
                'id' => 45,
                'nom' => 'L’immunologie',
            ],

            [    
                'id' => 46,
                'nom' => 'pharmacie',
            ],
        ]);
    }
}
