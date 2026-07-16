@extends('layouts.app')

@section('title', 'Garantía Sanitaria — Alma de Criador')

@push('styles')

@endpush

@section('content')
<main class="flex-1">
    <section class="pt-40 pb-20 lg:pt-52 lg:pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Garantía sanitaria</p>
            <h1 class="mt-6 max-w-4xl text-[clamp(2.6rem,5vw,5rem)] leading-[1.02]">Salud primero, <span class="italic">siempre.</span>
        </h1>
            <div class="mt-10 max-w-2xl text-lg leading-relaxed text-anthracite-soft">Respaldamos a cada cachorro con un programa de garantía sanitaria integral. Pruebas genéticas, colaboraciones veterinarias y prácticas de cría éticas para que el nuevo miembro de la familia comience su vida con la mejor salud.</div>
        </div>
    </section>
    <section class="pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <img alt="Cachorro recibiendo cuidados veterinarios" width="1408" height="1760" loading="lazy" class="aspect-[16/9] w-full rounded-[4px] object-cover shadow-[var(--shadow-soft)]" src="assets/images/hero-puppy-BJl9q9Gv.jpg">
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid items-start gap-16 lg:grid-cols-2 lg:gap-24"><img alt="Cachorros sanos y felices en el criadero" width="1600" height="1200" loading="lazy" class="aspect-[4/3] w-full rounded-[4px] object-cover shadow-[var(--shadow-soft)] lg:sticky lg:top-24" src="assets/images/breeds-collage-CSrPgl7r.jpg">
                <div>
                    <p class="eyebrow">Cobertura total — 2 años</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Garantía de salud <span class="italic">genética.</span></h2>
                    <p class="mt-6 leading-relaxed text-anthracite-soft">Condiciones cubiertas durante los primeros dos años de vida:</p>
                    <ul class="mt-6 space-y-3 leading-relaxed text-anthracite-soft">
                        <li>✓ Displasia de cadera y displasia de codo</li>
                        <li>✓ Atrofia Progresiva de Retina (APR) y otras afecciones oculares hereditarias</li>
                        <li>✓ Defectos cardíacos (congénitos y hereditarios)</li>
                        <li>✓ Epilepsia (formas genéticas)</li>
                        <li>✓ Shunts hepáticos y defectos renales</li>
                        <li>✓ Predisposición a la torsión/dilatación gástrica</li>
                        <li>✓ Afecciones genéticas específicas de la raza</li>
                        <li>✓ Trastornos del sistema inmunológico (hereditarios)</li>
                    </ul>
                    <p class="mt-10 font-serif text-2xl">Detalles de la cobertura</p>
                    <ul class="mt-4 space-y-3 leading-relaxed text-anthracite-soft">
                        <li>• Cachorro de reemplazo completo de igual o mayor valor</li>
                        <li>• Reembolso completo de los gastos veterinarios hasta el precio de compra</li>
                        <li>• Costes de transporte cubiertos para diagnóstico y tratamiento</li>
                        <li>• Sin franquicias ni copagos</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Cobertura — 1 año</p>
            <h2 class="mt-6 max-w-3xl text-4xl leading-tight lg:text-5xl">Garantía de defectos <span class="italic">congénitos.</span></h2>
            <p class="mt-6 max-w-2xl leading-relaxed text-anthracite-soft">Defectos de nacimiento cubiertos durante el primer año de vida del cachorro.</p>
            <ul class="mt-10 grid gap-4 leading-relaxed text-anthracite-soft md:grid-cols-2">
                <li class="border-t border-hairline pt-4">✓ Paladar hendido y otras malformaciones bucales</li>
                <li class="border-t border-hairline pt-4">✓ Hernias (inguinal, umbilical, diafragmática)</li>
                <li class="border-t border-hairline pt-4">✓ Deformidades de las extremidades y malformaciones articulares</li>
                <li class="border-t border-hairline pt-4">✓ Soplos cardíacos y defectos circulatorios</li>
                <li class="border-t border-hairline pt-4">✓ Anomalías del sistema digestivo</li>
                <li class="border-t border-hairline pt-4">✓ Defectos del sistema reproductivo</li>
                <li class="border-t border-hairline pt-4">✓ Problemas de desarrollo neurológico</li>
            </ul>
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Antes de la entrega</p>
            <h2 class="mt-6 max-w-3xl text-4xl leading-tight lg:text-5xl">Protocolos de salud <span class="italic">completos.</span></h2>
            <div class="mt-16 grid gap-16 lg:grid-cols-2 lg:gap-24">
                <div>
                    <p class="font-serif text-2xl">Pruebas en hembras reproductoras</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Todas nuestras reproductoras se someten a:</p>
                    <ul class="mt-6 space-y-3 leading-relaxed text-anthracite-soft">
                        <li>✓ Evaluación de caderas y codos — Evaluación veterinaria oficial</li>
                        <li>✓ Prueba de degeneración ocular — Examen oftalmológico anual</li>
                        <li>✓ Prueba de panel genético — Análisis de ADN específico de la raza</li>
                        <li>✓ Detección de cardiopatías — Examen y certificación cardíaca</li>
                        <li>✓ Prueba de brucelosis — Verificación de la salud reproductiva</li>
                        <li>✓ Evaluación general de salud — Examen físico y análisis de sangre completos</li>
                    </ul>
                </div>
                <div>
                    <p class="font-serif text-2xl">Cada cachorro recibe</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Documentación y cuidados veterinarios antes de la entrega:</p>
                    <ul class="mt-6 space-y-3 leading-relaxed text-anthracite-soft">
                        <li>✓ Examen físico completo por un veterinario titulado</li>
                        <li>✓ Serie de vacunas apropiada para la edad en el momento de la entrega</li>
                        <li>✓ Protocolo de desparasitación — Múltiples tratamientos completados</li>
                        <li>✓ Identificación por microchip — Registrado a nombre de la nueva familia</li>
                        <li>✓ Certificado de salud — Documentación veterinaria oficial</li>
                        <li>✓ Examen fecal — Detección de parásitos realizada</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Compromiso</p>
            <div class="mt-10 grid gap-12 md:grid-cols-3">
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Prevención</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Seleccionamos reproductores sanos y controlamos cada camada desde el primer día.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Transparencia</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Entregamos todos los informes veterinarios y respondemos a cualquier duda.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="font-serif text-2xl">Acompañamiento</p>
                    <p class="mt-4 leading-relaxed text-anthracite-soft">Estamos disponibles tras la entrega para resolver dudas sobre cuidados y salud.</p>
                </div>
            </div>
            <div class="mt-20 border-t border-hairline pt-10"><a href="/contact" class="btn-primary"><svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>Solicitar más información</a></div>
        </div>
    </section>
</main>
@endsection