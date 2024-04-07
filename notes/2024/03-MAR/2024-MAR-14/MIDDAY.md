**1. What happens if you provide a wrong (i.e non-existing) action in an admin ajax call?**
1. If you provide a wrong or non-existing action in an admin AJAX call, WordPress will not be able to find a corresponding AJAX handler for the specified action. As a result, the AJAX request will fail.
2. Admin AJAX call will return a 0 or a false value. This indicates that the action wasn't recognised.

**2. What is nopriv in wp_ajax?**
1. `wp_ajax_nopriv_{action}`: This hook is used to register AJAX actions that can be accessed by both authenticated users and non-authenticated users (users who are not logged in).

**3. What is the role of rewrite rules in WordPress? Explain how WordPress uses it.**
1. In WordPress, rewrite rules play a crucial role in determining how URLs are interpreted and processed by the system. Rewrite rules are responsible for translating human-readable URLs into query parameters that WordPress can understand and use to retrieve the appropriate content.
2.Here's how WordPress uses rewrite rules:
    - When a user requests a URL, the WordPress rewrite system examines the requested URL against a set of predefined rewrite rules stored in the rewrite_rules option.
    - If a match is found between the requested URL and a rewrite rule, WordPress rewrites the URL internally to map it to a specific query format.
    - The rewritten URL is then passed to WordPress's query parser, which extracts query parameters such as post IDs, category slugs, page numbers, etc., based on the rewrite rule.
    - Finally, WordPress uses the extracted query parameters to generate the appropriate database queries and retrieve the corresponding content to be displayed on the requested page. 

**4. How can we set our WordPress site to serve all post-type posts under the URL https://my.site/blog/{post_slug}, still allowing the rest of the custom post types to be served without blog prefixes?**
1. We can use `add_rewrite_rule()` function
2. ```php
    // Add custom rewrite rule for post-type posts under /blog/{post_slug}
    function custom_blog_rewrite_rule() {
        add_rewrite_rule(
            '^blog/([^/]+)/?$',
            'index.php?name=$matches[1]',
            'top'
        );
    }
    add_action( 'init', 'custom_blog_rewrite_rule' );
    ```

**5. How can we remove the category prefix from URLs? Eg https://my.site/category/abc/ should appear as https://my.site/abc/**
```php
function remove_category_base() {
    global $wp_rewrite;
    $wp_rewrite->set_category_base( '' );
}
add_action( 'init', 'remove_category_base' );
```

**6. Explain add_rewrite_endpoint in detail. How it's different from add_rewrite_rule**
1. `add_rewrite_endpoint`: This function is used to add a custom rewrite endpoint to WordPress's rewrite rules. An endpoint is a specific location in the URL structure to which WordPress can attach query variables. Endpoints are used to create additional URL patterns that trigger specific actions or behaviors.
    - ```php
      add_rewrite_endpoint( 'my-endpoint', EP_PERMALINK );
      ```
2. `add_rewrite_rule`: This function is used to add custom rewrite rules to WordPress's rewrite rules. Rewrite rules define URL patterns and how they should be translated into query parameters. They are used to create custom URL structures and route requests to specific content or actions.
    - ```php
      add_rewrite_rule( '^custom-page/([^/]+)/?', 'index.php?custom_page=$matches[1]', 'top' );
      ``` 
3. The main difference between `add_rewrite_endpoint` and `add_rewrite_rule` is in their purpose and usage:
    - `add_rewrite_endpoint` is specifically for adding custom endpoints to the URL structure, which are used to define specific locations in the URL to attach query variables.
    - `add_rewrite_rule` is for adding custom rewrite rules to define URL patterns and how they should be translated into query parameters or content. It allows for more flexibility in defining custom URL structures and routing requests.
    