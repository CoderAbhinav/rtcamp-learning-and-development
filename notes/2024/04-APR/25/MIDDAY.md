# Block Editor : 25th April 2024 #183
## 1. Difference between static and dynamic block.
- Static blocks are those whose content remains fixed and does not change based on user interaction or external data. Examples include headings, paragraphs, and images.
- Dynamic blocks, on the other hand, are blocks whose content can change dynamically based on user input, settings, or external data sources. Examples include posts, categories, and custom queries.
## 2. What are block controls?
[![Screenshot of the block controls of a Paragraph block inside the block editor](https://raw.githubusercontent.com/WordPress/gutenberg/HEAD/docs/assets/toolbar-text.png)](https://raw.githubusercontent.com/WordPress/gutenberg/HEAD/docs/assets/toolbar-text.png)
Block controls are user interface elements provided by the Block Editor to manipulate blocks. They include options for formatting text, aligning blocks, adding links, changing block types, and more.
## 3. What are inspector controls?
[![inspector](https://raw.githubusercontent.com/WordPress/gutenberg/HEAD/docs/assets/inspector.png)](https://raw.githubusercontent.com/WordPress/gutenberg/HEAD/docs/assets/inspector.png)

Inspector controls are additional settings and options specific to the selected block. They are displayed in the block inspector panel on the right side of the editor interface. Inspector controls allow users to configure advanced settings, such as block alignment, margins, padding, block styles, and custom attributes.
## 4. Can we extend the existing blocks to add any extra block or inspector control? If yes, how?
1. **Yes**, developers can extend existing blocks in the Gutenberg editor to add extra functionality or customize their behavior. 
2. This can be achieved by using hooks and filters provided by the Gutenberg API, such as `registerBlockType`, `registerBlockStyle`, `InspectorControls`, `BlockControls`, etc. Developers can add custom attributes, controls, styles, and behavior to existing blocks by hooking into these APIs.
## 5. How are the assets enqueuing and translation handled for the Gutenberg block? Do developers have to do them explicitly?
1. Assets enqueuing, such as scripts and stylesheets, for Gutenberg blocks are handled automatically by WordPress. When a block is registered, its associated scripts and stylesheets are enqueued using the standard WordPress `wp_enqueue_script` and `wp_enqueue_style` functions. This ensures that the necessary assets are loaded only when the block is used.
2. Translation of Gutenberg blocks is also handled by WordPress through the use of internationalization functions like `__()` and `_x()`. Developers can make their blocks translatable by wrapping text strings in these functions. When the block is translated, WordPress will generate the appropriate language files for localization.
3. Developers do not have to handle asset enqueuing or translation explicitly for Gutenberg blocks, as WordPress takes care of these tasks automatically. However, they can customize asset loading and translation behavior if needed using hooks and filters provided by WordPress and the Gutenberg API.


cc @abhishekfdd