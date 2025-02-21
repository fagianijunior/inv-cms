<?php
/**
 * Miscellaneous functionalities
*/

// Remove avatars from profiles 
update_option( 'show_avatars', 0 );

// Lower the priority order of Rank Math’s meta box
global $pagenow;

if( 'user-edit.php' === $pagenow || 'profile.php' === $pagenow || 'user-new.php' === $pagenow) {     
    add_filter( 'rank_math/metabox/priority', function( $priority ) {
        return 'low';
    });
}