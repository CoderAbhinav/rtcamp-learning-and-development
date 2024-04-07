## 1. Can we create a child theme of the existing child theme?
Yes, it is possible to create a child theme of an existing child theme.

## 2. What will happen if the Parent theme gets deleted?
1. If the parent theme gets deleted, the child theme will lose its parent theme reference. In this case, the child theme will still be active, but it will behave as if it's a standalone theme without any parent theme. 
2. Any functionality or styling inherited from the parent theme will no longer be available.

## 3. What is the difference between a child theme and a parent theme in WordPress?
1. A parent theme is the main theme that provides the basic functionality, structure, and styling for a WordPress site.
2. A child theme inherits all the features of its parent theme but allows you to customize and override certain aspects without modifying the parent theme directly. 

## 4. What are the conditional tags? What value do they return?
1. Conditional tags in WordPress are functions used to check specific conditions or states within the WordPress environment.

## 5. What are template tags?
1. Template tags in WordPress are PHP functions used within theme template files to dynamically output or retrieve various types of content or data from the WordPress database. 

## 6. Write each template tag and its usage with an example code snippet.

### General Tags
```php
get_header() // Loads the header
```

```php
get_footer() // Loads the footer
```

```php
get_sidebar() // Loads the sidebar
```
```php
get_template_part( 'template-parts/movie/tile' ); // 
```

```php
get_search_form() // Loads the search form for searching posts.
```

### Author Tags

```php
the_author(); // Shows author
```

```php
the_author_posts();
```

```php
wp_list_authors() // Lists author
```



## 7. Write each conditional tag and its usage with an example code snippet.

`is_single()`: Checks if the current page is a single post.
```php
<?php if ( is_single() ) : ?>
    <p>This is a single post.</p>
<?php endif; ?>
```

`is_page()`: Checks if the current page is a static page.
```php
<?php if ( is_page() ) : ?>
    <p>This is a static page.</p>
<?php endif; ?>
```

`is_category()`: Checks if the current page is a category archive.
```php
<?php if ( is_category() ) : ?>
    <p>This is a category archive.</p>
<?php endif; ?>
```