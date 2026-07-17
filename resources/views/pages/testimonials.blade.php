@extends('layouts.app')

@section('title', 'Referencias y Opiniones — Alma de Criador')

@push('styles')

@endpush

@section('content')
<main class="flex-1"><!--$--><!--/$-->
    <section class="pt-40 pb-20 lg:pt-52 lg:pb-28">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="eyebrow">Referencias</p>
            <h1 class="mt-6 max-w-4xl text-[clamp(2.6rem,5vw,5rem)] leading-[1.02]">Vea lo que dicen <span class="italic">los clientes.</span></h1>
            <div class="mt-10 max-w-2xl text-lg leading-relaxed text-anthracite-soft">La mejor descripción de Alma de Criador no la escribimos nosotros. La escriben las familias que ya forman parte de nuestra casa, con la voz —y las fotos— de sus cachorros.</div>
        </div>
    </section>
    <section class="bg-ivory pb-16 lg:pb-24">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Maltipoo de Laura y Martínez Sánchez" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/testim-maltipoo.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Compramos nuestro maltipoo en Alma de Criador y no podríamos estar más contentos. Es juguetón, cariñoso y llegó a casa perfectamente cuidado. El transporte fue seguro y rápido, y nos enviaron fotos y videos antes de la entrega. ¡Mil gracias por todo!</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Laura y Martínez Sánchez</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>24.11.2025</span><span class="text-sage">Maltipoo</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Caniche de Isabel M., Barcelona" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/testim-poodle.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Buscábamos un Caniche sano y de buen linaje desde hacía meses, y lo encontramos aquí. Todo el proceso fue muy claro, nos explicaron la alimentación y los cuidados, e hicieron un seguimiento después de la entrega. Nuestro pequeño Toby es un amor.</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Isabel M., Barcelona</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>01.12.2025</span><span class="text-sage">Caniche</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Maltipoo de Natalia" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/testim-maltipoos.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Recibimos a nuestra pequeña hembra maltipoo hace dos semanas y ya forma parte de la familia. Llegó vacunada, desparasitada y con su cartilla sanitaria al día. Se nota que está criada con amor. No dudaría en comprarles de nuevo.</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Natalia</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>20.04.2025</span><span class="text-sage">Maltipoo</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Carlino / Pug de Familia Martínez" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/testim-pug.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Mi hijo siempre quiso un carlino, y gracias a Alma de Criador ahora tenemos a Bruno en casa. Es sano, alegre y muy sociable. La entrega fue impecable y el servicio al cliente excelente.</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Familia Martínez</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>09.08.2024</span><span class="text-sage">Carlino / Pug</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Cane Corso de Pablo y Marta" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/cane-corso.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Quería un cane corso para compañía y protección, y me entregaron un cachorro magnífico y equilibrado. Me aconsejaron sobre su adiestramiento y alimentación. Profesionalidad total.</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Pablo y Marta</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>10.03.2025</span><span class="text-sage">Cane Corso</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Pomerania de Sonia" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/pomeranian.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Adoptamos un pomerania y fue la mejor decisión. Es activo, inteligente y muy cariñoso. La garantía de salud nos dio mucha tranquilidad. ¡Gracias por cuidar tanto de sus cachorros!</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Sonia</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>11.10.2025</span><span class="text-sage">Pomerania</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Labrador de José C." loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/testim-labrador.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Nuestro labrador Max es un amor con los niños. Llegó limpio, con buen peso y toda su documentación. Se nota la seriedad y el compromiso de esta cría. Muy recomendado.</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">José C.</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>20.05.2024</span><span class="text-sage">Labrador</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Teckel de Yvonne, Murcia" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/dachshund.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Siempre quise un teckel y me preocupaba encontrar un criador serio. Aquí encontré profesionalidad, buena genética y un acompañamiento constante. Mi cachorro es fuerte y está sano.</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Yvonne, Murcia</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>01.06.2025</span><span class="text-sage">Teckel</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Bulldog Francés de Roberto" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/french-bulldog.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Recibimos nuestro bulldog francés hace un mes y es la alegría de la casa. Es sano, juguetón y muy cariñoso. Todo el proceso fue sencillo y sin sorpresas.</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Roberto</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>08.12.2024</span><span class="text-sage">Bulldog Francés</span></div>
                        </figcaption>
                    </div>
                </figure>
                <figure class="group flex flex-col overflow-hidden rounded-[10px] bg-white shadow-[0_6px_24px_-12px_rgba(0,0,0,0.25)] ring-1 ring-black/5 transition-shadow duration-300 hover:shadow-[0_10px_32px_-10px_rgba(0,0,0,0.35)]">
                    <div class="overflow-hidden"><img alt="Cachorro Bulldog Francés de Andrés" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.04]" src="/assets/images/french-bulldogs.jpg"></div>
                    <div class="flex flex-1 flex-col p-6 lg:p-8">
                        <p class="font-serif text-3xl leading-none text-sage">“</p>
                        <blockquote class="mt-2 flex-1 font-serif text-base italic leading-relaxed text-anthracite lg:text-lg">Compré mi bulldog francés aquí y estoy encantada. Llegó feliz, bien cuidado y adaptado. Me dieron todas las indicaciones para su cuidado y hasta hoy responden a todas mis preguntas.</blockquote>
                        <figcaption class="mt-6 border-t border-hairline pt-5">
                            <p class="text-sm font-medium text-anthracite">Andrés</p>
                            <div class="mt-1 flex items-center justify-between text-xs uppercase tracking-[0.16em] text-muted-ink"><span>29.10.2025</span><span class="text-sage">Bulldog Francés</span></div>
                        </figcaption>
                    </div>
                </figure>
            </div>
        </div>
    </section>
    <section class="pb-24 lg:pb-32">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <div class="mx-auto max-w-3xl rounded-[10px] bg-white/70 p-8 text-center shadow-[0_6px_24px_-12px_rgba(0,0,0,0.2)] ring-1 ring-black/5 backdrop-blur-sm lg:p-12">
                <p class="eyebrow">Su experiencia</p>
                <h2 class="mt-6 text-[clamp(1.6rem,2.8vw,2.4rem)] leading-[1.08]">Publique su <span class="italic">reseña</span></h2>
                <p class="mt-4 text-sm leading-relaxed text-anthracite-soft lg:text-base">¿Ya tiene a su cachorro en casa? Comparta unas palabras y una foto: nos encanta ver crecer a los pequeños de Alma de Criador en su nueva familia.</p><a href="/contact" class="mt-8 inline-flex items-center justify-center gap-2 rounded-full bg-white/60 px-6 py-3 text-xs uppercase tracking-[0.16em] text-anthracite shadow-sm ring-1 ring-black/5 backdrop-blur-sm transition-colors hover:bg-sage/20"><svg viewBox="0 0 24 24" fill="currentColor" class="size-3.5 text-sage" aria-hidden="true">
                        <path d="M12 11c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4z"></path>
                        <ellipse cx="5.8" cy="9" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="10.2" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="13.8" cy="5.5" rx="1.8" ry="2.3"></ellipse>
                        <ellipse cx="18.2" cy="9" rx="1.8" ry="2.3"></ellipse>
                    </svg>Enviar mi reseña</a>
            </div>
        </div>
    </section>
</main>
@endsection