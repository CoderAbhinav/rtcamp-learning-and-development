# Questions
1. How WordPress handles date & time for different locale ?
2. What is difference between `__()` and `_e()` ?
3. How can you generate `.po` and `.mo` file ? 
4. Suppose user logs out from the WordPress dashboard and logs back in few seconds, in this case does the nonce remains the same ?
5. What is data validation ? 
	1. What is the use case ?
	2. What is difference between client side validation and server side validation ?
	3. What language we write client side & server side validation ?
6. What is escaping ?
	1. How can we escape JS ?
7. What is SQL injection attack ?
8. What kind of attacks can happen if there is no DB ? (Like attacks not related to DB)
9. Describe the process of sanitisation & validating user inputs in WP Plugin to prevent SQL injection attacks
10. Parameters of `wp_enqueue_scripts`.
11. Whats unhooking in WordPress ? How can you unhook an action or filter
12. How can we find all the registered callbacks for a hook in WP.
13. What is a custom post type ? 
	1. Does creating a custom post type also creates a new table ?
	2. So how will you recognise which post it is in the table ?
14. What is rewrite argument in registering a custom post type ?
15. What is a `meta_query` ?
16. What is `add_query_arg()` ?
17. How do you paginate using `WP_Query` ?
18. What are meta-boxes ? Which hook is used to add a meta-box ?
19. Suppose we want to add / update / remove any type of metadata what function we can use ? ( We can use `get_metadata()`, `update_metadata()` etc. function )
20. Why do we need to return output instead of echoing it in a short-code function ?
21. How can we use a short-code in Theme of Plugin file ? (`do_shortcode`) How will you use a short-code in a widget ?
22. What is an administrative menu ? What are top-level menus & sub-menus ?
23. How can we add some menu under settings & tools menu ?
24. What is significance of `autoload` parameter in parameter is `add_option` function ?
25. Why should I use WordPress settings API instead of own custom function with options API ?
26. How does WordPress handles post revisions in database ?
27. Explain the structure of `wp_postmeta` table.

# GPT Answers
### 1. Handling Date & Time for Different Locale in WordPress

WordPress uses the `date_i18n()` function to handle date and time based on the locale settings. This function localizes the date and time according to the site's locale settings, which are set in the WordPress General Settings.

### 2. Difference between `__()` and `_e()`

- `__()` returns the translated string.
- `_e()` echoes the translated string.

### 3. Generating `.po` and `.mo` Files

1. **Install a tool like Poedit**.
2. **Extract translatable strings** from your theme or plugin.
3. **Create a `.po` file** using Poedit, which will also generate a corresponding `.mo` file when saved.

### 4. Nonce Behavior upon Logging Out and Back In

When a user logs out and logs back in, a new nonce is generated. Nonces are user and session-specific, and logging out invalidates the current session nonce.

### 5. Data Validation

**Data validation** ensures that the data received is clean, correct, and useful.

**5.1. Use Case:**
To prevent invalid data from being processed, stored, or causing errors in applications.

**5.2. Client-side vs. Server-side Validation:**
- **Client-side validation:** Performed in the browser using JavaScript before data is sent to the server.
- **Server-side validation:** Performed on the server using server-side languages (e.g., PHP) after data is sent from the client.

**5.3. Languages:**
- **Client-side:** JavaScript.
- **Server-side:** PHP, Python, Ruby, etc.

### 6. Escaping

**Escaping** is the process of making sure data is safe to output in different contexts (e.g., HTML, JavaScript) by converting potentially dangerous characters into a safe format.

**6.1. Escaping JavaScript:**
Use functions like `wp_json_encode()` or `esc_js()` to escape JavaScript.

### 7. SQL Injection Attack

An SQL injection attack involves inserting or manipulating SQL queries through user input fields to execute arbitrary SQL code, potentially compromising the database.

### 8. Attacks Without a Database

