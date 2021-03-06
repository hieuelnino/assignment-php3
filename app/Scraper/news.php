<?php

namespace App\Scraper;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class News
{
    public function scrape()
    {
        $url = 'https://www.vietnamplus.vn/';
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $links = $crawler->filter('a.cms-link')->links();
        foreach ($links as $item) {
            // $crawlerBlog = $client->request('GET', strval($item));
            $crawlerBlog = $client->request('GET', $item->getUri());
            $title = $crawlerBlog->filter('h1')->text();
            $desc = $crawlerBlog->filterXPath('//div[.="cms-desc"]')->text();
            dd($desc);
        }
    }
}
