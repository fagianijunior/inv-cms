<?php
// Helpers to use in Yahu Finance API

/**
 * Format number to quotation format (Ex: 123.456)
 * @param $number float Number to format
 * @return string
 */
function quotationNumberFormat($number)
{
    return number_format(round($number), 0, ',', '.');
}

/**
 * Format number to decimal format (Ex: 123,45)
 * @param $number Number to format
 * @return string
 */
function formatWithDecimal($number)
{
    return number_format($number, 2, ',', '.');
}

/**
 * Remove .SA from ticker symbol
 * @param string $tickerSymbol
 * @return string
 * @example VALE3.SA -> VALE3
 */
function removeTickerSuffix(string $tickerSymbol)
{
    return str_replace('.SA', '', $tickerSymbol);
}

/**
 * Get related tickers from ACF field
 * @param array $relatedTickers
 * @return array
 */
function getRelatedTickers($post_id)
{
    $relatedTickers = get_field('ativos_relacionados', $post_id);

    if(!$relatedTickers) {
        return null;
    }

    $permalinks = [];

    foreach ($relatedTickers as $tickerID) {
        $permalinks[] = [
            'id' => $tickerID,
            'permalink' => get_permalink($tickerID),
            'ticker' => getTickerSymbol($tickerID)
        ];
    }

    return $permalinks;
}

/**
 * Get ticker Symbol
 * @param int $post_id
 * @return string
 * @example VALE3
 */
function getTickerSymbol($post_id)
{
    $tickerSymbol = get_field('ticker', $post_id);

    if (!$tickerSymbol) {
        $tickers = get_post_meta($post_id, 'mvp_tickers', true);

        foreach ($tickers as $ticker) {
            if ($ticker) {
                $tickerSymbol = $ticker;
            }
        }
    }

    return $tickerSymbol;
}

/**
 * Check if percentage is positive or negative
 * @param string $percentage
 * @return string
 * @example 1.23 -> up
 * @example -1.23 -> down
 */
function checkPercentage(string $percentage)
{
    return $percentage >= 0 ? 'up' : 'down';
}



