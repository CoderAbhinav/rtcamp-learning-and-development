# Theme Functionality

## Video: [Theme Functionality Overview](https://www.youtube.com/watch?v=D6nb0sQiLqE)
1. So we are talking about the `functions.php` file. We will be refering to the **twenty twenty one** theme.
2. We can add multiple theme support. This should be added to `after_theme_support` action. (called in `wp-settings.php` file). 
3. Let's talk about the activation, so a the activation we are calling the `wp_get_active_and_valid_themes()` funcion. So in that the `TEMPLATEPATH` will be referred as parent theme and `STYLESHEET` constant will be reffered as the child theme.
4. The `get_template()` function returns the name of active theme, it fetches the name from **options** table, stored under the key `template` and `autoload` set to `yes`.
5. The `get_stylesheet()` function will return the current stylesheet, which pretty much fetches again from the options table, under the key `stylesheet` and `autoload` set to `yes`. (Both functions are in `theme.php` file)
6. As soon as the theme is activated, the `functions.php` file will be loaded, and if there's a child theme, then we will first load the child theme's `functions.php` and then we will load the parent theme's `functions.php` file. And actullay after loading the `functions.php`, the `after_theme_setup` action is fired.
7. `add_support_theme()` is used to add theme support, you can add `automatic-feed-links`, all of the supports will be store in the `$_wp_theme_support` variable.

## Video [Theme Functionality - Theme Support and Nav Menus](https://www.youtube.com/watch?v=N04AHXY04fc)
1. You can add some more theme supports let's say the `post-thumbnail` support, let's you add the thumbnail.
2. So there's one more support which is the `html` support, you can add the comment form.
3. Custom background support, let's you add the background image, embed in <body> tag.
4. You can also register the widgets, widgets are managed with the block editor. 
    - In order to register the sidebar, use the action `widgets_init`, and use the function [`register_sidebar`](https://developer.wordpress.org/reference/functions/register_sidebar/)
    - The sidebar can be almost anywhere, like it's not always at the right hand side.
    - To use these sidebar widgets, do this, so 
        ```php
        if ( is_active_sidebar( 'sidebar-1' ) ) {
            dynamic_sidebar( 'sidebar-1' ); // This will pretty much add your widget / sidebar
        }
        ```

## Video [Theme Functionality - More on Theme Functionality](https://www.youtube.com/watch?v=eE6dl7EQcCU)
1. There are a lot of function related to theme, so here are some,
    - `load_theme_textdomain` function.
    - Post thumbnail related functions like
        - `add_theme_support( 'post-thumbnail' )`, `post-format`
    - Some core supported features, like the **admin menu**, **custom headers**, **logo** etc.
2. Sticky posts supports. Learn about registering a sidebar.
3. Navigation menus.
4. Post thumbnail
    - [`set_post_thumbnail_size()`]()
    - So as soon as the user uploads the image, the wordpress will also create the image of the given size.
    - And to get the thumbnail of specific size, just do like this
        - `the_thumbnail( )`
        - `the_thumbnail( 'medium' )`
        - `the_thumbnail( 'large' )`
        - `the_thumbnail( array( 100, 99 ) )` -> Other image sizes.
        





## 404 Pages
1. A 404 page is important to add into your theme in case a user stumbles upon a page that doesn’t exist or hasn’t been created yet.
2. To create a 404 page
    - Add a header file
        ```php
        /**
         * The template for displaying 404 pages (Not Found)
         */
        get_header();
        ```
    - Add the body to your file
        ```php
        <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

                <header class="page-header">
                    <h1 class="page-title"><?php _e( 'Not Found', 'twentythirteen' ); ?></h1>
                </header>

                <div class="page-wrapper">
                    <div class="page-content">
                        <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

                        <?php get_search_form(); ?>
                    </div><!-- .page-content -->
                </div><!-- .page-wrapper -->

            </div><!-- #content -->
        </div><!-- #primary -->
        ```
    - Add footer & sidebar
        ```php
        get_sidebar();
        get_footer();
        ```

## Accesibility
1. A WordPress theme should generate pages everyone can use, including those who cannot see or use a mouse.

    