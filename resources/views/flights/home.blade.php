@extends('layouts.newapp')

@section('title', 'Swanair – Search Flights, Hotels & More')

@section('content')
{{-- Hero --}}
<section class="sw-hero">
    <div class="sw-hero__bg">
        <div class="sw-hero__orb sw-hero__orb--1"></div>
        <div class="sw-hero__orb sw-hero__orb--2"></div>
        <div class="sw-hero__orb sw-hero__orb--3"></div>
        <div class="sw-hero__grid"></div>
    </div>

    <div class="sw-hero__content">
        <p class="sw-hero__eyebrow">Premium Travel, Simplified</p>
        <h1 class="sw-hero__headline">
            Where do you<br />
            <em>want to go?</em>
        </h1>
    </div>

    {{-- Search Card --}}
    <div class="sw-search-card">

        {{-- Service Tabs --}}
        <div class="sw-tabs">
            <button class="sw-tab" data-tab="stays">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 17V8l8-5 8 5v9"/><rect x="7" y="11" width="6" height="6" rx="0.5"/></svg>
                Stays
            </button>
            <button class="sw-tab sw-tab--active" data-tab="flights">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 14l3-1 10-8 2 2-10 8-1 3-4-4z"/><path d="M14 5l1-3 3 3-3 1"/></svg>
                Flights
            </button>
            <button class="sw-tab" data-tab="cars">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="8" width="18" height="7" rx="2"/><path d="M4 8l2-4h8l2 4"/><circle cx="5.5" cy="15" r="1.5"/><circle cx="14.5" cy="15" r="1.5"/></svg>
                Cars
            </button>
            <button class="sw-tab" data-tab="packages">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="16" height="11" rx="1"/><path d="M7 7V5a3 3 0 016 0v2"/></svg>
                Packages
            </button>
            <button class="sw-tab" data-tab="things">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="10" cy="10" r="8"/><path d="M10 6v4l3 3"/></svg>
                Things to do
            </button>
        </div>

        {{-- Trip Type --}}
        <div class="sw-trip-type">
            <label class="sw-radio">
                <input type="radio" name="trip" value="return" checked />
                <span class="sw-radio__dot"></span>
                Return
            </label>
            <label class="sw-radio">
                <input type="radio" name="trip" value="oneway" />
                <span class="sw-radio__dot"></span>
                One-way
            </label>
            <label class="sw-radio">
                <input type="radio" name="trip" value="multicity" />
                <span class="sw-radio__dot"></span>
                Multi-city
            </label>

            <div class="sw-trip-type__spacer"></div>

            <button class="sw-select-btn" id="travellersBtn">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="10" cy="7" r="3"/><path d="M3 17a7 7 0 0114 0"/></svg>
                <span id="travellersLabel">1 traveller</span>
                <svg class="sw-select-btn__caret" viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
            </button>

            <button class="sw-select-btn" id="classBtn">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="5" width="16" height="12" rx="1"/><path d="M2 9h16"/><path d="M8 5V3"/><path d="M12 5V3"/></svg>
                <span id="classLabel">Economy</span>
                <svg class="sw-select-btn__caret" viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
            </button>
        </div>

        {{-- Search Inputs --}}
        <form method="GET" action="{{ route('flights.search') }}" class="sw-search-form">
            <div class="sw-search-row">
                <div class="sw-field sw-field--from">
                    <svg class="sw-field__icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="10" cy="9" r="3"/><path d="M10 2a7 7 0 017 7c0 4-7 11-7 11S3 13 3 9a7 7 0 017-7z"/></svg>
                    <input
                        type="text"
                        name="from"
                        class="sw-field__input"
                        placeholder="Leaving from"
                        value="{{ request('from') }}"
                        autocomplete="off"
                    />
                </div>

                <button type="button" class="sw-swap-btn" id="swapBtn" title="Swap airports">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 9l4-4-4-4M16 11l-4 4 4 4"/><line x1="8" y1="5" x2="16" y2="5"/><line x1="4" y1="15" x2="12" y2="15"/></svg>
                </button>

                <div class="sw-field sw-field--to">
                    <svg class="sw-field__icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="10" cy="9" r="3"/><path d="M10 2a7 7 0 017 7c0 4-7 11-7 11S3 13 3 9a7 7 0 017-7z"/></svg>
                    <input
                        type="text"
                        name="to"
                        class="sw-field__input"
                        placeholder="Going to"
                        value="{{ request('to') }}"
                        autocomplete="off"
                    />
                </div>

                <div class="sw-field sw-field--date">
                    <svg class="sw-field__icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="16" height="14" rx="1"/><path d="M2 8h16M6 2v4M14 2v4"/></svg>
                    <div class="sw-field__date-inner">
                        <label class="sw-field__label">Departing</label>
                        <input type="date" name="depart" class="sw-field__input" value="{{ request('depart', date('Y-m-d', strtotime('+13 days'))) }}" />
                    </div>
                </div>

                <div class="sw-field sw-field--date" id="returnField">
                    <svg class="sw-field__icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="16" height="14" rx="1"/><path d="M2 8h16M6 2v4M14 2v4"/></svg>
                    <div class="sw-field__date-inner">
                        <label class="sw-field__label">Returning</label>
                        <input type="date" name="return" class="sw-field__input" value="{{ request('return', date('Y-m-d', strtotime('+14 days'))) }}" />
                    </div>
                </div>

                <button type="submit" class="sw-search-btn">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="9" r="6"/><path d="M15 15l3 3"/></svg>
                    Search
                </button>
            </div>

            <input type="hidden" name="travellers" id="travellersInput" value="1" />
            <input type="hidden" name="class" id="classInput" value="Economy" />
        </form>
    </div>

    {{-- Price pills --}}
    <div class="sw-hero__pills">
        <span class="sw-pill">✈ Entebbe → London from <strong>€620</strong></span>
        <span class="sw-pill">✈ Nairobi → Dubai from <strong>€390</strong></span>
        <span class="sw-pill">✈ Kampala → Amsterdam from <strong>€715</strong></span>
    </div>
