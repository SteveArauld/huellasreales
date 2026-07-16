@extends('layouts.app')

@section('title', 'Entrega de Cachorros — Alma de Criador')

@push('styles')

@endpush

@section('content')
<main class="flex-1"><!--$--><!--/$-->
    <section class="pt-40 pb-20 lg:pt-52 lg:pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Entrega de cachorros</p>
            <h1 class="mt-6 max-w-4xl text-[clamp(2.6rem,5vw,5rem)] leading-[1.02]">De nuestra casa <span class="italic">a la suya.</span></h1>
            <div class="mt-10 max-w-2xl text-lg leading-relaxed text-anthracite-soft">Transporte especializado, seguimiento en vivo y entrega puerta a puerta. Cada cachorro viaja con la misma calidez con la que ha sido criado.</div>
        </div>
    </section>
    <section class="pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12"><img alt="Cachorro en un transportín cómodo preparado para viajar" width="1408" height="1760" loading="lazy" class="aspect-[16/9] w-full rounded-[4px] object-cover shadow-[var(--shadow-soft)]" src="/assets/images/hero-puppy.jpg"></div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid items-center gap-16 lg:grid-cols-2 lg:gap-24">
                <div>
                    <p class="eyebrow">Transporte</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Viajes pensados para que un cachorro se sienta <span class="italic">acompañado.</span></h2>
                    <p class="mt-8 leading-relaxed text-anthracite-soft">Colaboramos con transportistas especializados en animales vivos. El vehículo está climatizado, las jaulas son homologadas y el trayecto incluye paradas de hidratación y descanso.</p>
                </div><img alt="Criador sosteniendo un cachorro antes del viaje" width="1600" height="1200" loading="lazy" class="aspect-[4/3] w-full rounded-[4px] object-cover shadow-[var(--shadow-soft)]" src="/assets/images/about-hands.jpg">
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Cómo funciona</p>
            <div class="mt-10 grid gap-12 md:grid-cols-3">
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Reserva</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">El cachorro queda reservado con un contrato y se planifica la fecha de entrega.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Preparación</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Pasamos revisión veterinaria, desparasitación y entregamos cartilla, microchip y documentación.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Llegada</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">El transporte le avisa con la hora. Al recibirlo, revisamos juntos el estado del cachorro.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Cobertura</p>
            <h2 class="mt-6 max-w-3xl text-4xl leading-tight lg:text-5xl">Cobertura completa <span class="italic">en toda España.</span></h2>
            <p class="mt-8 max-w-2xl leading-relaxed text-anthracite-soft">Entrega en el mismo día disponible en las principales ciudades. Servimos también todas las provincias peninsulares, Baleares y Canarias con transporte especializado.</p>
            <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Madrid</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Área Metropolitana y comunidades colindantes</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Barcelona</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Región de Cataluña incluyendo la Costa Brava</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Valencia</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Comunidad Valenciana y costa mediterránea</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Sevilla</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Andalucía incluyendo Cádiz y Córdoba</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Zaragoza</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Región de Aragón y áreas circundantes</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Málaga</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Costa del Sol y Andalucía sur</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Murcia</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Región de Murcia y costa</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Palma de Mallorca</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Islas Baleares (arreglos especiales)</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Las Palmas</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">Islas Canarias (coordinación aérea)</p>
                </div>
                <div class="border-t border-hairline pt-6">
                    <p class="font-serif text-2xl">Bilbao</p>
                    <p class="mt-3 leading-relaxed text-anthracite-soft">País Vasco y regiones costeras del norte</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Opciones y horarios</p>
            <h2 class="mt-6 max-w-3xl text-4xl leading-tight lg:text-5xl">Soluciones de entrega <span class="italic">flexibles.</span></h2>
            <div class="mt-14 grid gap-10 md:grid-cols-2">
                <div class="border-t border-hairline pt-8">
                    <div class="flex flex-wrap items-baseline justify-between gap-4">
                        <p class="font-serif text-2xl">Entrega en mano</p>
                        <p class="text-sm uppercase tracking-[0.2em] text-anthracite-soft">150 – 350 €</p>
                    </div>
                    <ul class="mt-6 space-y-3 leading-relaxed text-anthracite-soft">
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Nuestro especialista entrega a domicilio</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Transportista profesional de animales</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Vehículo climatizado con equipo de seguridad</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Orientación completa a la llegada</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Disponible 7 días a la semana</span></li>
                    </ul>
                </div>
                <div class="border-t border-hairline pt-8">
                    <div class="flex flex-wrap items-baseline justify-between gap-4">
                        <p class="font-serif text-2xl">Punto de encuentro a medio camino</p>
                        <p class="text-sm uppercase tracking-[0.2em] text-anthracite-soft">75 – 200 €</p>
                    </div>
                    <ul class="mt-6 space-y-3 leading-relaxed text-anthracite-soft">
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Punto de encuentro conveniente</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Reduce coste y tiempo de entrega</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Áreas de servicio o clínicas veterinarias</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Incluye proceso de entrega completo</span></li>
                    </ul>
                </div>
                <div class="border-t border-hairline pt-8">
                    <div class="flex flex-wrap items-baseline justify-between gap-4">
                        <p class="font-serif text-2xl">Recogida en el aeropuerto</p>
                        <p class="text-sm uppercase tracking-[0.2em] text-anthracite-soft">200 – 400 €</p>
                    </div>
                    <ul class="mt-6 space-y-3 leading-relaxed text-anthracite-soft">
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Coordinación con aeropuertos españoles</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Principalmente Baleares y Canarias</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Transporte terrestre profesional al aeropuerto</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Documentación y certificados sanitarios</span></li>
                    </ul>
                </div>
                <div class="border-t border-hairline pt-8">
                    <div class="flex flex-wrap items-baseline justify-between gap-4">
                        <p class="font-serif text-2xl">Recogida por el cliente</p>
                        <p class="text-sm uppercase tracking-[0.2em] text-anthracite-soft">Gratis</p>
                    </div>
                    <ul class="mt-6 space-y-3 leading-relaxed text-anthracite-soft">
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Visita a nuestras instalaciones</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Conozca a los padres del cachorro</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Tour completo del centro de cría</span></li>
                        <li class="flex gap-3"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Horario flexible disponible</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-2 lg:gap-24">
                <div>
                    <p class="eyebrow">Estándares profesionales</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Seguridad y comodidad, <span class="italic">nuestra prioridad.</span></h2>
                    <p class="mt-8 leading-relaxed text-anthracite-soft">Equipo de transporte especializado con transportistas certificados por las autoridades españolas, más de 12 años de experiencia, formación veterinaria básica y soporte multilingüe.</p>
                </div>
                <ul class="space-y-4 leading-relaxed text-anthracite-soft">
                    <li class="flex gap-3 border-t border-hairline pt-4"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Vehículos climatizados con temperatura y humedad controladas</span></li>
                    <li class="flex gap-3 border-t border-hairline pt-4"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Transportines profesionales aprobados por la IATA</span></li>
                    <li class="flex gap-3 border-t border-hairline pt-4"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Cama confortable con olores familiares de la madre y camada</span></li>
                    <li class="flex gap-3 border-t border-hairline pt-4"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Agua y comida disponibles durante trayectos largos</span></li>
                    <li class="flex gap-3 border-t border-hairline pt-4"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Suministros de emergencia y primeros auxilios</span></li>
                    <li class="flex gap-3 border-t border-hairline pt-4"><span aria-hidden="true" class="mt-2 size-1.5 shrink-0 rounded-full bg-anthracite-soft"></span><span>Seguimiento GPS en tiempo real para las familias</span></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Plazos</p>
            <h2 class="mt-6 max-w-3xl text-4xl leading-tight lg:text-5xl">Un horario pensado <span class="italic">para su familia.</span></h2>
            <div class="mt-14 grid gap-12 md:grid-cols-3">
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Plazo estándar</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Reserva mínima de 48 h. Ventana de entrega de 2 h con 30–45 min de orientación completa.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Entrega urgente el mismo día</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Disponible en Madrid, Barcelona y Valencia con suplemento de 100 €. Reserva antes de las 12:00 h.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Fin de semana y festivos</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Servicio sábados, domingos y festivos hasta las 20:00 h. Suplemento de 50 €.</p>
                </div>
            </div>
            <div class="mt-20 border-t border-hairline pt-10"><a href="/contact" class="btn-primary"><svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>Consultar envío a mi zona</a></div>
        </div>
    </section>
</main>
@endsection