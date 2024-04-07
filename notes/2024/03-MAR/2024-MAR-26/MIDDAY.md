## 1. What is Grid Layout?
1. Grid Layout is a CSS layout system that allows designers and developers to create complex grid-based layouts with ease. 
2. It provides a **two-dimensional grid-based layout system**, where elements can be placed into columns and rows, making it easier to design responsive and visually appealing web layouts.

## 2. What is Flex Layout?
1. Flex Layout, also known as Flexbox, is a CSS layout model that provides a more efficient way to design and align elements within a container. 
2. It offers a one-dimensional layout system, primarily focused on aligning items along a single axis—either horizontally or vertically.

## 3. How can you scale text sizes on the responsive layout?
1. To scale text sizes on a responsive layout, you can use CSS media queries combined with relative units such as `percentages`, `em` units, or viewport units (`vw`, `vh`). 
2. By adjusting the font size based on the viewport size or the container's width, you can ensure that text remains readable and visually appealing across different devices and screen sizes.

    ```css
    /* Default font size */
    body {
        font-size: 16px;
    }

    /* Responsive font size based on viewport width */
    @media screen and (max-width: 768px) {
        body {
            font-size: 4vw; /* 4% of the viewport width */
        }
    }

    ```

## 4. What are responsive Images and how can you add responsive background image?
1. Responsive images are images that adapt and resize appropriately based on the user's device and screen size.
    ```css
    /* Default background image */
    .container {
        background-image: url('default-image.jpg');
        background-size: cover;
    }

    /* Responsive background image */
    @media screen and (max-width: 768px) {
        .container {
            background-image: url('responsive-image.jpg');
        }
    }

    ```

## 5. How can I make my website compatible for dual-screen devices such as foldable mobiles?
1. To make your website compatible for dual-screen devices like foldable mobiles, you can utilize CSS media queries to detect the device's orientation, screen size, and viewport dimensions. 
2. Additionally, you can leverage CSS Flexbox and Grid Layout to create flexible and adaptable layouts that adjust based on the available screen space. 

## 6. What is the use of the functions.php file in WordPress, and when is it loaded?
1. The `functions.php` essentially acts like a WordPress plugin, letting you **add custom PHP** functions, classes, interfaces, and more. It opens up the entirety of the PHP programming language to your theme.
2. WordPress automatically loads the `functions.php` file (if it exists) **as soon as it loads the theme** on all page views on both the admin and front-end of the website.

## 7. Does each theme need its own functions.php file?
1. **No**,it's not compulsory for a theme to have a `functions.php`.

## 8. If you install multiple themes, which functions.php file will be called on your website?
1. While all themes can have a custom `functions.php` file, WordPress will only load the currently active theme’s.
2. The only caveat to that rule is when a child theme is active. In that case, WordPress loads the child theme’s `functions.php` just before loading the parent theme’s `functions.php`. 

## 9. What is the navigation menu?
1. A navigation menu in WordPress is a collection of links or navigation items displayed on a website to help users navigate through different sections or pages of the site.

## 10. How to add a navigation menu to your theme? (code snippet)
1. To add a navigation menu to your WordPress theme, you can use the `wp_nav_menu()` function within your theme template files.
    ```php
    <!-- Header.php -->
    <header>
        <nav>
            <?php
            // Display the primary navigation menu
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'primary-menu',
            ) );
            ?>
        </nav>
    </header>

    ```
