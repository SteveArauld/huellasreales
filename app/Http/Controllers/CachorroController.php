<?php

namespace App\Http\Controllers;

use App\Models\Chio;
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
        $races = Race::all();
        
        $cachorrosp = $races->take(6);
        $cachorrosf = $races->skip(6)->take(6);
        
        $catsCollection = Cat::all();

        $racesUniques = $catsCollection
            ->pluck('race')
            ->unique()
            ->values()
            ->toArray();

        
        return view('home', compact('cachorrosp', 'cachorrosf', 'racesUniques','catsCollection'));
    }
    
    public function show($lang, $slug)
    {
        $cachorro = Chio::where('slug', $slug)->first();

        if (empty($cachorro)) {
            abort(404);
        }

        return view('chios.show', compact('cachorro'));
    }

    public function cachorrosraza($lang, $slug)
    {
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
    
        $allCachorros = Chio::all();
        
        $cachorrosFiltrados = $allCachorros->filter(function($cachorro) use ($normalize, $razaBuscada1Norm, $razaBuscada2Norm) {
            $razaNorm = $normalize($cachorro->raza);
            return $razaNorm === $razaBuscada1Norm || $razaNorm === $razaBuscada2Norm;
        });
    
        if ($cachorrosFiltrados->isEmpty()) {
            abort(404, __('controller.race.not_found'));
        }
    
        $razaParaMostrar = $razaBuscada1;
        $existeFormato1 = false;
        
        foreach ($cachorrosFiltrados as $cachorro) {
            if ($normalize($cachorro->raza) === $razaBuscada1Norm) {
                $existeFormato1 = true;
                break;
            }
        }
        
        if (!$existeFormato1) {
            $razaParaMostrar = $razaBuscada2;
        }
    
        return view('chios.cachorrosraza', [
            'cachorros' => $cachorrosFiltrados->toArray(),
            'raza' => $razaParaMostrar
        ]);
    }
    
    public function venta()
    {
        $cachorrosCollection = Chio::all();

        $razasUnicas = $cachorrosCollection
            ->pluck('raza')
            ->unique()
            ->values()
            ->toArray();

        $cachorrosPaginated = Chio::paginate(36);

        return view('pages.venta', [
            'cachorros' => $cachorrosPaginated,
            'razasUnicas' => $razasUnicas,
            'cachorrosCollection' => $cachorrosCollection
        ]);
    }

    public function processOrder(OrderRequest $request, $lang, $slug)
    {
        try {
            $orderData = $request->validated();

            $cachorro = Chio::where('slug', $slug)->first();

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
    $cachorros = Chio::search($query)->get();

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
    $cachorros = Chio::all();

    foreach ($cachorros as $cachorro) {
        $raza = $cachorro->raza;

        // Suggestions par race de chiot
        if (stripos($raza, $query) !== false && !in_array($raza, $razasUniquesChiots)) {
            $razasUniquesChiots[] = $raza;
            $count = Chio::byRaza($raza)->count();

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

    // Récupérer tous les chats
    $cats = Cat::all();

    foreach ($cats as $cat) {
        $raza = $cat->race;

        // Suggestions par race de chat
        if (stripos($raza, $query) !== false && !in_array($raza, $razasUniquesCats)) {
            $razasUniquesCats[] = $raza;
            
            // Compter les chats de cette race
            $count = Cat::where('race', $raza)->count();
            
            // Décoder les images
            $images = is_string($cat->images) ? json_decode($cat->images, true) : $cat->images;
            $imagenEjemplo = !empty($images) ? $images[0] : '';

            $suggestions[] = [
                'type' => 'race_cat',
                'text' => $raza,
                'count' => $count,
                'url' => $this->generateRaceUrlCat($raza),
                'imagen' => $imagenEjemplo,
                'animal' => 'cat'
            ];
        }

        // Suggestions par nom de chat
        if (stripos($cat->nom, $query) !== false) {
            $images = is_string($cat->images) ? json_decode($cat->images, true) : $cat->images;
            
            $suggestions[] = [
                'type' => 'cat',
                'text' => $cat->nom,
                'raza' => $cat->race,
                'imagen' => !empty($images) ? $images[0] : '',
                'url' => route('cats.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]),
                'animal' => 'cat'
            ];
        }
    }

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

    $cachorros = Chio::byRaza($race)->get();
    $cats = Cat::where('race', $race)->get();

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

    foreach ($cats as $cat) {
        $images = is_string($cat->images) ? json_decode($cat->images, true) : $cat->images;
        $resultats[] = [
            'nombre' => $cat->nom,
            'imagenes' => $images ?? [],
            'descripcion' => $cat->description ?? '',
            'enlace' => route('cats.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]),
            'type' => 'cat'
        ];
    }

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

  
}