## 1. Write code for index.php of your theme.
`index.php`
```php
<?php
/**
 * The main template file
 *
 * @package My_Theme
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		// Output the content of each post
		the_title();
		the_content();
    }
} else {
	// If no posts are found, output a message
	esc_html_e( 'Sorry, no posts found.', 'My Theme' );
}

get_footer();
?>
```

## 2. Describe the template hierarchy, and write a code example for the CPT Books for template hierarchy

### Template Hierarchy
1. WordPress uses the query string to decide which template or set of templates should be used to display the page.
2. WordPress searches down through the template hierarchy until it finds a matching template file. To determine which template file to use, WordPress:
    - Matches every query string to a query type to decide which page is being requested (for example, a search page, a category page, etc);
    - Selects the template in the order determined by the template hierarchy;
    - Looks for template files with specific names in the current theme’s directory and uses the first matching template file as specified by the hierarchy.
    ![](https://i0.wp.com/developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png?w=1685&ssl=1)

## CPT Books for template hierarchy
```php
<?php
/**
 * The template for displaying single book posts
 *
 * @package My_Theme
 */

get_header();

while ( have_posts() ) :
	the_post();
	// Output the content of each book post
	the_title();
	the_content();
endwhile;

get_footer();
?>
```

## 3. If you have a category named 'Action', how will WordPress look for the template to apply through the template hierarchy?
If you have a category named 'Action', WordPress will look for the template to apply through the template hierarchy in the following order:

1. `category-action.php`: This template is specific to the 'Action' category.
2. `category-ID.php`: If no `category-action.php` exists, WordPress looks for a template specific to the category ID.
3. `category.php`: If neither `category-action.php` nor `category-ID.php` exists, WordPress falls back to category.php.
4. `archive.php`: If `category.php` is also missing, WordPress falls back to archive.php.
5. `index.php`: Finally, if none of the above templates exist, WordPress falls back to `index.php`.

## 4. Is it possible to pass custom arguments to get_template_part()? If yes, create a template part which accepts a custom parameter and utilizes it in some way.
Yes, it's possible to pass custom arguments to get_template_part(). Here's an example of a template part that accepts a custom parameter and utilizes it:
```php
<?php
// Template part 5 (template-parts/content-part-5.php)
$custom_param = isset( $args['custom_param'] ) ? $args['custom_param'] : '';
echo 'Custom parameter value: ' . $custom_param;
?>
```
We can then include this template part and pass the custom parameter like so:

```php
<?php get_template_part( 'template-parts/content', 'part-5', array( 'custom_param' => 'Custom Value' ) ); ?>
```

## 5. What are Partial and Miscellaneous templates in WordPress
1. **Partial Templates**: These templates contain reusable parts of the layout or functionality of a theme, such as headers, footers, sidebars, etc. They are typically included using get_template_part().
2. **Miscellaneous Templates**: These templates are used for specific purposes or content types that don't fit neatly into the standard template hierarchy. They may include custom page templates, error pages (404), search results, etc.

## 6. template-parts-- content-none.php-- content-all.php-- content.phpOn the above folder structure, if I do, get_template_part( 'template-parts/content', 'single' ); what exactly happens? And why?

```bash
theme-folder/
├── template-parts/
│   ├── content-none.php
│   ├── content-all.php
│   └── content.php
```

And you use get_template_part( 'template-parts/content', 'single' );, WordPress will look for the following files in order:

1. `template-parts/content-single.php`: This specific template file will be included if it exists.
2. `template-parts/content.php`: If content-single.php doesn't exist, WordPress falls back to content.php.
3. `template-parts/content.php`: If content-single.php and content.php are missing, WordPress falls back to content.php.

The reason it falls back to content.php in the last step is because `get_template_part()` appends the suffix ".php" to the template names provided and checks for their existence in the theme folder.

## 7. Difference between get_template and get_template_part.
1. `get_template()` is used to retrieve the path of the parent theme's directory or the child theme's directory. It does not include any template files.
2. `get_template_part()` is used to include a specific template part file from the theme's template directory. It allows for the inclusion of template parts without the need to specify the full path each time.
