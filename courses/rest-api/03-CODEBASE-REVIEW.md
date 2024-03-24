## Code Overview
1. In order to understand the REST API, we need to check the file `wp-include/rest-api.php`
2. There's a constant, which is used in namespace as well,
    ```php
        /**
         * Version number for our API.
        *
        * @var string
        */
        define( 'REST_API_VERSION', '2.0' );
    ```
3. ```php
        /**
        * Registers a REST API route.
        *
        * Note: Do not use before the {@see 'rest_api_init'} hook.
        *
        * @param string $route_namespace The first URL segment after core prefix. Should be unique to your package/plugin.
        * @param string $route           The base URL for route you are adding.
        * @param array  $args            Optional. Either an array of options for the endpoint, or an array of arrays for
        *                                multiple methods. Default empty array.
        * @param bool   $override        Optional. If the route already exists, should we override it? True overrides,
        *                                false merges (with newer overriding if duplicate keys exist). Default false.
        * @return bool True on success, false on error.
        */
        function register_rest_route( $route_namespace, $route, $args = array(), $override = false ) {
    ```
