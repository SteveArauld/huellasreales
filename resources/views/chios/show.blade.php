@extends('layouts.app')

@section('title', $cachorro['nombre'] . ' — ' . $cachorro['raza'] . ' — Alma de Criador')

@push('styles')
<style>
    /* Toast notification styles */
    .toast-container {
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 9999;
        max-width: 420px;
        width: 100%;
    }
    
    .toast {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        border-left: 4px solid #2d7d46;
        transform: translateX(120%);
        transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        margin-bottom: 12px;
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }
    
    .toast.show {
        transform: translateX(0);
    }
    
    .toast-icon {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        background: #e8f5e9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2d7d46;
    }
    
    .toast-icon svg {
        width: 22px;
        height: 22px;
    }
    
    .toast-content {
        flex: 1;
    }
    
    .toast-title {
        font-weight: 600;
        font-size: 16px;
        color: #1a1a1a;
        margin-bottom: 4px;
    }
    
    .toast-message {
        font-size: 14px;
        color: #666;
        line-height: 1.5;
        margin: 0;
    }
    
    .toast-close {
        flex-shrink: 0;
        background: none;
        border: none;
        color: #999;
        cursor: pointer;
        padding: 4px;
        transition: color 0.2s;
        margin-top: -4px;
    }
    
    .toast-close:hover {
        color: #333;
    }
    
    .toast-close svg {
        width: 18px;
        height: 18px;
    }
    
    .toast.error {
        border-left-color: #d32f2f;
    }
    
    .toast.error .toast-icon {
        background: #fce4ec;
        color: #d32f2f;
    }

    /* Filtres */
    .filter-btn {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .filter-btn.active {
        background-color: rgba(167, 139, 112, 0.2) !important;
        color: #2d2d2d !important;
        border-color: rgba(167, 139, 112, 0.4) !important;
    }
    
    .filter-btn:not(.active) {
        background-color: rgba(255, 255, 255, 0.6);
        color: #2d2d2d;
    }
    
    .filter-btn:not(.active):hover {
        background-color: rgba(167, 139, 112, 0.1);
    }

    /* Carte des chiots dans la galerie */
    .puppy-card {
        transition: all 0.3s ease;
    }
    
    .puppy-card.hidden {
        display: none !important;
    }

    .puppy-card .estado-badge {
        font-size: 0.55rem;
        padding: 2px 8px;
        border-radius: 10px;
        display: inline-block;
    }

    .puppy-card .estado-badge.disponible {
        background-color: #dcfce7;
        color: #166534;
    }

    .puppy-card .estado-badge.vendido {
        background-color: #fee2e2;
        color: #991b1b;
    }
</style>
@endpush

@section('content')
<main class="flex-1">
    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <div class="bg-ivory">
        <div class="mx-auto max-w-[1200px] px-6 pb-24 pt-16 lg:px-12 lg:pt-24">
            <a class="text-xs uppercase tracking-[0.2em] text-anthracite link-underline" href="/puppies">← Volver a los cachorros</a>

            <!-- Filtres pour les autres chiots de la même race -->
            @if(isset($otrosCachorros) && count($otrosCachorros) > 0)
            <div class="mt-6">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-sm text-anthracite-soft">Otros cachorros de la misma raza:</span>
                    <div class="flex flex-wrap gap-2" id="filterButtons">
                        <button type="button" class="filter-btn active inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-xs uppercase tracking-[0.16em] ring-1 backdrop-blur-sm transition-colors bg-sage/20 text-anthracite ring-sage/40" data-filter="all" onclick="filterPuppies('all')">
                            Todos ({{ count($otrosCachorros) }})
                        </button>
                        <button type="button" class="filter-btn inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-xs uppercase tracking-[0.16em] ring-1 backdrop-blur-sm transition-colors bg-white/60 text-anthracite ring-black/5 hover:bg-sage/10" data-filter="hembra" onclick="filterPuppies('hembra')">
                            Hembras
                        </button>
                        <button type="button" class="filter-btn inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-xs uppercase tracking-[0.16em] ring-1 backdrop-blur-sm transition-colors bg-white/60 text-anthracite ring-black/5 hover:bg-sage/10" data-filter="macho" onclick="filterPuppies('macho')">
                            Machos
                        </button>
                        <button type="button" class="filter-btn inline-flex items-center gap-2 rounded-full px-4 py-1.5 text-xs uppercase tracking-[0.16em] ring-1 backdrop-blur-sm transition-colors bg-white/60 text-anthracite ring-black/5 hover:bg-sage/10" data-filter="disponible" onclick="filterPuppies('disponible')">
                            Disponibles
                        </button>
                    </div>
                </div>
                
                <!-- Galerie des autres chiots de la même race -->
                <div class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5" id="puppiesGallery">
                    @foreach($otrosCachorros as $otro)
                    @php
                        $sexo = stripos($otro['nombre'], 'Hembra') !== false ? 'hembra' : (stripos($otro['nombre'], 'Macho') !== false ? 'macho' : '');
                        $estado = (stripos($otro['nombre'], 'VENDID') !== false || stripos($otro['nombre'], 'VENDIDO') !== false) ? 'vendido' : 'disponible';
                        $estadoLabel = $estado === 'disponible' ? 'Disponible' : 'Vendido';
                        $estadoClass = $estado === 'disponible' ? 'disponible' : 'vendido';
                    @endphp
                    <a href="{{ route('cachorros.show', ['slug' => $otro['slug']]) }}" 
                       class="puppy-card group block transition-transform hover:scale-105"
                       data-sexo="{{ $sexo }}"
                       data-estado="{{ $estado }}">
                        <div class="overflow-hidden rounded-[8px] bg-white shadow-[0_4px_12px_-8px_rgba(0,0,0,0.15)] ring-1 ring-black/5 relative">
                            @if($estado === 'vendido')
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center z-10">
                                <span class="text-white font-bold text-xs uppercase tracking-widest bg-black/60 px-3 py-1 rounded">Vendido</span>
                            </div>
                            @endif
                            <img 
                                src="{{ $otro['imagenes'][0] ?? asset('assets/images/default-puppy.jpg') }}" 
                                alt="{{ $otro['nombre'] }}" 
                                loading="lazy"
                                class="aspect-square w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                onerror="this.src='{{ asset('assets/images/default-puppy.jpg') }}'"
                            >
                        </div>
                        <div class="mt-2 text-center">
                            <p class="text-xs font-serif text-anthracite truncate">{{ $otro['nombre'] }}</p>
                            <p class="text-[0.55rem] text-anthracite-soft">
                                @if($sexo === 'hembra')
                                    Hembra
                                @elseif($sexo === 'macho')
                                    Macho
                                @endif
                                <span class="estado-badge {{ $estadoClass }}">{{ $estadoLabel }}</span>
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="mt-10 grid gap-12 lg:grid-cols-2 lg:gap-16">
                <!-- Colonne gauche - Informations du chiot -->
                <div>
                    <!-- Image du chiot -->
                    <div class="overflow-hidden rounded-[4px] mb-8">
                        <img
                            src="{{ $cachorro['imagenes'][0] ?? asset('assets/images/default-puppy.jpg') }}"
                            alt="{{ $cachorro['nombre'] }}"
                            class="w-full aspect-[4/3] object-cover"
                            onerror="this.src='{{ asset('assets/images/default-puppy.jpg') }}'">
                    </div>

                    <p class="eyebrow">Cachorro {{ $cachorro['raza'] }}</p>
                    <h1 class="mt-4 font-serif text-[clamp(2rem,4vw,3.2rem)] leading-[1.05] text-anthracite">
                        {{ $cachorro['nombre'] }}
                        <span class="italic">
                            @if(stripos($cachorro['nombre'], 'Hembra') !== false)
                            – Hembra
                            @elseif(stripos($cachorro['nombre'], 'Macho') !== false)
                            – Macho
                            @endif
                        </span>
                    </h1>

                    <p class="mt-3 text-sm text-anthracite-soft">
                        {{ stripos($cachorro['nombre'], 'Hembra') !== false ? 'Hembra' : (stripos($cachorro['nombre'], 'Macho') !== false ? 'Macho' : '') }}
                        · Consultar
                    </p>

                    <div class="mt-8 space-y-5 text-anthracite-soft">
                        <p class="font-serif text-lg text-anthracite italic">Su nuevo compañero</p>
                        <p>{{ $cachorro['descripcion'] ?? 'Cachorro encantador y sano. ¡Imagine a este cachorro alegrando su hogar!' }}</p>
                        <p>Imagine a su nuevo cachorro corriendo a saludarle, moviendo la cola de emoción. Este cachorro es perfecto para familias, paseos o apartamentos acogedores, listo para llenar su vida de amor. Criados con esmero durante más de 15 años, nuestras camadas exclusivas se distinguen por su salud, temperamento y belleza. ¡Solo quedan unos pocos este mes!</p>
                    </div>

                    <div class="mt-10 border-t border-hairline pt-8">
                        <h2 class="font-serif text-xl text-anthracite">¿Por qué somos su mejor opción?</h2>
                        <ul class="mt-5 space-y-3 text-sm text-anthracite-soft">
                            <li><strong class="text-anthracite">Salud impecable:</strong> Vacunados, desparasitados, con microchip, certificado veterinario y 2 años de garantía genética.</li>
                            <li><strong class="text-anthracite">Criador ético:</strong> Miembro de la RSCE, pedigrí oficial, linaje verificado.</li>
                            <li><strong class="text-anthracite">Pack de bienvenida:</strong> Pienso premium (1 semana), manta con olor materno, juguete y guías de cuidados.</li>
                            <li><strong class="text-anthracite">Apoyo permanente:</strong> Llamada posparto, apoyo de por vida y asistencia para la reubicación.</li>
                        </ul>
                    </div>
                </div>

                <!-- Colonne droite - Formulaire de réservation -->
                <div>
                    <p class="eyebrow">Reserve a su cachorro hoy mismo</p>
                    <h2 class="mt-4 font-serif text-[clamp(1.6rem,2.8vw,2.4rem)] leading-tight text-anthracite">
                        Rellene sus datos para <span class="italic">comprar el cachorro</span>
                    </h2>
                    <p class="mt-4 text-anthracite-soft">¿Listo para conocer a su nuevo cachorro? Rellene nuestro formulario gratuito (¡solo 2 minutos!) para obtener fotos y videos exclusivos. 5% de descuento por pago total.</p>

                    <div class="mt-10">
                        <div class="rounded-xl border text-card-foreground overflow-hidden border-hairline bg-white shadow-[0_10px_40px_-20px_rgba(0,0,0,0.15)] ring-1 ring-black/5">
                            <div class="flex flex-col space-y-1.5 bg-ivory-deep/50 p-6 lg:p-8">
                                <div class="font-semibold tracking-tight font-serif text-xl text-anthracite">
                                    Reservar a {{ $cachorro['nombre'] }}
                                </div>
                                <div class="text-sm text-anthracite-soft">Rellene el formulario y le contactaremos por WhatsApp o email.</div>
                            </div>

                            <div class="p-6 lg:p-8">
                                <form action="{{ route('process.order') }}" method="POST" class="grid gap-5" id="orderForm">
                                    @csrf

                                    <input type="hidden" name="language" value="es">

                                    <div class="grid gap-5 md:grid-cols-2">
                                        <!-- Nom complet -->
                                        <div class="space-y-2">
                                            <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="fullName">Nombre completo *</label>
                                            <input
                                                class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('fullName') border-red-500 @enderror"
                                                id="fullName"
                                                placeholder="Su nombre completo"
                                                required
                                                name="fullName"
                                                value="{{ old('fullName') }}">
                                            @error('fullName')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Raza -->
                                        <div class="space-y-2">
                                            <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="breed">Raza del cachorro *</label>
                                            <input
                                                class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                                id="breed"
                                                required
                                                value="{{ $cachorro['raza'] }}"
                                                name="breed"
                                                readonly>
                                        </div>

                                        <!-- Nom du chiot -->
                                        <div class="space-y-2">
                                            <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="puppyName">Nombre del cachorro *</label>
                                            <input
                                                class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                                                id="puppyName"
                                                required
                                                value="{{ $cachorro['nombre'] }}"
                                                name="puppyName"
                                                readonly>
                                        </div>

                                        <!-- Email -->
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

                                        <!-- WhatsApp -->
                                        <div class="space-y-2">
                                            <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="whatsapp">WhatsApp *</label>
                                            <input
                                                class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('whatsapp') border-red-500 @enderror"
                                                id="whatsapp"
                                                placeholder="+34 603 85 94 05"
                                                required
                                                type="tel"
                                                name="whatsapp"
                                                value="{{ old('whatsapp') }}">
                                            @error('whatsapp')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Ville -->
                                        <div class="space-y-2">
                                            <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="city">Ciudad / Región *</label>
                                            <input
                                                class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('city') border-red-500 @enderror"
                                                id="city"
                                                placeholder="Su ciudad o provincia"
                                                required
                                                name="city"
                                                value="{{ old('city') }}">
                                            @error('city')
                                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="space-y-2">
                                        <label class="font-medium peer-disabled:cursor-not-allowed peer-disabled:opacity-70 eyebrow text-xs" for="message">Mensaje</label>
                                        <textarea
                                            class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-base shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm @error('message') border-red-500 @enderror"
                                            id="message"
                                            name="message"
                                            rows="4"
                                            placeholder="Cuéntenos un poco sobre su hogar y su familia…">{{ old('message') }}</textarea>
                                        @error('message')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button
                                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md font-medium cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed bg-primary text-primary-foreground shadow hover:bg-primary/90 px-4 py-2 btn-primary h-12 w-full gap-2 text-xs uppercase tracking-[0.12em]"
                                        type="submit"
                                        id="submitBtn">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                                            <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                                            <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                                            <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                            <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                                            <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                                        </svg>
                                        Enviar pedido
                                    </button>

                                    <p class="text-center text-xs text-muted-ink">Al enviar acepta nuestra política de privacidad. No compartimos sus datos.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    // Gestion du formulaire
    const form = document.getElementById('orderForm');
    const submitBtn = document.getElementById('submitBtn');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const action = this.action;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Envoi en cours...';

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
                    form.reset();
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
                submitBtn.disabled = false;
                submitBtn.innerHTML = `
                    <svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>
                    Enviar pedido
                `;
            });
        });
    }

    // Fonction de filtrage des chiots dans la galerie
    window.filterPuppies = function(filter) {
        const cards = document.querySelectorAll('.puppy-card');
        const btns = document.querySelectorAll('.filter-btn');
        
        // Mettre à jour les boutons
        btns.forEach(btn => {
            btn.classList.remove('active', 'bg-sage/20', 'text-anthracite', 'ring-sage/40');
            btn.classList.add('bg-white/60', 'ring-black/5');
            
            if (btn.dataset.filter === filter) {
                btn.classList.add('active', 'bg-sage/20', 'text-anthracite', 'ring-sage/40');
                btn.classList.remove('bg-white/60', 'ring-black/5');
            }
        });
        
        // Filtrer les cartes
        let visibleCount = 0;
        cards.forEach(card => {
            const sexo = card.dataset.sexo;
            const estado = card.dataset.estado;
            
            let show = false;
            
            if (filter === 'all') {
                show = true;
            } else if (filter === 'hembra' && sexo === 'hembra') {
                show = true;
            } else if (filter === 'macho' && sexo === 'macho') {
                show = true;
            } else if (filter === 'disponible' && estado === 'disponible') {
                show = true;
            }
            
            if (show) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });
        
        // Mettre à jour le compteur
        const filterBtnAll = document.querySelector('.filter-btn[data-filter="all"]');
        if (filterBtnAll) {
            filterBtnAll.textContent = `Todos (${visibleCount})`;
        }
        
        // Message "Aucun résultat"
        const gallery = document.getElementById('puppiesGallery');
        let noResults = gallery.querySelector('.no-results');
        
        if (visibleCount === 0) {
            if (!noResults) {
                const msg = document.createElement('p');
                msg.className = 'no-results col-span-full text-center text-anthracite-soft py-8 text-sm';
                msg.textContent = 'No hay cachorros que coincidan con este filtro.';
                gallery.appendChild(msg);
            }
        } else if (noResults) {
            noResults.remove();
        }
    };
});
</script>
@endpush