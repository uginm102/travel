@extends('layouts.newapp')

@section('title', 'Flight Results – Swanair')

@section('content')

<div class="sw-results-page">

    {{-- Inline mini search bar --}}
    <div class="sw-mini-search">
        <div class="sw-mini-search__inner">
            <form method="GET" action="{{ route('flights.search') }}" class="sw-mini-form">
                <div class="sw-mini-field">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="10" cy="9" r="3"/><path d="M10 2a7 7 0 017 7c0 4-7 11-7 11S3 13 3 9a7 7 0 017-7z"/></svg>
                    <input type="text" name="from" value="{{ request('from', 'Entebbe (EBB)') }}" placeholder="From" />
                </div>
                <div class="sw-mini-swap">⇄</div>
                <div class="sw-mini-field">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="10" cy="9" r="3"/><path d="M10 2a7 7 0 017 7c0 4-7 11-7 11S3 13 3 9a7 7 0 017-7z"/></svg>
                    <input type="text" name="to" value="{{ request('to', 'Barcelona (BCN)') }}" placeholder="To" />
                </div>
                <div class="sw-mini-field sw-mini-field--date">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="16" height="14" rx="1"/><path d="M2 8h16M6 2v4M14 2v4"/></svg>
                    <div>
                        <span class="sw-mini-field__label">Dates</span>
                        <span class="sw-mini-field__val">{{ request('depart', 'Fri, 12 Jun') }} – {{ request('return', 'Sat, 13 Jun') }}</span>
                    </div>
                </div>
                <div class="sw-mini-field sw-mini-field--pax">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="10" cy="7" r="3"/><path d="M3 17a7 7 0 0114 0"/></svg>
                    <div>
                        <span class="sw-mini-field__label">Travellers, Cabin class</span>
                        <span class="sw-mini-field__val">{{ request('travellers', 1) }} traveller, {{ request('class', 'Economy') }}</span>
                    </div>
                </div>
                <button type="submit" class="sw-search-btn sw-search-btn--sm">Search</button>
            </form>
        </div>
    </div>

    {{-- Price tracking bar --}}
    <div class="sw-price-track">
        <div class="sw-price-track__inner">
            <div class="sw-price-track__info">
                <strong>Price Tracking</strong>
                <span>Current lowest price: <strong class="sw-price-track__price">€808</strong></span>
            </div>
            <div class="sw-price-track__watch">
                <span>Watch prices</span>
                <label class="sw-toggle">
                    <input type="checkbox" />
                    <span class="sw-toggle__track"></span>
                </label>
                <small>Get email notifications if prices go up or down</small>
            </div>
        </div>
    </div>

    {{-- Date price ribbon --}}
    <div class="sw-date-ribbon">
        <div class="sw-date-ribbon__inner">
            @php
            $dates = [
                ['label' => 'Tue, 9 Jun', 'price' => '€896'],
                ['label' => 'Wed, 10 Jun', 'price' => '€896'],
                ['label' => 'Thu, 11 Jun', 'price' => '€853'],
                ['label' => 'Fri, 12 Jun', 'price' => '€808', 'active' => true],
                ['label' => 'Sat, 13 Jun', 'price' => '€1,037'],
                ['label' => 'Sun, 14 Jun', 'price' => '€896'],
                ['label' => 'Mon, 15 Jun', 'price' => '€850'],
            ];
            @endphp
            @foreach($dates as $d)
            <div class="sw-date-chip {{ !empty($d['active']) ? 'sw-date-chip--active' : '' }}">
                <span class="sw-date-chip__label">{{ $d['label'] }}</span>
                <span class="sw-date-chip__price">{{ $d['price'] }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Main results layout --}}
    <div class="sw-results-layout">

        {{-- Sidebar Filters --}}
        <aside class="sw-filters">
            <h3 class="sw-filters__heading">Filter by</h3>

            <div class="sw-filter-group">
                <h4 class="sw-filter-group__title">Stops <span class="sw-filter-group__from">From</span></h4>
                @foreach([
                    ['label' => '1 stop (11)', 'from' => '€808'],
                    ['label' => '2+ stops (22)', 'from' => '€826'],
                ] as $stop)
                <label class="sw-checkbox">
                    <input type="checkbox" />
                    <span class="sw-checkbox__box"></span>
                    <span class="sw-checkbox__label">{{ $stop['label'] }}</span>
                    <span class="sw-checkbox__price">{{ $stop['from'] }}</span>
                </label>
                @endforeach
            </div>

            <div class="sw-filter-group">
                <h4 class="sw-filter-group__title">Airlines <span class="sw-filter-group__from">From</span></h4>
                @foreach([
                    ['label' => 'Kenya Airways (8)', 'from' => '€1,022'],
                    ['label' => 'Ethiopian Airlines (6)', 'from' => '€1,148'],
                    ['label' => 'Emirates (4)', 'from' => '€1,165'],
                    ['label' => 'KLM (4)', 'from' => '€1,672'],
                    ['label' => 'Swiss International Air Lines (4)', 'from' => '€826'],
                    ['label' => 'British Airways (3)', 'from' => '€1,799'],
                ] as $airline)
                <label class="sw-checkbox">
                    <input type="checkbox" />
                    <span class="sw-checkbox__box"></span>
                    <span class="sw-checkbox__label">{{ $airline['label'] }}</span>
                    <span class="sw-checkbox__price">{{ $airline['from'] }}</span>
                </label>
                @endforeach
            </div>

            <div class="sw-filter-group">
                <h4 class="sw-filter-group__title">Price range</h4>
                <div class="sw-range">
                    <input type="range" min="600" max="2000" value="1200" class="sw-range__input" id="priceRange" />
                    <div class="sw-range__labels">
                        <span>€600</span>
                        <span id="priceVal">€1,200</span>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Results list --}}
        <main class="sw-results">
            <div class="sw-results__header">
                <h2 class="sw-results__title">Departing flights</h2>
                <p class="sw-results__sub">Prices may change based on availability and are not final until you complete your purchase.</p>
                <div class="sw-results__sort">
                    Sort by
                    <select class="sw-sort-select">
                        <option>Recommended</option>
                        <option>Cheapest</option>
                        <option>Fastest</option>
                        <option>Earliest departure</option>
                    </select>
                </div>
            </div>

            @php
            $flights = [
                [
                    'airline' => 'Brussels Airlines',
                    'airline_code' => 'SN',
                    'depart' => '23:25',
                    'arrive' => '11:35',
                    'route' => 'Entebbe (EBB) – Barcelona (BCN)',
                    'duration' => '13h 10m',
                    'stops' => '1 stop',
                    'layover' => '2h 50m in BRU',
                    'price' => '€851',
                    'seats' => 2,
                    'badge' => null,
                ],
                [
                    'airline' => 'Brussels Airlines',
                    'airline_code' => 'SN',
                    'depart' => '23:25',
                    'arrive' => '14:25',
                    'route' => 'Entebbe (EBB) – Barcelona (BCN)',
                    'duration' => '16h',
                    'stops' => '1 stop',
                    'layover' => '5h 40m in BRU',
                    'price' => '€808',
                    'seats' => 2,
                    'badge' => 'Cheapest',
                ],
                [
                    'airline' => 'Turkish Airlines',
                    'airline_code' => 'TK',
                    'depart' => '05:50',
                    'arrive' => '17:40',
                    'route' => 'Entebbe (EBB) – Barcelona (BCN)',
                    'duration' => '12h 50m',
                    'stops' => '1 stop',
                    'layover' => '2h 20m in IST',
                    'price' => '€1,118',
                    'seats' => null,
                    'badge' => null,
                ],
                [
                    'airline' => 'Kenya Airways',
                    'airline_code' => 'KQ',
                    'depart' => '21:05',
                    'arrive' => '10:15+1',
                    'route' => 'Entebbe (EBB) – Barcelona (BCN)',
                    'duration' => '15h 10m',
                    'stops' => '1 stop',
                    'layover' => '3h 20m in NBO',
                    'price' => '€1,022',
                    'seats' => null,
                    'badge' => null,
                ],
            ];
            @endphp

            @foreach($flights as $flight)
            <div class="sw-flight-card {{ $flight['badge'] === 'Cheapest' ? 'sw-flight-card--cheapest' : '' }}">
                @if($flight['badge'])
                <div class="sw-flight-card__badge">{{ $flight['badge'] }}</div>
                @endif

                <div class="sw-flight-card__airline">
                    <div class="sw-airline-logo" title="{{ $flight['airline'] }}">{{ $flight['airline_code'] }}</div>
                    <span class="sw-flight-card__airline-name">{{ $flight['airline'] }}</span>
                </div>

                <div class="sw-flight-card__times">
                    <div class="sw-flight-card__time-block">
                        <span class="sw-flight-card__time">{{ $flight['depart'] }}</span>
                    </div>
                    <div class="sw-flight-card__route-line">
                        <span class="sw-flight-card__duration">{{ $flight['duration'] }}</span>
                        <div class="sw-flight-card__line">
                            <div class="sw-flight-card__dot"></div>
                            <div class="sw-flight-card__dash"></div>
                            <div class="sw-flight-card__dot"></div>
                        </div>
                        <span class="sw-flight-card__stops">{{ $flight['stops'] }}</span>
                        @if($flight['layover'])
                        <span class="sw-flight-card__layover">{{ $flight['layover'] }}</span>
                        @endif
                    </div>
                    <div class="sw-flight-card__time-block">
                        <span class="sw-flight-card__time">{{ $flight['arrive'] }}</span>
                    </div>
                </div>

                <div class="sw-flight-card__route-label">{{ $flight['route'] }}</div>

                <div class="sw-flight-card__price-block">
                    @if($flight['seats'])
                    <div class="sw-flight-card__seats">{{ $flight['seats'] }} left at</div>
                    @endif
                    <div class="sw-flight-card__price">{{ $flight['price'] }}</div>
                    <div class="sw-flight-card__per">Return per traveller</div>
                    <a href="#" class="sw-flight-card__select">Select</a>
                    <button class="sw-flight-card__details-btn">Flight details ↓</button>
                </div>
            </div>
            @endforeach
        </main>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('priceRange').addEventListener('input', function () {
    const v = parseInt(this.value);
    document.getElementById('priceVal').textContent = '€' + v.toLocaleString();
});

document.querySelectorAll('.sw-flight-card__details-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const card = this.closest('.sw-flight-card');
        card.classList.toggle('sw-flight-card--expanded');
        this.textContent = card.classList.contains('sw-flight-card--expanded') ? 'Hide details ↑' : 'Flight details ↓';
    });
});
</script>
@endpush
