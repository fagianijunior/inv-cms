<?php
/* Template Name: Simulador de carteira copa */
get_header();
?>
<div class="mvp-main-box container">
	<div class="simulador-campo-select-bg"></div>
	
	<section class="pre_hero">
		<div class="container">
			<div class="content_prehero">
				<h1 class="title"><?php the_title(); ?></h1>
				<div class="description">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>


	<section class='simulador-carteira-copa container'>
            <div class='select-area'>
                <div class='select-box'>
                    <div class="show_on_mobile">
                        <div class="">
                            <div class="click-blocker"></div>
                            <h2>Escolha o estilo de jogo do seu time para começar a simular a carteira</h2>

                            <div class='select-estrategia-holder'>
                                <select>
                                    <option value="0">Defensivo</option>
                                    <option value="1">Equilibrado</option>
                                    <option value="2">Ousado</option>
                                </select>
                                <span class="focus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='simulador-campo-holder'>
                <div class='simulador-campo'>
                    <div class="simulador-campo-select-bg"></div>
                    <div class='close-select'><i class="fa fa-times" aria-hidden="true"></i></div>
                    <div class="simulador-campo-select-holder">
                        <div class="simulador-campo-search">
                            <input type="text" name="search-empresas-simulador" class="simulador-campo-search-input" placeholder="Busque pela empresa">
                        </div>
                    </div>
                </div>
            </div>
            <?php
$simuladorGrafico = get_field('grafico_simulador_copa', 'options');

if ($simuladorGrafico && count($simuladorGrafico) > 1) {
    // Função para converter valores para números
    function formatarNumero($valor) {
        // Remove separadores de milhares e substitui vírgula decimal por ponto
        return is_numeric(str_replace(',', '.', str_replace('.', '', $valor))) 
            ? (float) str_replace(',', '.', str_replace('.', '', $valor)) 
            : 0;
    }

    // Converter valores iniciais e finais
    $smll_inicio = formatarNumero($simuladorGrafico[0]['smll'] ?? 0);
    $smll_fim = formatarNumero($simuladorGrafico[count($simuladorGrafico) - 1]['smll'] ?? 0);
    $idiv_inicio = formatarNumero($simuladorGrafico[0]['idiv'] ?? 0);
    $idiv_fim = formatarNumero($simuladorGrafico[count($simuladorGrafico) - 1]['idiv'] ?? 0);
    $ibov_inicio = formatarNumero($simuladorGrafico[0]['ibov'] ?? 0);
    $ibov_fim = formatarNumero($simuladorGrafico[count($simuladorGrafico) - 1]['ibov'] ?? 0);

    // Calcular médias
    $media_smll = ($smll_inicio > 0) ? (($smll_fim / $smll_inicio) - 1) * 100 : 0;
    $media_idiv = ($idiv_inicio > 0) ? (($idiv_fim / $idiv_inicio) - 1) * 100 : 0;
    $media_ibov = ($ibov_inicio > 0) ? (($ibov_fim / $ibov_inicio) - 1) * 100 : 0;
} else {
    $media_smll = $media_idiv = $media_ibov = 0;
}

