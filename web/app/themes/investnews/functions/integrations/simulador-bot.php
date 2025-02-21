<?php

if(function_exists('acf_add_options_page'))
{
	acf_add_options_page(array(
	'page_title' 	=> 'Importador Simulador',
	'menu_title' 	=> 'Importador Simulador',
	'menu_slug' 	=> 'importador-simulador',
	'capability' 	=> 'edit_posts', 
	'parent_slug'	=> 'edit.php?post_type=simulador_ativos',
	'position'	=> false,
	'icon_url' 	=> 'dashicons-cloud-upload',
	'redirect'	=> false,
	));
}
add_filter( 'acf/load_field/name=lista_acoes_simulador_importadas', 'lista_acoes_simulador_importadas_field' );

function lista_acoes_simulador_importadas_field( $field ) {
	return $field;
}

function format_simulador_beta($beta){
	$beta = number_format($beta, 2);
	return $beta;
}

function get_posicao_simulador($posicao){
	// Defesa: qualquer beta até 0,6
	// Meio de campo: beta 0,7 a 1,0
	// Ataque: beta de 1,1 pra cima

	if($posicao < 0.8){
		return 'defesa';
	}
	if($posicao >= 0.8 && $posicao < 1.3){
		return 'meio-campo';
	}
	if($posicao >= 1.3){
		return 'ataque';
	}

}



function get_acao_yahoo($ticker){
	$url = "https://apidojo-yahoo-finance-v1.p.rapidapi.com/";
	$args = array(
		// Increase the timeout from the default of 5 to 10 seconds
		'timeout'    => 10,
	  
		// Overwrite the default: "WordPress/5.8;www.mysite.tld" header:
		'user-agent' => 'My special WordPress installation',
	  
		// Add a couple of custom HTTP headers
		'headers'    => array(
		   'X-RapidAPI-Key' => '83d5ffc220msh9768d887d5d02fdp10d2a4jsne8be5b2fc940',
		   'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
		   'Content-Type' => 'application/json',
		   'Accept' => 'application/json',
		),
	  
		// Skip validating the HTTP servers SSL cert;
		'sslverify' => false,
	  );

	$response = wp_remote_get( $url."market/v2/get-quotes?region=BR&symbols=".$ticker, $args );

	$body = wp_remote_retrieve_body( $response );
	$body = json_decode($body, true);

	return $body['quoteResponse']['result'];
}

function format_date_api($date){
	return gmdate("d/m/Y", $date);
}

function format_money($number){
	return number_format($number, 2,',', '.');
}

function format_chart_data($chartArray){

	$clearedDates = [];
	$clearedValues = [];

	$clearedArray = [];
	$fixedMonths = 13;
	$timestamps = array_pop($chartArray['timestamp']);
	$indicators = array_pop($chartArray['indicators']);

	$countTimeStamp = count($chartArray['timestamp']);
	$rowsToIgnore = $countTimeStamp - $fixedMonths;
	foreach($chartArray['timestamp'] as $k => $timestamp){
		if( $k < $rowsToIgnore ){
			continue;
		}

		array_push($clearedDates, format_date_api($timestamp));
	}

	foreach($chartArray['indicators'] as $i => $indicator){
		if( $i < $rowsToIgnore ){
			continue;
		}
		array_push($clearedValues, format_money($indicator));
	}


	$clearedArray['timestamp'] = $clearedDates;
	$clearedArray['indicators'] = $clearedValues;
	return $clearedArray;
}
function get_chart_data($ticker){
	$url = "https://apidojo-yahoo-finance-v1.p.rapidapi.com/";
	$args = array(
		// Increase the timeout from the default of 5 to 10 seconds
		'timeout'    => 10,
	  
		// Overwrite the default: "WordPress/5.8;www.mysite.tld" header:
		'user-agent' => 'My special WordPress installation',
	  
		// Add a couple of custom HTTP headers
		'headers'    => array(
		   'X-RapidAPI-Key' => '83d5ffc220msh9768d887d5d02fdp10d2a4jsne8be5b2fc940',
		   'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
		   'Content-Type' => 'application/json',
		   'Accept' => 'application/json',
		),
	  
		// Skip validating the HTTP servers SSL cert;
		'sslverify' => false,
	  );

	$response = wp_remote_get( $url."stock/v3/get-chart?region=BR&range=2y&interval=1mo&symbol=".$ticker, $args );

	$body = wp_remote_retrieve_body( $response );

	$body = json_decode($body, true);

	$dados_tratados = [];

    foreach($body['chart']['result'] as $result){
        $dados_tratados['timestamp'] = $result['timestamp'];
	    $dados_tratados['indicators'] = $result['indicators']['quote'][0]['close'];	
    }
	return $dados_tratados;
}






