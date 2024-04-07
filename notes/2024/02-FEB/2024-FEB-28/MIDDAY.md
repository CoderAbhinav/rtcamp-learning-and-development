# What is `wp_reset_query()`?
- Destroys the previous query and sets up a new query.
- This should be used after `query_posts()`.
- Source
    ```php
    function wp_reset_query() {
        $GLOBALS['wp_query'] = $GLOBALS['wp_the_query'];
        wp_reset_postdata();
    }
    ```

# Give an example where `wp_reset_query()` should be used.
**Example:**
```php
    <?php

    $args = array ( 'post_parent' => 5 );
    query_posts( $args );

    if ( have_posts() ):
        while ( have_posts() ) :
            the_post();

            // Do stuff with the post content.
            the_title();
            the_permalink(); // Etc.

        endwhile;
    else:
        // Insert any content or load a template for no posts found.
    endif;

    wp_reset_query();

    ?>
```
1. This should be used after `query_posts()` and before another `query_posts()` .


# In which file and inside which function does the main `WP_Query` gets instantiated?

- It get's instantiated in `app/public/wp-settings.php` file

```php
/**
 * Holds the reference to {@see $wp_the_query}.
 * Use this global for WordPress queries
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @since 1.5.0
 */
$GLOBALS['wp_query'] = $GLOBALS['wp_the_query'];
```

# How WordPress parses the shortcode content?

The `do_shortcode()` function in WordPress is responsible for parsing and executing shortcodes within content

1. **Parsing Content:**
   - When you call `do_shortcode()`, it parses the provided content searching for shortcode tags. Shortcode tags are enclosed in square brackets, like `[shortcode]`.

2. **Identifying Shortcodes:**
   - Once a shortcode tag is found, `do_shortcode()` identifies the shortcode by its name. Shortcode names can contain letters, numbers, underscores, hyphens, and dots.

3. **Executing Shortcode Callback:**
   - After identifying the shortcode, `do_shortcode()` looks up the corresponding callback function registered for that shortcode name using the `add_shortcode()` function.
   - If a callback function is found, `do_shortcode()` calls that function with any attributes provided in the shortcode tag.
   - The callback function processes the attributes and returns the generated content for the shortcode.

4. **Replacing Shortcode Tags:**
   - `do_shortcode()` replaces the shortcode tag in the content with the generated content returned by the shortcode callback function.
   - If no callback function is found for a shortcode, `do_shortcode()` leaves the shortcode tag unchanged in the content.

5. **Recursion:**
   - `do_shortcode()` supports nesting of shortcodes. If a shortcode callback function returns content that contains other shortcodes, `do_shortcode()` recursively parses and executes those shortcodes.


# What happens in the front end if WordPress is unable to find the shortcode but the shortcode is present in the content?
If WordPress cannot find a registered handler for a shortcode present in the content, the shortcode will be displayed as plain text in the front end, showing the shortcode as it is in the content.

# How can you escape shortcodes. That is you want to display the shortcode as it is and not parsed.
To display a shortcode as plain text without parsing it, you can escape it by using double brackets `[[shortcode]]`. WordPress will output `[shortcode]` without parsing it.

# What happens if you echo the content of shortcode? Why does it happen so? Please explain in detail.
When we directly echo the shortcode content (without any processing or using `do_shortcode()`, WordPress treats it as plain text and doesn't execute any shortcodes within it.