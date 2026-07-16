<?php

namespace App\Http\Controllers;

use App\Models\Chios;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\Cat;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class CachorroController extends Controller
{
    public function home()
    {
   
        
        return view('home');
    }
    
    public function show( $slug)
    {

    
        $cachorro = Chios::where('slug', $slug)->first();

        if (empty($cachorro)) {
            abort(404);
        }

        return view('chios.show', compact('cachorro'));
    }

 public function cachorrosraza($slug)
{
    // Charger le fichier de données
    $cachorrosData = include config_path('chios.php');
    
    $normalize = function($str) {
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $str = strtolower($str);
        $str = trim($str);
        return $str;
    };

    $razaBuscada1 = ucwords(str_replace('-', ' ', $slug));
    $razaBuscada2 = implode(' ', array_reverse(explode(' ', $razaBuscada1)));

    $razaBuscada1Norm = $normalize($razaBuscada1);
    $razaBuscada2Norm = $normalize($razaBuscada2);

    // Filtrer les chiots par race
    $cachorrosFiltrados = array_filter($cachorrosData, function($cachorro) use ($normalize, $razaBuscada1Norm, $razaBuscada2Norm) {
        $razaNorm = $normalize($cachorro['raza']);
        return $razaNorm === $razaBuscada1Norm || $razaNorm === $razaBuscada2Norm;
    });

    if (empty($cachorrosFiltrados)) {
        abort(404, __('controller.race.not_found'));
    }

    // Déterminer le nom de la race à afficher
    $razaParaMostrar = $razaBuscada1;
    $existeFormato1 = false;
    
    foreach ($cachorrosFiltrados as $cachorro) {
        if ($normalize($cachorro['raza']) === $razaBuscada1Norm) {
            $existeFormato1 = true;
            break;
        }
    }
    
    if (!$existeFormato1) {
        $razaParaMostrar = $razaBuscada2;
    }

    return view('chios.cachorrosraza', [
        'cachorros' => $cachorrosFiltrados,
        'raza' => $razaParaMostrar,
        'total' => count($cachorrosFiltrados)
    ]);
}
    
 public function puppies()
{
    $cachorrosCollection = Chios::all();

    // Récupérer les races uniques depuis la table 'races' (le seeder)
    $razasUnicas = DB::table('races')
        ->select('slug', 'description', 'imagen')
        ->get()
        ->map(function ($raza) {
            return [
                'slug' => $raza->slug,
                'description' => $raza->description,
                'imagen' => json_decode($raza->imagen, true)
            ];
        });

    $cachorrosPaginated = Chios::paginate(36);

    return view('pages.puppies', [
        'cachorros' => $cachorrosPaginated,
        'razasUnicas' => $razasUnicas,
        'cachorrosCollection' => $cachorrosCollection
    ]);
}

    public function processOrder(OrderRequest $request, $lang, $slug)
    {
        try {
            $orderData = $request->validated();

            $cachorro = Chios::where('slug', $slug)->first();

            if (empty($cachorro)) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error' => __('controller.cachorro.not_found')]);
            }

            Mail::to($orderData['email'])
                ->send(new OrderConfirmationMail($orderData, $cachorro));

            $adminEmail = env('ADMIN_EMAIL', 'contacto@huellasreales.es');
            Mail::to($adminEmail)
                ->send(new OrderConfirmationMail($orderData, $cachorro, true));

            return redirect()->back()
                ->with('success', __('controller.order.success'));

        } catch (\Exception $e) {
            Log::error('Error al procesar el pedido: ' . $e->getMessage(), [
                'order_data' => $request->all(),
                'cachorro_slug' => $slug
            ]);
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => __('controller.order.error')]);
        }
    }

public function search(Request $request)
{
    $query = $request->input('q', '');

    if (empty($query)) {
        return redirect()->route('cats.venta');
    }

    // Recherche sur les chiots
    $cachorros = Chios::search($query)->get();

    // Recherche sur les chats
    $cats = Cat::where('nom', 'like', "%{$query}%")
        ->orWhere('race', 'like', "%{$query}%")
        ->get();

    // Fusionner les résultats pour l'affichage par race
    $resultadosPorRaza = [];

    foreach ($cachorros as $cachorro) {
        $raza = $cachorro->raza;
        if (!isset($resultadosPorRaza[$raza])) {
            $resultadosPorRaza[$raza] = [];
        }
        $resultadosPorRaza[$raza][] = array_merge($cachorro->toArray(), ['type' => 'dog']);
    }

    foreach ($cats as $cat) {
        $raza = $cat->race;
        if (!isset($resultadosPorRaza[$raza])) {
            $resultadosPorRaza[$raza] = [];
        }
        $resultadosPorRaza[$raza][] = array_merge($cat->toArray(), ['type' => 'cat']);
    }

    return view('pages.search-results', [
        'query' => $query,
        'cachorros' => $cachorros->toArray(),
        'cats' => $cats->toArray(),
        'resultadosPorRaza' => $resultadosPorRaza,
        'total_cachorros' => $cachorros->count(),
        'total_cats' => $cats->count(),
        'total' => $cachorros->count() + $cats->count()
    ]);
}

