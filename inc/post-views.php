<?php
/**
 * Post Views Counter (Zero Plugins)
 *
 * @package modern-blog-wp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Track post views without plugins.
 */
function modern_blog_set_post_views( $post_id ) {
    $count_key = 'modern_blog_post_views_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $post_id, $count_key, $count );
    }
}

/**
 * Increment views on single post load.
 */
function modern_blog_track_post_views() {
    if ( is_single() ) {
        modern_blog_set_post_views( get_the_ID() );
    }
}
add_action( 'wp_head', 'modern_blog_track_post_views' );

/**
 * Get post views.
 */
function modern_blog_get_post_views( $post_id ) {
    $count_key = 'modern_blog_post_views_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '0' );
        return "0";
    }
    return $count;
}
