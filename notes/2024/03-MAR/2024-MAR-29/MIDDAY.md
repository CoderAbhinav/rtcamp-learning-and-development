## 1. What are the default image sizes of WordPress? How to add custom Image Sizes in WP?
1. By default, WordPress creates several image sizes when you upload an image. The common default image sizes include:
    - Thumbnail (150px × 150px)
    - Medium (max width 300px)
    - Large (max width 1024px)
2. You can add custom image sizes using the add_image_size() function. Here's an example:
    ```php
    add_image_size( 'custom-size', 300, 200, true ); // name, width, height, crop
    ```

## 2. What is the default quality of JPEG images that we upload in WordPress? (0%-> worst quality, 100%-> best quality)
By default, WordPress compresses JPEG images with a quality of around `82%`. You can adjust the JPEG image quality using the `jpeg_quality` filter hook.

## 3. What is the difference between the home page and the front page in WordPress?
1. The Home Page refers to the main page of your website, typically displaying the latest blog posts unless specified otherwise.
2. The Front Page is the landing page of your website, which can be set to display either a static page or the latest posts. It's the page visitors first see when they visit your site.

## 4. What is the difference between wp_head() and wp_footer() in WordPress and what's their use?
1. `wp_head()`: Outputs HTML code in the head section of the webpage, typically used for adding CSS stylesheets, JavaScript files, meta tags, etc.
2. `wp_footer()`: Outputs HTML code before the closing </body> tag, usually used for adding JavaScript code, tracking scripts, or footer elements.

## 5. What is the difference between a child theme and a parent theme in WordPress?
1. A Parent Theme is the main theme that contains all the core design and functionality.
2. A Child Theme inherits the styles and functionality of the Parent Theme but allows you to make modifications without affecting the Parent Theme's core files. It's useful for customizing themes while ensuring future updates won't overwrite your changes.

## 6. What is a starter theme, and how can it benefit developers?
A Starter Theme is a bare-bones theme framework designed to provide a foundation for building custom WordPress themes.

## 7. What's the difference between get_x_directory() and get_x_directory_uri() methods?
1. `get_x_directory()`: Returns the server path to the specified directory (e.g., get_template_directory() returns the path to the theme directory).
2. `get_x_directory_uri()`: Returns the URL to the specified directory (e.g., get_template_directory_uri() returns the URL to the theme directory).

## 8. Which function can be used for the i18n of your theme?
The `__()` or `esc_html__()` functions are commonly used for internationalization (i18n) of themes. They allow you to wrap translatable text strings for translation and localization.
