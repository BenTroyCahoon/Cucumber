<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;



class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $organic = $request->boolean('organic');
        $within10km = $request->boolean('within10km');
        $sort = $request->input('sort', 'smart');
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

        if ($within10km) {
            $results = $results->filter(fn($r) => $r['distance'] !== null && $r['distance'] <= 10);
        }
        if ($sort === 'price') {
            $results = $results->sortBy('price');
        } elseif ($sort === 'distance') {
            $results = $results->sortBy(fn($r) => $r['distance'] ?? INF);
        } elseif ($sort === 'smart') {
            $results = $results->sortBy(function ($r) {
                $price = $r['price'] ?? INF;
                $distance = $r['distance'] ?? INF;
                return $price + ($distance * 1.5);
            });
        }

         $savedIds = Auth::check()
            ? Auth::user()->savedProducts()->pluck('product_id')->toArray()
            : [];

        return Inertia::render('Search', [
            'results' => $results->values(),
            'query' => $query,
            'organic' => $organic,
            'within10km' => $within10km,
            'sort' => $sort,
            'savedProductIds' => $savedIds,

        ]);
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) ** 2 +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return round($earthRadius * $c, 2);
    }
}
