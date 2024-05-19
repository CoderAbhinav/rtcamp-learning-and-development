1. How do register custom styles for your block ?
2. How to add `inline` style to the custom block ?
3. What is difference between static & dynamic blocks ?
4. Where are the blocks stored in the post ?
5. Can you add custom fields to a dynamic blocks ?
	1. Does attributes work in dynamic blocks ?
	2. Some more ways to add custom field ?
	3. If we store the attribute as meta then will it be a block meta or post meta ?
6. When creating a dynamic block why the `save` function returns `null`? 
7. How to allow block to be allowed only once is block editor ? (There's a property called `multiple` under `supports` in `block.json` set it to false)
8. How do you check if block supports a specific feature in WordPress.
```jsx
import { useBlockProps } from '@wordpress/block-editor';

function MyBlockEdit() {
  const blockProps = useBlockProps();

  if (blockProps.hasBlockSupport('core/horizontalRule')) {
    // Block supports horizontal rule feature
  } else {
    // Block does not support horizontal rule feature
  }

  // ... rest of your block editor code
}

```

9. What are block attributes ?
10. How do we create custom options panel for the WordPress block ? (In the Inspector)
11. Suppose you want to add specifications to only a particular toolbar ?
12. What are *Block Toolbars* & `<BlockControls>` ?
13. How to make a block to be used as a in `InnerBlock` ?
14. What are benefits of using *nested blocks*?
15. How can you remove a block from an inserter ? (Like on a specific page or so ? Programatically) (Anser: https://wordpress.stackexchange.com/questions/305932/gutenberg-remove-add-blocks-with-custom-script)
16. What is the `wp.blocks` module in the Block API reference ?
17. What is `register_meta` vs `register_post_meta` ?
18. How do we retrive post meta in block editor ? Using JS? `const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );`
19. How to add support for Gutenberg in theme ?
20. What are different types of notices ? How to add & remove a notice ?
21. What is the use of `registerFormatType` and `richTextToolBar` Button ? (https://developer.wordpress.org/block-editor/how-to-guides/format-api/#step-2-add-a-button-to-the-toolbar) What's the difference between these two ?
22. How can we register a custom block category ? `register_block_pattern_category()` function.
23. What are different scope in variation ?
24. What is block inspector component in WordPress block development ?
25. What are `slotfills` ? Can we create `slotfills` ?