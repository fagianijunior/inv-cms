<?php
// Forces RankMath fields to be below all others
add_filter( 'rank_math/metabox/priority', function( $priority ) {
    return 'low';
});