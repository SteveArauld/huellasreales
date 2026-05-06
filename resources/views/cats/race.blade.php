@extends('layouts.app')

@section('title', __('cat.title'))

@push('styles')
    <title>Chats disponibles à l'adoption</title>
    @include('pages.style')
    @vite(['resources/css/cachorrosraza.css'])
@endpush

@section('content')
    <div class="brz brz-root__container brz-reset-all brz-root__container-page">
        @include('layouts.partials.navbar.public')

        <section id="ltlhaqxzoeblarrokduunyqtwldpfdlncfdo_ltlhaqxzoeblarrokduunyqtwldpfdlncfdo"
                 class="brz-section brz-css-1n9lki8 brz-css-odpsmd">
            <div class="brz-section__content brz-section--fullWidth brz-css-4gngvf brz-css-cqqdo0"
                 data-brz-custom-id="rzsygsieciuzhgjanunddjlnqxaocfyjzgpk">
                <div class="brz-bg">
                    <div class="brz-bg-color"></div>
                    <div class="brz-bg-shape brz-bg-shape__top"></div>
                    <div class="brz-bg-shape brz-bg-shape__bottom"></div>
                </div>
                <div class="brz-container brz-css-ysn7u8 brz-css-k7a7t7">
                    <div id="" class="brz-css-1ulcrds brz-css-3xs40p brz-wrapper">
                        <div class="brz-rich-text brz-rich-text__custom brz-css-vqm1om brz-css-okdzvu"
                             data-brz-custom-id="kDeePsojQlbq">
                            <div data-brz-translate-text="1">
                                <p data-generated-css="brz-css-jDOhI" data-uniq-id="spodJ"
                                   class="brz-text-lg-center brz-tp-lg-empty brz-ff-comfortaa brz-ft-google brz-fs-lg-46 brz-fss-lg-px brz-fw-lg-700 brz-ls-lg-m_1_5 brz-lh-lg-1_3 brz-vfw-lg-400 brz-fwdth-lg-100 brz-fsft-lg-0 brz-css-eWxyk">
                                    <span style="color: rgba(var(--brz-global-color8),1);" class="brz-cp-color8">{{ __('cats_available') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="dogs-grid-wrapper">
                        <div class="dogs-grid-container">
                            <div class="dogs-grid">
                                @foreach($cats as $cat)
                                    <div class="dog-card">
                                        <div class="dog-image-wrapper">
                                            <a href="{{ route('cats.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]) }}"
                                               class="dog-image-link">
                                                @php
                                                    $images = is_string($cat->images) ? json_decode($cat->images, true) : $cat->images;
                                                @endphp
                                                @if(!empty($images) && count($images) > 0)
                                                    <picture>
                                                        <source srcset="{{ asset($images[1] ?? $images[0]) }} 1x"
                                                                media="(min-width: 992px)">
                                                        <source srcset="{{ asset($images[2] ?? $images[0]) }} 1x"
                                                                media="(min-width: 768px)">
                                                        <img decoding="async"
                                                             class="dog-image"
                                                             src="{{ asset($images[0]) }}"
                                                             loading="lazy"
                                                             alt="{{ $cat->nom }}"
                                                             title="{{ $cat->nom }}">
                                                    </picture>
                                                @else
                                                    <div class="dog-image-placeholder">
                                                        <span>{{ substr($cat->nom, 0, 1) ?? '🐱' }}</span>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>

                                        <div class="dog-info">
                                            <h3 class="dog-name">
                                                <a href="{{ route('cats.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]) }}">
                                                    {{ $cat->nom }}
                                                </a>
                                            </h3>

                                            <div class="dog-breed">
                                                <span class="breed-badge">{{ $cat->race }}</span>
                                            </div>

                                            <div class="dog-features">
                                                @if($cat->age_mois)
                                                    <p class="dog-feature-text">
                                                        <strong>{{ __('age_months') }}:</strong> {{ $cat->age_mois }} mois
                                                    </p>
                                                @endif
                                                @if($cat->sexe)
                                                    <p class="dog-feature-text">
                                                        <strong>{{ __('sex') }}:</strong> {{ $cat->sexe == 'male' ? 'Mâle' : 'Femelle' }}
                                                    </p>
                                                @endif
                                                <p class="dog-feature-text">
                                                    <strong>{{ __('health_status') }}</strong>
                                                </p>
                                            </div>

                                            <a class="dog-details-btn"
                                               href="{{ route('cats.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]) }}">
                                                <span>{{ __('adopt_reserve_now') }}</span>
                                                <svg class="brz-icon-svg align-[initial] brz-css-s9vtaz brz-css-1d8crnm">
                                                    <use href="/wp-content/plugins/brizy/public/editor-build/prod/editor/icons/glyph/paw.svg#nc_icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if(is_object($cats) && method_exists($cats, 'links'))
                                <div class="pagination-wrapper">
                                    {{ $cats->links('vendor.pagination.custom') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <style>
                        /* Vos styles restent identiques */
                        .dogs-grid-wrapper {
                            width: 100%;
                            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
                        }

                        .dogs-grid-container {
                            max-width: 1400px;
                            margin: 0 auto;
                            padding: 1rem;
                        }

                        .dogs-grid {
                            display: grid;
                            gap: 1rem;
                            grid-template-columns: repeat(2, 1fr);
                        }

                        .dog-card {
                            background: white;
                            border-radius: 16px;
                            overflow: hidden;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                            transition: all 0.3s ease;
                            border: 1px solid #f0f0f0;
                            display: flex;
                            flex-direction: column;
                            height: 100%;
                        }

                        .dog-card:hover {
                            transform: translateY(-4px);
                            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
                        }

                        .dog-image-wrapper {
                            position: relative;
                            padding-top: 100%;
                            overflow: hidden;
                            background: #f8f8f8;
                        }

                        .dog-image-link {
                            display: block;
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            top: 0;
                            left: 0;
                        }

                        .dog-image {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            transition: transform 0.5s ease;
                        }

                        .dog-card:hover .dog-image {
                            transform: scale(1.1);
                        }

                        .dog-image-placeholder {
                            width: 100%;
                            height: 100%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            color: white;
                            font-size: 2.5rem;
                            font-weight: 600;
                        }

                        .dog-info {
                            padding: 1rem;
                            flex: 1;
                            display: flex;
                            flex-direction: column;
                        }

                        .dog-name {
                            font-size: 1rem;
                            font-weight: 700;
                            margin: 0 0 0.5rem 0;
                            line-height: 1.3;
                        }

                        .dog-name a {
                            color: #1f2937;
                            text-decoration: none;
                            transition: color 0.3s ease;
                        }

                        .dog-name a:hover {
                            color: #667eea;
                        }

                        .dog-breed {
                            margin-bottom: 0.5rem;
                        }

                        .breed-badge {
                            display: inline-block;
                            padding: 0.2rem 0.6rem;
                            background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
                            color: #667eea;
                            font-size: 0.7rem;
                            font-weight: 600;
                            border-radius: 10px;
                            border: 1px solid rgba(102, 126, 234, 0.2);
                        }

                        .dog-features {
                            margin: 0.5rem 0 1rem 0;
                            flex: 1;
                        }

                        .dog-feature-text {
                            margin: 0;
                            font-size: 0.8rem;
                            line-height: 1.4;
                        }

                        .dog-feature-text a {
                            color: #6b7280;
                            text-decoration: none;
                            transition: color 0.3s ease;
                        }

                        .dog-feature-text a:hover {
                            color: #667eea;
                        }

                        .dog-details-btn {
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            gap: 0.5rem;
                            padding: 0.6rem 1rem;
                            background: linear-gradient(135deg, rgb(251, 139, 67) 0%, rgb(251, 139, 67) 100%);
                            color: white;
                            border: none;
                            border-radius: 10px;
                            font-size: 0.8rem;
                            font-weight: 600;
                            text-decoration: none;
                            transition: all 0.3s ease;
                            cursor: pointer;
                            margin-top: auto;
                            width: 100%;
                            box-shadow: 0 4px 12px rgba(251, 139, 67, 0.3);
                            min-width: 0;
                        }

                        .dog-details-btn:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 6px 16px rgba(251, 139, 67, 0.4);
                        }

                        @media screen and (max-width: 640px) {
                            .dog-details-btn {
                                font-size: 0.7rem;
                                padding: 0.5rem 0.75rem;
                                gap: 0.4rem;
                            }
                        }

                        @media screen and (max-width: 380px) {
                            .dog-details-btn {
                                font-size: 0.6rem;
                                padding: 0.4rem 0.6rem;
                                gap: 0.25rem;
                            }
                        }

                        @media screen and (max-width: 340px) {
                            .dog-details-btn {
                                flex-direction: column;
                                gap: 0.15rem;
                                padding: 0.5rem 0.25rem;
                            }

                            .dog-details-btn span {
                                white-space: normal;
                                text-overflow: clip;
                                font-size: 0.55rem;
                            }
                        }

                        .pagination-wrapper {
                            margin-top: 2.5rem;
                            text-align: center;
                        }

                        @media screen and (min-width: 768px) {
                            .dogs-grid-container {
                                padding: 2rem;
                            }

                            .dogs-grid {
                                gap: 1.5rem;
                            }

                            .dog-info {
                                padding: 1.25rem;
                            }

                            .dog-name {
                                font-size: 1.2rem;
                            }

                            .breed-badge {
                                font-size: 0.8rem;
                                padding: 0.25rem 0.75rem;
                            }

                            .dog-feature-text {
                                font-size: 0.9rem;
                            }

                            .dog-details-btn {
                                padding: 0.75rem 1.25rem;
                                font-size: 0.9rem;
                            }
                        }

                        @media screen and (min-width: 1024px) {
                            .dogs-grid {
                                grid-template-columns: repeat(3, 1fr);
                                gap: 2rem;
                            }
                        }

                        @media screen and (min-width: 1280px) {
                            .dogs-grid {
                                grid-template-columns: repeat(4, 1fr);
                                gap: 2rem;
                            }

                            .dog-info {
                                padding: 1.5rem;
                            }
                        }

                        @media screen and (max-width: 360px) {
                            .dogs-grid {
                                gap: 0.75rem;
                            }

                            .dog-info {
                                padding: 0.75rem;
                            }

                            .dog-name {
                                font-size: 0.9rem;
                            }

                            .dog-details-btn {
                                padding: 0.5rem 0.75rem;
                                font-size: 0.75rem;
                            }
                        }

                        @keyframes fadeInUp {
                            from {
                                opacity: 0;
                                transform: translateY(20px);
                            }
                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }

                        .dog-card {
                            animation: fadeInUp 0.5s ease forwards;
                            opacity: 0;
                        }

                        .dog-card:nth-child(1) { animation-delay: 0.1s; }
                        .dog-card:nth-child(2) { animation-delay: 0.2s; }
                        .dog-card:nth-child(3) { animation-delay: 0.3s; }
                        .dog-card:nth-child(4) { animation-delay: 0.4s; }
                        .dog-card:nth-child(5) { animation-delay: 0.5s; }
                        .dog-card:nth-child(6) { animation-delay: 0.6s; }
                        .dog-card:nth-child(7) { animation-delay: 0.7s; }
                        .dog-card:nth-child(8) { animation-delay: 0.8s; }

                        .dog-details-btn:focus,
                        .dog-name a:focus {
                            outline: 2px solid #667eea;
                            outline-offset: 2px;
                        }

                        @media (prefers-reduced-motion: reduce) {
                            .dog-card,
                            .dog-image,
                            .dog-details-btn {
                                animation: none;
                                transition: none;
                            }

                            .dog-card:hover {
                                transform: none;
                            }

                            .dog-card:hover .dog-image {
                                transform: none;
                            }
                        }

                        @media print {
                            .dogs-grid-container {
                                padding: 1rem;
                            }

                            .dog-card {
                                box-shadow: none;
                                border: 1px solid #ddd;
                                break-inside: avoid;
                                page-break-inside: avoid;
                            }

                            .dog-details-btn {
                                background: none;
                                border: 1px solid #333;
                                color: #333;
                                box-shadow: none;
                            }

                            .dog-image-placeholder {
                                background: #f0f0f0;
                                color: #333;
                            }
                        }
                    </style>
                </div>
            </div>
        </section>

        @include('layouts.partials.footer.public')
    </div>
@endsection