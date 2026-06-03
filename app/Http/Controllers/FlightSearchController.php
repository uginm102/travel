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
    public function index()
    {
        return view('flights.index');
    }
    public function sample1()
    {
        return view('flights.sample1');
    }

    public function home()
    {
        return view('flights.home');
    }

    public function home1()
    {
        return view('flights.home1');
    }

    public function search1()
    {
        return view('flights.search');
    }
    /**
     * Fetch airports dynamically based on user typing query.
     */
    public function searchAirports(Request $request)
    {
        $query = strtolower($request->query('search', ''));

        if (empty($query) || strlen($query) < 2) {
            return response()->json([]);
        }

        // Dummy static list matching your Swanair specifications.
        // In a real application, replace this with a database query:
        // Airport::where('name', 'like', "%{$query}%")->orWhere('iata', 'like', "%{$query}%")->get();
        $airports = [
            ['code' => 'EBB', 'name' => 'Entebbe (EBB) - Entebbe Intl Airport', 'city' => 'Entebbe', 'country' => 'Uganda'],
            ['code' => 'BCN', 'name' => 'Barcelona (BCN) - El Prat Airport', 'city' => 'Barcelona', 'country' => 'Spain'],
            ['code' => 'NBO', 'name' => 'Nairobi (NBO) - Jomo Kenyatta Intl', 'city' => 'Nairobi', 'country' => 'Kenya'],
            ['code' => 'LHR', 'name' => 'London (LHR) - Heathrow Airport', 'city' => 'London', 'country' => 'United Kingdom'],
            ['code' => 'JFK', 'name' => 'New York (JFK) - John F. Kennedy Intl', 'city' => 'New York', 'country' => 'United States'],
            ['code' => 'CDG', 'name' => 'Paris (CDG) - Charles de Gaulle', 'city' => 'Paris', 'country' => 'France'],
            ['code' => 'DXB', 'name' => 'Dubai (DXB) - Dubai Intl Airport', 'city' => 'Dubai', 'country' => 'UAE'],
        ];

        // Filter the list dynamically based on what the user typed (matches city, name, or IATA code)
        $filtered = array_filter($airports, function($airport) use ($query) {
            return str_contains(strtolower($airport['name']), $query) ||
                str_contains(strtolower($airport['code']), $query) ||
                str_contains(strtolower($airport['city']), $query);
        });

        // Re-index array keys and return clean JSON response
        return response()->json(array_values($filtered));
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
