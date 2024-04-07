# Anatomy & Architecture Of Theme

## [Anatomy Of WP Theme by Yoast](https://yoast.com/wordpress-theme-anatomy/)
<img src="https://yoast.com/app/uploads/2011/01/anatomy-wordpress-yoast.png">


## [Anatomy of Wordpress Theme by WP Engine](https://wpengine.com/resources/anatomy-wordpress-theme/)
1. Name of the template files is important, wp will never even consider a file named `functionz.php`, as it only count the `functions.php` file, so name is quite important.
    - This file does a lot of things even like adding the `style.css` & any `js` files you need.
2. The `style.css` file is quite important, it not only contains the header comment which actully helps the wordpress to identify the theme, but also about the styling of the theme. 
3. Then to create template, there are like two differnt ways, so either you use a **html** file or you can use a **php** file for more dynamic content.
4. There are template files like `header.php`, `footer.php` which are always used as everyone wants the site to have consistent header & footer.
5. There are some important files, which are in hierarchy,
    - So files like `index.php`, `single.php`, `archive.php` etc.
    - These template files have loop
6. Then there comes the template parts
    - We love the **DRY** principles, so that's where we use these parts.
    - So if I want to use a specific tile in more that two templates I can simply get that part.


