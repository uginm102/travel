<?php

namespace App\Http\Controllers;

use App\Services\DuffelService;
use Illuminate\Http\Request;

class FlightSearchController extends Controller
{
    protected $duffelService;

    public function __construct(DuffelService $duffelService)
    {
        $this->duffelService = $duffelService;
    }

    public function sample1()
    {
        return view('flights.sample1');
    }

    public function home()
    {
        return view('flights.home');
    }

    public function search1()
    {
        return view('flights.search');
    }

    public function search(Request $request)
    {
        // Example payload parameters
        $slices = [
            [
                'origin' => 'LHR',       // London Heathrow
                'destination' => 'JFK',  // New York JFK
                'departure_date' => now()->addDays(30)->format('Y-m-d'), // 30 days from now
            ]
        ];

        $passengers = [
            ['type' => 'adult']
        ];

        // Fetch flight offers from Duffel Test sandbox
        $results = $this->duffelService->searchFlights($slices, $passengers, 'economy');

        if (isset($results['errors'])) {
            return response()->json([
                'success' => false,
                'errors' => $results['errors']
            ], 400);
        }

        return response()->json([
            'success' => true,
            'offers' => $results['data']['offers'] ?? []
        ]);
    }
}
