=== One Search Result ===
Contributors: bradparbs, surfboards
Tags: search, content, results, redirects
Requires at least: 6.0
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 1.1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically send a user to the page or post if it's the only search result available.

== Description ==

When there is only one search result available for a query, automatically redirect the user to that result.

This will work with any theme and any posts, pages, or custom post types that would be shown in search results.

== Available Filters ==

You can filter `one_search_result_pre_check` to false if you need to short-circuit and disable the redirect dynamically.

You can modify the redirect code with `one_search_result_redirect_code`, defaults to 302.

== Changelog ==

= 1.1.1 =

* Only redirects when the search has exactly one result in total, not when the last page of results has one.
* Added the `one_search_result_redirect_code` filter. The misspelled `once_search_result_redirect_code` filter still works.
* Requires WordPress 6.0 and PHP 7.4, tested up to WordPress 7.1.

= 1.1.0 =

* Added another filter, cleaned up code.

= 1.0.3 =

* Initial release
