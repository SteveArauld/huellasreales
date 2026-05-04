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

        foreach ($races as $racePath) {
            $raceName = $this->formatRaceName(basename($racePath));

            $catFolders = File::directories($racePath);

            foreach ($catFolders as $catFolder) {
                $folderName = basename($catFolder);

                if (in_array(strtolower($folderName), ['madres', 'minks', 'adoptados'])) {
                    continue;
                }

                $catData = $this->extractCatData($folderName, $raceName, $catId);
                $images = $this->processImages($catFolder, $catData['slug'], $raceName);

                if (!empty($images)) {
                    $catData['images'] = json_encode($images);
                    $catData['created_at'] = now();
                    $catData['updated_at'] = now();
                    $cats[] = $catData;
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
            'gatitos azules ruzos' => 'Bleu Russe',
            'gatitos azules rusos' => 'Bleu Russe',
            'main coon' => 'Maine Coon',
            'ragdoll' => 'Ragdoll',
            'gatitos british pelo corto' => 'British Shorthair',
        ];

        $key = strtolower($folderName);
        return $raceMap[$key] ?? ucwords($folderName);
    }

    private function extractCatData($folderName, $race, $id)
    {
        $parts = explode(' ', $folderName);
        $nom = $parts[0];
        $ageMois = null;

        if (count($parts) > 1 && is_numeric(end($parts))) {
            $ageMois = (int) end($parts);
        }

        $sexe = $this->determineSexe($nom);
        $slug = Str::slug($nom . '-' . $id);

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

    private function processImages($catFolder, $slug, $race)
    {
        $images = [];
        $files = File::files($catFolder);

        $raceSlug = Str::slug($race);
        $index = 1;

        foreach ($files as $file) {
            $extension = strtolower($file->getExtension());

            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'heic'])) {
                $newFileName = "{$slug}-{$index}.{$extension}";
                $newPath = dirname($file->getPathname()) . '/' . $newFileName;

                if (!File::exists($newPath) || $file->getFilename() !== $newFileName) {
                    File::move($file->getPathname(), $newPath);
                }

                $relativePath = $this->webPath . Str::slug($race) . '/' . basename(dirname($file->getPathname())) . '/' . $newFileName;
                $images[] = $relativePath;
                $index++;
            }
        }

        return $images;
    }
}