?>


            <div class="guias__container container">
                <div class="guias__container-text">
                    <div class="guias__container-text__card desempenho_box">
                        <div class="click-blocker"></div>
                        <button aria-label="Entrar" class="accordion accordeon_desempenho">
                            <h2>Desempenho</h2>
                            <i class="fa fa-plus"></i>
                            <i class="fa fa-minus desactive"></i>
                        </button>
                        <div class="panel">
                            <div class="whitebox">
                                <div class="desempenho_list">
                                    <div class="desempenho_list_holder">
                                        <div class="desempenho_item">
                                            <span class="desempenho_smallball purple"></span>
                                            <p class="destaque">Sua seleção</p>
                                            <div class="div__altas grayscale">
                                                <span class="ativos__variacao variacao_suaselecao ativos__variacao--positivo">0%</span>
                                            </div>
                                        </div>
                                        <div class="desempenho_item">
                                            <span class="desempenho_smallball blue"></span>
                                            <p>Índice Small Caps (SMLL)</p>
                                            <div class="div__altas grayscale">
                                                <?php echo get_oscilation($media_smll); ?>
                                            </div>
                                        </div>
                                        <div class="desempenho_item">
                                            <span class="desempenho_smallball green"></span>
                                            <p>Índice Dividendos (IDIV)</p>
                                            <div class="div__altas grayscale">
                                                <?php echo get_oscilation($media_idiv); ?>
                                            </div>
                                        </div>
                                        <div class="desempenho_item">
                                            <span class="desempenho_smallball red"></span>
                                            <p>Índice Ibovespa (IBOV)</p>
                                            <div class="div__altas grayscale">
                                                <?php echo get_oscilation($media_ibov); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="desempenho_graph">
                                    <canvas class="chart show_on_mobile" height="200" style="width:100%;"></canvas>
                                    <canvas class="chart show_on_desk" height="200" style="width:100%;"></canvas>
                                </div>
                                <p class="desempenho_disclaimer">Desempenho de: 01/<?php echo date('n'); ?>/<?php echo (date('Y') - 1); ?> a 01/<?php echo date('n'); ?>/<?php echo date('Y'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class='share-box'>
                <div class="share-title">
                    <p>Compartilhe sua seleção</p>
                </div>

                <ul class="mvp-post-soc-list left relative">
                    <a href="#" aria-label="Entrar" title="Compartilhar este post no WhatsApp">
                        <li class="mvp-post-soc-whats">
                            <i class="fa fa-2 fa-whatsapp" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a href="#" aria-label="Entrar" title="Compartilhar este post no Twitter">
                        <li class="mvp-post-soc-twit">
                            <i class="fa fa-2 fa-twitter" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a href="#" aria-label="Entrar" title="Compartilhar este post no Facebook">
                        <li class="mvp-post-soc-fb">
                            <i class="fa fa-2 fa-facebook" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a href="#" aria-label="Entrar" title="Compartilhar este post no LinkedIn">
                        <li class="mvp-post-soc-linked">
                            <i class="fa fa-2 fa-linkedin" aria-hidden="true"></i>
                        </li>
                    </a>
                    <a href="#" aria-label="Entrar" title="Compartilhar este post no Telegram">
                        <li class="mvp-post-soc-telegram">
                            <img src="<?php echo get_template_directory_uri() ?>/images/telegram-gray.png" height="18" width="18" alt="Telegram">
                        </li>
                    </a>
                    <a href="#" aria-label="Entrar" title="Flipar este post">
                        <li class="mvp-post-soc-flipboard">
                            <img src="<?php echo get_template_directory_uri() ?>/images/flipboard-gray.png" alt="Flipboard">
                        </li>
                    </a>
                </ul>
            </div> -->
	</section>

	<section class="mvp-main-box guias__container second_container">

        <div class="container">
            <div class="guias__container-text container">
                <div class="guias__container-text__card container_sua_selecao">
                    <button aria-label="Entrar" class="accordion accordion_sua_selecao">
                        <h2>Sua Seleção</h2>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus desactive"></i>
                    </button>
                    <div class="panel">
                        <div class="whitebox no-flex">
                            <div class="selecao_list">
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                                <div class="selecao_item">
                                    <div class="selecao_ticker">
                                        <p>Ticker <span class="selecao_name">- NOME DA EMPRESA COMPLETA</span></p>
                                    </div>
                                    <div class="selecao_value">
                                        <p>-99.99%</p>
                                    </div>
                                    <div class="selecao_cta">
                                        <p><a href="#" title="Invista agora" aria-label="Entrar">Invista agora</a></p>
                                    </div>
                                </div>
                            </div>
                            <p class="selecao_disclaimer">Desempenho de: 01/<?php echo date('n'); ?>/<?php echo (date('Y') - 1); ?> a 01/<?php echo date('n'); ?>/<?php echo date('Y'); ?></p>
                        </div>
                        <div class="disclaimer_campo">
                            <p>O Simulador de Carteira é uma ferramenta meramente informativa. Esta simulação é baseada em informações públicas e não é uma recomendação de investimento para você. A decisão final de investir será sempre sua, levando em conta seus objetivos e tolerância a distintos níveis de risco. Antes de investir, é importante você conhecer as características e os riscos de cada produto e, também, o seu perfil de investidor, para saber se o produto está alinhado ao seu perfil ou se você está de acordo com o desalinhamento.</p>
                        </div>
                    </div>
                </div>
                <div class="guias__container-text__card">
                    <button aria-label="Entrar" class="accordion">
                        <h2>Características</h2>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus desactive"></i>
                    </button>
                    <div class="panel">
                        <div class="simple_text">
                            <p style="margin-bottom: 20px;">
                                <span style="color:#753CFF; font-weight: 700;">Ataque</span>: para quem gosta de ter em carteiras aquelas ações mais arriscadas, que possuem um maior potencial de valorização, mas também uma volatilidade, normalmente associadas a um beta elevado e empresas de menor porte.
                            </p>
                            <p style="margin-bottom: 20px;">
                                <span style="color:#5500FF; font-weight: 700;">Meio de campo</span>: para quem prefere um misto de defesa e ataque, equilibrando companhias com potenciais de valorização variados, o que acaba deixando a carteira em um risco similar ao risco de mercado.
                            </p>
                            <p style="margin-bottom: 20px;">
                                <span style="color:#000; font-weight: 700;">Defesa</span>: para quem gosta de garantir um bom resultado mesmo diante das adversidades, as ações defensivas são normalmente associadas a um beta mais baixo e pagadoras de dividendos. Embora o potencial de valorização tenda a ser menor, possuem alta resiliência.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="guias__container-text__card">
                    <button aria-label="Entrar" class="accordion">
                        <h2>Como funciona o simulador?</h2>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus desactive"></i>
                    </button>
                    <div class="panel">
                        <div class="simple_text">
                            <p>A seleção dos ativos foi feita pelo analista da NuInvest Murilo Breder. Para a escolha da lista das ações que fazem parte do simulador de carteiras do InvestNews, foi levado em consideração o índice beta. Trata-se de um cálculo que oscila, normalmente, próximo de 1. Ele demonstra a medida de risco de um determinado ativo a partir do comparativo do histórico do comportamento da ação em relação ao Ibovespa, principal índice da B3. Confira como interpretar:</p>
                            <ul style="margin-top: 16px;">
                                <li style="margin-bottom: 8px;"><span style="font-weight: 500;">Beta entre 0.8 e 1.3 (meio de campo)</span>: considerado como ativo neutro, pois a ação se movimenta de acordo com o índice Ibovespa.</li>
                                <li style="margin-bottom: 8px;"><span style="font-weight: 500;">Beta menor que 0.8 (defesa)</span>: sinaliza ação mais defensiva, que tem menor volatilidade, já que oscila menos do que o Ibovespa.</li>
                                <li style="margin-bottom: 8px;"><span style="font-weight: 500;">Beta maior que 1.3 (ataque)</span>: o ativo é considerado mais volátil, ou seja, de maior risco, pois as ações oscilam com maior ou menor intensidade do que o Ibovespa.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="guias__container-text__card">
                    <button aria-label="Entrar" class="accordion">
                        <h2>O que é uma Carteira de Investimentos?</h2>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus desactive"></i>
                    </button>
                    <div class="panel">
                        <div class="simple_text">
                            <p>
                                Uma carteira de investimentos é o conjunto de todas as aplicações de um investidor. Ela também é chamada de cesta ou portfólio de investimentos.
                            </p>

                            <p>
                                A carteira pode ser composta tanto por ativos de renda fixa, como CDBs e títulos do Tesouro Direto, quanto de renda variável, como ações e fundos de investimentos.
                            </p>

                            <p>
                                Quando se investe em ações é importante montar uma carteira diversificada, de forma a equilibrar e equilibrar a relação entre risco e retorno conforme o perfil do investidor. Este simulador de carteira de ações te ajuda a simular diferentes composições de diversificação que uma carteira pode ter e como seria seu desempenho em relação a alguns dos principais índices do mercado.
                            </p>

                            <p>
                                A diversificação da carteira é uma forma de proteger o seu patrimônio, já que perdas em uma aplicação podem ser compensadas pela valorização de outras.
                            </p>

                            <p>
                                No entanto, lembre-se de escolher os ativos com cautela e de forma alinhada ao seu perfil de investidor. Uma carteira diversificada ajuda a reduzir os riscos, mas não os elimina totalmente.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="guias__container-text__card">
                    <button aria-label="Entrar" class="accordion">
                        <h2>Como montar uma carteira de investimentos em ações?</h2>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus desactive"></i>
                    </button>
                    <div class="panel">
                        <div class="simple_text">
                            <p>
                                Primeiro, você precisa definir o seu perfil de investidor e o objetivo por trás das suas aplicações.
                            </p>

                            <p>
                                O mais indicado é que você distribua seus investimentos de acordo com o nível de risco que está disposto a tolerar.
                            </p>

                            <p>
                                Se o seu perfil é conservador, analistas recomendam que sua carteira possua mais ativos de renda fixa. Porém, se você aceita correr mais riscos em busca de ganhos maiores, sua carteira irá conter mais ativos de renda variável.
                            </p>
                            <p>
                                Descubra aqui o seu perfil de investidor.
                            </p>

                            <p>
                                Definitivamente, é fundamental que você pesquise bastante sobre os investimentos antes de escolher onde aplicar seu dinheiro. Ao montar uma carteira de investimentos diversificada, você consegue obter resultados mais alinhados aos seus objetivos.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="guias__container-text__card">
                    <button aria-label="Entrar" class="accordion">
                        <h2>Aprenda a investir</h2>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus desactive"></i>
                    </button>
                    <div class="panel">
                        <div class="simple_text">
                            <p>
                                Se você não sabe por onde começar sua jornada no mercado financeiro, antes de simular sua carteira de investimentos, confira alguns conteúdos úteis:
                            </p>
                            <ul>
                                <li>
                                    <a href="https://investnews.com.br/guias/como-funciona-o-mercado-financeiro/" title="Mercado financeiro:  o que é e como funciona?" aria-label="Entrar" target="_blank">Mercado financeiro:</a> o que é e como funciona?
                                </li>

                                <li>
                                    Fique por dentro das notícias sobre o <a href="https://investnews.com.br/boletim-investnews/" title="Boletim InvestNews" aria-label="Entrar" target="_blank">fechamento de mercado</a>
                                </li>

                                <li>
                                    <a href="https://investnews.com.br/guias/renda-fixa-o-que-e/" title="Renda fixa" aria-label="Entrar" target="_blank">O que é renda fixa</a>, como funciona e quais os principais investimentos
                                </li>

                                <li>
                                    <a href="https://investnews.com.br/guias/renda-variavel-o-que-e-e-como-investir/" title="Renda variável" aria-label="Entrar" target="_blank">Renda variável</a>: o que é e quais as opções para investir
                                </li>

                                <li>
                                    <a href="https://investnews.com.br/financas/que-tipo-de-investidor-e-voce-conheca-os-3-perfis-classicos-do-mercado/" title="Conheça os 3 perfis clássicos do mercado" aria-label="Entrar" target="_blank">Que tipo de investidor é você?</a> Conheça os 3 perfis clássicos do mercado
                                </li>

                                <li>
                                    <a href="https://investnews.com.br/financas/carteira-de-investimentos-como-montar-do-zero/" title="Carteira de investimentos: saiba como montar uma do zero" aria-label="Entrar" target="_blank">Carteira de investimentos:</a> saiba como montar uma do zero
                                </li>
                            </ul>
                            <p>
                                Quer aprender mais? Acesse nosso <a href="https://investnews.com.br/guias/" title="Guia financeiro" aria-label="Entrar" target="_blank">guia financeiro.</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>

</div>

<div class="tutorial_block">
	<div class='close_geral_tutorial'><i class="fa fa-times" aria-hidden="true"></i></div>
	<div class="tutorial_bg"></div>
	<div class="tutorial_fases">

		<div class="feedback_share_selecionar_todos">
			<div class="tutorial_text_box">
				<p>Antes de compartilhar sua seleção, selecione todos seus jogadores.</p>
				<p class='red_text'>Ainda falta selecionar:</p>
				<div>
					<p class='ticker_feedback'>
						Ataque
					</p>
				</div>
				<div class="tutorial_bt_area centered">
					<div class="tutorial_close">FECHAR</div>
				</div>
			</div>

		</div>
		<div class="fase_1">
			<div class="tutorial_text_box">
				<p>Agora, você vai montar o time de craques para compor sua melhor seleção de investimentos. Para isso, escolha o estilo de carteira que você quer simular e, em seguida, escolha um a um os ativos que não podem faltar no seu time. Vamos lá?</p>
				<div class="tutorial_bt_area">
					<div class="tutorial_close">FECHAR</div>
					<div class="tutorial_next">PRÓXIMO PASSO</div>
				</div>
			</div>
		</div>
		<div class="fase_2">
			<div class="tutorial_text_box">
				<img class="tutorial_img_s2" src="<?php echo get_template_directory_uri() ?>/assets/images/step2.png" alt="Passo 2 - Estilo de jogo">
				<p>Escolha o estilo de jogo que você gostaria para o seu time de ações. Quer ficar mais na defensiva, considera que o empate é um bom resultado, ou bora para o ataque total com um time mais ousado (e de maior risco também)?</p>
				<div class="tutorial_bt_area">
					<div class="tutorial_close">FECHAR</div>
					<div class="tutorial_next">PRÓXIMO PASSO</div>
				</div>
			</div>
		</div>
		<div class="fase_3">
			<div class="tutorial_text_box">
				<img class="tutorial_img_s3" src="<?php echo get_template_directory_uri() ?>/assets/images/step3.png" alt="Passo 3 - Convoque seu time clicando nos nomes no campo">
				<p>Agora é hora de convocar cada artilheiro para sua seleção. É só clicar em cima do “jogador” (TICKER) que deseja para montar o seu time.</p>
				<div class="tutorial_bt_area">
					<div class="tutorial_close">FECHAR</div>
					<div class="tutorial_next">PRÓXIMO PASSO</div>
				</div>
			</div>
		</div>
		<div class="fase_4">
			<div class="tutorial_text_box">
				<img class="tutorial_img_s4" src="<?php echo get_template_directory_uri() ?>/assets/images/step4.png" alt="Passo 4 - Escolhendo jogadores">
				<p>Nessa etapa, você pode escolher os seus "jogadores" entre as opções listadas ou, se preferir, pode digitar o nome da empresa ou ticker da cotação na barra de buscas:</p>
				<div class="tutorial_bt_area">
					<div class="tutorial_close">FECHAR</div>
					<div class="tutorial_next">PRÓXIMO PASSO</div>
				</div>
			</div>
		</div>
		<div class="fase_5">
			<div class="tutorial_text_box">
				<img class="tutorial_img_s5" src="<?php echo get_template_directory_uri() ?>/assets/images/step5.png" alt="Passo 5 - Completando o time">
				<p>Setor completo! <br>Vamos selecionar os próximos "jogadores"?</p>
				<div class="tutorial_bt_area">
					<div class="tutorial_close">FECHAR</div>
					<div class="tutorial_next">PRÓXIMO PASSO</div>
				</div>
			</div>
		</div>
		<div class="fase_6">
			<div class="tutorial_text_box">
				<img class="tutorial_img_s6_d" src="<?php echo get_template_directory_uri() ?>/assets/images/step6_d.png" alt="Passo 6 - Feito, compare sua selecao pelo gráfico">
				<img class="tutorial_img_s6_m" src="<?php echo get_template_directory_uri() ?>/assets/images/step6_m.png" alt="Passo 6 - Feito, compare sua selecao pelo gráfico">
				<div class='tutorial_text_box_inside'>
					<p>Está feito! <br> Com a sua seleção formada, você pode ver como foi o desempenho dele neste ano e comparar com os "times rivais", os principais índices do mercado.</p>
					<div class="tutorial_bt_area centered">
						<div class="tutorial_close">FECHAR</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $simuladorDados = getSimuladorDados(); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
	var _DATA = {
		ataque: [
			<?php foreach ($simuladorDados as $ativo) : if ($ativo['posicao'] == "ataque") : ?> {
						"id": <?php echo $ativo['ID'] ?>,
						"desempenho": <?php echo $ativo['grafico']['desempenhoEmpresa'] ?>,
						"grafico": [<?php foreach ($ativo['grafico']['graficoValorMes'] as $graficoValor) echo '"' . $graficoValor . '", '; ?>],
						"nome": "<?php echo $ativo['title'] ?>",
						"ticker": "<?php $ticker = explode(".", $ativo['ticker_slug']);
									echo $ticker[0]; ?>"
					},
			<?php endif;
			endforeach; ?>
		],
		meio: [
			<?php foreach ($simuladorDados as $ativo) : if ($ativo['posicao'] == "meio-campo") : ?> {
						"id": <?php echo $ativo['ID'] ?>,
						"desempenho": <?php echo $ativo['grafico']['desempenhoEmpresa'] ?>,
						"grafico": [<?php foreach ($ativo['grafico']['graficoValorMes'] as $graficoValor) echo '"' . $graficoValor . '", '; ?>],
						"nome": "<?php echo $ativo['title'] ?>",
						"ticker": "<?php $ticker = explode(".", $ativo['ticker_slug']);
									echo $ticker[0]; ?>"
					},
			<?php endif;
			endforeach; ?>
		],
		defesa: [
			<?php foreach ($simuladorDados as $ativo) : if ($ativo['posicao'] == "defesa") : ?> {
						"id": <?php echo $ativo['ID'] ?>,
						"desempenho": <?php echo $ativo['grafico']['desempenhoEmpresa'] ?>,
						"grafico": [<?php foreach ($ativo['grafico']['graficoValorMes'] as $graficoValor) echo '"' . $graficoValor . '", '; ?>],
						"nome": "<?php echo $ativo['title'] ?>",
						"ticker": "<?php $ticker = explode(".", $ativo['ticker_slug']);
									echo $ticker[0]; ?>"
					},
			<?php endif;
			endforeach; ?>
		]
	}
</script>
<?php

// Verifique se o gráfico tem dados
if ($simuladorGrafico && count($simuladorGrafico) > 0) {
    // Labels
    $label = array_map(function($item) {
        return $item['data'];
    }, $simuladorGrafico);

    // Data SMLL
    $data_smll = array_map(function($item) use ($simuladorGrafico) {
        $smll_inicio = formatarNumero($simuladorGrafico[0]['smll'] ?? 0);
        $smll_atual = formatarNumero($item['smll'] ?? 0);
        return ($smll_inicio > 0) ? ((($smll_atual / $smll_inicio) - 1) * 100) : 0;
    }, $simuladorGrafico);

    // Data IDIV
    $data_idiv = array_map(function($item) use ($simuladorGrafico) {
        $idiv_inicio = formatarNumero($simuladorGrafico[0]['idiv'] ?? 0);
        $idiv_atual = formatarNumero($item['idiv'] ?? 0);
        return ($idiv_inicio > 0) ? ((($idiv_atual / $idiv_inicio) - 1) * 100) : 0;
    }, $simuladorGrafico);

    // Data IBOV
    $data_ibov = array_map(function($item) use ($simuladorGrafico) {
        $ibov_inicio = formatarNumero($simuladorGrafico[0]['ibov'] ?? 0);
        $ibov_atual = formatarNumero($item['ibov'] ?? 0);
        return ($ibov_inicio > 0) ? ((($ibov_atual / $ibov_inicio) - 1) * 100) : 0;
    }, $simuladorGrafico);
} else {
    $label = [];
    $data_smll = [];
    $data_idiv = [];
    $data_ibov = [];
}
?>



<script>

// Passar os dados para o JavaScript de forma segura
var label = <?php echo json_encode($label); ?>;
var label_mob = [];

var data_smll = <?php echo json_encode($data_smll); ?>;
var data_smll_mob = [];

var data_idiv = <?php echo json_encode($data_idiv); ?>;
var data_idiv_mob = [];

var data_ibov = <?php echo json_encode($data_ibov); ?>;
var data_ibov_mob = [];

	for (var i = 0; i < label.length; i++) {
		label[i] = label[i].replace('20', '');
		if (i % 2 == 0) {
			label_mob.push(label[i]);
			data_smll_mob.push(data_smll[i]);
			data_idiv_mob.push(data_idiv[i]);
			data_ibov_mob.push(data_ibov[i]);
		}
	}


	var config = {
		"type": "line",
		"data": {
			"labels": label,
			"datasets": [{
					"label": "Sua seleção",
					"borderColor": "#E6258B",
					"backgroundColor": "#E6258B",
					"fill": false,
					"data": [3, 28, 75, 25, 7, 11, 79, 69, 97, 61],
					"borderWidth": 2,
					"pointRadius": 3
				},
				{
					"label": "SMLL",
					"borderColor": "#1E8195",
					"backgroundColor": "#1E8195",
					"fill": false,
					"data": data_smll,
					"borderWidth": 1,
					"pointRadius": 2
				},
				{
					"label": "IDIV",
					"borderColor": "#267D3C",
					"backgroundColor": "#267D3C",
					"fill": false,
					"data": data_idiv,
					"borderWidth": 1,
					"pointRadius": 2
				},
				{
					"label": "IBOV",
					"borderColor": "#F66666",
					"backgroundColor": "#F66666",
					"fill": false,
					"data": data_ibov,
					"borderWidth": 1,
					"pointRadius": 2
				}
			]
		},
		"options": {
			"responsive": true,
			"maintainAspectRatio": false,
			"title": {
				"display": false
			},
			"legend": {
				"display": false
			},
			"tooltips": {
				"mode": "index",
				"intersect": false
			},
		},
		"hover": {
			"mode": "nearest",
			"intersect": true
		}
	};
	var ctx = document.getElementsByClassName('chart show_on_desk')[0].getContext('2d');
	var chartDesk = new Chart(ctx, config);

	var config2 = {
		"type": "line",
		"data": {
			"labels": label_mob,
			"datasets": [{
					"label": "Sua seleção",
					"borderColor": "#E6258B",
					"backgroundColor": "#E6258B",
					"fill": false,
					"data": [7, 11, 79, 69, 97, 61],
					"borderWidth": 2,
					"pointRadius": 3
				},
				{
					"label": "SMLL",
					"borderColor": "#1E8195",
					"backgroundColor": "#1E8195",
					"fill": false,
					"data": data_smll_mob,
					"borderWidth": 1,
					"pointRadius": 2
				},
				{
					"label": "IDIV",
					"borderColor": "#267D3C",
					"backgroundColor": "#267D3C",
					"fill": false,
					"data": data_idiv_mob,
					"borderWidth": 1,
					"pointRadius": 2
				},
				{
					"label": "IBOV",
					"borderColor": "#F66666",
					"backgroundColor": "#F66666",
					"fill": false,
					"data": data_ibov_mob,
					"borderWidth": 1,
					"pointRadius": 2
				}
			]
		},
		"options": {
			"responsive": true,
			"maintainAspectRatio": false,
			"title": {
				"display": false
			},
			"legend": {
				"display": false
			},
			"tooltips": {
				"mode": "index",
				"intersect": false
			},
		},
		"hover": {
			"mode": "nearest",
			"intersect": true
		}
	};
	var ctx2 = document.getElementsByClassName('chart show_on_mobile')[0].getContext('2d');
	var chartMobile = new Chart(ctx2, config2);
</script>

<?php get_footer(); ?>