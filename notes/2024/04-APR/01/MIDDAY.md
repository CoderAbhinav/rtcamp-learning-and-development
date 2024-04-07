## 1. What is the correct way to add a JavaScript file to your WordPress theme?
1. The correct way to add a JavaScript file to your WordPress theme is by using the `wp_enqueue_script()` function. 
2. We should add this function call within your theme's functions.php file or in a custom plugin.

## 2. In the function to enqueue JS, what does the last parameter signify? Why is it important?
The last parameter in the `wp_enqueue_script()` function signifies whether the script should be loaded in the footer (`true`) or in the header (`false`) of the webpage. It's important because loading JavaScript in the footer improves page loading performance by allowing the HTML content to render first.

## 3. What is a handle in the function to enqueue stylesheet?
A handle in the wp_enqueue_style() function is a unique identifier for the stylesheet. It allows you to refer to the stylesheet when dequeuing, modifying, or checking its status.

## 4. Is it possible to load multiple stylesheets using the same handle? Which of those stylesheets will be loaded?
Yes, it's possible to load multiple stylesheets using the same handle. However, only the last registered stylesheet with the same handle will be loaded.

## 5. Is it possible to ensure all my scripts are loaded in the footer even if wp_enqueue_script's $in_footer is set to false? Write a code snippet for it if it's possible.
1. We can use the filter `script_loader_tag` in order to achive the result.

```php
function mytheme_force_scripts_in_footer( $tag, $handle, $src ) {
    if ( $handle !== 'jquery' && $handle !== 'script-handle' ) { // Exclude specific scripts
        $tag = str_replace( ' src', ' defer="defer" src', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'mytheme_force_scripts_in_footer', 10, 3 );
```

## 6. `wp_add_inline_script` vs `wp_localize_script`.
1. `wp_add_inline_script()`: Allows you to add inline JavaScript directly to an enqueued script.
2. `wp_localize_script()`: Used to pass localized data (e.g., PHP variables) to a script

## 7. What are Template Partials and what's the use of `get_template_part()`?
Template Partials are reusable sections of code within a WordPress theme. `The get_template_part()` function is used to include template partials into other template files. It helps keep your theme organized and makes it easier to maintain and update.

## 8. What are template files in WordPress?
Template files in WordPress are PHP files that control the layout and presentation of different parts of your website. Common template files include `header.php`, `footer.php`, `single.php`, `archive.php`, and `page.php`. These files are used to render specific content types or sections of your site.