<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CatSeeder extends Seeder
{
    private $basePath;
    private $webPath = '/wp-content/chats/';

    public function run()
    {
        $this->basePath = public_path('wp-content/chats/');

        if (!File::exists($this->basePath)) {
            $this->command->error("Le dossier {$this->basePath} n'existe pas.");
            return;
        }

        $races = File::directories($this->basePath);
        $cats = [];
        $catId = 1;
        $existingSlugs = [];

        foreach ($races as $racePath) {
            $raceName = $this->formatRaceName(basename($racePath));

            $catFolders = File::directories($racePath);

            foreach ($catFolders as $catFolder) {
                $folderName = basename($catFolder);

                // On passe $existingSlugs à extractCatData
                $catData = $this->extractCatData($folderName, $raceName, $catId, $existingSlugs);
                $images = $this->processImages($catFolder, $catData['nom'], $raceName);

                if (!empty($images)) {
                    $catData['images'] = json_encode($images);
                    $catData['created_at'] = now();
                    $catData['updated_at'] = now();
                    $cats[] = $catData;
                    $existingSlugs[] = $catData['slug'];
                    $catId++;
                }
            }
        }

        if (!empty($cats)) {
            $chunks = array_chunk($cats, 50);
            foreach ($chunks as $chunk) {
                DB::table('cats')->insert($chunk);
            }
            $this->command->info("{$catId} chats ont été importés avec succès !");
        }
    }

    private function formatRaceName($folderName)
    {
        $raceMap = [
            'gatitos azules ruzos' => 'azules ruzos',
            'main coon' => 'Maine Coon',
            'ragdoll' => 'Ragdoll',
            'gatitos british pelo corto' => 'British Shorthair',
        ];

        $key = strtolower($folderName);
        return $raceMap[$key] ?? ucwords($folderName);
    }

    private function extractCatData($folderName, $race, $id, $existingSlugs = [])
    {
        $parts = explode(' ', $folderName);
        $nom = $parts[0];
        $ageMois = null;

        if (count($parts) > 1 && is_numeric(end($parts))) {
            $ageMois = (int) end($parts);
        }

        $sexe = $this->determineSexe($nom);
        $slug = Str::slug($nom . '-' . $id);
        
        // S'assurer que le slug est unique
        $slug = $this->makeUniqueSlug($slug, $existingSlugs);

        return [
            'id' => $id,
            'nom' => ucfirst($nom),
            'slug' => $slug,
            'race' => $race,
            'age_mois' => $ageMois,
            'sexe' => $sexe,
            'description' => $this->generateDescription($nom, $race, $ageMois, $sexe),
            'status' => 'disponible',
        ];
    }

    private function determineSexe($nom)
    {
        $femaleNames = ['linda', 'frida', 'nala', 'bella', 'kira', 'sofia', 'pinks', 'lipa', 'pelusa', 'titi', 'cielo', 'coco', 'pixel'];
        $maleNames = ['leo', 'simba', 'milo', 'ben', 'jaxson', 'rex', 'perlq', 'mitch', 'atlant'];

        $nomLower = strtolower($nom);

        if (in_array($nomLower, $femaleNames)) {
            return 'femelle';
        } elseif (in_array($nomLower, $maleNames)) {
            return 'male';
        }

        return null;
    }

    private function generateDescription($nom, $race, $ageMois, $sexe)
    {
        $sexeText = $sexe === 'femelle' ? 'femelle' : ($sexe === 'male' ? 'mâle' : '');
        $ageText = '';

        if ($ageMois) {
            if ($ageMois < 12) {
                $ageText = "agé de {$ageMois} mois";
            } else {
                $annees = floor($ageMois / 12);
                $moisRestant = $ageMois % 12;
                $ageText = "agé de {$annees} an" . ($annees > 1 ? 's' : '');
                if ($moisRestant > 0) {
                    $ageText .= " et {$moisRestant} mois";
                }
            }
        }

        $descriptions = [
            "{nom} est un adorable chaton {race} {sexe} {age}. Il est très joueur, affectueux et sociable. Parfait pour une famille aimante.",
            "Magnifique {race} {sexe} {age}. {nom} est un chaton plein de vie qui adore les câlins et les jeux. Idéal pour un foyer chaleureux.",
            "{nom} est un chaton exceptionnel de race {race}. {sexe} {age}, très doux et attaché aux humains. Recherche une famille pour la vie.",
            "Superbe {race} {sexe} {age}. {nom} est un petit amour de chaton, très curieux et intelligent. Prêt à rejoindre sa nouvelle famille !",
        ];

        $desc = $descriptions[array_rand($descriptions)];

        return str_replace(
            ['{nom}', '{race}', '{sexe}', '{age}'],
            [ucfirst($nom), $race, $sexeText, $ageText],
            $desc
        );
    }

    private function makeUniqueSlug($slug, $existingSlugs)
    {
        $originalSlug = $slug;
        $counter = 1;
        
        while (in_array($slug, $existingSlugs)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }

    private function processImages($catFolder, $nom, $race)
    {
        $images = [];
        $files = File::files($catFolder);
        
        // Filtrer seulement les images
        $imageFiles = [];
        foreach ($files as $file) {
            $extension = strtolower($file->getExtension());
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'heic'])) {
                $imageFiles[] = $file;
            }
        }
        
        if (empty($imageFiles)) {
            return $images;
        }

        $raceFolder = basename(dirname($catFolder));
        $catFolderName = basename($catFolder);
        $nomClean = Str::slug($nom);
        
        $index = 1;
        foreach ($imageFiles as $file) {
            $extension = strtolower($file->getExtension());
            
            // Renommer avec un nom simple: {nom}-{numero}.{extension}
            $newFileName = "{$nomClean}-{$index}.{$extension}";
            $newPath = $catFolder . '/' . $newFileName;
            
            // Toujours renommer, même si le fichier existe déjà avec un bon nom
            if (File::exists($newPath) && $newPath !== $file->getPathname()) {
                File::delete($newPath);
            }
            
            if ($file->getFilename() !== $newFileName) {
                File::move($file->getPathname(), $newPath);
            }
            
            // Chemin web pour la BD
            $relativePath = $this->webPath . $raceFolder . '/' . $catFolderName . '/' . $newFileName;
            $images[] = $relativePath;
            $index++;
        }

        return $images;
    }
}