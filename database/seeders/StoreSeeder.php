<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $stores = [
            ['name' => 'ICA Kvantum Munkebäck', 'address' => 'Lilla Munkebäcksgatan 2A, Göteborg', 'latitude' => 57.7236, 'longitude' => 12.0225],
            ['name' => 'ICA Supermarket Majorna', 'address' => 'Karl Johansgatan 21, Göteborg', 'latitude' => 57.6972, 'longitude' => 11.9274],
            ['name' => 'ICA Nära Pilgatan', 'address' => 'Pilgatan 20, Göteborg', 'latitude' => 57.6980, 'longitude' => 11.9585],
            ['name' => 'ICA Maxi Göteborg', 'address' => 'Grafiska Vägen 16, Göteborg', 'latitude' => 57.6841, 'longitude' => 11.9854],
            ['name' => 'ICA Kvantum Sannegården', 'address' => 'Sannegårdsgatan 3, Göteborg', 'latitude' => 57.7082, 'longitude' => 11.9348],

            ['name' => 'Willys Gamlestaden', 'address' => 'Alekärrsgatan 6, Göteborg', 'latitude' => 57.7431, 'longitude' => 12.0087],
            ['name' => 'Willys Kvilletorget', 'address' => 'Kvilletorget 3, Göteborg', 'latitude' => 57.7170, 'longitude' => 11.9510],
            ['name' => 'Willys Hemma Vasagatan', 'address' => 'Vasagatan 45, Göteborg', 'latitude' => 57.7000, 'longitude' => 11.9580],
            ['name' => 'Willys Backaplan', 'address' => 'Backavägen 2, Göteborg', 'latitude' => 57.7238, 'longitude' => 11.9401],

            ['name' => 'Hemköp Nordstan', 'address' => 'Östra Hamngatan 20, Göteborg', 'latitude' => 57.7089, 'longitude' => 11.9690],
            ['name' => 'Hemköp Kustgatan', 'address' => 'Kustgatan 1, Göteborg', 'latitude' => 57.6980, 'longitude' => 11.9400],
            ['name' => 'Hemköp Johanneberg', 'address' => 'Gibraltargatan 58, Göteborg', 'latitude' => 57.6821, 'longitude' => 11.9797],

            ['name' => 'Lidl Vasagatan', 'address' => 'Vasagatan 45, Göteborg', 'latitude' => 57.7000, 'longitude' => 11.9580],
            ['name' => 'Lidl Postgatan', 'address' => 'Postgatan 26, Göteborg', 'latitude' => 57.7080, 'longitude' => 11.9670],
            ['name' => 'Lidl Ångpannegatan', 'address' => 'Ångpannegatan 18, Göteborg', 'latitude' => 57.7230, 'longitude' => 11.9200],
            ['name' => 'Lidl Sommarvädersgatan', 'address' => 'Sommarvädersgatan 5, Göteborg', 'latitude' => 57.7300, 'longitude' => 11.8800],

            ['name' => 'Stora Coop Sisjön', 'address' => 'Hantverksvägen 2, Askim', 'latitude' => 57.6414, 'longitude' => 11.9373],
            ['name' => 'Coop Mölndalsvägen', 'address' => 'Mölndalsvägen 3, Göteborg', 'latitude' => 57.6950, 'longitude' => 11.9870],
            ['name' => 'Coop Gamlestaden', 'address' => 'Treriksgatan 2, Göteborg', 'latitude' => 57.7300, 'longitude' => 12.0000],
            ['name' => 'Coop Kungsportsavenyen', 'address' => 'Kungsportsavenyen 26, Göteborg', 'latitude' => 57.7000, 'longitude' => 11.9740],
            ['name' => 'Coop Friggagatan', 'address' => 'Friggagatan 10, Göteborg', 'latitude' => 57.7080, 'longitude' => 11.9900],

            ['name' => 'ICA Nära Olskroken', 'address' => 'Redbergsvägen 2, Göteborg', 'latitude' => 57.7093, 'longitude' => 12.0013],
            ['name' => 'ICA Supermarket Masthugget', 'address' => 'Andra Långgatan 48, Göteborg', 'latitude' => 57.6991, 'longitude' => 11.9478],
            ['name' => 'ICA Nära Linnégatan', 'address' => 'Linnégatan 38, Göteborg', 'latitude' => 57.6963, 'longitude' => 11.9497],
            ['name' => 'Hemköp Linnégatan', 'address' => 'Linnégatan 47, Göteborg', 'latitude' => 57.6960, 'longitude' => 11.9501],
            ['name' => 'Willys Hemma Johanneberg', 'address' => 'Gibraltargatan 40, Göteborg', 'latitude' => 57.6834, 'longitude' => 11.9786],

            ['name' => 'Coop Landala', 'address' => 'Kapellgången 4, Göteborg', 'latitude' => 57.6961, 'longitude' => 11.9755],
            ['name' => 'ICA Nära Stampen', 'address' => 'Stampgatan 30, Göteborg', 'latitude' => 57.7071, 'longitude' => 11.9832],
            ['name' => 'Lidl Bäckebol', 'address' => 'Transportgatan 39, Hisings Backa', 'latitude' => 57.7556, 'longitude' => 11.9331],
            ['name' => 'Willys Sisjön', 'address' => 'Datavägen 15, Askim', 'latitude' => 57.6384, 'longitude' => 11.9312],
        ];

        foreach ($stores as $store) {
            Store::create($store);
        }
    }
}

