<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  
{
    $this->call([
        StoreSeeder::class,
        ProductSeeder::class,
    ]);
}

}
