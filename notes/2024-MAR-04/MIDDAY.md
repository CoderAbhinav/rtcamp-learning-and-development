**1. What kind of data can I retrieve using the WP REST API?**
1. The WP REST API allows you to retrieve various types of data from a WordPress site, including posts, pages, custom post types, users, comments, taxonomies, media attachments, and settings.
2. The response is in the form of `JSON`.
3. The use of WP REST API allows us to build custom interfaces.

**2. What are some examples of WP REST API endpoints?**
Endpoint | Resource
--- | ---
`/wp/v2/posts` | Posts
`/wp/v2/posts/<id>/revisions` | Post Revisions
`/wp/v2/categories` | Categories
`/wp/v2/tags` | Tags
`/wp/v2/pages` | Pages

**3. What are custom routes in the WP REST API, and how do I create them?**
1. Custom routes in the WP REST API allow you to define additional endpoints beyond the default ones provided by WordPress.
2. You can create custom routes using the `register_rest_route()` function, specifying the namespace, route, and arguments.
    **Syntax**
    ```php
    register_rest_route( string $route_namespace, string $route, array $args = array(), bool $override = false ): bool
    ```
**Example**
```php
add_action('rest_api_init', function () {
    register_rest_route('namespace/v1', '/route/', [
        'methods' => 'GET',
        'callback' => 'route_callback',
    ]);
});

function route_callback(WP_REST_Request $request) {
    // code
}
```

**4. How can I authenticate WP REST API requests?**
There are different ways to authenticate a WP REST API Request
1. **Cookie Authentication**
    - When you log in to your dashboard, this sets up the cookies correctly for you, so plugin and theme developers need only to have a logged-in user.
    - All the request made should have the *nonce* field with key `_wpnonce`, or if it's a *GET* request then a `X-WP-Nonce` header set to the nonce value.
2. **Basic Authentication**
    - Application passwords can be used in order to authenticate the requests.
    - In order to send a request, add a USERNAME:PASSWORD with the curl request,
    **example**
    ```bash
    curl --user "USERNAME:PASSWORD" https://HOSTNAME/wp-json/wp/v2/users?context=edit
    ```
    - The request is sent with an Authentication header with key `Authorization` : Basis *Base64 encoding*
3. **Authentication Plugins**
    - We can use plugin like [WP REST API – OAuth 1.0a Server](https://wordpress.org/plugins/rest-api-oauth1/)
    - The above mentioned plugin adds authentication endpoints like `oauth1/request`, `oauth1/authorize`, `oauth1/access`.
    - This allows us to use custom authentication with the WP REST API requests.

**4. Create a custom route that fetches all the posts associated with `rt-celebs` CPT along with pagination.**
```php
register_rest_route( 'rt-plugin/v1', '/celebs/', array(
    'methods'  => 'GET',
    'callback' => 'fetch_celebs_posts',
) );

function fetch_celebs_posts( $request ) {
    $args = array(
        'post_type'      => 'rt-celebs',
        'posts_per_page' => $request['per_page'],
        'paged'          => $request['page'],
    );

    $posts = get_posts( $args );

    return new WP_REST_Response($posts, 200);
}

```

**5. Is it possible to restrict REST API requests from only one host/URL? If yes, how?**
**Yes**, we can restrict REST API requests to only one host/URL using the `rest_authentication_errors` filter. We would need to check the request origin and return an error if it doesn't match the allowed host.

**6. What's CORS? How can you enable CORS in WordPress REST API?**
1. **CORS** is a security feature implemented by web browsers to restrict cross-origin HTTP requests initiated by scripts running on a web page.
2. Enabling CORS in the WordPress REST API involves configuring the server to include appropriate CORS headers in the HTTP response, allowing cross-origin requests from authorized origins.

**7. Can WP CLI be used to generate dummy content? If yes, how?**
1. **Yes**, we can use WP CLI to generate dummy content
2. **Example**
    ```bash
    wp post generate --count=10 --post_type=post
    ```