<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use App\Models\Price;

class ProductSeeder extends Seeder
{

public function run(): void
    {
        // Create stores
        $ica = Store::create([
            'name' => 'ICA Maxi',
            'address' => 'Stockholm',
            'latitude' => 59.3293,
            'longitude' => 18.0686,
        ]);

        $willys = Store::create([
            'name' => 'Willys',
            'address' => 'Stockholm',
            'latitude' => 59.3325,
            'longitude' => 18.0649,
        ]);

        // Create products
        $banana = Product::create(['name' => 'Bananer', 'is_organic' => false]);
        $bananaOrganic = Product::create(['name' => 'Bananer', 'is_organic' => true]);
        $milk = Product::create(['name' => 'Mjölk', 'is_organic' => false]);

        // Create prices
        Price::create(['product_id' => $banana->id, 'store_id' => $ica->id, 'price' => 19.90]);
        Price::create(['product_id' => $banana->id, 'store_id' => $willys->id, 'price' => 17.50]);

        Price::create(['product_id' => $bananaOrganic->id, 'store_id' => $willys->id, 'price' => 24.90]);

        Price::create(['product_id' => $milk->id, 'store_id' => $ica->id, 'price' => 11.90]);
    }

}
