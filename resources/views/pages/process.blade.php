@extends('layouts.app')

@section('title', 'Proceso de Adopción — Alma de Criador')

@push('styles')

@endpush

@section('content')
<main class="flex-1"><!--$--><!--/$-->
    <section class="pt-40 pb-20 lg:pt-52 lg:pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Proceso de adopción</p>
            <h1 class="mt-6 max-w-4xl text-[clamp(2.6rem,5vw,5rem)] leading-[1.02]">Seis pasos, <span class="italic">sin sorpresas.</span></h1>
            <div class="mt-10 max-w-2xl text-lg leading-relaxed text-anthracite-soft">Una adopción responsable empieza mucho antes de la entrega. Este es nuestro proceso, exactamente como lo recorrerá usted.</div>
        </div>
    </section>
    <section class="pb-28 lg:pb-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <ol class="divide-y divide-hairline border-y border-hairline">
                <li class="grid grid-cols-[auto_1fr] gap-8 py-10 lg:grid-cols-[6rem_1fr_2fr] lg:gap-16 lg:py-14"><span class="font-serif text-3xl text-sage lg:text-4xl">01</span>
                    <h3 class="font-serif text-2xl lg:text-3xl">Conversación inicial</h3>
                    <p class="col-span-2 leading-relaxed text-anthracite-soft lg:col-span-1">Hablamos sin compromiso para entender su hogar, sus expectativas y la raza adecuada.</p>
                </li>
                <li class="grid grid-cols-[auto_1fr] gap-8 py-10 lg:grid-cols-[6rem_1fr_2fr] lg:gap-16 lg:py-14"><span class="font-serif text-3xl text-sage lg:text-4xl">02</span>
                    <h3 class="font-serif text-2xl lg:text-3xl">Reserva de camada</h3>
                    <p class="col-span-2 leading-relaxed text-anthracite-soft lg:col-span-1">Si encajan, le presentamos la camada disponible o le incluimos en lista de espera.</p>
                </li>
                <li class="grid grid-cols-[auto_1fr] gap-8 py-10 lg:grid-cols-[6rem_1fr_2fr] lg:gap-16 lg:py-14"><span class="font-serif text-3xl text-sage lg:text-4xl">03</span>
                    <h3 class="font-serif text-2xl lg:text-3xl">Visita o videollamada</h3>
                    <p class="col-span-2 leading-relaxed text-anthracite-soft lg:col-span-1">Conozca el criadero, a los padres y el lugar donde ha nacido su cachorro.</p>
                </li>
                <li class="grid grid-cols-[auto_1fr] gap-8 py-10 lg:grid-cols-[6rem_1fr_2fr] lg:gap-16 lg:py-14"><span class="font-serif text-3xl text-sage lg:text-4xl">04</span>
                    <h3 class="font-serif text-2xl lg:text-3xl">Preparación</h3>
                    <p class="col-span-2 leading-relaxed text-anthracite-soft lg:col-span-1">Vacunas, microchip, desparasitación y documentación a punto.</p>
                </li>
                <li class="grid grid-cols-[auto_1fr] gap-8 py-10 lg:grid-cols-[6rem_1fr_2fr] lg:gap-16 lg:py-14"><span class="font-serif text-3xl text-sage lg:text-4xl">05</span>
                    <h3 class="font-serif text-2xl lg:text-3xl">Entrega o envío</h3>
                    <p class="col-span-2 leading-relaxed text-anthracite-soft lg:col-span-1">Recogida en el criadero o envío nacional con transportista especializado.</p>
                </li>
                <li class="grid grid-cols-[auto_1fr] gap-8 py-10 lg:grid-cols-[6rem_1fr_2fr] lg:gap-16 lg:py-14"><span class="font-serif text-3xl text-sage lg:text-4xl">06</span>
                    <h3 class="font-serif text-2xl lg:text-3xl">Acompañamiento</h3>
                    <p class="col-span-2 leading-relaxed text-anthracite-soft lg:col-span-1">Asesoría veterinaria y conductual durante toda la vida del animal.</p>
                </li>
            </ol>
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-2 lg:gap-24">
                <div>
                    <p class="eyebrow">Envío</p>
                    <h2 class="mt-6 text-4xl leading-tight">Llegamos a toda España con cuidado.</h2>
                    <p class="mt-6 leading-relaxed text-anthracite-soft">Trabajamos con transportistas certificados especializados en animales. Cada viaje se coordina personalmente, con seguimiento desde la salida hasta la llegada. También puede recoger su cachorro en el criadero.</p>
                </div>
                <div>
                    <p class="eyebrow">Garantía sanitaria</p>
                    <h2 class="mt-6 text-4xl leading-tight">Compromiso real, por escrito.</h2>
                    <p class="mt-6 leading-relaxed text-anthracite-soft">Todos nuestros animales se entregan con contrato de garantía sanitaria, cartilla veterinaria completa, microchip oficial y pedigree cuando corresponde. Asesoría veterinaria y conductual de por vida.</p>
                </div>
            </div>
            <div class="mt-16 border-t border-hairline pt-10"><a href="/contact" class="btn-primary"><svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>Iniciar el proceso</a></div>
        </div>
    </section>
</main>
@endsection