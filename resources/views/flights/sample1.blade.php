<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swanair - Flight Search Results</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

<div class="bg-white border-bottom py-2 shadow-sm mb-4">
    <div class="container">
        <ul class="nav nav-pills card-header-pills small">
            <li class="nav-item"><a class="nav-link active rounded-pill px-3" href="#"><i class="fa-solid fa-plane me-1"></i> Flights</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="#"><i class="fa-solid fa-hotel me-1"></i> Stays</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="#"><i class="fa-solid fa-car me-1"></i> Cars</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="#"><i class="fa-solid fa-box me-1"></i> Packages</a></li>
            <li class="nav-item"><a class="nav-link text-secondary" href="#"><i class="fa-solid fa-calendar-day me-1"></i> Things to do</a></li>
        </ul>
    </div>
</div>

<div class="container mb-5">

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

    <div class="row">

        <div class="col-lg-3 col-md-4">

            <div class="card shadow-sm border-0 p-3 mb-3 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0 fw-bold"><i class="fa-solid fa-bell text-warning me-1"></i> Price Tracking</h6>
                    <div class="form-check form-switch m-0">
                        <input class="form-check-input" type="checkbox" role="switch" id="watchPricesSwitch" checked>
                    </div>
                </div>
                <p class="text-muted small mb-1">Current lowest price: <strong class="text-dark">€808</strong></p>
                <p class="text-muted mb-0" style="font-size: 0.75rem;">Get email notifications if prices go up or down.</p>
            </div>

            <div class="card shadow-sm border-0 p-3 bg-white">
                <h6 class="fw-bold border-bottom pb-2 mb-3">Filter by</h6>

                <div class="mb-4">
                    <label class="form-label fw-semibold small text-secondary">Stops</label>
                    <div class="form-check d-flex justify-content-between align-items-center mb-1">
                        <div>
                            <input class="form-check-input" type="checkbox" id="stop1" checked>
                            <label class="form-check-label small" for="stop1">1 stop (11)</label>
                        </div>
                        <span class="text-muted small">€808</span>
                    </div>
                    <div class="form-check d-flex justify-content-between align-items-center">
                        <div>
                            <input class="form-check-input" type="checkbox" id="stop2">
                            <label class="form-check-label small" for="stop2">2+ stops (22)</label>
                        </div>
                        <span class="text-muted small">€826</span>
                    </div>
                </div>

                <div>
                    <label class="form-label fw-semibold small text-secondary">Airlines</label>
                    <div class="form-check d-flex justify-content-between align-items-center mb-1">
                        <div>
                            <input class="form-check-input" type="checkbox" id="air1" checked>
                            <label class="form-check-label small text-truncate" style="max-width: 140px;" for="air1">Brussels Airlines</label>
                        </div>
                        <span class="text-muted small">€808</span>
                    </div>
                    <div class="form-check d-flex justify-content-between align-items-center mb-1">
                        <div>
                            <input class="form-check-input" type="checkbox" id="air2">
                            <label class="form-check-label small text-truncate" style="max-width: 140px;" for="air2">Kenya Airways (8)</label>
                        </div>
                        <span class="text-muted small">€1,022</span>
                    </div>
                    <div class="form-check d-flex justify-content-between align-items-center mb-1">
                        <div>
                            <input class="form-check-input" type="checkbox" id="air3">
                            <label class="form-check-label small text-truncate" style="max-width: 140px;" for="air3">Ethiopian Airlines</label>
                        </div>
                        <span class="text-muted small">€1,148</span>
                    </div>
                    <div class="form-check d-flex justify-content-between align-items-center mb-1">
                        <div>
                            <input class="form-check-input" type="checkbox" id="air4">
                            <label class="form-check-label small text-truncate" style="max-width: 140px;" for="air4">Emirates (4)</label>
                        </div>
                        <span class="text-muted small">€1,365</span>
                    </div>
                    <div class="form-check d-flex justify-content-between align-items-center">
                        <div>
                            <input class="form-check-input" type="checkbox" id="air5">
                            <label class="form-check-label small text-truncate" style="max-width: 140px;" for="air5">KLM (4)</label>
                        </div>
                        <span class="text-muted small">€1,672</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-9 col-md-8">

            <div class="d-flex justify-content-between bg-white p-2 border rounded shadow-sm mb-3 text-center overflow-auto small flex-nowrap">
                <div class="p-2 border-end flex-fill"><div class="text-muted text-uppercase" style="font-size:0.65rem;">Wed, 10 Jun</div><strong class="text-success">€853</strong></div>
                <div class="p-2 border-end flex-fill"><div class="text-muted text-uppercase" style="font-size:0.65rem;">Thu, 11 Jun</div><strong class="text-success">€850</strong></div>
                <div class="p-2 border-end flex-fill bg-light"><div class="text-muted text-uppercase" style="font-size:0.65rem;">Fri, 12 Jun</div><strong class="text-dark">€808</strong></div>
                <div class="p-2 border-end flex-fill"><div class="text-muted text-uppercase" style="font-size:0.65rem;">Sat, 13 Jun</div><strong class="text-success">€1,037</strong></div>
                <div class="p-2 flex-fill"><div class="text-muted text-uppercase" style="font-size:0.65rem;">Sun, 14 Jun</div><strong class="text-success">€1,196</strong></div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="text-muted small">Departing flights</div>
                <div class="d-flex align-items-center gap-2">
                    <span class="small text-muted text-nowrap">Sort by</span>
                    <select class="form-select form-select-sm border-0 shadow-sm bg-white font-weight-bold" style="width: auto;">
                        <option>Recommended</option>
                        <option>Price (Lowest)</option>
                        <option>Duration (Shortest)</option>
                    </select>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-3 bg-white overflow-hidden">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-primary me-2"><i class="fa-solid fa-plane"></i></span>
                                <h6 class="mb-0 fw-bold text-dark">Brussels Airlines</h6>
                            </div>
                            <div class="row text-center text-md-start">
                                <div class="col-4">
                                    <h5 class="mb-0 fw-bold">23:25</h5>
                                    <span class="text-muted small">Entebbe (EBB)</span>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-muted small mb-0">13h 10m</div>
                                    <div class="position-relative my-1">
                                        <hr class="m-0 bg-secondary" style="height: 2px; opacity: 0.25;">
                                        <span class="position-absolute top-50 start-50 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">1 stop</span>
                                    </div>
                                    <span class="text-muted small" style="font-size:0.75rem;">Brussels (BRU)</span>
                                </div>
                                <div class="col-4 text-md-end text-center">
                                    <h5 class="mb-0 fw-bold">11:35</h5>
                                    <span class="text-muted small">Barcelona (BCN)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 border-start text-center pt-3 pt-md-0">
                            <span class="badge bg-danger-subtle text-danger mb-2 small px-2 py-1">2 left at this price</span>
                            <h3 class="fw-extrabold mb-1">€808</h3>
                            <div class="text-muted small mb-3">Roundtrip per traveller</div>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-outline-primary btn-sm px-3">Flight details</button>
                                <button class="btn btn-primary btn-sm px-4 fw-bold">Select</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-3 bg-white overflow-hidden">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-danger me-2"><i class="fa-solid fa-plane"></i></span>
                                <h6 class="mb-0 fw-bold text-dark">Emirates</h6>
                            </div>
                            <div class="row text-center text-md-start">
                                <div class="col-4">
                                    <h5 class="mb-0 fw-bold">05:50</h5>
                                    <span class="text-muted small">Entebbe (EBB)</span>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="text-muted small mb-0">12h 50m</div>
                                    <div class="position-relative my-1">
                                        <hr class="m-0 bg-secondary" style="height: 2px; opacity: 0.25;">
                                        <span class="position-absolute top-50 start-50 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">1 stop</span>
                                    </div>
                                    <span class="text-muted small" style="font-size:0.75rem;">Dubai (DXB)</span>
                                </div>
                                <div class="col-4 text-md-end text-center">
                                    <h5 class="mb-0 fw-bold">17:40</h5>
                                    <span class="text-muted small">Barcelona (BCN)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 border-start text-center pt-3 pt-md-0">
                            <h3 class="fw-extrabold mb-1 mt-2">€1,118</h3>
                            <div class="text-muted small mb-3">Roundtrip per traveller</div>
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-outline-primary btn-sm px-3">Flight details</button>
                                <button class="btn btn-primary btn-sm px-4 fw-bold">Select</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
