<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $organic = $request->boolean('organic');
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');

        $products = Product::with('prices.store')
            ->when($query, fn($q) => $q->where('name', 'like', '%' . $query . '%'))
            ->when($organic, fn($q) => $q->where('is_organic', true))
            ->get();

        $results = $products->map(function ($product) use ($userLat, $userLng) {
            $cheapest = $product->prices->sortBy('price')->first();

            $distance = null;
            if ($cheapest && $cheapest->store && $userLat && $userLng) {
                $storeLat = $cheapest->store->latitude;
                $storeLng = $cheapest->store->longitude;
                $distance = $this->calculateDistance($userLat, $userLng, $storeLat, $storeLng);
            }

            return [
                'product' => $product->name . ($product->is_organic ? ' (EKO)' : ''),
                'price' => $cheapest?->price,
                'store' => $cheapest?->store?->name,
                'store_coords' => $cheapest && $cheapest->store
                    ? $cheapest->store->latitude . ',' . $cheapest->store->longitude
                    : null,
                'distance' => $distance,
            ];
        });

        return Inertia::render('Search', [
            'results' => $results,
            'query' => $query,
            'organic' => $organic,
        ]);
    }

    // Haversine formula: returns distance in km
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) ** 2 +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return round($earthRadius * $c, 2); // in kilometers, 2 decimals
    }
}


