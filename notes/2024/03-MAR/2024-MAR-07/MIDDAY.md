**1. In `register_setting()` function what is the difference between `option_name` and `option_group`. Explain each functionality.**
1. `option_name`: This parameter specifies the **unique name** of the option to be registered.
2. `option_group`: This parameter specifies the **settings group** to which the option belongs. Options within the same group can be processed together and displayed together in the WordPress admin settings page.

**2. What is `wp_reset_query()`?**
1. `wp_reset_query()` is a WordPress function used to **reset** the global `$wp_query` object and **restore the original query context after** using custom queries with `query_posts()`.

**3. Give an example where `wp_reset_query()` should be used.**
```php
<?php
query_posts( 'post_parent=5' ); // quering posts.
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		?><a href="<?php the_permalink() ?>"><?php the_title() ?></a><br /><?php
	endwhile;
endif;
wp_reset_query(); // using wp_reset_query() to reset.
?>
```

**4. What is the difference between `is_singular()` and `is_single()`?**
1. **`is_singular()`**: This WordPress conditional tag checks if the current query is for a **singular post, page, or attachment**. It returns true for singular views like single posts, pages, or attachments.
2. **`is_single()`**: This WordPress conditional tag specifically checks if the current query is for a **single post**. It returns **true only for single post** views.

**5. In which file and inside which function does the main `WP_Query` gets instantiated?**
```php
/**
 * WordPress Query object
 *
 * @global WP_Query $wp_the_query WordPress Query object.
 * @since 2.0.0
 */
$GLOBALS['wp_the_query'] = new WP_Query();

/**
 * Holds the reference to {@see $wp_the_query}.
 * Use this global for WordPress queries
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @since 1.5.0
 */
$GLOBALS['wp_query'] = $GLOBALS['wp_the_query'];
```
1. `WP_Query` get's instantiated inside file `wp-includes\wp-settings.php` file.

**6. What do you mean by top-level menu page?**
1. In WordPress, a top-level menu page refers to a **primary navigation** item in the **WordPress admin menu** that appears at the top level, usually alongside other major sections like Dashboard, Posts, Pages, etc. These menu items typically represent major sections or features of the WordPress admin area.

**8. Which function is used to register a top-level menu page?**
1. Function `add_menu_page()` is used to register a top-level menu in WordPress.