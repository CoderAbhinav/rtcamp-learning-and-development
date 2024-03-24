**1. Using WP REST Development, how can I achieve the following:Upon a POST request, verify if the post body is valid JSONIf it is not, return an error with 405 status code**

It can achived by checking if 

```php
add_action( 'rest_api_init', function () {
    register_rest_route( 'namespace/v2', '/route', array(
        'methods' => 'POST',
        'callback' => 'validate_json_request',
        'permission_callback' => '__return_true',
    ) );
});

function validate_json_request( WP_REST_Request $request ) {
    // Check if request method is POST
    if ( 'POST' !== $request->get_method() ) {
        return new WP_REST_Response( 'Method Not Allowed', 405 );
    }

    // Check if request body is valid JSON
    $json_data = json_decode( $request->get_body(), true );
    if ( is_null( $json_data ) ) {
        return new WP_REST_Response( 'Invalid JSON', 405 );
    }

    // Handle the valid JSON data
    // ...
}
```


**2. What is statelessness in REST?**
1. Statelessness in REST refers to the design principle where each request from a client to a server must contain all the information necessary to understand and process the request.
2. In other words, the server does not store any client session state between requests. Each request is independent and self-contained.
3. This simplifies server implementation, improves scalability, and enables better caching and load balancing.


**3. What are the ways to return response in REST API? Which is the recommended way?**
The common ways to return responses in a REST API include:
1. **JSON:** This is the recommended way for returning structured data in most REST APIs. JSON responses are lightweight, easy to parse, and widely supported.
2. **XML:** Some REST APIs may also return responses in XML format, although JSON is more commonly used due to its simplicity and readability.
3. **Other formats:** Depending on the requirements of the API, responses can also be returned in formats like HTML, plain text, or binary data.


**4. What does WordPress use to make extenal API request? (Which library is used)**
1. WordPress uses *wp_remote_* functions, from **WP HTTP API**
2. `wp_remote_get()`, `wp_remote_post()` can be used for make external API requests.
3. This class abstracts the underlying HTTP transport, allowing WordPress to make external HTTP requests in a standardized way. It typically chooses cURL or PHP Streams based on the server configuration.


**5. Can you change the REST base from wp-json to something else? If yes, what happens to your assignments now where you have hard-coded wp-json in the URLs? Explain in detail.**
1. Yes, you can change the REST base from *wp-json* to something else using the `rest_url_prefix` filter.
2. However, if you have hard-coded wp-json in your URLs, changing the REST base will break those URLs unless you update them accordingly.
3. It's recommended to use WordPress core functions like `rest_url()` or `home_url()` to generate REST API URLs dynamically, which will automatically adapt to changes in the REST base.


**6. How do you make internal (same website) REST calls in WordPress?**
1. We can use the same functions in order to make internal REST calls in WP, like `wp_remote_get()` and similar functions.

**7. What is JSONP? Is it enabled in WP by default? If not, how do you enable it?**
1. **JSONP** (JSON with Padding) is a technique for making cross-origin requests in web browsers.
2. **JSONP** is not enabled in WordPress by default due to security concerns related to cross-site scripting (XSS) attacks.
3. If you need to enable JSONP support in WordPress, you can use plugins or custom code to implement it securely, ensuring that only trusted origins are allowed to make JSONP requests.

**8. What is difference between WordPress REST API PUT and POST command**
1. In the WordPress REST API, the `POST` method is typically used to create new resources, while the `PUT` method is used to update existing resources.
2. When making a `POST` request to a resource endpoint, it creates a new resource with a new identifier.
3. When making a `PUT` request to a resource endpoint, it updates an existing resource with the specified identifier.

**9. Difference between REST and SOAP**
1. REST (Representational State Transfer) is an architectural style for designing networked applications, while SOAP (Simple Object Access Protocol) is a protocol for exchanging structured information between distributed systems.
2. REST is based on the principles of statelessness, uniform interface, cacheability, client-server architecture, and layered system, whereas SOAP is more tightly coupled and relies on XML for message formatting.
3. REST uses standard HTTP methods like GET, POST, PUT, and DELETE for communication, while SOAP typically uses XML-based messaging formats and operates over HTTP, SMTP, or other protocols.
4. REST is lightweight, simpler, and easier to implement, while SOAP is more formal, robust, and suitable for complex enterprise systems.