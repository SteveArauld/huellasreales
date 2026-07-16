<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Mail\OrderConfirmationMail;

use Illuminate\Support\Facades\Mail;

class CatController extends Controller
{
    public function venta($lang)
    {
        $catsCollection = Cat::all();

        $racesUniques = $catsCollection
            ->pluck('race')
            ->unique()
            ->values()
            ->toArray();

        $catsPaginated = Cat::paginate(36);

        return view('cats.venta', [
            'cats' => $catsPaginated,
            'racesUniques' => $racesUniques,
            'catsCollection' => $catsCollection
        ]);
    }
    public function entrega()
    {


        return view('pages.entrega');
    }

    public function show($lang, $slug)
    {
        $cat = Cat::where('slug', $slug)->first();

        if (empty($cat)) {
            abort(404);
        }

        return view('cats.show', compact('cat'));
    }
    public function garantia()
    {


        return view('pages.garantia');
    }

    public function catsRace($lang, $slug)
    {
        $normalize = function($str) {
            $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
            $str = strtolower($str);
            $str = trim($str);
            return $str;
        };

        $raceBuscada = ucwords(str_replace('-', ' ', $slug));
        $raceBuscadaNorm = $normalize($raceBuscada);

        $allCats = Cat::all();

        $catsFiltrados = $allCats->filter(function($cat) use ($normalize, $raceBuscadaNorm) {
            $raceNorm = $normalize($cat->race);
            return $raceNorm === $raceBuscadaNorm;
        });

        if ($catsFiltrados->isEmpty()) {
            abort(404, __('controller.race.not_found'));
        }

        $raceParaMostrar = $catsFiltrados->first()->race;

        return view('cats.race', [
            'cats' => $catsFiltrados,
            'race' => $raceParaMostrar
        ]);
    }
    public function testimonials()
    {
     
        return view('pages.testimonials');
    }

    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (empty($query)) {
            return redirect()->route('cats.venta');
        }

        $resultados = Cat::where('nom', 'LIKE', "%{$query}%")
            ->orWhere('race', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        $resultadosPorRace = [];
        foreach ($resultados as $cat) {
            $race = $cat->race;
            if (!isset($resultadosPorRace[$race])) {
                $resultadosPorRace[$race] = [];
            }
            $resultadosPorRace[$race][] = $cat;
        }

        return view('cats.search-results', [
            'query' => $query,
            'resultados' => $resultados,
            'resultadosPorRace' => $resultadosPorRace,
            'total' => $resultados->count()
        ]);
    }


public function processOrder(OrderRequest $request, $lang, $slug)
{
    try {
        $orderData = $request->validated();

        $cat = Cat::where('slug', $slug)->first();

        if (empty($cat)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => __('cat_not_found')]);
        }

        Mail::to($orderData['email'])
            ->send(new OrderConfirmationMail($orderData, $cat));

        $adminEmail = env('ADMIN_EMAIL', 'contacto@huellasreales.es');
        Mail::to($adminEmail)
            ->send(new OrderConfirmationMail($orderData, $cat, true));

        return redirect()->back()
            ->with('success', __('order_success'));

    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->withErrors(['error' => __('order_error')]);
    }
}
}
