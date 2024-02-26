# How are the nonces created? Where are the nonce key and nonce salt stored in WordPress?
1. To create a nonce in WP, we can use `wp_create_nonce()` function.
Example,

    ```php
    $nonce = wp_create_nonce( 'my-action_'.$post->ID );
    ```
2. The `nonce key` and `nonce salt` are stored in database, inside `wp_options` table, and retrived when we need to generate `nonce`.


# What are some common security vulnerabilities found in WordPress plugins?
Some common security vulnerabilities found in WordPress plugins include:
1. Cross-Site Scripting (XSS) vulnerabilities.
2. SQL Injection vulnerabilities.
3. Cross-Site Request Forgery (CSRF) vulnerabilities.
4. Insecure file uploads.
5. Insecure direct object references.
6. Lack of proper access controls.
7. Using outdated or vulnerable third-party libraries.


# How can developers ensure the safety and reliability of third-party libraries and frameworks external dependencies?
Developers can ensure the safety and reliability of third-party libraries and frameworks by:
1. Keeping dependencies updated to the latest stable versions.
2. Monitoring security advisories and patches released by the library maintainers.
3. Conducting regular security audits and vulnerability scans.
4. Using reputable and well-maintained libraries with active developer communities.
5. Implementing proper input validation, output escaping, and data sanitization techniques.


# How will conduct a security audit on the plugin which tools you will use?
Developers can conduct a security audit on WordPress plugins using various tools and techniques, including:
1. **Code review**: Manual inspection of the plugin's source code for security vulnerabilities.
2. **Automated security scanning tools**: Tools like WPScan, Wordfence, and Sucuri SiteCheck can scan plugins for known vulnerabilities and security issues.
3. **Penetration testing**: Simulating real-world attacks to identify potential security weaknesses.
4. **Vulnerability assessments**: Identifying and prioritizing security risks based on severity and impact.


# What is validation? What's the difference between client-side and server-side validation?
1. Validation is the process of **checking input** data to ensure it meets certain criteria or constraints.
2. Client-side validation `occurs in the user's web browser` before data is submitted to the server. It **provides immediate feedback** to the user but can be bypassed by malicious users.
3. **Server-side validation** occurs on the server after data is submitted. It is essential for security and data integrity as it cannot be bypassed by clients.


# Can you explain the concept of "escaping" in detail? Additionally, could you provide a comprehensive list of all the available "esc_" functions in WordPress, including their descriptions and examples?
Escaping output is the process of **securing output data** by stripping out unwanted data, like malformed HTML or script tags. This process helps secure your data prior to rendering it for the end user. 

1. `esc_html()` - Use anytime an HTML element encloses a section of data being displayed. This will remove HTML.
    ```php
    <h4><?php echo esc_html( $title ); ?></h4>
    ```
2. `esc_js()` – Use for inline Javascript.
    ```php
    <div onclick='<?php echo esc_js( $value ); ?>' />
    ```
3. `esc_url()` – Use on all URLs, including those in the src and href attributes of an HTML element.
    ```php
    <img alt="" src="<?php echo esc_url( $media_url ); ?>" />
    ```
4. `esc_url_raw()` – Use when storing a URL in the database or in other cases where non-encoded URLs are needed.
5. `esc_xml()` – Use to escape XML block.
6. `esc_attr()` – Use on everything else that’s printed into an HTML element’s attribute.
    ```php
    <ul class="<?php echo esc_attr( $stored_class ); ?>">
    ```
7. `esc_textarea()` – Use this to encode text for use inside a textarea element.
8. `wp_kses()` – Use to safely escape for all non-trusted HTML (post text, comment text, etc.). This preserves HTML.
9. `wp_kses_post()` – Alternative version of wp_kses()that automatically allows all HTML that is permitted in post content.
10. `wp_kses_data()` – Alternative version of wp_kses()that allows only the HTML permitted in post comments.


# Can you explain the concept of "sanitizing" in detail? Additionally, could you provide a list of 10 available "sanitize_" functions in WordPress, including their descriptions and examples?
*Sanitizing input* is the process of securing/cleaning/filtering input data. Validation is preferred over sanitization because validation is more specific. But when “more specific” isn’t possible, sanitization is the next best thing.

## List Of 10 Available `sanitize_` functions

### 1. `sanitize_email( string $email ): string`
Strips out all characters that are not allowable in an email.
```php
<?php
$sanitized_email = sanitize_email('     admin@example.com!     ');
echo $sanitized_email; // will output: 'admin@example.com'
?>
```

### 2. `sanitize_hex_color( string $color ): string|void`
Returns either ”, a 3 or 6 digit hex color (with #), or nothing.


### 3. `sanitize_html_class( string $classname, string $fallback = ” ): string`
Strips the string down to A-Z,a-z,0-9,_,-. If this results in an empty string then it will return the alternative value supplied.
```php
<?php
$post_class = sanitize_html_class( $post->post_title );
echo '<div class="' . $post_class . '">';
?>
```
### 4. `sanitize_key( string $key ): string`
Keys are used as internal identifiers. Lowercase alphanumeric characters, dashes, and underscores are allowed.


```php
<?php
$sankey = sanitize_key('Testexample1-_/[]{}');
echo $sankey;
?>

// output: testexample1-_
```
### 5. `sanitize_meta( string $meta_key, mixed $meta_value, string $object_type, string $object_subtype = ” ): mixed`
Sanitizes meta value.

### 6. `sanitize_mime_type( string $mime_type ): string`
Sanitizes a mime type

```php
<?php
$mimetype = sanitize_mime_type('typeexample1-_/[]{}.pdf');
echo $mimetype;
?>

// output: typeexample1-/.pdf
```

### 7. `sanitize_sql_orderby( string $orderby ): string|false`
Accepts one or more columns, with or without a sort order (ASC / DESC).
```php
<?php 
$orderby           = in_array( $args['orderby'], $allowed_orders, true ) ? $args['orderby'] : 'download_log_id';
$order             = 'DESC' === strtoupper( $args['order'] ) ? 'DESC' : 'ASC';
$orderby_sql       = sanitize_sql_orderby( "{$orderby} {$order}" );
$query[]           = "ORDER BY {$orderby_sql}";
$raw_download_logs = $wpdb->get_results( implode( ' ', $query ) );
?>
```

### 8. `sanitize_text_field( string $str ): string`
- Checks for invalid UTF-8,
- Converts single < characters to entities
- Strips all tags
- Removes line breaks, tabs, and extra whitespace
- Strips percent-encoded characters

```php
$str = "<h2>Title</h2>";
sanitize_text_field( $str ); // it will return "title" without any HTML tags!
```

### 9. `sanitize_url( string $url, string[] $protocols = null ): string`
Sanitizes a URL for database or redirect usage.

```php
$new_input = sanitize_url( $input, array( 'http', 'https' ) );
```

### 10. `wp_kses( string $content, array[]|string $allowed_html, string[] $allowed_protocols = array() ): string`
This function makes sure that only the allowed HTML element names, attribute names, attribute values, and HTML entities will occur in the given text string.

This function expects unslashed data.

```php
<?php
$str = 'Check Kses function I am <strong>stronger</strong> and cooler every single day <a href="#" rel="nofollow ugc">Click Here</a>';
echo $str;
$arr = array( 'br' => array(), 'p' => array(), 'strong' => array() );
echo 'String using wp_kses function....' . wp_kses( $str, $arr );
?>

// output will allow the strong, br, p tag but not the anchor tag, hence that content will be removed
```