function change_all_simulador_ativos(){
	$searchPost = array(
        'posts_per_page' => -1,
		'post_type'		=> 'simulador_ativos',
        'meta_query'	=> array(
			'relation'		=> 'AND',
			array(
				'key'	 	=> 'importado',
				'value'	  	=> '1',
				'compare' 	=> '=',
			),	
		),
	);

	$the_query = new WP_Query( $searchPost );
	$posts = $the_query->get_posts();

	foreach($posts as $item){
		update_field( 'importado', '0', $item );
	}

}
add_action('change_all_simulador_ativos_hook', 'change_all_simulador_ativos');


add_action( 'pre_get_posts', 'simulador_ativos_posts_orderby' );
function simulador_ativos_posts_orderby( $query ) {
  if( ! is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if ( 'importado' === $query->get( 'orderby') ) {
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'importado' );
    $query->set( 'meta_type', '1' );
  }
}

function columns_simulador_ativos($columns) {
    unset($columns['date']);
    $columns['acao_ticker_slug'] = 'Ticker';
    $columns['posicao'] = 'Posição';
    $columns['beta'] = 'Beta';
    $columns['importado'] = 'Importado';
    $columns['importado_em'] = 'Importado Em';
    $columns['grafico_importado_em'] = 'Grafico Importado Em';

    return $columns;
}
add_filter('manage_simulador_ativos_posts_columns', 'columns_simulador_ativos');

function acf_admin_custom_columns( $column, $post_id ) {

	switch( $column ) {
      	case 'acao_ticker_slug':
	  		echo get_field('acao_ticker_slug', $post_id);
			break; 
		case 'posicao':
			$posicao = get_field('posicao', $post_id);
			switch( $posicao ) {
				case 'defesa':
					echo '<span style="background:#009900; color:white;padding: 3px 15px;font-weight:bold;">'. $posicao .'</span>';
					break;
				case 'meio-campo':
					echo '<span style="background:#1919ff; color:white;padding: 3px 15px;font-weight:bold;">'. $posicao.'</span>';
					break;
				case 'ataque':
					echo '<span style="background:#b20000; color:white;padding: 3px 15px;font-weight:bold;">'. $posicao.'</span>';
					break;

			}
			
			break; 	
		case 'beta':
			echo get_field('beta', $post_id);
			break;
	 	case 'importado':

            if(get_field('importado', $post_id) == 1){
                echo '<span style="background:green; color:white;padding: 3px 15px;font-weight:bold;">OK</span>';
            }else{ 
                echo '<span style="background:red; color:white;padding: 3px 15px;font-weight:bold;">X</span>';
            }
			break;
	 	case 'importado_em':
            echo get_field('importado_em', $post_id);
			break;
	 	case 'grafico_importado_em':
            echo get_field('grafico_importado_em', $post_id);
			break;
   }   
}
add_filter('manage_simulador_ativos_posts_custom_column','acf_admin_custom_columns',1,2);

add_filter( 'cron_schedules', 'investnews_add_cron_interval' );
function investnews_add_cron_interval( $schedules ) {
    $intervals= array(
        'in_five_secound' => array(
			'interval' => 5,
			'display' => 'In every five seconds'
		),
		'in_per_minute' => array(
			'interval' => 60,
			'display' => 'In every Minute'
		),
    );
    return $intervals;
}


