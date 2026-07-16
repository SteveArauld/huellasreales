@extends('layouts.app')

@section('title', 'Quiénes Somos — Alma de Criador')

@push('styles')

@endpush

@section('content')
<main class="flex-1"><!--$--><!--/$-->
    <section class="pt-40 pb-20 lg:pt-52 lg:pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Quiénes somos</p>
            <h1 class="mt-6 max-w-4xl text-[clamp(2.6rem,5vw,5rem)] leading-[1.02]">15 años de excelencia <span class="italic">en cría ética.</span></h1>
            <div class="mt-10 max-w-2xl text-lg leading-relaxed text-anthracite-soft">Fundada en 2010, Alma de Criador nació con una misión simple: conectar a las familias españolas con cachorros sanos y bien socializados, procedentes de prácticas de cría éticas.</div>
        </div>
    </section>
    <section class="pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12"><img alt="Equipo de Alma de Criador con varios perros" width="1408" height="1760" loading="lazy" class="aspect-[16/9] w-full rounded-[4px] object-cover shadow-[var(--shadow-soft)]" src="https://noble-paw-showcase.lovable.app/__l5e/assets-v1/af839824-6660-47bc-83de-4a1424cc628a/about-team-dogs.jpg"></div>
    </section>
    <section class="pb-28 lg:pb-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-[1fr_1.4fr] lg:gap-24">
                <p class="eyebrow lg:pt-3">Nuestra historia</p>
                <div class="space-y-6 text-lg leading-relaxed text-anthracite-soft">
                    <p>Lo que comenzó como un pequeño negocio familiar se ha convertido en una fuente de confianza para familias de toda España. Atendemos a más de 3000 familias en todas las provincias, siempre con el mismo compromiso de cercanía y honestidad.</p>
                    <p>Aquí no solo encontrará a su nuevo compañero de cuatro patas, sino también todos los consejos y el apoyo que necesita para su cuidado: consejos de alimentación, accesorios recomendados y pautas para una adaptación exitosa al hogar. Nuestra experiencia y pasión por los animales nos convierten en un referente en la venta responsable de cachorros en España.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-2 lg:gap-24">
                <div>
                    <p class="eyebrow">Nuestra misión</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Creando familias <span class="italic">perfectas.</span></h2>
                    <p class="mt-8 leading-relaxed text-anthracite-soft">En Alma de Criador, creemos que cada familia merece el compañero cachorro perfecto, y cada cachorro merece un hogar amoroso para siempre. Nuestra misión va más allá de la cría: somos ensambladores de familias, creando conexiones que duran toda la vida.</p>
                </div>
                <div class="space-y-8">
                    <div class="border-l border-sage pl-6">
                        <h3 class="font-serif text-2xl">Normas éticas de cría</h3>
                        <p class="mt-2 leading-relaxed text-muted-ink">Programas de cría responsables, sin excesos, centrados en la salud y el bienestar animal.</p>
                    </div>
                    <div class="border-l border-sage pl-6">
                        <h3 class="font-serif text-2xl">Enfoque de entorno familiar</h3>
                        <p class="mt-2 leading-relaxed text-muted-ink">Los cachorros crecen en casa, socializados desde el primer día con personas y estímulos cotidianos.</p>
                    </div>
                    <div class="border-l border-sage pl-6">
                        <h3 class="font-serif text-2xl">Programa integral de salud</h3>
                        <p class="mt-2 leading-relaxed text-muted-ink">Controles veterinarios, vacunación completa y seguimiento clínico desde antes del nacimiento.</p>
                    </div>
                    <div class="border-l border-sage pl-6">
                        <h3 class="font-serif text-2xl">Filosofía de apoyo de por vida</h3>
                        <p class="mt-2 leading-relaxed text-muted-ink">No cerramos la puerta tras la entrega. Estamos disponibles para resolver dudas durante toda la vida del perro.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-[1fr_1.4fr] lg:gap-24">
                <div>
                    <p class="eyebrow">Nuestro centro de cría</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Excelencia ética <span class="italic">en acción.</span></h2>
                </div>
                <div class="space-y-10 text-lg leading-relaxed text-anthracite-soft">
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <p class="font-serif text-2xl text-anthracite">Registro oficial</p>
                            <p class="mt-2">ES410490000237</p>
                        </div>
                        <div>
                            <p class="font-serif text-2xl text-anthracite">Licencia del centro</p>
                            <p class="mt-2">Centro de cría registrado ante las autoridades españolas.</p>
                        </div>
                    </div>
                    <p>Colaboramos con veterinarios certificados en Madrid, Barcelona y Valencia para garantizar un seguimiento clínico continuo.</p>
                    <div>
                        <p class="font-serif text-2xl text-anthracite">Membresías profesionales</p>
                        <ul class="mt-4 list-disc space-y-2 pl-5 text-muted-ink">
                            <li>Real Sociedad Canina de España (RSCE)</li>
                            <li>Asociación Española de Criadores Caninos</li>
                            <li>Afiliaciones a la Unión Canina Europea</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Nuestra filosofía de cría</p>
            <h2 class="mt-6 max-w-4xl text-4xl leading-tight lg:text-5xl">Calidad por encima <span class="italic">de la cantidad.</span></h2>
            <div class="mt-16 grid gap-12 md:grid-cols-2 lg:grid-cols-4">
                <div>
                    <p class="font-serif text-2xl">Excelencia en salud</p>
                    <p class="mt-4 leading-relaxed text-muted-ink">Cada perro reproductor se somete a pruebas de salud exhaustivas.</p>
                </div>
                <div>
                    <p class="font-serif text-2xl">Selección de temperamento</p>
                    <p class="mt-4 leading-relaxed text-muted-ink">Solo los perros con temperamentos excepcionales forman parte de nuestro programa.</p>
                </div>
                <div>
                    <p class="font-serif text-2xl">Diversidad genética</p>
                    <p class="mt-4 leading-relaxed text-muted-ink">Planes de cría meticulosos para mantener líneas genéticas sanas.</p>
                </div>
                <div>
                    <p class="font-serif text-2xl">Desarrollo temprano</p>
                    <p class="mt-4 leading-relaxed text-muted-ink">Nutrición y cuidados óptimos desde la concepción hasta la adopción.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">El proceso Alma de Criador</p>
            <h2 class="mt-6 max-w-4xl text-4xl leading-tight lg:text-5xl">Transparencia <span class="italic">en cada etapa.</span></h2>
            <div class="mt-16 grid gap-12 md:grid-cols-2 lg:grid-cols-3">
                <div class="border-t border-hairline pt-8">
                    <p class="text-sm uppercase tracking-[0.18em] text-sage-deep">Fase 1</p>
                    <h3 class="mt-4 font-serif text-2xl">Pre-reproducción</h3>
                    <p class="mt-4 leading-relaxed text-muted-ink">Pruebas de salud completas para las parejas reproductoras, análisis de compatibilidad genética, acondicionamiento nutricional e inicio de la búsqueda de hogares para las camadas esperadas.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="text-sm uppercase tracking-[0.18em] text-sage-deep">Fase 2</p>
                    <h3 class="mt-4 font-serif text-2xl">Gestación y parto</h3>
                    <p class="mt-4 leading-relaxed text-muted-ink">Seguimiento veterinario experto durante la gestación, nutrición óptima y cuidados prenatales, asistencia profesional durante el parto y evaluación inmediata de los recién nacidos.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="text-sm uppercase tracking-[0.18em] text-sage-deep">Fase 3</p>
                    <h3 class="mt-4 font-serif text-2xl">Desarrollo temprano</h3>
                    <p class="mt-4 leading-relaxed text-muted-ink">Seguimiento de salud diario, socialización progresiva, evaluación y documentación individual de la personalidad y actualizaciones semanales para las familias.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="text-sm uppercase tracking-[0.18em] text-sage-deep">Fase 4</p>
                    <h3 class="mt-4 font-serif text-2xl">Preparación familiar</h3>
                    <p class="mt-4 leading-relaxed text-muted-ink">Autorizaciones y certificaciones sanitarias finales, orientación para la preparación del hogar y coordinación de la entrega.</p>
                </div>
                <div class="border-t border-hairline pt-8">
                    <p class="text-sm uppercase tracking-[0.18em] text-sage-deep">Fase 5</p>
                    <h3 class="mt-4 font-serif text-2xl">Entrega y seguimiento</h3>
                    <p class="mt-4 leading-relaxed text-muted-ink">Servicio profesional de entrega en toda España, documentación completa, control posterior a la entrega a las 48 horas y apoyo continuo de por vida.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-2 lg:gap-24">
                <div>
                    <p class="eyebrow">Nuestro compromiso</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Garantías de salud <span class="italic">en las que puede confiar.</span></h2>
                    <ul class="mt-10 list-disc space-y-3 pl-5 leading-relaxed text-anthracite-soft">
                        <li>Garantía de salud genética: cobertura de 2 años para enfermedades hereditarias.</li>
                        <li>Cobertura completa para problemas de salud congénitos.</li>
                        <li>Serie completa de vacunas antes de la entrega.</li>
                        <li>Historial veterinario completo y certificaciones.</li>
                    </ul>
                </div>
                <div>
                    <p class="eyebrow">Excelencia en el servicio</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Atención <span class="italic">de verdad.</span></h2>
                    <ul class="mt-10 list-disc space-y-3 pl-5 leading-relaxed text-anthracite-soft">
                        <li>Consulta pre-compra gratuita de selección de raza y compatibilidad familiar.</li>
                        <li>Recursos de formación y materiales de orientación.</li>
                        <li>Línea de emergencia 24/7 para problemas de salud urgentes.</li>
                        <li>Orientación continua para adiestramiento, salud y comportamiento.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Testimonios reales</p>
            <h2 class="mt-6 max-w-4xl text-4xl leading-tight lg:text-5xl">Por qué las familias <span class="italic">eligen Alma de Criador.</span></h2>
            <div class="mt-16 grid gap-12 md:grid-cols-3">
                <div class="flex flex-col justify-between border-t border-hairline pt-8">
                    <p class="italic leading-relaxed text-anthracite-soft">"Después de buscar numerosos criadores por toda España, Alma de Criador destacó por su transparencia y profesionalidad. Nuestro Golden Retriever llegó perfectamente sano y bien socializado. El apoyo continuo ha sido invaluable."</p>
                    <p class="mt-8 text-sm uppercase tracking-[0.18em] text-sage-deep">— Familia Rodríguez, Sevilla</p>
                </div>
                <div class="flex flex-col justify-between border-t border-hairline pt-8">
                    <p class="italic leading-relaxed text-anthracite-soft">"Como veterinarios, quedamos impresionados por los protocolos sanitarios y las prácticas de cría. Nuestra Teckel es un ejemplo perfecto de cría responsable."</p>
                    <p class="mt-8 text-sm uppercase tracking-[0.18em] text-sage-deep">— Dr. Herrera y Dra. Sánchez, Barcelona</p>
                </div>
                <div class="flex flex-col justify-between border-t border-hairline pt-8">
                    <p class="italic leading-relaxed text-anthracite-soft">"El equipo de Alma de Criador no solo nos entregó un cachorro, sino que nos acogió en su gran familia. El apoyo continúa dos años después."</p>
                    <p class="mt-8 text-sm uppercase tracking-[0.18em] text-sage-deep">— Familia Jiménez, Madrid</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-ivory-deep py-28 lg:py-36">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-[1fr_1.4fr] lg:gap-24">
                <div>
                    <p class="eyebrow">Instalaciones y localización</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Un espacio pensado <span class="italic">para ellos.</span></h2>
                </div>
                <div class="space-y-6 text-lg leading-relaxed text-anthracite-soft">
                    <p>Instalaciones de cría modernas y climatizadas, diseñadas para el desarrollo óptimo de los cachorros. Contamos con áreas específicas de socialización, espacios de ejercicio al aire libre y protocolos médicos de nivel veterinario.</p>
                    <p>Ofrecemos visitas virtuales para que pueda conocer el entorno de nuestros cachorros desde cualquier punto de España.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-28 lg:py-40">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-16 lg:grid-cols-2 lg:gap-24">
                <div>
                    <p class="eyebrow">Implicación comunitaria</p>
                    <h2 class="mt-6 text-4xl leading-tight lg:text-5xl">Apoyo al bienestar <span class="italic">animal en España.</span></h2>
                </div>
                <div class="space-y-8">
                    <div class="border-l border-sage pl-6">
                        <h3 class="font-serif text-2xl">Apoyo a refugios locales</h3>
                        <p class="mt-2 leading-relaxed text-muted-ink">Donaciones regulares y apoyo voluntario a refugios de animales.</p>
                    </div>
                    <div class="border-l border-sage pl-6">
                        <h3 class="font-serif text-2xl">Programas educativos</h3>
                        <p class="mt-2 leading-relaxed text-muted-ink">Seminarios gratuitos sobre tenencia responsable de mascotas.</p>
                    </div>
                    <div class="border-l border-sage pl-6">
                        <h3 class="font-serif text-2xl">Colaboraciones con rescates</h3>
                        <p class="mt-2 leading-relaxed text-muted-ink">Trabajo conjunto con organizaciones de rescate especializadas en razas.</p>
                    </div>
                    <div class="border-l border-sage pl-6">
                        <h3 class="font-serif text-2xl">Responsabilidad medioambiental</h3>
                        <p class="mt-2 leading-relaxed text-muted-ink">Operaciones de cría respetuosas con el medio ambiente y gestión profesional de residuos.</p>
                    </div>
                </div>
            </div>
            <div class="mt-24 border-t border-hairline pt-10"><a href="/contact" class="btn-primary"><svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>Visitar el criadero</a></div>
        </div>
    </section>
</main>
@endsection