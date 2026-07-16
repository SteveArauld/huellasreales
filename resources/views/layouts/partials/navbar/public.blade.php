<header class="fixed inset-x-0 top-0 z-50 border-b border-hairline/60 bg-ivory shadow-soft transition-shadow duration-500">
    <div class="mx-auto flex h-20 max-w-[1400px] items-center justify-between px-6 lg:px-12">
        <a aria-label="Alma de Criador — Inicio" class="flex items-center gap-3 active" href="/" data-status="active" aria-current="page">
            <img src="{{ asset("assets/logo/logo.png") }}" alt="Alma de Criador" class="h-16 w-auto lg:h-20">
        </a>
        
        <!-- Navigation desktop -->
        <nav class="hidden items-center gap-5 md:flex lg:gap-7">
            <a href="/about" class="text-[0.65rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite lg:text-[0.75rem] lg:tracking-[0.16em] ml-8 lg:ml-14">Quiénes Somos</a>
            <a href="/puppies" class="text-[0.65rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite lg:text-[0.75rem] lg:tracking-[0.16em]">Cachorros en Venta</a>
            <a href="/entrega" class="text-[0.65rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite lg:text-[0.75rem] lg:tracking-[0.16em]">Entrega de Cachorros</a>
            <a href="/garantia" class="text-[0.65rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite lg:text-[0.75rem] lg:tracking-[0.16em]">Garantía Sanitaria</a>
            <a href="/testimonials" class="text-[0.65rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite lg:text-[0.75rem] lg:tracking-[0.16em]">Referencias</a>
            <a href="/contact" class="text-[0.65rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite lg:text-[0.75rem] lg:tracking-[0.16em]">Contacto</a>
        </nav>
        
        <div class="flex items-center">
            <!-- Bouton menu mobile -->
            <button type="button" id="menu-toggle" class="grid size-10 place-items-center text-anthracite md:hidden" aria-label="Abrir menú" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu size-5" aria-hidden="true">
                    <path d="M4 5h16"></path>
                    <path d="M4 12h16"></path>
                    <path d="M4 19h16"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Menu mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-ivory border-t border-hairline/60 shadow-lg">
        <nav class="flex flex-col px-6 py-4 space-y-4">
            <a href="/about" class="text-[0.75rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite py-2 border-b border-hairline/30">Quiénes Somos</a>
            <a href="/puppies" class="text-[0.75rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite py-2 border-b border-hairline/30">Cachorros en Venta</a>
            <a href="/entrega" class="text-[0.75rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite py-2 border-b border-hairline/30">Entrega de Cachorros</a>
            <a href="/garantia" class="text-[0.75rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite py-2 border-b border-hairline/30">Garantía Sanitaria</a>
            <a href="/testimonials" class="text-[0.75rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite py-2 border-b border-hairline/30">Referencias</a>
            <a href="/contact" class="text-[0.75rem] uppercase tracking-[0.14em] text-anthracite-soft transition-colors hover:text-anthracite py-2">Contacto</a>
        </nav>
    </div>
</header>