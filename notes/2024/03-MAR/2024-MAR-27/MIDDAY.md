## 1. Explain how the items you insert in the nav menu are stored and linked to the nav menu.
1. In WordPress, the items you insert into a navigation menu are stored as menu items in the database.
2. They are stored under the post type **nav_menu_item** inside the `wp_posts` table, and with taxonomy **nav_menu** (`wp_term_relationships`).

## 2. How is the nesting in the menu items are maintained?
1. Nesting in menu items (creating submenus) is maintained through the 'menu_order' and 'post_parent' attributes stored in the wp_posts table for each menu item.
2. WordPress then assigns a 'post_parent' value to the submenu item, indicating the ID of its parent menu item. The 'menu_order' attribute determines the order in which menu items appear within their parent menus.

## 3. What are theme mods and how are they stored in the database?
1. Theme mods are customizer settings that allow users to customize the appearance and behavior of a WordPress theme.
2. Theme mods are stored as options in the wp_options table in the WordPress database. Each theme mod is stored as a separate option with a unique name, and its corresponding value represents the user's customization choice.

## 4. What is pagination? & How to add pagination to the WordPress theme?
1. Pagination is a technique used to break large sets of content (such as posts, products, or search results) into smaller, more manageable pages.
2. To add pagination to a WordPress theme, you can use the `paginate_links()` function provided by WordPress. This function generates a set of pagination links based on the current query, allowing users to navigate through paginated content. 

## 6. How can you add numeric pagination? eg: [1] [2] [3] ....[20] (code snippet)
```php
echo paginate_links( array(
    'format'      => '[%#%]',
    'current'     => max( 1, get_query_var( 'paged' ) ),
    'total'       => $custom_query->max_num_pages,
    'prev_text'   => __('« Prev'),
    'next_text'   => __('Next »'),
) );

```

## 7. What is the 'Navigation Block'?
The Navigation Block is a Gutenberg block introduced in WordPress 5.8 that allows users to add and customize navigation menus directly within the Gutenberg editor.

## 8. How do you add all the pages on your site to the Navigation Menu?
To add all pages on your site to the navigation menu, you can use the WordPress admin interface:

Go to Appearance > Menus in the WordPress admin dashboard.
Select the menu you want to edit

## 9. How do you add 'submenu' items to your menu?
To add submenu items to your menu in WordPress, you can follow these steps:
1. Go to Appearance > Menus in the WordPress admin dashboard.
2. Choose an existing menu item under which you want to add the submenu item. This will be the parent menu item.
3. Click on the "Custom Links," "Pages," "Posts," or any other tab to select the page, post, or custom link you want to add as a submenu item.
4. To make it a submenu item, simply drag it slightly to the right underneath the parent menu item. You'll notice it becomes indented to indicate that it's now a submenu item.