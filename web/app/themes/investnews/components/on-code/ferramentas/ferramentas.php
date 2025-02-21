<?php

/**
 * Template part para exibir os cards de ferramentas em outros templates
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WordPress
 */

/**
 * Args recebidos pelo template para o loop de ferramentas
 * @var array $args
 * @var string $args['ferramenta'] Nome da ferramenta
 * @var array $args['posts'] Quantidade máxima de posts a serem exibidos (default 6)
 * @var int $args['pageID'] ID da página que contém o repetidor de ferramentas
 */

$tool = $args['ferramenta'];
$posts = $args['posts'] ? $args['posts'] : 6;

/**
 * Verifica se o ambiente é QA (https://hmleasynvest.investnews.com.br/) ou PROD (https://investnews.com.br/)
 */
$env = $_SERVER['HTTP_HOST'] === 'investnews.com.br' ? 'prod' : 'qa';

/* ID da Página que contém o Repetidor de Ferramentas */
$pageID = $env === 'prod' ? 488859 : 296658;

$pageID = 489025;

/* Separa o array de ferramenta de acordo com o título fornecido, Ex: Calculadoras, caso esteja vazio, não carrega o componente */

$tools = array_values(array_filter(get_field('ferramentas', $pageID), function ($item) use ($tool) {
  return $item['titulo_ferramentas'] === $tool;
}));

if (empty($tools)) {
  return;
}

/* Remove o item que da URL atual */

$currentURL = get_permalink();

// Organiza o array de ferramentas removendo o indice com a URL da pagina atual
// foreach ($tools[0]['ferramenta'] as $key => $value) {
//   if ($value['link_para_ferramenta'] === $currentURL) {
//     unset($tools[0]['ferramenta'][$key]);
//   }
// }

// Organiza o array de ferramentas, deixando apenas a quantidade definida no máximo
$tools = array_slice($tools, 0, $posts);

?>

<div class="ferramentas-title">
  <h2>Aproveite e conheça um pouco mais das nossas ferramentas</h2>
</div>

<div class="ferramentas__wrapper">

  <?php foreach ($tools as $item) : ?>

    <a href="<?php echo $item['link_para_ferramenta']; ?>" title="<?php echo $item['tipo'] . ": " . $item['titulo']; ?>" class="card__item" style="<?php if ($item['em_breve']) : echo 'pointer-events: none'; endif; ?>">
      <?php if ($item['em_breve']) : ?>
        <span class="card__tag">Em breve</span>
      <?php endif; ?>
      <div class="card__content">
        <span class="card__type">
          <?php echo $item['tipo']; ?>
        </span>
        <h3 class="card__title">
          <?php echo $item['titulo']; ?>
        </h3>
      </div>
    </a>

  <?php endforeach; ?>
</div>
