<?php
/* Template Name: GoogleNews xml */
header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'date_query' => array(
            array(
                'after' => '48 hours ago',
                'inclusive' => true,
            ),
        ),
    );

    function titleChange($title)
    {
        $title = trim($title);
        $title = preg_replace('/[^a-zA-Z0-9\s]/', '', $title);
        $title = preg_replace('/\s+/', ' ', $title);

        return $title;
    }

    $posts = get_posts($args);
    foreach ($posts as $post) {
        $post_date = get_the_date('c');
        $title = titleChange(get_the_title());
        $post_url = get_permalink();

        $data_formatada = wp_date('c', strtotime($post_date), new DateTimeZone('UTC'));

        echo '<url>' .
            '<loc>' . $post_url . '</loc>' .
            '<news:news>' .
            '<news:publication>' .
            '<news:name>InvestNews</news:name>' .
            '<news:language>pt-BR</news:language>' .
            '</news:publication>' .
            '<news:publication_date>' . $data_formatada . '</news:publication_date>' .
            '<news:title>' . $title . '</news:title>' .
            '</news:news>' .
            '</url>';
    }
    wp_reset_postdata();
    ?>
</urlset>