</section>

{{-- Destinations --}}
<section class="sw-section">
    <div class="sw-section__inner">
        <h2 class="sw-section__heading">Popular Routes</h2>
        <p class="sw-section__sub">Handpicked flights loved by our travellers</p>

        <div class="sw-destinations">
            @foreach([
                ['from' => 'Entebbe', 'to' => 'Barcelona', 'price' => '808', 'duration' => '13h 10m', 'stops' => '1 stop', 'airline' => 'Brussels Airlines', 'flag' => '🇪🇸'],
                ['from' => 'Entebbe', 'to' => 'London', 'price' => '620', 'duration' => '10h 45m', 'stops' => '1 stop', 'airline' => 'Kenya Airways', 'flag' => '🇬🇧'],
                ['from' => 'Nairobi', 'to' => 'Dubai', 'price' => '390', 'duration' => '5h 20m', 'stops' => 'Direct', 'airline' => 'Emirates', 'flag' => '🇦🇪'],
                ['from' => 'Kampala', 'to' => 'Amsterdam', 'price' => '715', 'duration' => '11h 30m', 'stops' => '1 stop', 'airline' => 'KLM', 'flag' => '🇳🇱'],
                ['from' => 'Entebbe', 'to' => 'Istanbul', 'price' => '580', 'duration' => '12h 50m', 'stops' => '1 stop', 'airline' => 'Turkish Airlines', 'flag' => '🇹🇷'],
                ['from' => 'Entebbe', 'to' => 'Paris', 'price' => '870', 'duration' => '14h 20m', 'stops' => '1 stop', 'airline' => 'Air France', 'flag' => '🇫🇷'],
            ] as $dest)
            <a href="{{ route('flights.search', ['from' => $dest['from'], 'to' => $dest['to']]) }}" class="sw-dest-card">
                <div class="sw-dest-card__flag">{{ $dest['flag'] }}</div>
                <div class="sw-dest-card__body">
                    <div class="sw-dest-card__route">
                        <span>{{ $dest['from'] }}</span>
                        <svg viewBox="0 0 40 12" fill="none"><path d="M0 6h36M30 2l6 4-6 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                        <span>{{ $dest['to'] }}</span>
                    </div>
                    <p class="sw-dest-card__meta">{{ $dest['duration'] }} · {{ $dest['stops'] }} · {{ $dest['airline'] }}</p>
                </div>
                <div class="sw-dest-card__price">
                    <span class="sw-dest-card__from">from</span>
                    <span class="sw-dest-card__amount">€{{ $dest['price'] }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Why Swanair --}}
<section class="sw-why">
    <div class="sw-section__inner">
        <h2 class="sw-section__heading">Why Swanair?</h2>
        <div class="sw-why__grid">
            @foreach([
                ['icon' => '🔒', 'title' => 'Secure Booking', 'body' => 'Your payment and personal data are fully encrypted and protected at every step.'],
                ['icon' => '💰', 'title' => 'Best Price Guarantee', 'body' => 'We compare hundreds of airlines so you never overpay for your journey.'],
                ['icon' => '📱', 'title' => 'Manage Anywhere', 'body' => 'Track, reschedule, or cancel your trips from any device, anytime.'],
                ['icon' => '🎧', 'title' => '24/7 Support', 'body' => 'Our travel experts are on call around the clock to help you fly stress-free.'],
            ] as $w)
            <div class="sw-why__card">
                <div class="sw-why__icon">{{ $w['icon'] }}</div>
                <h3>{{ $w['title'] }}</h3>
                <p>{{ $w['body'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// Swap airports
document.getElementById('swapBtn').addEventListener('click', function () {
    const from = document.querySelector('input[name="from"]');
    const to   = document.querySelector('input[name="to"]');
    [from.value, to.value] = [to.value, from.value];
    this.classList.add('sw-swap-btn--spin');
    setTimeout(() => this.classList.remove('sw-swap-btn--spin'), 400);
});

// Trip type toggle (hide/show return date)
document.querySelectorAll('input[name="trip"]').forEach(r => {
    r.addEventListener('change', function () {
        document.getElementById('returnField').style.display =
            this.value === 'oneway' ? 'none' : 'flex';
    });
});

// Tabs
document.querySelectorAll('.sw-tab').forEach(tab => {
    tab.addEventListener('click', function () {
        document.querySelectorAll('.sw-tab').forEach(t => t.classList.remove('sw-tab--active'));
        this.classList.add('sw-tab--active');
    });
});

// Travellers picker (simple inline)
let travCount = 1;
document.getElementById('travellersBtn').addEventListener('click', function (e) {
    e.stopPropagation();
    travCount = travCount < 9 ? travCount + 1 : 1;
    document.getElementById('travellersLabel').textContent = travCount + ' traveller' + (travCount > 1 ? 's' : '');
    document.getElementById('travellersInput').value = travCount;
});

// Cabin class cycle
const classes = ['Economy', 'Premium Economy', 'Business', 'First'];
let classIdx = 0;
document.getElementById('classBtn').addEventListener('click', function (e) {
    e.stopPropagation();
    classIdx = (classIdx + 1) % classes.length;
    document.getElementById('classLabel').textContent = classes[classIdx];
    document.getElementById('classInput').value = classes[classIdx];
});

// Mobile nav
document.getElementById('navToggle').addEventListener('click', function () {
    document.getElementById('mobileMenu').classList.toggle('open');
});
</script>
@endpush