if( !wp_next_scheduled( 'change_all_simulador_ativos_hook')){
	wp_schedule_event(time(), 'weekly', 'change_all_simulador_ativos_hook');
}

function calculateMonthRow($grafico){
	$novoArray = [];

	foreach($grafico['indicators'] as $i){
		$calculo = (( str_replace(',', '.', $i) / str_replace(',', '.', $grafico['indicators'][0])  ) - 1) * 100;
		$novoArray[] = round($calculo,2)	;
	}
	$grafico['graficoValorMes'] = $novoArray;
	$novoArray = [];

	foreach($grafico['timestamp'] as $t){
		$novoArray[] = $t;
	}
	$grafico['timestamp'] = $novoArray;

	$novoArray = [];
	$count = 0;
	$desempenhoEmpresa = ( ( str_replace(',', '.', end($grafico['indicators'])) / str_replace(',', '.', $grafico['indicators'][0])) -1 ) * 100;
	$grafico['desempenhoEmpresa'] = round($desempenhoEmpresa,2);

	return $grafico;
}

function precise_number($number)
		{
			$multiplied = $number * 100;
			$integerMultiplied = floor($multiplied);
			$twoDecimalResult = (float) ($integerMultiplied / 100);

			return $twoDecimalResult;
		}


function get_oscilation($acaoOscillation)
		{
			$acaoOscillation = precise_number($acaoOscillation);
			if ($acaoOscillation > 0) {
				$oscilacao = '<span class="ativos__variacao ativos__variacao--positivo">+' . $acaoOscillation . "%</span>";
			} elseif ($acaoOscillation < 0) {
				$oscilacao = '<span class="ativos__variacao ativos__variacao--negativo">' . $acaoOscillation . "%</span>";
			} elseif ($acaoOscillation == 0) {
				$oscilacao = '<span class="ativos__variacao ativos__variacao--neutro">0.00%</span>';
			}

			return $oscilacao;
		}


function getSimuladorDados(){

    $transient = get_transient( 'dados_simulador_ativos' );

    if( ! empty( $transient ) ) {

		return $transient;

    } else{
        $searchPost = array(
            'posts_per_page' => -1,
            'post_type'		=> 'simulador_ativos',
            'post_status' => 'draft',
            'order' => 'ASC',
            'orderby' => 'title',
        );
        
        $arrayData = [];
        $posts = get_posts($searchPost);
        foreach($posts as $post){ 
            $grafico = get_field( 'field_6303c4c0f5033', $post );
            $graficoDecode = base64_decode($grafico);
            $graficoArray = json_decode($graficoDecode, true);
			 
			$graficoFomatado = calculateMonthRow($graficoArray);
            $row = [];
            $row['ID'] = $post->ID;
            $row['title'] = $post->post_title;
            $row['ticker_slug'] = trim(get_field('acao_ticker_slug', $post));
            $row['beta'] = trim(get_field('beta', $post));
            $row['posicao'] = trim(get_field('posicao', $post));
            $row['grafico'] = $graficoFomatado;

            $arrayData[] = $row;
        }

        set_transient( 'dados_simulador_ativos', $arrayData, 7 * DAY_IN_SECONDS );

        return $arrayData;
    }
}	

add_filter( 'parse_query', 'wpse45436_posts_filter' );
/**
 * if submitted filter by post meta

 * @return Void
 */
function wpse45436_posts_filter( $query ){
    global $pagenow;
    $type = 'simulador_ativos'; // change to custom post name.
    if (isset($_GET['simulador_ativos'])) {
        $type = $_GET['simulador_ativos'];
    }
    if ( 'simulador_ativos' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['posicao']) && $_GET['posicao'] != '') {
        $query->query_vars['meta_key'] = 'posicao'; // change to meta key created by acf.
        $query->query_vars['meta_value'] = $_GET['posicao']; 
    }
    if ( 'simulador_ativos' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['zerado']) && $_GET['zerado'] != '') {
        $query->query_vars['meta_key'] = 'beta'; // change to meta key created by acf.
        $query->query_vars['meta_value'] = "0.00"; 
    }
}

