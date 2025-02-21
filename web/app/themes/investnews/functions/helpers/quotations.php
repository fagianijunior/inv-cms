<?php
/**
 * Convert object data to array format
 *
 * @param object $data
 * @return array
 */
function object_to_array($data)
{
    if (is_array($data) || is_object($data)) {
        $result = array();
        foreach ($data as $key => $value) {
            $result[$key] = object_to_array($value);
        }
        return $result;
    }
    return $data;
}

/**
 * Convert long numbers to spoke way
 *
 * @param string $n
 * @return string
 */
function ins_nice_number($n)
{
    // first strip any formatting;
    $n = (0+str_replace(",", "", $n));
   
    // is this a number?
    if (!is_numeric($n)) {
        return false;
    }
   
    // now filter it;
    switch ($n) {
        case $n>1000000000000:
            $n = round(($n/1000000000000), 1);
            $n_size = explode(".", $n);
            ($n_size[0] == 1) ? $n_name = ' trilhão' : $n_name = ' trilhões';
            return $n . $n_name;
            break;
        case $n>1000000000:
            $n = round(($n/1000000000), 1);
            $n_size = explode(".", $n);
            ($n_size[0] == 1) ? $n_name = ' bilhão' : $n_name = ' bilhões';
            return $n . $n_name;
            break;
        case $n>1000000:
            $n = round(($n/1000000), 1);
            $n_size = explode(".", $n);
            ($n_size[0] == 1) ? $n_name = ' milhão' : $n_name = ' milhões';
            return $n . $n_name;
            break;
        case $n>1000:
            $n = round(($n/1000), 1);
            return $n . ' mil';
            break;
        default:
            return number_format($n);
    }
}

/**
 * Sort array by columns
 *
 * @param array $arr
 * @return array
 */
function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
{
	$sort_col = array();
	foreach ($arr as $key => $row) {
		$sort_col[$key] = $row[$col];
	}

	array_multisort($sort_col, $dir, $arr);
}

/**
 * Create a responsive table for criptomoedas quotation
 *
 * @param array $arr
 */
function create_TabelaResponsiva_CotacaoCripto($dados){
    ?>
        <table class="tabela-responsiva">
    
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Valor de Mercado</th>
              <th scope="col">Preço US$</th>
              <th scope="col">Preço R$</th>
              <th scope="col">Vol. Negociado (24h)</th>
              <th scope="col">Var (%)</th>
            </tr>
          </thead>
          <tbody>
    
        <?php
          foreach ($dados as $key => $current_cripto):
            $cripto_brl = floatval($current_cripto['brl']);
            $cripto_brl = number_format($cripto_brl, 2, ',', '.');
    
            $cripto_usd = floatval($current_cripto['usd']);
            $cripto_usd = number_format($cripto_usd, 2, ',', '.');
    
            $cripto_brl_signal = "+";
            $cripto_brl_24h_change = floatval($current_cripto['brl_24h_change']);
            $cripto_brl_24h_change = number_format($cripto_brl_24h_change, 2, ',', '.');
            $cripto_brl_signal_check = str_split($cripto_brl_24h_change);
            if($cripto_brl_signal_check[0] === "-") $cripto_brl_signal = "-";
    
            $cripto_brl_24h_vol = floatval($current_cripto['brl_24h_vol']);
            $cripto_brl_24h_vol = ins_nice_number($cripto_brl_24h_vol);
            
            $cripto_brl_market_cap = floatval($current_cripto['brl_market_cap']);
            $cripto_brl_market_cap = ins_nice_number($cripto_brl_market_cap);
        ?>
            <tr>
              <td data-label="Nome"><a href="<?php echo get_the_permalink( $current_cripto['id'] ); ?>" aria-label="Entrar" title="<?php echo get_the_title( $current_cripto['id'] ); ?>" target="_blank"><?php echo get_the_title( $current_cripto['id'] ); ?></a></td>
              <td data-label="Valor de Mercado"><?php echo $cripto_brl_market_cap ?></td>
              <td data-label="Preço">US$ <?php echo $cripto_usd ?></td>
              <td data-label="Preço">R$ <?php echo $cripto_brl ?></td>
              <td data-label="Vol. Negociado (24h)"><?php echo $cripto_brl_24h_vol ?></td>
              <td data-label="Var (%)">
                <?php if($cripto_brl_signal == "+"): ?>
                <span class="positive"><?php echo $cripto_brl_24h_change; ?>%</span>
                <?php endif;?>
                <?php if($cripto_brl_signal == "-"): ?>
                <span class="negative"><?php echo $cripto_brl_24h_change; ?>%</span>
                <?php endif;?>  
              </td>
            </tr>
          <?php endforeach ?>
          </tbody>
        </table>
    <?php
      }