@extends('layouts.flights')

@section('content')
    <div class="card shadow-sm border-0 p-4 mb-4 bg-white">
        <div class="d-flex gap-3 mb-3 small fw-semibold text-secondary">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tripType" id="returnTrip" checked>
                <label class="form-check-label" href="#" for="returnTrip">Return</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tripType" id="oneWay">
                <label class="form-check-label" for="oneWay">One-way</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tripType" id="multiCity">
                <label class="form-check-label" for="multiCity">Multi-city</label>
            </div>
            <div class="ms-auto d-flex gap-3">
                <span class="text-dark cursor-pointer"><i class="fa-solid fa-user me-1"></i> 1 traveller</span>
                <span class="text-dark cursor-pointer">Economy</span>
            </div>
        </div>

        <div class="row g-2">
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="fromInput" value="Entebbe (EBB-Entebbe Intl.)">
                    <label for="fromInput" class="text-muted small"><i class="fa-solid fa-location-dot me-1"></i> Leaving from</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="toInput" value="Barcelona (BCN-All Airports)">
                    <label for="toInput" class="text-muted small"><i class="fa-solid fa-location-dot me-1"></i> Going to</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="departInput" value="Fri, 12 Jun">
                    <label for="departInput" class="text-muted small">Departing</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="returnInput" value="Sat, 13 Jun">
                    <label for="returnInput" class="text-muted small">Returning</label>
                </div>
            </div>
            <div class="col-md-2 d-grid">
                <button class="btn btn-primary btn-lg fw-bold fs-6 shadow-sm" type="button">Search</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function getTomSelectConfig(placeholderText) {
                return {
                    valueField: 'code',
                    labelField: 'name',
                    searchField: ['name', 'code', 'city'],
                    placeholder: placeholderText,
                    maxItems: 1,
                    preload: false,
                    loadThrottle: 300,

                    load: function(query, callback) {
                        if (!query.length) return callback();
                        fetch(`/api/airports?search=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(json => callback(json))
                            .catch(() => callback());
                    },

                    // Layout renders matching mockup dropdown logic
                    render: {
                        option: function(item, escape) {
                            return `
                        <div class="py-2 px-3 border-bottom border-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-dark text-truncate" style="max-width: 80%;">
                                    ${escape(item.city)} (${escape(item.code)})
                                </span>
                                <span class="badge bg-light text-secondary border font-monospace small">${escape(item.code)}</span>
                            </div>
                            <small class="text-muted d-block">${escape(item.name)}</small>
                        </div>`;
                        },
                        item: function(item, escape) {
                            return `<div class="text-dark fw-medium p-0 m-0">${escape(item.city)} (${escape(item.code)}-${escape(item.city)} Intl.)</div>`;
                        }
                    }
                };
            }

            // Initialize clean instances inside custom layout cards
            var originInstance = new TomSelect("#origin-remote-select", getTomSelectConfig("Where are you leaving from?"));
            var destInstance = new TomSelect("#destination-remote-select", getTomSelectConfig("Where are you going to?"));

            // Prepopulate exactly like the mockup image visualization states
            originInstance.addOption({code: 'EBB', name: 'Entebbe Intl.', city: 'Entebbe', country: 'Uganda'});
            originInstance.setValue('EBB');

            destInstance.addOption({code: 'BCN', name: 'All Airports', city: 'Barcelona', country: 'Spain'});
            destInstance.setValue('BCN');
        });
    </script>
@endpush
