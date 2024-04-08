# Conditional Tags
1. Conditional Tags can be used in your Template Files in classic themes to alter the display of content depending on the conditions that the current page matches.
2. For a Conditional Tag to modify your data, the information must already have been retrieved from your database, i.e. the query must have already run.
3. Two ways to implement Conditional Tags:
    - place it in a [Template File](https://developer.wordpress.org/themes/basics/template-files/)
    - create a function out of it in functions.php that hooks into an action/filter that triggers at a later point
4. It's important to note that, the `functions.php` is already run before the conditional tags.

## The Condition For

### [`in_home()`](https://developer.wordpress.org/reference/functions/is_home/)
This condition returns true when the main blog page is being displayed, usually in standard reverse chronological order.

### [`is_front_page()`](https://developer.wordpress.org/reference/functions/is_front_page/)
This condition returns true when the front page of the site is displayed, regardless of whether it is set to show posts or a static page.

### [`is_single()`](https://developer.wordpress.org/reference/functions/is_single/)
1. If you provide the function with the ID or Slug or Title, if they are a single post then this function returns true.
2. If you pass an array with the combination of ID, Slug, Title or more than one of any of these things, then it will return true only if any of the given array elements returns true for any is_single, is_page, and is_attachment. It does allow testing for post types.

### [`is_sticky()`](https://developer.wordpress.org/reference/functions/is_sticky/)


