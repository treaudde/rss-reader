<?php

use Illuminate\Database\Seeder;
use App\Domain\RssFeed\Entities\RssFeed;

class RssFeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rssFeeds = [
            [
                'name' => 'Le Monde',
                'url' => 'https://www.lemonde.fr/rss/une.xml'
            ],
            [
                'name' => 'La Repubblica',
                'url' => 'http://www.repubblica.it/rss/esteri/rss2.0.xml']
            ,
            [
                'name' => 'Abc.es',
                'url' => 'https://www.abc.es/rss/feeds/abc_Internacional.xml'
            ],
            [
                'name' => 'BBC Português',
                'url' => 'http://feeds.bbci.co.uk/portuguese/rss.xml'
            ],
            [
                'name' => 'Volkskrant',
                'url' => 'https://www.volkskrant.nl/nieuws-achtergrond/rss.xml'
            ],
            [
                'name' => 'Der Spiegel',
                'url' => 'https://www.spiegel.de/schlagzeilen/tops/index.rss'
            ],
            [
                'name' => 'NRK',
                'url' => 'https://www.nrk.no/toppsaker.rss'
            ],
            [
                'name' => 'DR.dk',
                'url' => 'https://www.dr.dk/nyheder/service/feeds/mostread/allenyheder/'
            ],
            [
                'name' => 'Aftonbladet',
                'url' => 'https://www.aftonbladet.se/rss.xml'
            ]
        ];

        foreach ($rssFeeds as $rssFeed) {
            RssFeed::create(
                $rssFeed
            );
        }
    }
}
