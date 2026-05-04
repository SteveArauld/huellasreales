<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiosSeeder extends Seeder
{
    public function run()
    {
        $chiosData = include config_path('chios.php');
        
        $chios = [];
        
        foreach ($chiosData as $chio) {
            $chios[] = [
                'id' => $chio['id'],
                'nombre' => $chio['nombre'],
                'slug' => $chio['slug'],
                'raza' => $chio['raza'],
                'descripcion' => $chio['descripcion'] ?? '',
                'imagenes' => json_encode($chio['imagenes'] ?? []),
                'enlace' => $chio['enlace'] ?? '',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insérer par lots de 50 pour éviter les problèmes de mémoire
        $chunks = array_chunk($chios, 50);
        
        foreach ($chunks as $chunk) {
            DB::table('chios')->insert($chunk);
        }
    }
}