public function autocomplete(Request $request)
{
    $query = $request->input('query', '');

    if (strlen($query) < 2) {
        return response()->json([]);
    }

    $suggestions = [];
    $razasUniquesChiots = [];
    $razasUniquesCats = [];

    // Récupérer tous les chiots
    $cachorros = Chios::all();

    foreach ($cachorros as $cachorro) {
        $raza = $cachorro->raza;

        // Suggestions par race de chiot
        if (stripos($raza, $query) !== false && !in_array($raza, $razasUniquesChiots)) {
            $razasUniquesChiots[] = $raza;
            $count = Chios::byRaza($raza)->count();

            $suggestions[] = [
                'type' => 'race_dog',
                'text' => $raza,
                'count' => $count,
                'url' => $this->generateRaceUrlDog($raza),
                'animal' => 'dog'
            ];
        }

        // Suggestions par nom de chiot
        if (stripos($cachorro->nombre, $query) !== false) {
            $suggestions[] = [
                'type' => 'cachorro',
                'text' => $cachorro->nombre,
                'raza' => $cachorro->raza,
                'imagen' => $cachorro->imagenes[0] ?? '',
                'url' => $cachorro->enlace ?? '#',
                'animal' => 'dog'
            ];
        }
    }

    // // Récupérer tous les chats
    // $cats = Cat::all();

    // foreach ($cats as $cat) {
    //     $raza = $cat->race;

    //     // Suggestions par race de chat
    //     if (stripos($raza, $query) !== false && !in_array($raza, $razasUniquesCats)) {
    //         $razasUniquesCats[] = $raza;
            
    //         // Compter les chats de cette race
    //         $count = Cat::where('race', $raza)->count();
            
    //         // Décoder les images
    //         $images = is_string($cat->images) ? json_decode($cat->images, true) : $cat->images;
    //         $imagenEjemplo = !empty($images) ? $images[0] : '';

    //         $suggestions[] = [
    //             'type' => 'race_cat',
    //             'text' => $raza,
    //             'count' => $count,
    //             'url' => $this->generateRaceUrlCat($raza),
    //             'imagen' => $imagenEjemplo,
    //             'animal' => 'cat'
    //         ];
    //     }

    //     // Suggestions par nom de chat
    //     if (stripos($cat->nom, $query) !== false) {
    //         $images = is_string($cat->images) ? json_decode($cat->images, true) : $cat->images;
            
    //         $suggestions[] = [
    //             'type' => 'cat',
    //             'text' => $cat->nom,
    //             'raza' => $cat->race,
    //             'imagen' => !empty($images) ? $images[0] : '',
    //             'url' => route('cats.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]),
    //             'animal' => 'cat'
    //         ];
    //     }
    // }

    // Trier les suggestions : d'abord les races, puis les noms
    usort($suggestions, function($a, $b) {
        $order = ['race_dog', 'race_cat', 'cachorro', 'cat'];
        $orderA = array_search($a['type'], $order);
        $orderB = array_search($b['type'], $order);
        return $orderA - $orderB;
    });

    $suggestions = array_slice($suggestions, 0, 12);

    return response()->json($suggestions);
}

public function raceDetails(Request $request)
{
    $race = $request->input('race', '');
    
    if (empty($race)) {
        return response()->json(['error' => 'Race non spécifiée'], 400);
    }

    $cachorros = Chios::byRaza($race)->get();
    // $cats = Cat::where('race', $race)->get();

    $resultats = [];

    foreach ($cachorros as $cachorro) {
        $resultats[] = [
            'nombre' => $cachorro->nombre,
            'imagenes' => $cachorro->imagenes ?? [],
            'descripcion' => $cachorro->descripcion ?? '',
            'enlace' => $cachorro->enlace ?? '#',
            'type' => 'dog'
        ];
    }

    // foreach ($cats as $cat) {
    //     $images = is_string($cat->images) ? json_decode($cat->images, true) : $cat->images;
    //     $resultats[] = [
    //         'nombre' => $cat->nom,
    //         'imagenes' => $images ?? [],
    //         'descripcion' => $cat->description ?? '',
    //         'enlace' => route('cats.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]),
    //         'type' => 'cat'
    //     ];
    // }

    return response()->json([
        'race' => $race,
        'count' => count($resultats),
        'animals' => $resultats
    ]);
}

private function generateRaceUrlDog($raza)
{
    $slug = strtolower(str_replace(' ', '-', $raza));
    return route('cachorrosraza', ['lang' => app()->getLocale(), 'slug' => $slug]);
}

private function generateRaceUrlCat($raza)
{
    $slug = strtolower(str_replace(' ', '-', $raza));
    return route('cats.race', ['lang' => app()->getLocale(), 'slug' => $slug]);
}



public function reserve(Request $request, $slug)
{
    $validated = $request->validate([
        'fullName' => 'required|string|max:255',
        'breed' => 'required|string|max:255',
        'puppyName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'whatsapp' => 'required|string|max:20',
        'city' => 'required|string|max:255',
        'message' => 'nullable|string|max:1000',
    ]);

    // Envoyer un email ou enregistrer dans la base de données
    // Mail::to('info@almadecriador.es')->send(new ReservationRequest($validated));

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', '¡Gracias por su interés! Le contactaremos en las próximas 24 horas.');
}

  
}