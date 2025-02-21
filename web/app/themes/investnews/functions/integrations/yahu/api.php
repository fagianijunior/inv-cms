<?php

class YahuFinanceApi
{
    private $apiConfig;

    public function __construct()
    {
        $this->apiConfig = [
            'url' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
            'key' => 'da5638bc3amsh9b60b89594d6eeap1e6fc1jsne28408ac672f',
        ];
    }

    /**
     * Get Ibovespa from Yahu Finance
     * @return array
     */
    public function getIbovespa()
    {
        
        if(get_transient('ibovespa_data')) {
            return get_transient('ibovespa_data');
        }

        delete_transient('ibovespa_data');
        $data = $this->getQuotes('US', ['^BVSP']);
        $ibov = $data['quoteResponse']['result'][0] ?? null;

        if ($ibov === null) {
            return false;
        }
        
        $ibovData = [
            'shortName' => $ibov['shortName'],
            'regularMarketPrice' => quotationNumberFormat($ibov['regularMarketPrice']),
            'regularMarketOpen' => quotationNumberFormat($ibov['regularMarketOpen']),
            'regularMarketPreviousClose' => quotationNumberFormat($ibov['regularMarketPreviousClose']),
            'regularMarketChangePercent' => number_format($ibov['regularMarketChangePercent'], 2, ',', '.'),
        ];

        set_transient('ibovespa_data', $ibovData, 300);

        return $ibovData;
    }

    /**
     * Get Ticker from Yahu Finance
     * @param string $region
     * @param array $symbols
     * @return array
     */
    public function getTicker($region = 'US', $symbol = '', $post_id = null)
    {
        $request = $this->getQuotes($region, [$symbol]);
        $data = $request['quoteResponse']['result'][0] ?? null;
        
        if ($data === null) {
            $symbol = $symbol . '.SA';

            $request = $this->getQuotes($region, [$symbol]);
            $data = $request['quoteResponse']['result'][0] ?? null;

            if ($data !== null && $post_id !== null) {
                update_field('ticker', $data['symbol'], $post_id);
            }
        }

        return $data;
    }

    /**
     * Get Quotes from Yahu Finance, return array with data.
     * @param string $region
     * @param array $symbols
     * @return array
     */
    public function getQuotes($region = 'US', $symbols = [])
    {
        $symbolsString = implode(',', $symbols);
        $url = $this->buildUrl("/market/v2/get-quotes?region=$region&symbols=$symbolsString");
        $response = $this->fetchData($url);

        if (is_wp_error($response)) {
            return [];
        }

        return json_decode(wp_remote_retrieve_body($response), true);
    }

    /**
     * Build the API URL
     * @param string $region
     * @param string $symbols
     * @return string
     */
    private function buildUrl($route)
    {
        return "https://" . $this->apiConfig['url'] . $route;
    }

    /**
     * Fetch data from the API
     * @param string $url
     * @return array|WP_Error
     */
    private function fetchData($url)
    {
        return wp_remote_get($url, [
            'headers' => [
                'x-rapidapi-key' => $this->apiConfig['key'],
                'x-rapidapi-host' => $this->apiConfig['url'],
            ],
        ]);
    }

    /**
     * Get ticker recent posts
     * @param int $tickerSymbol
     * @return object WP_Query object
     */
    public function getTickerRecentPosts($tickerSymbol)
    {
        $tickerSymbol = removeTickerSuffix($tickerSymbol);

        $args = array(
            'tag' => $tickerSymbol,
            'order' => 'DESC',
            'orderby' => 'date',
            'posts_per_page' => 8,
            'ignore_sticky_posts' => 1
        );

        $query = new WP_Query($args);

        return $query;
    }
}

