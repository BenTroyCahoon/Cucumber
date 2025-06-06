<?php

namespace App\Services\Scrapers;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;



class ProductScraper
{
    public function scrape(string $store, string $url): ?string
    {
        return match (strtolower($store)) {
            'willys' => $this->scrapeWillys($url),
            'hemköp', 'hemkop' => $this->scrapeHemkop($url),
            'ica' => $this->scrapeIca($url),
            'coop' => $this->scrapeCoop($url),
            default => null,
        };
    }

    private function scrapeWillys(string $url): ?string
    {
        return $this->extract($url, '.price__value');
    }

    private function scrapeHemkop(string $url): ?string
    {
        return $this->extract($url, '.price__value'); 
    }

    private function scrapeIca(string $url): ?string
    {
        return $this->extract($url, '.product-price__price'); 
    }

    private function scrapeCoop(string $url): ?string
    {
        return $this->extract($url, '.product-price'); 
    }

    private function extract(string $url, string $selector): ?string
    {
        try {
            $html = Http::get($url)->body();
            $crawler = new Crawler($html);

            return trim($crawler->filter($selector)->first()->text());
        } catch (\Exception $e) {
            logger()->error("Scrape failed: " . $e->getMessage());
            return null;
        }
    }
}
