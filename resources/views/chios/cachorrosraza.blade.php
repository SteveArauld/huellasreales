@extends('layouts.app')

@section('title', 'Cachorros ' . $raza . ' — Alma de Criador')

@push('styles')
@endpush

@section('content')
<main class="flex-1">
    <section class="pt-40 pb-20 lg:pt-52 lg:pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Raza {{ $raza }}</p>
            <h1 class="mt-6 max-w-4xl text-[clamp(2.6rem,5vw,5rem)] leading-[1.02]">
                Cachorros {{ $raza }},
                <span class="italic">listos para su hogar.</span>
            </h1>
            <div class="mt-10 max-w-2xl text-lg leading-relaxed text-anthracite-soft">
                Todos entregados vacunados, con microchip, desparasitados y con garantía sanitaria.
            </div>
        </div>
    </section>

    <div class="mx-auto max-w-[1400px] px-6 pb-28 lg:px-12">
        <!-- Filtres -->
        <div class="grid gap-6 border-y border-hairline py-6 md:grid-cols-3">
            <label class="block">
                <span class="eyebrow">Raza</span>
                <select class="mt-3 w-full border-b border-hairline bg-transparent py-3 text-base text-anthracite focus:border-sage focus:outline-none">
                    <option value="Todas">Todas</option>
                    <option value="{{ $raza }}" selected>{{ $raza }}</option>
                </select>
            </label>
            <label class="block">
                <span class="eyebrow">Sexo</span>
                <select class="mt-3 w-full border-b border-hairline bg-transparent py-3 text-base text-anthracite focus:border-sage focus:outline-none">
                    <option value="Todos">Todos</option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
            </label>
            <label class="block">
                <span class="eyebrow">Disponibilité</span>
                <select class="mt-3 w-full border-b border-hairline bg-transparent py-3 text-base text-anthracite focus:border-sage focus:outline-none">
                    <option value="Todas">Tous</option>
                    <option value="Disponible">Disponible</option>
                    <option value="Vendido">Vendu</option>
                </select>
            </label>
        </div>

        <p class="mt-8 text-sm text-muted-ink">{{ $total }} ejemplares disponibles</p>

        <!-- Liste des chiots - 2 colonnes sur mobile, 3 sur grand écran -->
        <div class="mt-10 grid grid-cols-2 gap-x-4 gap-y-8 lg:grid-cols-3">
            @forelse($cachorros as $cachorro)
                @if(stripos($cachorro['nombre'], 'VENDID') === false && stripos($cachorro['nombre'], 'VENDIDO') === false)
                <a href="{{ route('cachorros.show', ['slug' => $cachorro['slug']]) }}"class="group block">
                    <div class="overflow-hidden rounded-[4px]">
                        <img 
                            alt="Cachorro {{ $raza }} llamado {{ $cachorro['nombre'] }}" 
                            loading="lazy" 
                            class="aspect-[4/3.5] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" 
                            src="{{ $cachorro['imagenes'][0] ?? asset('assets/images/default-puppy.jpg') }}"
                            onerror="this.src='{{ asset('assets/images/default-puppy.jpg') }}'"
                        >
                    </div>
                    <div class="mt-3 flex flex-col items-start justify-between gap-2">
                        <div class="min-w-0 w-full">
                            <p class="text-[0.6rem] uppercase tracking-[0.18em] text-sage-deep">{{ $cachorro['raza'] }}</p>
                            <p class="mt-1 font-serif text-base lg:text-lg text-anthracite truncate w-full">{{ $cachorro['nombre'] }}</p>
                            <p class="mt-1 text-[0.65rem] text-muted-ink">
                                {{ stripos($cachorro['nombre'], 'Hembra') !== false ? 'Hembra' : (stripos($cachorro['nombre'], 'Macho') !== false ? 'Macho' : '') }}
                            </p>
                        </div>
                        <div class="w-full mt-2">
                            <span class="btn-ghost inline-flex w-full items-center justify-center gap-1 py-2 text-[0.55rem] uppercase tracking-[0.1em] border border-hairline rounded hover:bg-sage/10 transition-colors">
                                Consultar 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3" aria-hidden="true">
                                    <path d="M7 7h10v10"></path>
                                    <path d="M7 17 17 7"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
                @endif
            @empty
            <div class="col-span-2 lg:col-span-3 text-center py-12">
                <p class="text-lg text-anthracite-soft">Aucun chiot disponible pour cette race actuellement.</p>
                <a href="/puppies" class="btn-primary mt-4 inline-block">Voir toutes les races</a>
            </div>
            @endforelse
        </div>
    </div>

    <div class="mx-auto max-w-[1400px] px-6 pb-24 lg:px-12">
        <a href="/puppies" class="text-sm uppercase tracking-[0.2em] text-anthracite link-underline">← Ver todos los cachorros</a>
    </div>
</main>
@endsection

