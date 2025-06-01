<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Store;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $products = [
            'Bananer', 'Äpplen', 'Päron', 'Apelsiner', 'Tomater', 'Gurka', 'Paprika', 'Sallad',
            'Morötter', 'Potatis', 'Lök', 'Vitlök', 'Broccoli', 'Blomkål', 'Spenat',

            'Kycklingfilé', 'Nötfärs', 'Fläskfilé', 'Lax', 'Räkor', 'Tofu', 'Vegobiffar',

            'Mjölk', 'Laktosfri mjölk', 'Havredryck', 'Yoghurt', 'Grädde', 'Smör', 'Ost',
            'Keso', 'Crème fraiche',

            'Bröd', 'Knäckebröd', 'Tortilla', 'Hamburgerbröd', 'Korvbröd',

            'Pasta', 'Ris', 'Couscous', 'Bulgur', 'Nudlar', 'Potatismos',

            'Kaffe', 'Te', 'Juice', 'Läsk', 'Vatten', 'Energidryck',

            'Ketchup', 'Senap', 'Majonnäs', 'Olivolja', 'Rapsolja', 'Balsamvinäger',

            'Salt', 'Peppar', 'Paprikapulver', 'Chili flakes', 'Basilika', 'Oregano',

            'Choklad', 'Chips', 'Glass', 'Godis', 'Kakor', 'Nötter',

            'Diskmedel', 'Tvättmedel', 'Toalettpapper', 'Schampo', 'Tandkräm'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($products),
            'is_organic' => $this->faker->boolean(30),
        ];
    }
}

