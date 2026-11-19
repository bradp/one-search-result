<?php
/**
 * Plugin Name:       One Search Result
 * Description:       Automatically send a user to the page or post if it's the only search result available.
 * Version:           1.1.1
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Brad Parbs
 * Author URI:        https://bradparbs.com/
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       one-search-result
 *
 * @package one-search-result
 */

namespace OneSearchResult;

defined( 'ABSPATH' ) || exit;

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
	if ( empty( $wp_query->posts ) ) {
		return;
	}

	// Only redirect when the whole search (not just this page of it) has a single result.
	if ( 1 !== (int) $wp_query->found_posts || 1 !== count( $wp_query->posts ) ) {
		return;
	}

	// Grab the permalink and make sure we got it.
	$dest = get_permalink( $wp_query->posts[0] );
	if ( ! $dest ) {
		return;
	}

	// 'once_search_result_redirect_code' is the original (misspelled) filter, kept for backwards compatibility.
	$code = apply_filters( 'once_search_result_redirect_code', 302 );
	$code = apply_filters( 'one_search_result_redirect_code', $code );

	// Send it off!
	wp_safe_redirect( $dest, (int) $code );
	exit;
}
