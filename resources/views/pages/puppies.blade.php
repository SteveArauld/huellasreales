@extends('layouts.app')

@section('title', "Cachorros en venta en España | +27 razas — Alma de Criador")

@push('styles')
<style>
    /* Styles pour les transitions */
    .breed-card {
        transition: all 0.3s ease;
    }
    
    .breed-card.hidden {
        display: none;
    }
    
    /* Style des boutons de filtre */
    .filter-btn {
        transition: all 0.3s ease;
    }
    
    .filter-btn.active {
        background-color: rgba(167, 139, 112, 0.2);
        color: #2d2d2d;
        ring-color: rgba(167, 139, 112, 0.4);
    }
    
    .filter-btn:not(.active) {
        background-color: rgba(255, 255, 255, 0.6);
        color: #2d2d2d;
    }
    
    .filter-btn:not(.active):hover {
        background-color: rgba(167, 139, 112, 0.1);
    }
</style>
@endpush

@section('content')
<main class="flex-1">
    <section class="pt-40 pb-20 lg:pt-52 lg:pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Cachorros en venta</p>
            <h1 class="mt-6 max-w-4xl text-[clamp(2.6rem,5vw,5rem)] leading-[1.02]">Cachorros <span class="italic">a la venta.</span></h1>
        </div>
    </section>
    
    <!-- Barre de recherche -->
    <section class="pb-6">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="mx-auto flex max-w-2xl items-center gap-3 rounded-full bg-white/70 px-6 py-4 shadow-[0_6px_24px_-12px_rgba(0,0,0,0.2)] ring-1 ring-black/5 backdrop-blur-sm">
                <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 shrink-0 text-sage" aria-hidden="true">
                    <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                    <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                    <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                    <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                    <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                </svg>
                <input 
                    id="searchInput"
                    placeholder="Buscar por raza o nombre…" 
                    class="w-full bg-transparent text-sm text-anthracite outline-none placeholder:text-anthracite-soft" 
                    aria-label="Buscar cachorros" 
                    type="search"
                    onkeyup="filterBreeds()"
                >
            </div>
            <div class="text-center mt-3">
                <span class="filter-result-count text-sm text-anthracite-soft">28 razas disponibles</span>
            </div>
        </div>
    </section>
    
    <section class="bg-ivory py-12 lg:py-16">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="mx-auto max-w-3xl text-center">
                <p class="eyebrow">Nuestro catálogo</p>
                <h2 class="mt-6 text-[clamp(1.8rem,3.2vw,3rem)] leading-[1.08]">Cachorros por <span class="italic">categoría</span></h2>
                <p class="mt-6 text-anthracite-soft">Elija la talla que mejor encaja con su hogar: cachorros mini, medianos o grandes, todos de raza pura y con garantía sanitaria.</p>
            </div>
            
            <!-- Filtres -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-3" id="filterButtons">
                <button type="button" class="filter-btn active inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-xs uppercase tracking-[0.16em] ring-1 backdrop-blur-sm transition-colors bg-sage/20 text-anthracite ring-sage/40" data-filter="all" onclick="filterBreeds('all')">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="size-3 text-sage" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>
                    Todas (28)
                </button>
                <button type="button" class="filter-btn inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-xs uppercase tracking-[0.16em] ring-1 backdrop-blur-sm transition-colors bg-white/60 text-anthracite ring-black/5 hover:bg-sage/10" data-filter="small" onclick="filterBreeds('small')">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="size-3 text-sage" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>
                    Mini y Pequeños (11)
                </button>
                <button type="button" class="filter-btn inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-xs uppercase tracking-[0.16em] ring-1 backdrop-blur-sm transition-colors bg-white/60 text-anthracite ring-black/5 hover:bg-sage/10" data-filter="medium" onclick="filterBreeds('medium')">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="size-3 text-sage" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>
                    Medianos (9)
                </button>
                <button type="button" class="filter-btn inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-xs uppercase tracking-[0.16em] ring-1 backdrop-blur-sm transition-colors bg-white/60 text-anthracite ring-black/5 hover:bg-sage/10" data-filter="large" onclick="filterBreeds('large')">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="size-3 text-sage" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>
                    Grandes (8)
                </button>
            </div>
            
            <!-- Conteneur des races -->
            <div id="breedsContainer" class="mt-12 space-y-14">
                <!-- ============================================ -->
                <!-- SECTION MINI Y PEQUEÑOS (11 races) -->
                <!-- ============================================ -->
                <div class="breed-section" data-category="small">
                    <div class="mb-6 flex flex-col items-start gap-2 border-b border-hairline pb-4 md:flex-row md:items-end md:justify-between">
                        <div>
                            <h3 class="font-serif text-2xl text-anthracite lg:text-3xl">Cachorros <span class="italic">mini y pequeños</span></h3>
                            <p class="mt-2 max-w-2xl text-sm text-anthracite-soft">Ideales para pisos y ciudad: mini, toy y razas pequeñas de menos de 10 kg.</p>
                        </div>
                        <span class="text-xs uppercase tracking-[0.16em] text-sage">11 razas</span>
                    </div>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:gap-8">
                        <a href="/breeds/bichon-frise" class="breed-card group flex flex-col text-center" data-name="Bichón Frise" data-breed="bichon-frise">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Bichón Frise en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/bichon-frise.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Bichón Frise <span class="text-anthracite-soft">(3)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/boston-terrier" class="breed-card group flex flex-col text-center" data-name="Boston Terrier" data-breed="boston-terrier">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Boston Terrier en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/boston-terrier.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Boston Terrier <span class="text-anthracite-soft">(5)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/bulldog-frances" class="breed-card group flex flex-col text-center" data-name="Bulldog Francés" data-breed="bulldog-frances">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Bulldog Francés en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/french-bulldog.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Bulldog Francés <span class="text-anthracite-soft">(7)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/caniche" class="breed-card group flex flex-col text-center" data-name="Caniche" data-breed="caniche">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Caniche en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/poodle.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Caniche <span class="text-anthracite-soft">(12)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/chihuahua" class="breed-card group flex flex-col text-center" data-name="Chihuahua" data-breed="chihuahua">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Chihuahua en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/chihuahua.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Chihuahua <span class="text-anthracite-soft">(6)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/teckel" class="breed-card group flex flex-col text-center" data-name="Dachshund" data-breed="teckel">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Dachshund en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/dachshund.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Dachshund <span class="text-anthracite-soft">(4)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/maltese" class="breed-card group flex flex-col text-center" data-name="Maltés" data-breed="maltese">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Maltés en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/maltese.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Maltés <span class="text-anthracite-soft">(4)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/maltipoo" class="breed-card group flex flex-col text-center" data-name="Maltipoo" data-breed="maltipoo">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Maltipoo en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/maltipoo.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Maltipoo <span class="text-anthracite-soft">(6)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/pomerania" class="breed-card group flex flex-col text-center" data-name="Pomerania" data-breed="pomerania">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Pomerania en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/pomeranian.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Pomerania <span class="text-anthracite-soft">(5)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/pug" class="breed-card group flex flex-col text-center" data-name="Pug" data-breed="pug">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Pug en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/pug.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Pug <span class="text-anthracite-soft">(3)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/yorkie" class="breed-card group flex flex-col text-center" data-name="Yorkie" data-breed="yorkie">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Yorkie en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/yorkie.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Yorkie <span class="text-anthracite-soft">(5)</span></h4>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- ============================================ -->
                <!-- SECTION MEDIANOS (9 races) -->
                <!-- ============================================ -->
                <div class="breed-section" data-category="medium">
                    <div class="mb-6 flex flex-col items-start gap-2 border-b border-hairline pb-4 md:flex-row md:items-end md:justify-between">
                        <div>
                            <h3 class="font-serif text-2xl text-anthracite lg:text-3xl">Cachorros <span class="italic">medianos</span></h3>
                            <p class="mt-2 max-w-2xl text-sm text-anthracite-soft">Compañeros equilibrados y polivalentes, entre 10 y 25 kg, perfectos para familias.</p>
                        </div>
                        <span class="text-xs uppercase tracking-[0.16em] text-sage">9 razas</span>
                    </div>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:gap-8">
                        <a href="/breeds/beagle" class="breed-card group flex flex-col text-center" data-name="Beagle" data-breed="beagle">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Beagle en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/beagle-puppy.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Beagle <span class="text-anthracite-soft">(5)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/border-collie" class="breed-card group flex flex-col text-center" data-name="Border Collie" data-breed="border-collie">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Border Collie en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/border-collie.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Border Collie <span class="text-anthracite-soft">(6)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/boxer" class="breed-card group flex flex-col text-center" data-name="Boxer" data-breed="boxer">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Boxer en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/boxer.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Boxer <span class="text-anthracite-soft">(3)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/bulldog-ingles" class="breed-card group flex flex-col text-center" data-name="Bulldog Inglés" data-breed="bulldog-ingles">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Bulldog Inglés en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/english-bulldog.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Bulldog Inglés <span class="text-anthracite-soft">(4)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/agua-espanol" class="breed-card group flex flex-col text-center" data-name="Agua Español" data-breed="agua-espanol">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro de Agua Español en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/spanish-water-dog.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro de Agua Español <span class="text-anthracite-soft">(3)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/goldendoodle" class="breed-card group flex flex-col text-center" data-name="Goldendoodle" data-breed="goldendoodle">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorros Goldendoodle en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/goldendoodle.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorros Goldendoodle <span class="text-anthracite-soft">(4)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/pomsky" class="breed-card group flex flex-col text-center" data-name="Pomsky" data-breed="pomsky">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorros Pomsky en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/pomsky.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorros Pomsky <span class="text-anthracite-soft">(5)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/pastor-australiano" class="breed-card group flex flex-col text-center" data-name="Pastor Australiano" data-breed="pastor-australiano">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorros Pastor Australiano en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/australian-shepherd.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorros Pastor Australiano <span class="text-anthracite-soft">(3)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/ibiza-hound" class="breed-card group flex flex-col text-center" data-name="Podenco Ibicenco" data-breed="ibiza-hound">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Podenco Ibicenco en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/ibizan-hound.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Podenco Ibicenco <span class="text-anthracite-soft">(1)</span></h4>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- ============================================ -->
                <!-- SECTION GRANDES (8 races) -->
                <!-- ============================================ -->
                <div class="breed-section" data-category="large">
                    <div class="mb-6 flex flex-col items-start gap-2 border-b border-hairline pb-4 md:flex-row md:items-end md:justify-between">
                        <div>
                            <h3 class="font-serif text-2xl text-anthracite lg:text-3xl">Cachorros <span class="italic">grandes</span></h3>
                            <p class="mt-2 max-w-2xl text-sm text-anthracite-soft">Razas grandes y de guarda, más de 25 kg: leales, protectores y familiares.</p>
                        </div>
                        <span class="text-xs uppercase tracking-[0.16em] text-sage">8 razas</span>
                    </div>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:gap-8">
                        <a href="/breeds/boyero-de-berna" class="breed-card group flex flex-col text-center" data-name="Boyero de Berna" data-breed="boyero-de-berna">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Boyero de Berna en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/bernese-mountain-dog.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Boyero de Berna <span class="text-anthracite-soft">(5)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/cane-corso" class="breed-card group flex flex-col text-center" data-name="Cane Corso" data-breed="cane-corso">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Cane Corso en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/cane-corso.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Cane Corso <span class="text-anthracite-soft">(4)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/galgo-espanol" class="breed-card group flex flex-col text-center" data-name="Galgo Español" data-breed="galgo-espanol">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Galgo Español en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="https://huellasreales.es/wp-content/uploads/brizy/imgs/ekkogreyhound-20250814-0002-350x350x0x43x350x263x1755347960.webp">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Galgo Español <span class="text-anthracite-soft">(4)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/golden-retriever" class="breed-card group flex flex-col text-center" data-name="Golden Retriever" data-breed="golden-retriever">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Golden Retriever en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/golden-retriever.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Golden Retriever <span class="text-anthracite-soft">(3)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/labrador" class="breed-card group flex flex-col text-center" data-name="Labrador" data-breed="labrador">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Labrador en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/labrador.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Labrador <span class="text-anthracite-soft">(5)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/pastor-aleman" class="breed-card group flex flex-col text-center" data-name="Pastor Alemán" data-breed="pastor-aleman">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Pastor Alemán en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="assets/images/german-shepherd.jpg">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Pastor Alemán <span class="text-anthracite-soft">(5)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/presa-canario" class="breed-card group flex flex-col text-center" data-name="Presa Canario" data-breed="presa-canario">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Presa Canario en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="https://huellasreales.es/wp-content/uploads/brizy/imgs/chapo_de_earthquake_kennels-20250815-0003-350x350x0x43x350x263x1757882773.webp">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Presa Canario <span class="text-anthracite-soft">(3)</span></h4>
                            </div>
                        </a>
                        <a href="/breeds/rottweiler" class="breed-card group flex flex-col text-center" data-name="Rottweiler" data-breed="rottweiler">
                            <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                                <img alt="Cachorro Rottweiler en venta" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="https://huellasreales.es/wp-content/uploads/brizy/imgs/rottweilers-3-350x350x0x43x350x263x1757880574.webp">
                            </div>
                            <div class="mt-4 flex items-center justify-center gap-2">
                                <h4 class="font-serif text-base text-anthracite lg:text-lg">Cachorro Rottweiler <span class="text-anthracite-soft">(4)</span></h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    // Fonction de filtrage
    function filterBreeds(filter = null) {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
        const breedCards = document.querySelectorAll('.breed-card');
        const sections = document.querySelectorAll('.breed-section');
        
        // Mettre à jour les boutons de filtre
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.classList.remove('active', 'bg-sage/20', 'text-anthracite', 'ring-sage/40');
            btn.classList.add('bg-white/60', 'ring-black/5');
            
            if (filter === null && btn.dataset.filter === 'all') {
                btn.classList.add('active', 'bg-sage/20', 'text-anthracite', 'ring-sage/40');
                btn.classList.remove('bg-white/60', 'ring-black/5');
            } else if (btn.dataset.filter === filter) {
                btn.classList.add('active', 'bg-sage/20', 'text-anthracite', 'ring-sage/40');
                btn.classList.remove('bg-white/60', 'ring-black/5');
            }
        });
        
        // Si aucun filtre sélectionné, utiliser 'all'
        if (!filter) {
            const activeBtn = document.querySelector('.filter-btn.active');
            if (activeBtn) {
                filter = activeBtn.dataset.filter;
            } else {
                filter = 'all';
            }
        }
        
        let visibleCount = 0;
        
        // Filtrer les cartes
        breedCards.forEach(card => {
            const name = card.dataset.name.toLowerCase();
            const breed = card.dataset.breed.toLowerCase();
            const category = card.closest('.breed-section').dataset.category;
            
            // Vérifier si la carte correspond à la recherche
            const matchesSearch = searchTerm === '' || 
                                 name.includes(searchTerm) || 
                                 breed.includes(searchTerm);
            
            // Vérifier si la carte correspond au filtre de catégorie
            const matchesFilter = filter === 'all' || category === filter;
            
            // Afficher ou cacher la carte
            if (matchesSearch && matchesFilter) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });
        
        // Afficher ou cacher les sections vides
        sections.forEach(section => {
            const visibleCards = section.querySelectorAll('.breed-card:not(.hidden)');
            if (visibleCards.length === 0) {
                section.style.display = 'none';
            } else {
                section.style.display = 'block';
            }
        });
        
        // Mettre à jour le compteur de résultats
        const resultText = document.querySelector('.filter-result-count');
        if (resultText) {
            if (searchTerm !== '') {
                resultText.textContent = `${visibleCount} resultados para "${searchTerm}"`;
            } else {
                resultText.textContent = `${visibleCount} razas disponibles`;
            }
        }
    }
    
    // Fonction de recherche avec délai (debounce)
    let searchTimeout;
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    filterBreeds();
                }, 300);
            });
        }
        
        // Initialiser l'affichage
        filterBreeds('all');
    });
</script>
@endpush