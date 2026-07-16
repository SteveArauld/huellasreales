@extends('layouts.app')

@section('title', 'Alma de Criador — Cachorros de raza, criados en familia')

@push('styles')

@endpush

@section('content')
<main class="flex-1">
    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <section class="relative h-[100svh] min-h-[680px] w-full overflow-hidden">
        <div class="absolute inset-0" id="hero-slider">
            <!-- Slide 1 -->
            <div class="slide absolute inset-0 transition-opacity duration-[1600ms] ease-in-out opacity-0" data-index="0">
                <img src="{{ asset('assets/images/hero-background.png') }}" alt="Julie con sus compañeros peludos en el espacio de cuidado diurno" width="1920" height="1280" class="size-full object-cover kenburns" style="object-position:center 25%">
            </div>
            
            <!-- Slide 2 (actif par défaut) -->
            <div class="slide absolute inset-0 transition-opacity duration-[1600ms] ease-in-out opacity-100" data-index="1">
                <img src="{{ asset('assets/images/hero-slide-2.png') }}" alt="Julie rodeada de perros sobre una mesa de picnic" width="1920" height="1280" class="size-full object-cover kenburns" style="object-position:center 30%">
            </div>
            
            <!-- Slide 3 -->
            <div class="slide absolute inset-0 transition-opacity duration-[1600ms] ease-in-out opacity-0" data-index="2">
                <img src="{{ asset('assets/images/hero-slide-3.png') }}" alt="Julie jugando con la manada al aire libre" width="1920" height="1280" class="size-full object-cover kenburns" style="object-position:center 30%">
            </div>
            
            <!-- Overlay gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-anthracite/45 via-anthracite/15 to-anthracite/65"></div>
        </div>
        
        <!-- Indicateurs de diapositives -->
        <!-- <div class="absolute bottom-24 left-1/2 z-20 flex -translate-x-1/2 gap-2">
            <button class="dot h-2 w-2 rounded-full bg-white/40 transition-all duration-300 hover:bg-white/70" data-index="0" aria-label="Diapositive 1"></button>
            <button class="dot h-2 w-6 rounded-full bg-white/90 transition-all duration-300 hover:bg-white" data-index="1" aria-label="Diapositive 2"></button>
            <button class="dot h-2 w-2 rounded-full bg-white/40 transition-all duration-300 hover:bg-white/70" data-index="2" aria-label="Diapositive 3"></button>
        </div> -->

        <div class="relative z-10 mx-auto flex h-full max-w-[1400px] flex-col justify-end px-6 pb-20 lg:px-12 lg:pb-28">
            <div class="max-w-3xl reveal">
                <p class="text-[0.72rem] uppercase tracking-[0.32em] text-ivory/85">Criadero certificado · Desde 2008</p>
                <h1 class="mt-7 text-[clamp(2.6rem,6vw,5.4rem)] leading-[1.02] text-ivory">Cachorros sanos,<br>
                    <span class="italic text-ivory/95">criados en familia.</span>
                </h1>
                <p class="mt-7 max-w-xl text-base leading-relaxed text-ivory/80 md:text-lg">Vacunados, con microchip, desparasitados y entregados con garantía sanitaria. Una selección rigurosa de razas, una crianza paciente.</p>
                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <a href="/puppies" class="btn-primary">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                            <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                            <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                            <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                            <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                            <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                        </svg>
                        Ver cachorros disponibles
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute bottom-6 right-6 z-10 hidden text-[0.7rem] uppercase tracking-[0.24em] text-ivory/70 lg:block lg:right-12">Vol. I — La Casa</div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        let currentSlide = 1;
        let slideInterval;
        const INTERVAL_TIME = 4000;

        function goToSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('opacity-100', 'opacity-0');
                slide.classList.add('opacity-0');
            });
            
            slides[index].classList.remove('opacity-0');
            slides[index].classList.add('opacity-100');
            
            dots.forEach((dot, i) => {
                dot.classList.remove('w-6', 'bg-white/90');
                dot.classList.add('w-2', 'bg-white/40');
                if (i === index) {
                    dot.classList.remove('w-2', 'bg-white/40');
                    dot.classList.add('w-6', 'bg-white/90');
                }
            });
            
            currentSlide = index;
        }

        function nextSlide() {
            let nextIndex = (currentSlide + 1) % slides.length;
            goToSlide(nextIndex);
        }

        function startAutoplay() {
            if (slideInterval) clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, INTERVAL_TIME);
        }

        function stopAutoplay() {
            if (slideInterval) {
                clearInterval(slideInterval);
                slideInterval = null;
            }
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                stopAutoplay();
                goToSlide(index);
                setTimeout(startAutoplay, 5000);
            });
            
            dot.addEventListener('mouseenter', stopAutoplay);
            dot.addEventListener('mouseleave', startAutoplay);
        });

        const slider = document.getElementById('hero-slider');
        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);

        goToSlide(1);
        startAutoplay();
    });
    </script>

    <style>
    .kenburns {
        animation: kenburns 20s ease-in-out infinite alternate;
    }

    @keyframes kenburns {
        0% {
            transform: scale(1) rotate(0deg);
        }
        100% {
            transform: scale(1.1) rotate(0.5deg);
        }
    }

    .slide {
        transition: opacity 1600ms ease-in-out;
    }

    .dot {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    </style>

    <section class="bg-ivory py-6 lg:py-8">
        <div class="mx-auto max-w-[1400px] px-6 text-center lg:px-12">
            <img src="{{ asset("assets/logo/logo.png") }}" alt="Alma de Criador" class="mx-auto h-20 w-auto lg:h-28">
            <h2 class="mt-2 text-[clamp(1.4rem,2.6vw,2.2rem)] leading-[1.1]">Bienvenido a almas de criador</h2>
            <p class="mx-auto mt-2 max-w-2xl text-base leading-relaxed text-anthracite-soft md:text-lg">Su familia de confianza para cachorros sanos en España</p>
        </div>
    </section>

    <section class="bg-ivory py-10 lg:py-12">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="mx-auto max-w-3xl text-center">
                <p class="eyebrow">Nuestro catálogo</p>
                <h2 class="mt-6 text-[clamp(2rem,3.6vw,3.4rem)] leading-[1.08]">Nuestras razas
                    <span class="italic">disponibles</span>
                </h2>
            </div>
            <div class="mt-10 grid grid-cols-2 gap-6 md:grid-cols-3 lg:gap-10">
                <a href="/breeds/beagle" class="group flex flex-col text-center">
                    <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                        <img src="assets/images/beagle-puppy.jpg" alt="Raza Cachorros Beagles" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]">
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <h3 class="font-serif text-lg text-anthracite lg:text-xl">Cachorros Beagles</h3>
                        <button type="button" class="flex size-8 items-center justify-center rounded-full bg-white/60 shadow-sm ring-1 ring-black/5 backdrop-blur-sm transition-colors hover:bg-sage/20" aria-label="Ver Cachorros Beagles">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 text-sage" aria-hidden="true">
                                <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                                <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                            </svg>
                        </button>
                    </div>
                </a>
                <a href="/breeds/bichon-frise" class="group flex flex-col text-center">
                    <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                        <img src="assets/images/bichon-frise.jpg" alt="Raza Cachorros Bichón Frise" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]">
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <h3 class="font-serif text-lg text-anthracite lg:text-xl">Cachorros Bichón Frise</h3>
                        <button type="button" class="flex size-8 items-center justify-center rounded-full bg-white/60 shadow-sm ring-1 ring-black/5 backdrop-blur-sm transition-colors hover:bg-sage/20" aria-label="Ver Cachorros Bichón Frise">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 text-sage" aria-hidden="true">
                                <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                                <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                            </svg>
                        </button>
                    </div>
                </a>
                <a href="/breeds/border-collie" class="group flex flex-col text-center">
                    <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                        <img src="assets/images/border-collie.jpg" alt="Raza Cachorros Border Collie" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]">
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <h3 class="font-serif text-lg text-anthracite lg:text-xl">Cachorros Border Collie</h3>
                        <button type="button" class="flex size-8 items-center justify-center rounded-full bg-white/60 shadow-sm ring-1 ring-black/5 backdrop-blur-sm transition-colors hover:bg-sage/20" aria-label="Ver Cachorros Border Collie">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 text-sage" aria-hidden="true">
                                <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                                <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                            </svg>
                        </button>
                    </div>
                </a>
                <a href="/breeds/pomerania" class="group flex flex-col text-center">
                    <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                        <img src="assets/images/pomeranian.jpg" alt="Raza Cachorros Pomeranian" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]">
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <h3 class="font-serif text-lg text-anthracite lg:text-xl">Cachorros Pomeranian</h3>
                        <button type="button" class="flex size-8 items-center justify-center rounded-full bg-white/60 shadow-sm ring-1 ring-black/5 backdrop-blur-sm transition-colors hover:bg-sage/20" aria-label="Ver Cachorros Pomeranian">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 text-sage" aria-hidden="true">
                                <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                                <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                            </svg>
                        </button>
                    </div>
                </a>
                <a href="/breeds/boston-terrier" class="group flex flex-col text-center">
                    <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                        <img src="assets/images/boston-terrier.jpg" alt="Raza Cachorros Boston Terrier" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]">
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <h3 class="font-serif text-lg text-anthracite lg:text-xl">Cachorros Boston Terrier</h3>
                        <button type="button" class="flex size-8 items-center justify-center rounded-full bg-white/60 shadow-sm ring-1 ring-black/5 backdrop-blur-sm transition-colors hover:bg-sage/20" aria-label="Ver Cachorros Boston Terrier">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 text-sage" aria-hidden="true">
                                <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                                <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                            </svg>
                        </button>
                    </div>
                </a>
                <a href="/breeds/boxer" class="group flex flex-col text-center">
                    <div class="overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 group-hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                        <img src="assets/images/boxer.jpg" alt="Raza Cachorros Boxer" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]">
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <h3 class="font-serif text-lg text-anthracite lg:text-xl">Cachorros Boxer</h3>
                        <button type="button" class="flex size-8 items-center justify-center rounded-full bg-white/60 shadow-sm ring-1 ring-black/5 backdrop-blur-sm transition-colors hover:bg-sage/20" aria-label="Ver Cachorros Boxer">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 text-sage" aria-hidden="true">
                                <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                                <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                            </svg>
                        </button>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-ivory py-10 lg:py-12">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="mx-auto max-w-3xl text-center">
                <p class="eyebrow">Nuestro catálogo</p>
                <h2 class="mt-6 text-[clamp(2rem,3.6vw,3.4rem)] leading-[1.08]">Más razas
                    <span class="italic">disponibles</span>
                </h2>
            </div>
            <div class="mt-10 grid grid-cols-2 gap-6 md:grid-cols-3 lg:gap-10">
                <!-- ... toutes les autres races ... -->
            </div>
        </div>
    </section>

    <!-- Le reste de votre contenu (Razones, Certificaciones, Referencias) reste identique -->

    <section class="py-10 lg:py-12">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-[1fr_1.2fr] lg:gap-24">
                <div>
                    <p class="eyebrow">Hablemos</p>
                    <h2 class="mt-6 text-[clamp(2rem,3.6vw,3.4rem)] leading-[1.08]">¿Le gustaría<br>
                    <span class="italic">conocer una camada?</span>
                </h2>
                    <p class="mt-8 max-w-md leading-relaxed text-anthracite-soft">Cuéntenos qué raza tiene en mente. Responderemos en menos de 24 horas con disponibilidad real, próximas camadas y la posibilidad de visitar el criadero.</p>
                    <div class="mt-12 space-y-4 border-t border-hairline pt-8 text-sm">
                        <p><span class="text-muted-ink">Teléfono · </span>+34 600 000 000</p>
                        <p><span class="text-muted-ink">Email · </span>hola@almadecriador.es</p>
                        <p><span class="text-muted-ink">Criadero · </span>Provincia de Toledo</p>
                    </div>
                </div>
                <div class="rounded-xl border text-card-foreground overflow-hidden border-hairline bg-white shadow-[0_10px_40px_-20px_rgba(0,0,0,0.15)] ring-1 ring-black/5">
                    <div class="flex flex-col space-y-1.5 bg-ivory-deep/50 p-6 lg:p-8">
                        <div class="font-semibold tracking-tight font-serif text-xl text-anthracite">Solicite información</div>
                        <div class="text-sm text-anthracite-soft">Rellene el formulario y le contactaremos por WhatsApp o email.</div>
                    </div>
                    <div class="p-6 lg:p-8">
                        <form action="{{ route('contact.form') }}" method="POST" class="grid gap-5" id="contactForm">
                            @csrf

                            <div class="grid gap-5 md:grid-cols-2">
                                <div class="space-y-2">
                                    <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="name">Nombre *</label>
                                    <input
                                        class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('name') border-red-500 @enderror"
                                        id="name"
                                        placeholder="Su nombre"
                                        required
                                        name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="breed">Raza deseada</label>
                                    <input
                                        class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('breed') border-red-500 @enderror"
                                        id="breed"
                                        placeholder="Ej. Beagle"
                                        name="breed"
                                        value="{{ old('breed') }}">
                                    @error('breed')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="email">Email *</label>
                                    <input
                                        class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('email') border-red-500 @enderror"
                                        id="email"
                                        placeholder="hola@email.com"
                                        required
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="phone">WhatsApp</label>
                                    <input
                                        class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('phone') border-red-500 @enderror"
                                        id="phone"
                                        placeholder="+34 600 000 000"
                                        type="tel"
                                        name="phone"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="city">Ciudad</label>
                                <input
                                    class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('city') border-red-500 @enderror"
                                    id="city"
                                    placeholder="Su ciudad o provincia"
                                    name="city"
                                    value="{{ old('city') }}">
                                @error('city')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="message">Mensaje *</label>
                                <textarea
                                    class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-base shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('message') border-red-500 @enderror"
                                    id="message"
                                    name="message"
                                    rows="4"
                                    placeholder="Cuéntenos un poco sobre su hogar y la raza que busca…"
                                    required>{{ old('message') }}</textarea>
                                @error('message')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap rounded-md font-medium cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed bg-primary text-primary-foreground shadow hover:bg-primary/90 px-4 py-2 btn-primary h-12 w-full gap-2 text-xs uppercase tracking-[0.12em]"
                                type="submit"
                                id="contactSubmitBtn">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                                    <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                                    <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                                    <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                    <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                    <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                                </svg>
                                Enviar consulta
                            </button>

                            <p class="text-center text-xs text-muted-ink">Al enviar acepta nuestra política de privacidad. No compartimos sus datos.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toastContainer = document.getElementById('toastContainer');
    let toastTimer = null;

    function showToast(title, message, type = 'success') {
        const existingToasts = toastContainer.querySelectorAll('.toast');
        existingToasts.forEach(toast => toast.remove());

        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        toast.innerHTML = `
            <div class="toast-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    ${type === 'success' ? `
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    ` : `
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    `}
                </svg>
            </div>
            <div class="toast-content">
                <div class="toast-title">${title}</div>
                <p class="toast-message">${message}</p>
            </div>
            <button class="toast-close" aria-label="Fermer">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        `;

        const closeBtn = toast.querySelector('.toast-close');
        closeBtn.addEventListener('click', function() {
            hideToast(toast);
        });

        toastContainer.appendChild(toast);
        setTimeout(() => {
            toast.classList.add('show');
        }, 50);

        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => {
            hideToast(toast);
        }, 6000);
    }

    function hideToast(toast) {
        toast.classList.remove('show');
        clearTimeout(toastTimer);
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 500);
    }

    // Formulaire de contact
    const contactForm = document.getElementById('contactForm');
    const contactSubmitBtn = document.getElementById('contactSubmitBtn');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const action = this.action;
            
            contactSubmitBtn.disabled = true;
            contactSubmitBtn.innerHTML = 'Envoi en cours...';

            fetch(action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(
                        '✅ ¡Mensaje enviado con éxito!',
                        'Le contactaremos en las próximas 24 horas para responder a su consulta.',
                        'success'
                    );
                    contactForm.reset();
                } else {
                    showToast(
                        '❌ Error al enviar',
                        data.message || 'Ha ocurrido un error. Por favor, inténtelo de nuevo.',
                        'error'
                    );
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast(
                    '❌ Error de conexión',
                    'No se pudo enviar el mensaje. Verifique su conexión y vuelva a intentarlo.',
                    'error'
                );
            })
            .finally(() => {
                contactSubmitBtn.disabled = false;
                contactSubmitBtn.innerHTML = `
                    <svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>
                    Enviar consulta
                `;
            });
        });
    }
});
</script>
@endpush