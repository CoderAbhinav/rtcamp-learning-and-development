**1. Where are transients stored? How transient key is constructed and stored in DB?**
1. The transients are stored in `wp_option` table in the database.
2. A transient key is constructed as `_transient_{$transient}`, and the transient expiration is constructed with `_transient_timeout_{$transient}`.

**2. When does transient get deleted and how? Where is the expiration time stored?**
1. There are two ways it get's deleted (a) Using `delete_transient()` function (b) With the cron job.
2. We can look at the cron job `delete_expired_transients` (Note: Use `wp cron event list` command to see all the cron jobs), it runs periodically (every day), this cron calls the `delete_expired_transients()` function present in `wp-include\options.php` file.

**3. For dashboard widgets, users can drag and change their position. once a user modifies it, where is this position information stored? If one user modifies it, will it be modified for everyone?**
1. Under the `wp_usermeta` table, with meta key `meta-box-order_dashboard` the widget position information is stored.
2. If one user modifies it, it won't be modified for everyone, as the the meta key is is stored along with user id which add more specificity.

**4. How can we remove a dashboard widget? Explain with code example.**
1. We can use the `remove_meta_box()` function, with action `wp_dashboard_setup` in order to remove the widgets.
```php
function wporg_remove_all_dashboard_metaboxes() {
	// Remove Welcome panel
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	// Remove the rest of the dashboard widgets
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action( 'wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes' );
```
The above code removes the dashboard widgets.

**5. What does WordPress use to make external API requests? (Which library is used)**
1. WordPress uses the `WP_HTTP` class in order to make any external request.
2. The `WP_HTTP::request()` method facilitates the request, response.
3. It also used function like `wp_remote_get()`, `wp_remote_post()` etc. which are wrappers around the `WP_HTTP::request()`.

**6. What core classes are responsible for making HTTP requests, for preparing HTTP responses, and a standardization wrapper for request responses?**
1. `WP_HTTP`: This class is used to make HTTP request.
2. The `request()` method of the class handles all the request as per the provided arguments (GET, POST, PUT etc.)


