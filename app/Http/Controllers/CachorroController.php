<?php

namespace App\Http\Controllers;

use App\Models\Chio;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderConfirmationMail;

use Illuminate\Support\Facades\Mail;

class CachorroController extends Controller
{
    public function home()
    {
        $races = Race::all();
        
        $cachorrosp = $races->take(6);
        $cachorrosf = $races->skip(6)->take(6);

        return view('home', compact('cachorrosp', 'cachorrosf'));
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

            $adminEmail = env('ADMIN_EMAIL', 'atencionalcliente@dulcemascota.eu');
            Mail::to($adminEmail)
                ->send(new OrderConfirmationMail($orderData, $cachorro, true));

            return redirect()->back()
                ->with('success', __('controller.order.success'));

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => __('controller.order.error')]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (empty($query)) {
            return redirect()->route('cachorros.index');
        }

        $resultados = Chio::search($query)->get();

        $resultadosPorRaza = [];
        foreach ($resultados as $cachorro) {
            $raza = $cachorro->raza;
            if (!isset($resultadosPorRaza[$raza])) {
                $resultadosPorRaza[$raza] = [];
            }
            $resultadosPorRaza[$raza][] = $cachorro->toArray();
        }

        return view('pages.search-results', [
            'query' => $query,
            'resultados' => $resultados->toArray(),
            'resultadosPorRaza' => $resultadosPorRaza,
            'total' => $resultados->count()
        ]);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->input('query', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $cachorros = Chio::all();

        $razasUnicas = [];
        $suggestions = [];

        foreach ($cachorros as $cachorro) {
            $raza = $cachorro->raza;

            if (stripos($raza, $query) !== false && !in_array($raza, $razasUnicas)) {
                $razasUnicas[] = $raza;

                $count = Chio::byRaza($raza)->count();

                $suggestions[] = [
                    'type' => 'race',
                    'text' => $raza,
                    'count' => $count,
                    'url' => $this->generateRaceUrl($raza)
                ];
            }

            if (stripos($cachorro->nombre, $query) !== false) {
                $suggestions[] = [
                    'type' => 'cachorro',
                    'text' => $cachorro->nombre,
                    'raza' => $cachorro->raza,
                    'imagen' => $cachorro->imagenes[0] ?? '',
                    'url' => $cachorro->enlace ?? '#'
                ];
            }
        }

        $suggestions = array_slice($suggestions, 0, 10);

        return response()->json($suggestions);
    }

    private function generateRaceUrl($raza)
    {
        $slug = strtolower(str_replace(' ', '-', $raza));
        return route('cachorrosraza', ['lang' => app()->getLocale(), 'slug' => $slug]);
    }

    public function raceDetails(Request $request)
    {
        $race = $request->input('race', '');

        $cachorrosDeRaza = Chio::byRaza($race)->get();

        $formattedResults = [];
        foreach ($cachorrosDeRaza as $cachorro) {
            $formattedResults[] = [
                'nombre' => $cachorro->nombre ?? 'Sin nombre',
                'imagenes' => $cachorro->imagenes ?? [],
                'enlace' => $cachorro->enlace ?? '#',
                'descripcion' => $cachorro->descripcion ?? ''
            ];
        }

        return response()->json([
            'race' => $race,
            'cachorros' => $formattedResults,
            'count' => $cachorrosDeRaza->count()
        ]);
    }
}