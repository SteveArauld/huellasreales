<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RaceSeeder extends Seeder
{
    public function run()
    {
        $races = [
            [
                'id' => 1,
                'slug' => 'cachorro-beagle',
                'description' => 'Cachorro Beagle',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Beagle/Cachorro_Beagle_01.jpg',
                    'images_chiens/Cachorro_Beagle/Cachorro_Beagle_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'slug' => 'cachorro-bichon-frise',
                'description' => 'Cachorro Bichon Frise',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Bichon_Frise/Cachorro_Bichon_Frise_01.jpg',
                    'images_chiens/Cachorro_Bichon_Frise/Cachorro_Bichon_Frise_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'slug' => 'cachorro-border-collie',
                'description' => 'Cachorro Border Collie',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Border_Collie/Cachorro_Border_Collie_01.jpg',
                    'images_chiens/Cachorro_Border_Collie/Cachorro_Border_Collie_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'slug' => 'cachorro-boston-terrier',
                'description' => 'Cachorro Boston Terrier',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Boston_Terrier/Cachorro_Boston_Terrier_01.jpg',
                    'images_chiens/Cachorro_Boston_Terrier/Cachorro_Boston_Terrier_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'slug' => 'boxer-cachorro',
                'description' => 'Cachorro Boxer',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Boxer/Cachorro_Boxer_01.jpg',
                    'images_chiens/Cachorro_Boxer/Cachorro_Boxer_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'slug' => 'cachorro-boyero-de-berna',
                'description' => 'Cachorro Boyero de Berna',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Boyero_de_Berna/Cachorro_Boyero_de_Berna_01.jpg',
                    // 'images_chiens/Cachorro_Boyero_de_Berna/Cachorro_Boyero_de_Berna_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'slug' => 'cachorro-bulldog-frances',
                'description' => 'Cachorro Bulldog francés',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Bulldog_francés/Cachorro_Bulldog_francés_01.jpg',
                    'images_chiens/Cachorro_Bulldog_francés/Cachorro_Bulldog_francés_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'slug' => 'cachorro-bulldog-ingles',
                'description' => 'Cachorro Bulldog inglés',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Bulldog_inglés/Cachorro_Bulldog_inglés_01.jpg',
                    'images_chiens/Cachorro_Bulldog_inglés/Cachorro_Bulldog_inglés_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'slug' => 'cachorro-cane-corso',
                'description' => 'Cachorro Cane Corso',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Cane_Corso/Cachorro_Cane_Corso_01.jpg',
                    // 'images_chiens/Cachorro_Cane_Corso/Cachorro_Cane_Corso_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'slug' => 'caniche-cachorro',
                'description' => 'Cachorro Caniche',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Caniche/Cachorro_Caniche_01.jpg',
                    'images_chiens/Cachorro_Caniche/Cachorro_Caniche_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'slug' => 'chihuahua-cachorro',
                'description' => 'Cachorro Chihuahua',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Chihuahua/Cachorro_Chihuahua_01.jpg',
                    'images_chiens/Cachorro_Chihuahua/Cachorro_Chihuahua_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'slug' => 'cachorro-dachshund',
                'description' => 'Cachorro Dachshund',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Dachshund/Cachorro_Dachshund_01.jpg',
                    'images_chiens/Cachorro_Dachshund/Cachorro_Dachshund_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'slug' => 'cachorro-de-agua-espanol',
                'description' => 'Cachorro De agua espanol',
                'imagen' => json_encode([
                    // 'images_chiens/Cachorro_De_agua_espanol/Cachorro_De_agua_espanol_01.jpg',
                    'images_chiens/Cachorro_De_agua_espanol/Cachorro_De_agua_espanol_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'slug' => 'cachorro-galgo-espanol',
                'description' => 'Cachorro Galgo espanol',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Galgo_espanol/Cachorro_Galgo_espanol_01.jpg',
                    'images_chiens/Cachorro_Galgo_espanol/Cachorro_Galgo_espanol_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'slug' => 'cachorro-golden-retriever',
                'description' => 'Cachorro Golden Retriever',
                'imagen' => json_encode([
                    // 'images_chiens/Cachorro_Golden_Retriever/Cachorro_Golden_Retriever_01.jpg',
                    'images_chiens/Cachorro_Golden_Retriever/Cachorro_Golden_Retriever_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'slug' => 'cachorro-ibiza-hound',
                'description' => 'Cachorro Ibiza hound',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Ibiza_hound/Cachorro_Ibiza_hound_01.jpg',
                    'images_chiens/Cachorro_Ibiza_hound/Cachorro_Ibiza_hound_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'slug' => 'cachorro-labrador',
                'description' => 'Cachorro Labrador',
                'imagen' => json_encode([
                    // 'images_chiens/Cachorro_Labrador/Cachorro_Labrador_01.jpg',
                    'images_chiens/Cachorro_Labrador/Cachorro_Labrador_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'slug' => 'cachorro-maltese',
                'description' => 'Cachorro Maltese',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Maltese/Cachorro_Maltese_01.jpg',
                    'images_chiens/Cachorro_Maltese/Cachorro_Maltese_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'slug' => 'maltipoo-cachorro',
                'description' => 'Cachorro Maltipoo',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Maltipoo/Cachorro_Maltipoo_01.jpg',
                    'images_chiens/Cachorro_Maltipoo/Cachorro_Maltipoo_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'slug' => 'cachorro-pastor-aleman',
                'description' => 'Cachorro Pastor alemán',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Pastor_Aleman/Cachorro_Pastor_Aleman_01.jpg',
                    'images_chiens/Cachorro_Pastor_Aleman/Cachorro_Pastor_Aleman_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'slug' => 'pomerania-cachorro',
                'description' => 'Cachorro Pomerania',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Pomerania/Cachorro_Pomerania_01.jpg',
                    'images_chiens/Cachorro_Pomerania/Cachorro_Pomerania_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'slug' => 'cachorro-presa-canario',
                'description' => 'Cachorro Presa canario',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Presa_canario/Cachorro_Presa_canario_01.jpg',
                    'images_chiens/Cachorro_Presa_canario/Cachorro_Presa_canario_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 23,
                'slug' => 'pug-cachorro',
                'description' => 'Cachorro Pug',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Pug/Cachorro_Pug_01.jpg',
                    'images_chiens/Cachorro_Pug/Cachorro_Pug_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 24,
                'slug' => 'cachorro-rottweiler',
                'description' => 'Cachorro Rottweiler',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Rottweiler/Cachorro_Rottweiler_01.jpg',
                    'images_chiens/Cachorro_Rottweiler/Cachorro_Rottweiler_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 25,
                'slug' => 'cachorros-goldendoodle',
                'description' => 'Cachorros Goldendoodle',
                'imagen' => json_encode([
                    'images_chiens/Cachorros_Goldendoodle/Cachorros_Goldendoodle_01.jpg',
                    'images_chiens/Cachorros_Goldendoodle/Cachorros_Goldendoodle_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 26,
                'slug' => 'cachorros-pastor-australiano',
                'description' => 'Cachorros Pastor Australiano',
                'imagen' => json_encode([
                    'images_chiens/Cachorros_Pastor_Australiano/Cachorros_Pastor_Australiano_01.jpg',
                    'images_chiens/Cachorros_Pastor_Australiano/Cachorros_Pastor_Australiano_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 27,
                'slug' => 'cachorros-pomsky',
                'description' => 'Cachorros Pomsky',
                'imagen' => json_encode([
                    'images_chiens/Cachorros_Pomsky/Cachorros_Pomsky_01.jpg',
                    'images_chiens/Cachorros_Pomsky/Cachorros_Pomsky_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 28,
                'slug' => 'cachorro-yorkie',
                'description' => 'Cachorro Yorkie',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Yorkie/Cachorro_Yorkie_01.jpg',
                    'images_chiens/Cachorro_Yorkie/Cachorro_Yorkie_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 29,
                'slug' => 'cachorro-dovon',
                'description' => 'Cachorro Dovon',
                'imagen' => json_encode([
                    'images_chiens/Cachorro_Dovon/Cachorro_Dovon_01.jpg',
                    'images_chiens/Cachorro_Dovon/Cachorro_Dovon_02.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('races')->insert($races);
    }
}