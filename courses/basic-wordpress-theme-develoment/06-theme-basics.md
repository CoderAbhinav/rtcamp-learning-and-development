# Them Basics

<img src="https://i0.wp.com/developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png?w=1685&ssl=1">

1. WordPress uses the query string to decide which template or set of templates should be used to display the page.
2. WordPress searches down through the template hierarchy until it finds a matching template file. 
3. If WordPress cannot find a template file with a matching name, it will skip to the next file in the hierarchy. In turn the final fallback i.e. `index.php`.
4. By default the wordpress sets your site's homepage to the `home.php` or `index.php` file.
5. And if you want something a bit static go with the `front-page.php` file, it has precedance over the file.
    - It can be used as both the "static" or a "your latest posts" page.
6. The `privacy-policy.php` page can be used to renders your site's privacy policy. 
    - Or the WP can also use the `page-privacy.php` for this.
7. For single post `single.php`
8. For single page `page.php`

## [`get_theme_part()`](https://developer.wordpress.org/reference/functions/get_template_part/)
1. It loads the template part, and also provides a way for the child themes to use the parent parts.
2. Internally it uses the `require` keyword insted of the require_once, so you can use this multiple times.
3. And basically your files should be something like this, `{$slug}-{$name}.php`
    ```php
    get_template_parts( $slug, $name, $args );

    /**
     * Let's say there's a file in template-parts directory named
     * rt-movie-tile.php, and another file called rt-movie-tile-special.php
     * then in order to import these files use the following:
     */

    get_template_parts( 'template-parts/rt-movie-tile' );
    get_template_parts( 'template-parts/rt-movie-tile', 'special' );

    // If you need to pass some arguments them ?
    get_template_parts( 'template-parts/rt-movie-tile', 'special', array(
        'key1' => 'val1'
    ) );
    ```

## [`body_class()`](https://developer.wordpress.org/reference/functions/body_class/)
## 