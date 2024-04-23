# WP Core API (Part 1)

## HTTP
### 1. **HTTP** stands for *Hyper Text Transfer Protocol*
### 2. **HTTP Methods**
    - **GET** is used to retrieve data.
    - **POST** is used to send data to the server for the server to act upon in some way.
    - **HEAD** is essentially the same as a GET request except that it does not retrieve the data, only information about the data.
    - Other methods like **PUT, DELETE, TRACE, CONNECT**
3. **Response Codes**
    Status Code |	Description
    --- | ---
    2xx |	Request was successful
    3xx	|   Request was redirected to another URL
    4xx |	Request failed due to client error. Usually invalid authentication or missing data
    5xx |	Request failed due to a server error. Commonly missing or misconfigured configuration files
4. **Common Codes**
    Status Code|	Description
    --- | ---
    200|	OK – Request was successful
    301|	Resource was moved permanently
    302|	Resource was moved temporarily
    403|	Forbidden – Usually due to an invalid authentication
    404|	Resource not found
    500|	Internal server error
    503|	Service unavailable


### GETting Data From API
In order to understand the usage of `GET` we need to understand the function `wp_remote_get()`

```php
wp_remote_get(
    $url,
    $args = array(
        'method'        => 'string' // GET, POST, PUT etc.
        'timeout'       => 'float' // Default set to 5 (sec).
        'redirection'   => 'int' // Number of allowed redirection (default 5).
        'httpversion'   => 'string' // Default 1.0
        'user-agent'    => 'string' // Default is something related to WP
        'headers'       => 'string|array',
        'cookies'       => 'array',
        'body'          => 'string|array',
        'compress'      => 'bool', // Whether to compress the body or not.
        'decompress'    => 'bool', // Whether to decompress response or not.
        'sslverify'     => 'bool',
        'sslcertificates' => 'string', 
    )
)
```

