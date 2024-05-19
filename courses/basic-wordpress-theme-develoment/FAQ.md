# How WP determines which template to show ?
If we go by the WP Core flow of loading, You can check the file ⁠`wp-includes/template-loader.php`.  this file 
```php

if ( wp_using_themes() ) {

	$tag_templates = array(
		'is_embed'             => 'get_embed_template',
		'is_404'               => 'get_404_template',
		'is_search'            => 'get_search_template',
		'is_front_page'        => 'get_front_page_template',
		'is_home'              => 'get_home_template',
		'is_privacy_policy'    => 'get_privacy_policy_template',
		'is_post_type_archive' => 'get_post_type_archive_template',
		'is_tax'               => 'get_taxonomy_template',
		'is_attachment'        => 'get_attachment_template',
		'is_single'            => 'get_single_template',
		'is_page'              => 'get_page_template',
		'is_singular'          => 'get_singular_template',
		'is_category'          => 'get_category_template',
		'is_tag'               => 'get_tag_template',
		'is_author'            => 'get_author_template',
		'is_date'              => 'get_date_template',
		'is_archive'           => 'get_archive_template',
	);
	$template      = false;

	// Loop through each of the template conditionals, and find the appropriate template file.
	foreach ( $tag_templates as $tag => $template_getter ) {
		if ( call_user_func( $tag ) ) {
			$template = call_user_func( $template_getter );
		}

		if ( $template ) {
			if ( 'is_attachment' === $tag ) {
				remove_filter( 'the_content', 'prepend_attachment' );
			}

			break;
		}
	}

	if ( ! $template ) {
		$template = get_index_template();
	}

	/**
	 * Filters the path of the current template before including it.
	 *
	 * @since 3.0.0
	 *
	 * @param string $template The path of the template to include.
	 */
	$template = apply_filters( 'template_include', $template );
	if ( $template ) {
		include $template;
	} elseif ( current_user_can( 'switch_themes' ) ) {
		$theme = wp_get_theme();
		if ( $theme->errors() ) {
			wp_die( $theme->errors() );
		}
	}
	return;
}

```

Contains this code, where it will check what query it is, using the conditional tags in the array given⁠

# How WP stores the information about your theme ?
1. It uses the `wp_options` table, with two things to store, `stylesheet` & `template` keys
2. ⁠The `stylesheet` key store the name of your active or child theme name, while the `template` key stores the name of your active/parent theme.

# What is a difference between a plugin & theme ?
1. Apart from the basic difference in functionality, we can still achieve few features from plugin.
2. Few hooks will never run like *activation*, *deactivation*, *uninstall* so you can't perform any actions like these.
3. Only one theme can be active at one time, while not the same with plugin, as multiple plugins can be active.

# Where’s `functions.php` is loaded ?
In the `wp-settings.php` just after it finds the active themes using the function `wp_get_active_and_valid_themes()`

# Does Theme's functions.php is loaded when you are doing a rest api request to WordPress?
**Yes**, it's loaded, just after loading the plugins. Another way to figure out is, the assignment, if we want to add a CPT called books, then it must be accessible in the REST API endpoints, so that means the functions.php is loaded for the REST API.

The theme template won't be loaded if the request is of `HEAD` type.
