<?php 
function register_investnews_menus() {
  register_nav_menu('header-menu',__( 'Header' ));
  register_nav_menu('side-menu-header',__( 'Lateral | Header' ));
  register_nav_menu('side-menu-header-mobile',__( 'Menu Lateral Mobile | Header' ));
  register_nav_menu('trending-menu-header',__( 'Trending | Header' ));
  register_nav_menu('footer-menu',__( 'Footer' ));
}
add_action( 'init', 'register_investnews_menus' );


/////////////////////////////////////
// Add wrapper to sub-menu
/////////////////////////////////////
class inv_sub_menu_container extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-area'><div class='sub-menu-container'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div></div>\n";
    }
}