@see [`wp_remote_get()`](https://developer.wordpress.org/reference/functions/wp_remote_get/)

@see [`WP_HTTP::request()` arguments](https://developer.wordpress.org/reference/classes/wp_http/request/) for more information on the arguments

**Example**
- We are trying to get some data from the [GitHub](http://api.github.com/) API.

```php
<?php
// If you want to add authorization, then add this.
$args = array(
    'headers' => array(
        'Authorization' => 'Basic ' . base64_encode( YOUR_USERNAME . ':' . YOUR_PASSWORD )
    )
);

$response = wp_remote_get( 'https://api.github.com/users/blobaugh', $args );

/**
 * This is how the $response object looks
 * Array(
	[headers] => Array(
		[server] => nginx
		[date] => Fri, 05 Oct 2012 04:43:50 GMT
		[content-type] => application/json; charset=utf-8
		[connection] => close
		[status] => 200 OK
		[vary] => Accept
		[x-ratelimit-remaining] => 4988
		[content-length] => 594
		[last-modified] => Fri, 05 Oct 2012 04:39:58 GMT
		[etag] => "5d5e6f7a09462d6a2b473fb616a26d2a"
		[x-github-media-type] => github.beta
		[cache-control] => public, s-maxage=60, max-age=60
		[x-content-type-options] => nosniff
		[x-ratelimit-limit] => 5000
	)
	[body] => { 
		"type":"User",
		"login":"blobaugh",  
		"gravatar_id":"f25f324a47a1efdf7a745e0b2e3c878f", "public_gists":1,
		"followers":22,
		"created_at":"2011-05-23T21:38:50Z",
		"public_repos":31,
		"email":"ben@lobaugh.net",
		"hireable":true,
		"blog":"http://ben.lobaugh.net",
		"bio":null,
		"following":30,
		"name":"Ben Lobaugh",
		"company":null,
		"avatar_url":"https://secure.gravatar.com/avatar/f25f324a47a1efdf7a745e0b2e3c878f?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png",
		"id":806179,
		"html_url":"https://github.com/blobaugh",
		"location":null,
		"url":"https://api.github.com/users/blobaugh"
	}
	[response] => Array(
		[preserved_text 5237511b45884ac6db1ff9d7e407f225 /] => 200
		[message] => OK
	)
	[cookies] => Array()
	[filename] =>
)
 */

// Use this function to get the response body.
$body       = wp_remote_retrieve_body( $response );

// Use this function to get the response status code.
$http_code  = wp_remote_retrieve_response_code( $response );
```

@see [`wp_remote_retrieve_response()`](https://developer.wordpress.org/reference/functions/wp_remote_retrieve_body/)

@see [`wp_remote_retrieve_body()`](https://developer.wordpress.org/reference/functions/wp_remote_retrieve_response_body/)

    Questions:
    1. What if the wp_remote_retrive_ function is provided with a `WP_Error` object?

### POSTing Data
1. The functions we will be using is [`wp_remote_post()`](https://developer.wordpress.org/reference/functions/wp_remote_post/)
2. The arguments are similar to the [GET](#http\get)

**Example**
- We are trying to send some dummy data to a dummy url.

```php
// The body of request.
$body = array(
	'name'    => 'Jane Smith',
	'email'   => 'some@email.com',
	'subject' => 'Checkout this API stuff',
	'comment' => 'I just read a great tutorial. You gotta check it out!',
);
// Few of the below aregs are defualt.
$args = array(
	'body'        => $body,
	'timeout'     => '5',
	'redirection' => '5',
	'httpversion' => '1.0',
	'blocking'    => true,
	'headers'     => array(),
	'cookies'     => array(),
);
// Sending request.
$response = wp_remote_post( 'http://your-contact-form.com', $args );

/**
 * You can use the existing functions like
 * @see wp_remote_retrive_body()
 * @see wp_remote_retrive_status_code()
 * to know more about response manipulation.
 * /
```

### HEADing off bandwidth usage.
1. Sometimes you might just want to check if the resource is available to send the request.

**Example**
```php
$response = wp_remote_head( 'https://api.github.com/users/blobaugh' );

/**
 * This will be the response
 * Array(
	[headers] => Array
		(
		[server] => nginx
		[date] => Fri, 05 Oct 2012 05:21:26 GMT
		[content-type] => application/json; charset=utf-8
		[connection] => close
		[status] => 200 OK
		[vary] => Accept
		[x-ratelimit-remaining] => 4982
		[content-length] => 594
		[last-modified] => Fri, 05 Oct 2012 04:39:58 GMT
		[etag] => "5d5e6f7a09462d6a2b473fb616a26d2a"
		[x-github-media-type] => github.beta
		[cache-control] => public, s-maxage=60, max-age=60
		[x-content-type-options] => nosniff
		[x-ratelimit-limit] => 5000
	)
    [body] =>
    [response] => Array
		(
		[preserved_text 39a8515bd2dce2aa06ee8a2a6656b1de /] => 200
		[message] => OK
	)
    [cookies] => Array(
	)
	[filename] =>
)
 * /
```

Going back to the GitHub example, here are few headers to watch out for. Most of these headers are standard, but you should always check the API docs to ensure you understand which headers are named what, and their purpose.
- `x-ratelimit-limit` – Number of requests allowed in a time period
- `x-ratelimit-remaining` – Number of remaining available requests in time period
- `content-length` – How large the content is in bytes. Can be useful to warn the user if the content is fairly large
- `last-modified` – When the resource was last modified. Highly useful to caching tools
- `cache-control` – How should the client handle caching

### Making any sort of request
- You can use the `arg` from the `WP_HTTP::request()` for more information on method, body, cookies, headers etc.

```php
$args     = array(
	'method' => 'DELETE',
);
$response = wp_remote_request( 'http://some-api.com/object/to/delete', $args );
```

### Performance
1. Use of caching @see [Transient API](https://developer.wordpress.org/apis/transients/).
2. Use of `HEAD` request to make sure the server resource is always available.

### Other Helpful function
The other helper functions deal with retrieving different parts of the response. These make usage of the API very simple and are the preferred method for processing response objects.
1. [`wp_remote_retrieve_body()`](https://developer.wordpress.org/reference/functions/wp_remote_retrieve_body/) – Retrieves just the body from the response.
2. [`wp_remote_retrieve_header()`](https://developer.wordpress.org/reference/functions/wp_remote_retrieve_header/) – Retrieve a single header by name from the raw response.
3. [`wp_remote_retrieve_headers()`](https://developer.wordpress.org/reference/functions/wp_remote_retrieve_headers/) – Retrieve only the headers from the raw response.
4. [`wp_remote_retrieve_response_code()`](https://developer.wordpress.org/reference/functions/wp_remote_retrieve_response_code/) – Retrieve the response code for the HTTP response. This should be 200, but could be 4xx or even 3xx on failure.
5. [`wp_remote_retrieve_response_message()`](https://developer.wordpress.org/reference/functions/wp_remote_retrieve_response_message/) – Retrieve only the response message from the raw response.

## Introduction To Caching
- Caching is a practice whereby commonly used objects or objects requiring significant time to build are saved into a fast object store for quick retrieval on later requests.
- You should always **cache**.

### WordPress Transient
1. WordPress Transients provide a convenient way to store and use cached objects.
2. Read more about transient api [here](https://developer.wordpress.org/apis/transients/)
3. **Cache an object** [`set_transient()`](https://developer.wordpress.org/reference/functions/set_transient/)
    - ```php
        set_transient(
            string $transient, // transient name, must be less than 172 chars, not be escaped by SQL.
            mixed $value,
            int $expiration // Duration in seconds, 0 means no expiration
        ): bool // True if set
        ```
    - It pretty much stores the **options** table.
    - Prefix with 
    - ```php
        $response = wp_remote_get( 'https://api.github.com/users/blobaugh' );
        set_transient( 'prefix_github_userinfo', $response, 60 * 60 );
        ```
4. **Get a cached object** [`get_transient()`](https://developer.wordpress.org/reference/functions/get_transient/)
    - ```php
        $github_userinfo = get_transient( 'prefix_github_userinfo' );
        if ( false === $github_userinfo ) {
	        // Transient expired, refresh the data
	        $response = wp_remote_get( 'https://api.github.com/users/blobaugh' );
	    set_transient( 'prefix_github_userinfo', $response, HOUR_IN_SECONDS );
        }
        // Use $github_userinfo as you will
        ```
5. **Delete a cached object** [`delete_transient()`](https://developer.wordpress.org/reference/functions/delete_transient/)
    - ```php
      delete_transient( 'blobaugh_github_userinfo' );
      ```

## [Transient API](https://developer.wordpress.org/apis/transients/)
1. The Transients API is very similar to the **Options API** but with the added feature of an **expiration time**, which simplifies the process of using the `wp_options` database table to temporarily store cached information.
2. Note that the `“site_”` functions are essentially the same as their counterparts, but **work network wide** when using WordPress *Multisite*.
3. Functions
    - [`set_transient()`](https://developer.wordpress.org/reference/functions/set_transient/)
    - [`get_transient()`](https://developer.wordpress.org/reference/functions/get_transient/)
    - [`set_site_transient()`](https://developer.wordpress.org/reference/functions/set_site_transient/)
    - [`get_site_transient()`](https://developer.wordpress.org/reference/functions/get_site_transient/)
    - [`delete_transient()`](https://developer.wordpress.org/reference/functions/delete_transient/)
    - [`delete_site_transient()`](https://developer.wordpress.org/reference/functions/delete_site_transient/)
4. These functions are defined in the `wp-includes/option.php` file.

### `set_transient()`
1. Used to set a transient.
2. The data is stored in the `wp_options` table.
3. There are two different variables stored in the transient table
    - `_transient_timeout_{$transient}` for storing timeout in options table.
    - `_transient_{$transient}` for storing the transient value, this is a **serialized** value.
4. There are few filters & actions called
    - `apply_filters( "pre_set_transient_{$transient}", $value, $expiration, $transient )`
    - `$expiration = apply_filters( "expiration_of_transient_{$transient}", $expiration, $value, $transient );`
    - `do_action( "set_transient_{$transient}", $value, $expiration, $transient );`
    - `do_action( 'setted_transient', $transient, $value, $expiration );`

**Pseudo Code**
```java
function set_transient($transient, $value, $expiration = 0) {
    $expiration = (int) $expiration;
    Apply filters to modify transient value and expiration;
    If external object cache is being used or WordPress is being installed:
        Store transient value using wp_cache_set();
    Else:
        Store transient value directly in options table;
    Fire actions after setting transient value;
    Return result of setting transient value;
}
```

### `get_transient()`
1. Used to get a transient value.
2. Following filters and actions are called
    - `$pre = apply_filters( "pre_transient_{$transient}", false, $transient );`
    - `apply_filters( "transient_{$transient}", $value, $transient )`

### `delete_transient()`
1. Filters & actions
    - `do_action( "delete_transient_{$transient}", $transient );`
    - `do_action( 'deleted_transient', $transient );`


