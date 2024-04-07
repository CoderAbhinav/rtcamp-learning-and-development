## 1. What are the different post template files describe the usage of each of them?
template files | usage
--- | --- 
single.php | Used to display a single post.
archive.php | Used to display multiple posts in an archive format.
page.php | Used to display static pages.
index.php | Acts as a fallback template if more specific templates are not available.
category.php | Used to display posts from a specific category.
tag.php | Used to display posts with a specific tag.
author.php | Used to display posts by a specific author.
date.php | Used to display posts based on date.
search.php | Used to display search results.

## 2. What are the differences between templates of the block theme and the classic theme?

Classic Themes | Block Themes
--- | ---
Use PHP functions |	Use block patterns and settings
Use PHP | Use HTML (PHP as a fallback)
Use widgets |	Use blocks
Can register headers, menus, and logos |	Can customize headers, menus, and logos directly with blocks
Can’t edit site templates like 404 pages without plugins |	Can edit site templates using blocks
Need to manually enqueue stylesheets for front end and editors	| Can automatically enqueue stylesheet


## 3. The classic theme has a template for the comments, does the block theme have any? If not, then how are the comments handled by the block theme?
The block theme may or may not have a specific template for comments. In block themes, comments handling is typically managed through block patterns or blocks specifically designed for comments, rather than relying on a separate template file.

## 4. What is the difference between singular.php and single.php templates? Which one is more specific?
- `single.php`: Specifically used to display a single post.
- `singular.php`: More generic and used to display any type of singular content, including pages and attachments. It's more inclusive and acts as a fallback template.

## 5. What is the 404 template in a WordPress theme?
The 404 template is used to display content when a requested page is not found (404 error). It helps maintain a consistent design for error pages and provides users with helpful information or navigation options.

## 6. How can you create a custom page template?
To create a custom page template, you need to:

- Create a new PHP file in your theme directory.
- Add a comment at the top of the file to define the template name.
- Write the HTML and PHP code for your custom template.
- Save the file and it will be available as a page template in the WordPress admin.

```php
<?php
/*
Template Name: Books Archive
*/
```

## 7. Write a template code for Books Archive Page.
```php
<?php
/*
Template Name: Books Archive
*/
get_header();

$args = array(
        'post_type' => 'books', 
        'posts_per_page' => 10 
    );
    $books_query = new WP_Query($args);

    if ($books_query->have_posts()) : while ($books_query->have_posts()) : $books_query->the_post();
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Read More</a>
            </div>

    <?php
    endwhile;
    wp_reset_postdata();
    else :
    ?>

    <p>No books found.</p>

    <?php endif; ?>

get_footer();
?>

```

## 8. Write a template code for book's single post.
```php
<?php
/*
Template Name: Book Single
*/
get_header();
<header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>
            <div class="entry-content">
                <?php
                $author = get_post_meta($post->ID, 'book_author', true);
                $isbn = get_post_meta($post->ID, 'book_isbn', true);
                
                if ($author): ?>
                    <p>Author: <?php echo esc_html($author); ?></p>
                <?php endif; 
                
                if ($isbn): ?>
                    <p>ISBN: <?php echo esc_html($isbn); ?></p>
                <?php endif;

                the_content(); 
                ?>
            </div>
        </article>
get_footer();
?>

```
