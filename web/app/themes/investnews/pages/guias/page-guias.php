<?php
    /* Template Name: Guias */
    get_header(); 
?>
<div class="container">
    <div class="content-wrap">

        <div class="main-content">
            
            <section class="guias-head">
                <div class="guias-head-title">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </section>

            <section class="guias-search">
                <h2>Índice</h2>
                <form id="search-form">
                    <input type="text" class="search-input" id="search-posts" placeholder="Filtrar guias">
                    <a href="#" class="clear-form" style="display: none;" title="Limpar busca"></a>
                    <button type="submit" class="search-button">Filtrar</button>
                    <div id="loading-spinner" class="spinner" style="display:none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2">
                            <circle cx="12" cy="12" r="10" stroke-opacity="0.3" />
                            <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </form>
            </section>

            <section class="letter-group-wrap">
            <?php
            $query = new WP_Query(array(
                'post_type' => 'guias',
                'posts_per_page' => -1,
                'meta_key' => '_custom_title',
                'orderby' => 'meta_value',
                'order' => 'ASC',
            ));

            if ($query->have_posts()) :
                $current_letter = '';
                $is_first = true;

                while ($query->have_posts()) : $query->the_post();
                    // Get post first letter
                    $custom_title = get_post_meta($query->post->ID, '_custom_title', true);
                    $first_letter = strtoupper(mb_substr($custom_title, 0, 1));
                    $first_letter = remove_acento_vogal($first_letter);

                    // If the current letter is different from the first letter of 
                    // the title, close the previous div and open a new one
                    if ($current_letter !== $first_letter) {
                        if (!$is_first) {
                            echo '</div>'; // Fecha a <div> do grupo anterior, se não for a primeira iteração
                        }
                        // Updates the current letter and opens a new <div> for the new letter
                        $current_letter = $first_letter;
                        echo '<div class="letter-group">';
                            echo '<h2>' . $current_letter . '</h2>';
                            echo '<ul class="guias-list">';
                            $is_first = false; // After the first iteration, it updates to false
                    }
                    echo '<li class="guia"><a class="guia-link" href="' . get_permalink() . '">' . $custom_title . '</a></li>';
                endwhile;

                echo '</ul></div>';
                wp_reset_postdata();
            endif;
            ?>
            <div class="no-results-message" style="display: none;">
                <p>Nenhum guia encontrado para essa busca</p>
            </div>
            </section>
        </div>

        <div class="sidebar">
            
            <div class="widget-area widget-guias">
                <?php echo do_shortcode('[guias-mais-lidos-widget]'); ?>
            </div>

            <div class="widget-area widget-guias">
                <?php include get_template_directory() . '/components/on-code/newsletter/newsletter.php'; ?>
            </div>

        </div>

    </div>
</div>
<?php get_footer(); ?>
