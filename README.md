# One Search Result

> A WordPress plugin to automatically send a user to the page or post if it's the only search result available.

When there is only one search result available for a query, automatically redirect the user to that result.

This will work with any theme and any posts, pages, or custom post types that would be shown in search results.

## Available Filters

You can filter `one_search_result_pre_check` to false if you need to short-circuit and disable the redirect dynamically.

You can modify the redirect code with `once_search_result_redirect_code`, defaults to 302.

## Changelog

### 1.1.0

* Added another filter, cleaned up code.

### 1.0.3

* Initial release