- **Cross-Site Scripting (XSS)**
- **Cross-Site Request Forgery (CSRF)**
- **Denial of Service (DoS)**
- **Phishing**
- **Man-in-the-Middle (MitM) attacks**

### 9. Sanitizing and Validating User Inputs in WordPress Plugins

- **Sanitization:** Use functions like `sanitize_text_field()`, `esc_sql()`, etc., to clean input data.
- **Validation:** Ensure the data matches expected formats and types using functions like `is_email()`, `is_numeric()`, etc.

### 10. Parameters of `wp_enqueue_scripts`

- **handle:** A unique name for the script.
- **src:** The URL to the script.
- **deps:** An array of dependencies.
- **ver:** The script version number.
- **in_footer:** Whether to enqueue the script before the closing `</body>` tag.

### 11. Unhooking in WordPress

**Unhooking** involves removing a previously added action or filter.

**Unhook an action or filter:**
```php
remove_action('hook_name', 'function_name', $priority);
remove_filter('hook_name', 'function_name', $priority);
```

### 12. Finding Registered Callbacks for a Hook

Use `wp_filter` global variable to inspect registered callbacks.
```php
global $wp_filter;
print_r($wp_filter['hook_name']);
```

### 13. Custom Post Type

**Custom Post Type:** Custom content type in WordPress apart from the default posts and pages.

**13.1. Table Creation:** Creating a custom post type does not create a new table; it uses the `wp_posts` table.

**13.2. Recognition:** Custom post types are recognized by the `post_type` column in the `wp_posts` table.

### 14. Rewrite Argument in Registering a Custom Post Type

The `rewrite` argument in `register_post_type()` controls the permalink structure for the custom post type.

### 15. Meta Query

A `meta_query` is a query to retrieve posts based on custom fields (post meta).

### 16. `add_query_arg()`

`add_query_arg()` adds query variables to a URL.
```php
$url = add_query_arg('param', 'value', 'http://example.com');
```

### 17. Paginating Using `WP_Query`

Use the `paged` parameter in `WP_Query` and the `paginate_links()` function for pagination.

### 18. Meta-Boxes

**Meta-boxes:** UI components for adding custom fields in the post editing screen.

**Hook to add a meta-box:**
```php
add_meta_box('id', 'Title', 'callback', 'post_type');
```

### 19. Adding, Updating, Removing Metadata

- **Add:** `add_metadata()`
- **Update:** `update_metadata()`
- **Delete:** `delete_metadata()`

### 20. Returning Output in Short-code Functions

Returning output instead of echoing ensures that the content can be inserted properly where the short-code is used.

### 21. Using Short-codes in Theme or Plugin File

Use `do_shortcode()`.
```php
echo do_shortcode('[shortcode]');
```

**Using in a Widget:**
```php
add_filter('widget_text', 'do_shortcode');
```

### 22. Administrative Menu

**Administrative Menu:** Navigation menus in the WordPress admin area.

**Top-level menus:** Main menu items.
**Sub-menus:** Items under top-level menus.

### 23. Adding Menu Under Settings & Tools

Use `add_submenu_page()`.
```php
add_submenu_page('tools.php', 'Page Title', 'Menu Title', 'capability', 'menu_slug', 'callback_function');
```

### 24. Autoload Parameter in `add_option`

Controls whether the option loads with other WordPress options. Setting to `yes` loads the option on every page load.

### 25. WordPress Settings API vs. Custom Function

The Settings API provides a standardized way of handling settings, including validation, sanitization, and easier integration with the WordPress admin interface.

### 26. Handling Post Revisions

WordPress stores post revisions in the `wp_posts` table with the post type set to `revision`.

### 27. Structure of `wp_postmeta` Table

- **meta_id:** Unique ID for each meta entry.
- **post_id:** ID of the post associated with the meta data.
- **meta_key:** Key for the meta data.
- **meta_value:** Value of the meta data.