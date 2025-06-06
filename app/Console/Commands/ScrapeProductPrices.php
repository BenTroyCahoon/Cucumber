<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Services\Scrapers\ProductScraper;

class ScrapeProductPrices extends Command
{
    protected $signature = 'scrape:prices';
    protected $description = 'Scrape product prices from store websites';

    public function handle()
    {
        $scraper = new ProductScraper();

        $this->info("Starting price scraping...");

        Product::with('store')->get()->each(function ($product) use ($scraper) {
            $storeName = $product->store->name ?? 'unknown';

            $price = $scraper->scrape($storeName, $product->url);

            if ($price) {
                $product->update([
                    'price' => $price,
                    'last_scraped_at' => now(),
                ]);

                $this->info("✔ {$product->name} ({$storeName}) — $price");
            } else {
                $this->warn("✘ Failed to scrape {$product->name} ({$storeName})");
            }
        });

        $this->info("Done!");
    }
}

