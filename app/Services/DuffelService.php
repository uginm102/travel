<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DuffelService
{
    protected $token;
    protected $baseUrl;
    protected $version;

    public function __construct()
    {
        $this->token = config('services.duffel.token');
        $this->baseUrl = config('services.duffel.base_url');
        $this->version = config('services.duffel.version');
    }

    /**
     * Helper to build the default Duffel Request headers
     */
    protected function client()
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Duffel-Version' => $this->version,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->baseUrl($this->baseUrl);
    }

    /**
     * Search Flights (Create an Offer Request)
     */
    public function searchFlights(array $slices, array $passengers, string $cabinClass = 'economy')
    {
        $response = $this->client()->post('air/offer_requests', [
            'data' => [
                'slices' => $slices,
                'passengers' => $passengers,
                'cabin_class' => $cabinClass,
            ]
        ]);

        return $response->json();
    }
}
