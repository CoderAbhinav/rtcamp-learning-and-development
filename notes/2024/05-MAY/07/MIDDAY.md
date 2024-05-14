# Block Editor : 7th May 2024 #194
## 1. Where does the Gutenberg store site and Block Editor state data, how do I access it, and how can I use it in block and sidebar components so that they will update and re-render automatically when it changes?
1. Gutenberg stores site and Block Editor state data in the WordPress data store, managed by the `@wordpress/data` module.
2. Developers can access this state data using selectors provided by the `@wordpress/data` module, such as `useSelect` and `useDispatch`.
3. To use state data in block and sidebar components, developers can use the `useSelect` hook to retrieve data from the store and automatically trigger re-renders when it changes.
```jsx
import { useSelect } from '@wordpress/data';

const MyComponent = () => {
    const postTitle = useSelect((select) => select('core/editor').getEditedPostAttribute('title'));
    return <h1>{postTitle}</h1>;
};
```

## 2. How to load "content" from an external file when using register_block_pattern?
When using `register_block_pattern`, developers can load content from an external file by providing a callback function to generate the pattern.

```php
function wpdocs_register_block_patterns() {
        register_block_pattern(
            'wpdocs/my-example',
            array(
                'title'         => __( 'My First Block Pattern', 'textdomain' ),
                'description'   => _x( 'This is my first block pattern', 'Block pattern description', 'textdomain' ),
                'content'       => '<!-- wp:paragraph --><p>A single paragraph block style</p><!-- /wp:paragraph -->',
                'categories'    => array( 'text' ),
                'keywords'      => array( 'cta', 'demo', 'example' ),
                'viewportWidth' => 800,
            )
        );
}
add_action( 'init', 'wpdocs_register_block_patterns' );
```

## 3. Is it possible to use hooks in Gutenberg blocks?
**Yes**, it's possible to use hooks in Gutenberg blocks. We can use `@wordpress/hooks` package to use hooks. Example:
1. `addAction( 'hookName', 'namespace', callback, priority )`
2. `addFilter( 'hookName', 'namespace', callback, priority )`

## 4. What tool can be used to scaffold a new WordPress block plugin or theme?
The `@wordpress/create-block` tool can be used to scaffold a new WordPress block plugin or theme.
## 5. What is the purpose of the deprecated attribute in a block's registration settings?
1. The `deprecated` attribute in a block's registration settings is used to mark a block as deprecated and provide guidance to users and developers.
2. When a block is marked as deprecated, it means that the block is no longer recommended for use and may be removed in future releases.
```jsx
deprecated: [ { 
	attributes: { 
	// Deprecated attributes... 
	}, 
	save: function() { // Deprecated save function... }, }, ],
```

@abhishekfdd