<?php
/**
 * Access, get and save cripto data
 */
function access_cripto_data()
{
    $cripto_data = get_transient('cripto_data');
    // $cripto_data = null;

    if (!empty($cripto_data)) {
        $cripto_data = object_to_array($cripto_data);
        return $cripto_data;
    } else {
        $args = array(
            'post_type' => 'criptomoedas',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );

        $query = new WP_Query($args);
        
        if ($query->have_posts()) {
            $criptos = array();
            while ($query->have_posts()) {
                $query->the_post();
                $criptos[] = get_field('ticker_criptomoeda');
            }
        }
        wp_reset_postdata();
        
        $criptos = implode("%2C", $criptos);

        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "Accept-language: en\r\n" .
                    "X-CMC_PRO_API_KEY: 906126b5-6f27-4e65-8368-4b33145ed3e4\r\n"
            ]
        ];
        
        try {
            $context = stream_context_create($opts);
            // $coingecko_data = 'https://api.coingecko.com/api/v3/simple/price?ids=' . $criptos . '&vs_currencies=USD%2CBRL&include_market_cap=true&include_24hr_vol=true&include_24hr_change=true';
            $coinmarketcap_data = "https://pro-api.coinmarketcap.com/v2/cryptocurrency/quotes/latest?convert=BRL,USD&symbol=" . $criptos;
            $cripto_data = file_get_contents($coinmarketcap_data, false, $context);
            $status_line = $http_response_header[0];
            preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
            $status = $match[1];

            if ($status == 200 || $status == '200') {
                $cripto_data = json_decode($cripto_data);
                set_transient('cripto_data', $cripto_data, 30);
                $cripto_data = object_to_array($cripto_data);
            } else {
                $cripto_data = null;
            }
        } catch (Exception $e) {
            $cripto_data = null;
        }
        return $cripto_data;
    }
}
