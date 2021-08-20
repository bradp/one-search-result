<?php
/**
 * Plugin Name: One Search Result
 * Description: Automatically send a user to the page or post if it's the only search result available.
 * Version:     1.1.0
 * Author:      Brad Parbs
 * Author URI:  https://bradparbs.com/
 * License:     GPLv2
 * Text Domain: one-search-result
 * Domain Path: /lang/
 *
 * @package one-search-result
 */

add_action( 'template_redirect', __NAMESPACE__ . '\\one_search_result' );

/**
 * If there is one search result, redirect to it automatically.
 */
function one_search_result() {
	// Only apply to the search results.
	if ( ! is_search() ) {
		return;
	}

	// Filter 'one_search_result_pre_check' if you need to short-circuit it in some cases.
	if ( ! apply_filters( 'one_search_result_pre_check', true ) ) {
		return;
	}

	global $wp_query;

	// Make sure we have results before doing anything.
	if ( ! isset( $wp_query->posts ) || ! isset( $wp_query->post_count ) ) {
		return;
	}

	// If we only have one result, perfect!
	if ( ! ( 1 === $wp_query->post_count && 1 === count( $wp_query->posts ) ) ) {
		return;
	}

	// Grab the permalink and make sure we got it.
	$dest = get_permalink( $wp_query->posts[0] );
	if ( ! $dest ) {
		return;
	}

	// Send it off!
	wp_safe_redirect( $dest, apply_filters( 'once_search_result_redirect_code', 302 ) );
	exit;

}
