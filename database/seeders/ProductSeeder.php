<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use App\Models\Price;

// class ProductSeeder extends Seeder
// {
//     public function run(): void
//     {
//         $storeModels = Store::all();

//         // Skapa 50 produkter från factoryn
//         Product::factory(50)->create()->each(function ($product) use ($storeModels) {
//             // Ge varje produkt priser i 1–4 slumpmässiga butiker
//             $storeModels->random(rand(1, 4))->each(function ($store) use ($product) {
//                 Price::create([
//                     'product_id' => $product->id,
//                     'store_id' => $store->id,
//                     'price' => round(fake()->randomFloat(2, 5, 60), 2),
//                 ]);
//             });
//         });
//     }
// }

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $storeModels = Store::all();

        $productNames = [
            'Bananer', 'Mjölk', 'Äpplen', 'Smör', 'Kaffe', 'Bröd',
            'Tomater', 'Gurka', 'Kycklingfilé', 'Lax', 'Tofu',
            'Pasta', 'Ris', 'Juice', 'Läsk', 'Glass',
            'Tvättmedel', 'Tandkräm', 'Olivolja', 'Chips'
        ];

        foreach ($productNames as $name) {
            foreach ([false, true] as $isOrganic) {
                $product = Product::create([
                    'name' => $name,
                    'is_organic' => $isOrganic,
                ]);

                $storeModels->random(rand(2, 5))->each(function ($store) use ($product) {
                    $basePrice = fake()->randomFloat(2, 10, 60);

                    if (str_contains(strtolower($store->name), 'lidl')) {
                        $basePrice *= 0.85;
                    } elseif (str_contains(strtolower($store->name), 'coop')) {
                        $basePrice *= 1.10;
                    }

                    Price::create([
                        'product_id' => $product->id,
                        'store_id' => $store->id,
                        'price' => round($basePrice, 2),
                    ]);
                });
            }
        }
    }
}


