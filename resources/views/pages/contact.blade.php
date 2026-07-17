@extends('layouts.app')

@section('title', 'Contacto — Alma de Criador')

@push('styles')

@endpush

@section('content')
<main class="flex-1">
    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <section class="pt-40 pb-20 lg:pt-52 lg:pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Contacto</p>
            <h1 class="mt-6 max-w-4xl text-[clamp(2.6rem,5vw,5rem)] leading-[1.02]">Hablemos <span class="italic">con calma.</span></h1>
            <div class="mt-10 max-w-2xl text-lg leading-relaxed text-anthracite-soft">Respondemos personalmente en menos de 24 horas. Sin formularios automáticos, sin respuestas genéricas.</div>
        </div>
    </section>
    
    <section class="pb-28 lg:pb-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-[1fr_1.4fr] lg:gap-24">
                <aside class="space-y-10">
                    <div class="border-t border-hairline pt-6">
                        <p class="eyebrow">WhatsApp &amp; Teléfono</p>
                        <div class="mt-4 space-y-1 text-base text-anthracite">
                            <p>+34 603 85 94 05</p>
                            <p>Lun–Sáb · 10:00–20:00</p>
                        </div>
                    </div>
                    <div class="border-t border-hairline pt-6">
                        <p class="eyebrow">Email</p>
                        <div class="mt-4 space-y-1 text-base text-anthracite">
                            <p>hola@almadecriador.es</p>
                            <p>Respuesta en menos de 24 h</p>
                        </div>
                    </div>
                    <div class="border-t border-hairline pt-6">
                        <p class="eyebrow">Criadero</p>
                        <div class="mt-4 space-y-1 text-base text-anthracite">
                            <p>Finca del Criadero</p>
                            <p>Provincia de Toledo, España</p>
                            <p>Visitas con cita previa</p>
                        </div>
                    </div>
                    <div class="border-t border-hairline pt-6">
                        <p class="eyebrow">Síganos</p>
                        <div class="mt-4 space-y-1 text-base text-anthracite">
                            <p>Instagram · @almadecriador</p>
                            <p>Facebook · Alma de Criador</p>
                        </div>
                    </div>
                </aside>
                
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
                                        placeholder="+34 603 85 94 05"
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