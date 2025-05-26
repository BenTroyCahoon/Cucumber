<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Product;

public function index(Request $request)
{
    $query = $request->input('q');
    $organic = $request->boolean('organic');

    $products = Product::with('prices.store')
        ->when($query, fn($q) => $q->where('name', 'like', '%' . $query . '%'))
        ->when($organic, fn($q) => $q->where('is_organic', true))
        ->get();

    $results = $products->map(function ($product) {
    $cheapest = $product->prices->sortBy('price')->first();

        return [
            'product' => $product->name . ($product->is_organic ? ' (EKO)' : ''),
            'price' => $cheapest?->price,
            'store' => $cheapest?->store?->name,
            'store_coords' => $cheapest && $cheapest->store
                ? $cheapest->store->latitude . ',' . $cheapest->store->longitude
                : null,
        ];
    });

    return Inertia::render('Search', [
        'results' => $results,
        'query' => $query,
        'organic' => $organic,
    ]);

}
