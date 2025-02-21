<?php
/**
 * Pagination
 * @param int $pages
 * @param int $range
 * @version 1.0.0
 */
if (!function_exists('pagination')) {
  function pagination($pages = '', $range = 4)
  {
    if (wp_is_mobile()) {
      $range = 1;
    }
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) {
      $paged = 1;
    }

    if ($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if (!$pages) {
        $pages = 1;
      }
    }

    if (1 != $pages) {
      echo '<div class="pagination">';
      echo '<span class="counter-btn">' . sprintf(__('Page %d of %d', 'invest-news'), $paged, $pages) . '</span>';

      $arrowNext =
      '<svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none">
<path d="M1.0015 0.988906C1.0015 0.828031 1.08044 0.670908 1.22553 0.57769C1.45256 0.431849 1.75476 0.497257 1.9006 0.724287C3.29435 2.88934 5.09932 4.69429 7.26362 6.0888C7.40419 6.17975 7.49062 6.33387 7.49062 6.50151C7.49062 6.66991 7.40419 6.82477 7.26287 6.91572C5.10459 8.30497 3.30562 10.1024 1.91488 12.2592C1.76979 12.4847 1.47059 12.5719 1.24056 12.4336C1.003 12.2908 0.931596 11.981 1.08044 11.7495C2.28175 9.88138 3.77322 8.26813 5.52556 6.93827C5.81498 6.71876 5.81498 6.2835 5.52556 6.06399C3.77472 4.73489 2.28174 3.12088 1.07819 1.25202C1.02556 1.17008 1 1.07836 1 0.988153L1.0015 0.988906Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
</svg>';

$arrowPrev =
      '<svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none">
  <path d="M6.9985 0.988906C6.9985 0.828031 6.91956 0.670908 6.77447 0.57769C6.54744 0.431849 6.24524 0.497257 6.0994 0.724287C4.70565 2.88934 2.90068 4.69429 0.736384 6.0888C0.595811 6.17975 0.50938 6.33387 0.50938 6.50151C0.50938 6.66991 0.59581 6.82477 0.737131 6.91572C2.89541 8.30497 4.69438 10.1024 6.08512 12.2592C6.23021 12.4847 6.52941 12.5719 6.75944 12.4336C6.997 12.2908 7.0684 11.981 6.91956 11.7495C5.71825 9.88138 4.22678 8.26813 2.47444 6.93827C2.18502 6.71876 2.18502 6.2835 2.47444 6.06399C4.22528 4.73489 5.71826 3.12088 6.92181 1.25202C6.97444 1.17008 7 1.07836 7 0.988153L6.9985 0.988906Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
</svg>';

      // Link to the previous page
      if ($paged > 1 && $showitems < $pages) {
        echo sprintf(
          '<a href="%s" class="button prev-btn"><div class="text">%s</div><div class="icon">%s</div></a>',
          esc_url(get_pagenum_link($paged - 1)),
          esc_html__('Anterior', 'invest-news'),
          $arrowPrev
        );
      }

      // Page number links
      for ($i = 1; $i <= $pages; $i++) {
        if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
          if ($paged == $i) {
            echo sprintf('<span class="current">%d</span>', $i);
          } else {
            echo sprintf('<a href="%s" class="inactive">%d</a>', esc_url(get_pagenum_link($i)), $i);
          }
        }
      }

      // Link to the next page
      if ($paged < $pages && $showitems < $pages) {
        echo sprintf(
          '<a href="%s" class="button next-btn"><div class="text">%s</div><div class="icon">%s</div></a>',
          esc_url(get_pagenum_link($paged + 1)),
          esc_html__('Próximo', 'invest-news'),
          $arrowNext
        );
      }

      echo '</div>';
    }
  }
}