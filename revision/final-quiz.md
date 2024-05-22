# Attempt #1
## 1. Can a script & style have a same handle ? Is it possible ? What happens if we do so ?
1. If you try to register or enqueue an already registered handle with different parameters, the new parameters will be ignored. Instead, use [wp_deregister_script()](https://developer.wordpress.org/reference/functions/wp_deregister_script/ "Function Reference/wp deregister script") and register the script again with the new parameters. ([Ref](https://developer.wordpress.org/reference/functions/wp_enqueue_script/#notes))
## 2. Which libraries are used for image manipulation in WordPress ?
`ImageMagic` & `GD` libraries are used in WordPress for image manipulations ([Ref](https://support.pagely.com/hc/en-us/articles/115000052451-Imagick-vs-GD-in-WordPress))
## 3. What are attributes, block toolbars, and block controls ? Can block controls have additional settings ? Where it can be added ?
### Attributes
1. Block attributes provide information about the data stored by a block. For example, rich content, a list of image URLs, a background colour, or a button title.
2. A block can contain any number of attributes, and these are specified by the `attributes`field – an object where each key is the name of the attribute, and the value is the attribute definition.
3. The attribute definition will contain, at a minimum, either a `type` or an `enum`. There may be additional fields.
### Block Controls
[![Screenshot of the block controls of a Paragraph block inside the block editor](https://raw.githubusercontent.com/WordPress/gutenberg/HEAD/docs/assets/toolbar-text.png)](https://raw.githubusercontent.com/WordPress/gutenberg/HEAD/docs/assets/toolbar-text.png)
1. When the user selects a particular block, a toolbar positioned above the selected block displays a set of control buttons.
2. With `BlockControls`, you can customize the toolbar to include controls specific to your block type. If the return value of your block type's `edit` function includes a `BlockControls` element, the controls nested inside it will be shown in the selected block's toolbar.

### Block Toolbars

![Diagram showing the Block Toolbar and the Settings Sidebar when a Paragraph block is selected](https://i0.wp.com/developer.wordpress.org/files/2023/12/block-toolbar-settings-sidebar.png?ssl=1)

1. When the user selects a block, a number of control buttons may be shown in a toolbar above the selected block
2. If the return value of your block type’s `Edit` function includes a `BlockControls` element, those controls will be shown in the selected block’s toolbar.
3. The Settings Sidebar is used to display less-often-used settings or those that require more screen space. The Settings Sidebar should be used for **block-level settings only** and is shown when a block is selected.

## 4. How can we make REST API endpoint call from Gutenberg Blocks ? How it works ? Details of `apiFetch`.
1. The `@wordpress/api-fetch` is utility to make WordPress REST API requests. It’s a wrapper around `window.fetch`.
	
	```js
	import apiFetch from '@wordpress/api-fetch';
	
	apiFetch( { path: '/wp/v2/posts' } ).then( ( posts ) => {
	    console.log( posts );
	} );
	```
	
	```js
	import apiFetch from '@wordpress/api-fetch';
	import { addQueryArgs } from '@wordpress/url';
	
	const queryParams = { include: [1,2,3] }; // Return posts with ID = 1,2,3.
	
	apiFetch( { path: addQueryArgs( '/wp/v2/posts', queryParams ) } ).then( ( posts ) => {
	    console.log( posts );
	} );
	```

## 5. Can I change the archive page query ? If yes then how ?
1. **Yes**, With WP’s [pre_get_posts](https://developer.wordpress.org/reference/hooks/pre_get_posts/) hook, it is easy to modify existing WP archive queries. The hook fires after the query variable object is created, but before the actual query is run, making it possible to change any existing query argument, or inject new ones.
	```php
	add_action( 'pre_get_posts', function( $query ) {
	  if ( $query->is_category() && $query->is_main_query()  ) {
	    $query->set( 'posts_per_page', 20 );
	  }
	});
	```
## 6. Does WP query cache the result ? 
**Yes**, `WP_Query` does cache the results.
### 1. Is this default behaviour ? 
**Yes**
### 2. How does it store ? 
It stores the cache in-memory. `WP_Object_Cache`
### 3. What if I don't want the results from cache ?
Stop the data retrieved from being added to the cache.
- **`cache_results`** (_boolean_) – Post information cache.
- **`update_post_meta_cache`** (_boolean_) – Post meta information cache.
- **`update_post_term_cache`** (_boolean_) – Post term information cache.
	
	```php
	$args = array(
		'posts_per_page' => 50,
		'cache_results' => false
	);
	$query = new WP_Query( $args );
	```

([Ref](https://developer.wordpress.org/reference/classes/wp_query/#caching-parameters))
### 4. If there is cache and if I want to clear the cache how to do so ?
We can use the [`wp_cache_flush()`](https://developer.wordpress.org/reference/functions/wp_cache_flush/) in order to clear the cache.
## 6. What is non-persistent cache ? When is the expiry of non-persistent cache ?
This means that data stored in the cache resides in memory only and only for the duration of the request. Cached data will not be stored persistently across page loads
## 7.  What's `WP_Object_Cache` ? Is this persistent or non-persistent ?
1. The WordPress Object Cache is used to save on trips to the database. The Object Cache stores all of the cache data to memory and makes the cache contents available by using a key, which is used to name and later retrieve the cache contents.
2. The Object Cache can be replaced by other caching mechanisms by placing files in the `wp-content` folder which is looked at in `wp-settings`. If that file exists, then this file will not be included. (For instance the `redis` drop ins)
3. By default, the object cache is **non-persistent**. ([Ref](https://developer.wordpress.org/reference/classes/wp_object_cache/))
4. *Additional*: Use the [Transients API](https://developer.wordpress.org/apis/handbook/transients/ "Transients API") instead of these functions if you need to guarantee that your data will be cached. If persistent caching is configured, then the transients functions will use the wp_cache_* functions described in this document. However if persistent caching has not been enabled, then the data will instead be cached to the options table.
## 8. What are `wp-config.php` constants you came across till now?
```php
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
```
###  1. What are the multisite related constant ?
The below mentioned constants are additionally present in the `wp-config.php` along with the previously mentioned.
```php
define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', 'temp.local' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
```

### 2. What are some of the debugging constants in WordPress ?
```php
/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*
* For information on other constants that can be used for debugging,
* visit the documentation.
*
* @link https://wordpress.org/support/article/debugging-in-wordpress/
*/
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
```
## 9. There are two ways we get posts from the database, (a) `get_posts`, (b) `WP_Query`, what's the difference between these two ?
### 1. What do these functions return ?
1. The [`get_posts()`](https://developer.wordpress.org/reference/functions/get_posts/) retrieves an array of the latest posts, or posts matching the given criteria.
2. Returns a `WP_Query` object. This object not only holds the array of posts like `get_posts()`, but also provides additional functionalities for manipulating and customizing the query.
### 2. Can you use the template tags in both of these ?
While `get_posts()` itself doesn't directly support template tags, you can use the returned array of posts, `WP_Query` does support use of template tags in query loop.
### 3. What's the major difference ?
1. The `get_posts()` is primarily used for fetching an array of posts, while `WP_Query` offers a more comprehensive approach for building custom loops, pagination, conditional logic, and finer control over the query.
2. There might be a slight performance advantage with `get_posts()` in some scenarios, especially when dealing with very large numbers of posts, as `WP_Query` performs additional calculations.
### 4. Which one is more flexible ?
**`WP_Query`** is the clear winner in terms of flexibility. It empowers you to create more complex and dynamic post queries, integrate with themes and plugins seamlessly, and manage pagination effectively.
## 10. Difference between `is_single()` and `is_singular()`.
1. [`is_single()`](https://developer.wordpress.org/reference/functions/is_single/) determines whether the query is for an existing single post. Works for any post type, except attachments and pages. Return *`True`* in this case.
2. [`is_singular()`](https://developer.wordpress.org/reference/functions/is_singular/) determines whether the query is for an existing single post of any post type (post, attachment, page, custom post types).
### 1. In terms of range `is_singular()` is broader or `is_single()`.
1. The [`is_singular()`](https://developer.wordpress.org/reference/functions/is_singular/) is *broader* in terms of range, as it covers more post types.
## 11. Difference between *babel* and *polyfills*.
1. **Babel** is a **transpiler**. It takes your modern JavaScript code and converts it into code that is equivalent in functionality, but uses older syntax that older browsers can understand. This is like translating a book from one language to another.
2. **Polyfills** are **libraries** that implement the functionality of new features in JavaScript itself. When a browser encounters a new feature it doesn't understand, the polyfill library kicks in and provides a way to achieve the same result using older methods. This is like writing out the definition of a new word in the margins of the translated book.
	
	| Feature          | Babel                                | Polyfills                               |
	| ---------------- | ------------------------------------ | --------------------------------------- |
	| **What it does** | Transpiles modern JS to older syntax | Provides functionality for new features |
	| **How it works** | Code conversion at build time        | Library code execution at runtime       |
	| **Example**      | Converts arrow functions to ES5      | Provides emulation for `fetch` API      |
## 12. What will be more performant approach if we want to create a migration `WP CLI` command ?
1. We must take care to write the migration scripts that will not affect the server resources so we need to implement batch processing
2. Use the direct DB query instead of the `WP_Query`.
3. Load some frequently needed things in the variables themselves so we don’t need to query the DB again and again.
4. We can migrate content first and then migrate images, videos, PDFs, etc separately so our main process will be offloaded.
5. We can also use some tools that allow us the parallel processing of multiple assets at the same time.
([Ref](https://learn.rtcamp.com/courses/data-migration-to-wordpress/l/how-to-start/t/writing-wp-cli-scripts/))

## 13. What is *`transformation`* key in `block.json` file ?
1. Block Transforms is the API that allows a block to be transformed _from_ and _to_ other blocks, as well as _from_ other entities.
2. A block declares which transformations it supports via the optional `transforms` key of the block configuration, whose subkeys `to` and `from` hold an array of available transforms for every direction. Example:
	```js
	export const settings = {
	    title: 'My Block Title',
	    description: 'My block description',
	    /* ... */
	    transforms: {
	        from: [
	            /* supported from transforms */
	        ],
	        to: [
	            /* supported to transforms */
	        ],
	    },
	};
	```

## 14. Which constants are defined for the CRON Execution & for the AJAX request ?
2. For *CRON*, we use `DOING_CRON` ([Ref](https://developer.wordpress.org/reference/functions/wp_doing_cron/))
3. For *AJAX*, we use `DOING_AJAX` ([Ref](https://developer.wordpress.org/reference/functions/wp_doing_ajax/))
4. For *REST*, we use `REST_REQUEST`
## 15. Can you get the number of times a hook has run ?
The [`did_action()`](https://developer.wordpress.org/reference/functions/did_action/) function can be used to get the number of times a hook has run.
## 16. What is `customize_changeset` in WordPress ?
In WordPress, `customize_changeset` refers to a special post type used by the customizer functionality. (And the actual changes are stored under the `theme_mod_<theme-name>` in options table when you apply these changes)
### 1. How and where theme preview & previous changes are stored ? 
If you save the draft then you will get a preview link, how it is structured ? so basically, your normal page link and then there will be a query variable `?customize_changeset_uuid` with a value given as `a30f979c-fdb1-408c-89df-785d51e0e90a` so basically a UUID.
	1. If you want to see where the data is stored then, just go to the `wp_posts` table.
	2. In this table the `UUID` which we saw will be used as **post name** and the post type will be **`customize_changeset`**.
	3. And all the changes will be stored in `JSON` format under the **post_content**.
	4. With key structured like `{theme_slug}::{settings_id}`  => `{value}`
	5. The status of this post will be **draft**.
	6. Or if you schedule it as `schedule` then the **post_status** will be `future` .
([Ref](https://learn.rtcamp.com/courses/advance-wordpress-theme-development/l/advance-theme-development/t/customizer-api/))
## 17. What is the use of `$wp_actions` global variable ?
The `$wp_actions`  object only holds information about actions that have been fired during the page load, here is brief summary about what it does and does not do
- Holds details of actions fired on the current page
- Holds details of the **number of times** each action has been fired
- Does not hold details of actions that have not been fired via the `do_action` function
- Can hold details of actions that have been fired using `do_action` but have not been created using `add_action` 
([Ref](https://www.hardworkingnerd.com/whats-the-difference-between-wp_filter-and-wp_actions/))
## 18. Which global variable is used to store how many times an action or a filter is fired ?
The `$wp_actions` & `$wp_filters` variables stores the information about how many times a action or a filter is fired. ([Ref](https://www.hardworkingnerd.com/whats-the-difference-between-wp_filter-and-wp_actions/))
## 19. How to remove a rest api endpoint ?
1. We can use the [`rest_endpoints`](https://developer.wordpress.org/reference/hooks/rest_endpoints/) filter in order to remove a rest api endpoint
2. WordPress uses prefixes to identify endpoints (e.g., `/wp/v2/posts`). You can target specific ones by modifying the code:
	```php
	add_filter( 'rest_endpoints', function( $endpoints ) {
	  unset( $endpoints['/wp/v2/comments'] ); // Remove comments endpoint as an example
	  return $endpoints;
	} );
	```


