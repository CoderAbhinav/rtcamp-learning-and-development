### 1. Explain how WordPress stores different roles and capabilities.
1. WordPress stores different roles and capabilities in the database using the `wp_options` table.
2. When WordPress is initialized, it retrieves the serialized array of roles and capabilities from the `wp_options` table and unserializes it into an associative array. This array contains information about the different user roles defined in the system, along with their associated capabilities.

### 2. WordPress uses false cron. How can I transfer this to real cron using crontab?
To transfer WordPress from using the built-in false cron system to using real cron with `crontab`, follow these steps:
1. Disable WP-Cron: Edit `wp-config.php` 
    ```php
    define('DISABLE_WP_CRON', true);
    ```
2. Set up a cron job: Use the system's crontab to schedule periodic execution of the wp-cron.php file. Open your terminal and run:
    ```bash
    crontab -e
    ```
3. Add the following line to the crontab file to execute `wp-cron.php` at the desired interval (e.g., every 15 minutes):
    ```bash
    */15 * * * * wget -q -O - https://example.com/wp-cron.php?doing_wp_cron >/dev/null 2>&1
    ```
4. Save and exit the crontab file. The cron job is now set up to execute `wp-cron.php` at the specified interval, replacing the need for WP-Cron.

### 3. What are drop-ins? Write a simplified drop-in for using Redis on your server.
1. WordPress drop-ins are used to enhance or replace a set of WordPress core functionalities. 

```php
<?php
/**
 * Redis Object Cache Drop-In
 *
 * @package WordPress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load the Redis object cache class if it's not already loaded.
if ( ! class_exists( 'Redis_Object_Cache' ) ) {
    require_once WP_CONTENT_DIR . '/plugins/redis-cache/includes/object-cache.php';
}

// Instantiate and register the Redis object cache.
if ( class_exists( 'Redis_Object_Cache' ) ) {
    $redis_object_cache = new Redis_Object_Cache();
    $redis_object_cache->add_servers( array(
        array(
            'host'     => '127.0.0.1', // Redis server hostname or IP address.
            'port'     => 6379,         // Redis server port.
            'database' => 0,            // Redis database number.
        ),
    ) );
}
```

### 4. Is it possible to control the visibility of a dashboard widget based on user roles or capabilities?
Yes, it is possible to control the visibility of a dashboard widget based on user roles or capabilities in WordPress. You can achieve this by using the `wp_dashboard_setup` action hook to customize the dashboard widgets.

```php
function customize_dashboard_widgets() {
    // Check if the current user has the 'editor' role.
    if ( current_user_can( 'editor' ) ) {
        // Remove the 'Quick Draft' dashboard widget.
        remove_meta_box( 'dashboard_quick_draft', 'dashboard', 'side' );
    }
}
add_action( 'wp_dashboard_setup', 'customize_dashboard_widgets' );
```

### 5. Investigate how WordPress stores the changes in the UI layout of a dashboard for every user.
1. WordPress stores the changes in the UI layout of the dashboard for every user primarily through `user-specific meta-data`. When a user customizes their dashboard layout by rearranging or hiding dashboard widgets, WordPress stores these settings as user meta-data associated with that user.
2. The user meta key used to store dashboard layout settings is typically `meta-box-order_dashboard`. 

### 6. Write a rewrite rule that will only work for users with a specific capability else redirect to 404.
```php
function custom_rewrite_rules() {
    // Check if the current user has the specific capability.
    if ( current_user_can( 'specific_capability' ) ) {
        // Add custom rewrite rule.
        add_rewrite_rule( '^custom-page/?$', 'index.php?custom_page=true', 'top' );
    }
}
add_action( 'init', 'custom_rewrite_rules' );

function custom_redirect_404() {
    // Check if the custom page query var is set.
    if ( get_query_var( 'custom_page' ) ) {
        // Check if the current user does not have the specific capability.
        if ( ! current_user_can( 'specific_capability' ) ) {
            // Redirect to 404 page.
            global $wp_query;
            $wp_query->set_404();
            status_header( 404 );
            get_template_part( 404 );
            exit();
        }
    }
}
add_action( 'template_redirect', 'custom_redirect_404' );
```
