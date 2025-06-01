<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use App\Models\Price;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $storeModels = Store::all();

        // Skapa 50 produkter från factoryn
        Product::factory(50)->create()->each(function ($product) use ($storeModels) {
            // Ge varje produkt priser i 1–4 slumpmässiga butiker
            $storeModels->random(rand(1, 4))->each(function ($store) use ($product) {
                Price::create([
                    'product_id' => $product->id,
                    'store_id' => $store->id,
                    'price' => round(fake()->randomFloat(2, 5, 60), 2),
                ]);
            });
        });
    }
}

