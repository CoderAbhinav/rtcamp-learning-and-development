**1. What is the default `HTTP` request timeout, redirection count, HTTP version, and useragent while making HTTP request?**
Parameter | Default Value
--- | ---
request timeout | 5 seconds
redirect count | 5
HTTP version | 1.0
useragent | `'WordPress/'` . `get_bloginfo( 'version' )` . `‘; ‘` . `get_bloginfo( 'url' )`

@see [WP_Http::request()](https://developer.wordpress.org/reference/classes/wp_http/request/).

**2. What is wp_parse_arg? Explain with code example, its usecases.**
1. Merges user defined arguments into defaults array.
2. **Syntax**
    ```php
    wp_parse_arg(
        string|array|object $args, // Value to merge with default args.
        array $defaults = array() // Default args.
    )
    ```
3. **Example**
    ```php
    $args = array(
        'key1' => 'rtCamp',
        'key2' => 'val2'
    )

    $default_args = array(
        'key1' => 'val1',
        'key2' => 'val2',
        'key3' => 'val3'
    );

    $final_args = wp_parse_arg( $args, $default_args );
    var_dump( $final_args )

    /**
     * Outputs:
     * array(
     *    'key1' => 'rtCamp',
     *    'key2' => 'val2',
     *    'key3' => 'val3'
     * )
     * /
    ```

**3. How can I intercept an HTTP request before it's sent and immediately before its response is returned?**
1. We can use the `pre_http_request` filter, it's used before the request is sent.
2. The filter `pre_http_request` provide following arguments
    - `false|array|WP_Error` `$response`: A preemptive return value of an HTTP request. Default false.
    - `array` `$parsed_args`: HTTP request arguments.
    - `string` `$url` : The request URL.
3. `'http_response'`: Filters a successful HTTP API response immediately before the response is returned. Provides following arguments
    - `array` `$response`: HTTP response.
    - `array` `$parsed_args`: HTTP request arguments.
    - `string` `$url`: The request URL.

**4. Can I send a cookie in an HTTP request through WordPress HTTP API? If so, how? If not, why not?**
1. **Yes**, we can send a cookie in an HTTP request via WordPress HTTP API.
2. The [`WP_Http::request()`](https://developer.wordpress.org/reference/classes/wp_http/request/) arguments provide `cookie` as an argument.
3. **Example Usage**
    ```php
    use WP_Http;

    // Instansiating a new HTTP object.
    $http = new WP_Http();

    // Sending cookies along with request.
    // The `cookie` argument accepts an array.
    $response = $http->request(
        'http://dummy.form',
        array(
            'cookies' => array(
                'key' => 'value'
            )
        )
    );
    ```

**5. Which file in backend handle the WordPress admin ajax call?**
1. The `wp-admin/admin-ajax.php` file handles the WP admin ajax calls.

**6. What is the payload data format for admin ajax (data type)?**
1. The data is in the form of key value pairs, encoded in JSON.

