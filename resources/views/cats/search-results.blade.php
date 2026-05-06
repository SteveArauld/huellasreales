@extends('layouts.app')

@section('title', __('cats.search_results') . ' - ' . $query)

@push('styles')
    <title>{{ __('cats.search_results') }} - {{ $query }}</title>
    @include('pages.style')
    @vite(['resources/css/venta.css'])
@endpush

@section('content')
    <div class="brz brz-root__container brz-reset-all brz-root__container-page">
        @include('layouts.partials.navbar.public')

        <section id="cats-search" class="dogs-showcase-section">
            <div class="dogs-showcase-container">
                <!-- En-tête de la section -->
                <div class="section-header">
                    <h1 class="section-title">{{ __('cats.search_results') }}</h1>
                    <p class="section-subtitle">
                        {{ __('cats.results_for') }} "{{ $query }}"
                    </p>
                    <p class="results-count">{{ $total }} {{ $total > 1 ? __('cats.results_found_plural') : __('cats.results_found_singular') }}</p>
                    <a href="{{ route('cats.venta', ['lang' => app()->getLocale()]) }}" class="back-link">
                        &larr; {{ __('cats.back_to_all') }}
                    </a>
                </div>

                @if($resultados->isEmpty())
                    <div class="no-results">
                        <p>{{ __('cats.no_results') }}</p>
                        <a href="{{ route('cats.venta', ['lang' => app()->getLocale()]) }}" class="btn-primary">
                            {{ __('cats.view_all') }}
                        </a>
                    </div>
                @else
                    <!-- Résultats groupés par race -->
                    @foreach($resultadosPorRace as $race => $catsInRace)
                        <div class="race-group">
                            <h2 class="race-group-title">
                                {{ $race }}
                                <span class="race-count">({{ count($catsInRace) }})</span>
                            </h2>
                            
                            <div class="dogs-grid">
                                @foreach($catsInRace as $cat)
                                    <div class="dog-card">
                                        <div class="dog-image-wrapper">
                                            @if(!empty($cat->images) && isset($cat->images[0]))
                                                <img class="dog-image"
                                                     src="{{ asset($cat->images[0]) }}"
                                                     alt="{{ $cat->nom }}"
                                                     loading="lazy">
                                            @else
                                                <div class="dog-image-placeholder">
                                                    <span>{{ $cat->nom[0] ?? '🐱' }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="dog-info">
                                            <h3 class="dog-name">{{ $cat->nom }}</h3>

                                            <div class="dog-breed">
                                                <span class="breed-badge">{{ $cat->race }}</span>
                                            </div>

                                            @if($cat->age_mois)
                                                <p class="dog-description">{{ $cat->age_formatted }}</p>
                                            @endif

                                            @if(!empty($cat->description))
                                                <p class="dog-description">
                                                    {{ Str::limit($cat->description, 80) }}
                                                </p>
                                            @endif

                                            <a class="dog-details-btn"
                                               href="{{ route('cats.show', ['lang' => app()->getLocale(), 'slug' => $cat->slug]) }}">
                                                <span>{{ __("cats.view_details") }}</span>
                                                <svg class="btn-icon" viewBox="0 0 24 24" width="16" height="16">
                                                    <path d="M8 5v14l11-7z" fill="currentColor"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>

        @include('layouts.partials.footer.public')
    </div>

    <style>
        .race-group {
            margin-bottom: 3rem;
        }

        .race-group-title {
            font-size: 1.5rem;
            color: #1f2937;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #667eea;
        }

        .race-count {
            font-size: 1rem;
            color: #6b7280;
            font-weight: normal;
        }

        .results-count {
            font-size: 1rem;
            color: #6b7280;
            margin-top: 0.5rem;
        }

        .no-results {
            text-align: center;
            padding: 3rem 1rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .no-results p {
            font-size: 1.25rem;
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #5568d3;
        }
    </style>
@endsection
