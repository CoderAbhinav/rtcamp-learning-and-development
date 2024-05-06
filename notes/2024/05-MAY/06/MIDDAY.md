# Block Editor : 6th May 2024 #193
## 1. How can we remove a block from the inserter, i.e. no one can add the block from the Gutenberg Editor?
   - To remove a block from the inserter in the Gutenberg Editor, developers can use the `unregisterBlockType` function provided by the Block Editor API.
   - They need to call `unregisterBlockType` with the block type name of the block they want to remove from the inserter.
   - By unregistering a block type, it becomes unavailable for insertion via the block inserter, effectively removing it from the available blocks list.
   - Example:
     ```jsx
     wp.domReady(() => {
         wp.blocks.unregisterBlockType('core/latest-posts');
     });
     ```

## 2. Using the above method we can remove the block from the editor and now can only be added programmatically to any content. How can we add that block programmatically? (Not related to block supports but good to know)
   - To add a block programmatically after removing it from the inserter, developers can use the `insertBlock` function provided by the Block Editor API.
   - They need to call `insertBlock` with the block object representing the block they want to add programmatically.
   - By using `insertBlock`, developers can dynamically add blocks to the editor content programmatically, enabling custom block insertion logic.
   - Example:
     ```jsx
     wp.domReady(() => {
         const block = wp.blocks.createBlock('core/paragraph', { content: 'Hello, world!' });
         wp.data.dispatch('core/editor').insertBlock(block);
     });
     ```


## 3. How can we restrict a block to be added only once in each post?
   - To restrict a block to be added only once in each post, developers can utilize the `__experimentalBlockAddInitialState` filter hook provided by the Block Editor.
   - They need to filter the initial state of the block inserter and remove the block they want to restrict from being added multiple times.
   - By filtering the block add initial state, developers can enforce limitations on block insertion behavior, ensuring blocks are added only once per post.
   - Example:
     ```jsx
     wp.hooks.addFilter('blocks.__experimentalBlockAddInitialState', 'my-plugin/limit-block-addition', (initialState, blockName) => {
         if (blockName === 'core/latest-posts') {
             return null;
         }
         return initialState;
     });
     ```

## 4. How to add a custom `CSS` class to core blocks in the Gutenberg editor?
   - To add a custom CSS class to core blocks in the Gutenberg editor, developers can use the `blocks.getSaveElement` filter hook provided by the Block Editor.
   - They need to filter the save element of the block and add the desired CSS class to the wrapper element.
   - By customizing the save element, developers can apply additional styling to core blocks using CSS classes.
   - Example:
     ```jsx
     wp.hooks.addFilter('blocks.getSaveElement', 'my-plugin/add-custom-css-class', (element, blockType, attributes) => {
         if (blockType.name === 'core/paragraph') {
             return React.cloneElement(element, { className: 'custom-css-class' });
         }
         return element;
     });
     ```

## 5. How can I fix the “`TypeError: wp.editor is undefined`” error?
  - The "TypeError: wp.editor is undefined" error typically occurs when accessing the Block Editor API before it has been fully loaded.
   - To fix this error, developers should ensure that their script is enqueued properly and wrapped within a `wp.domReady` callback to ensure it runs after the editor is initialized.
   - Additionally, developers can use the `wp-editor` script dependency when enqueuing their script to ensure it is loaded after the Block Editor API.
   - Example:
     ```php
     function enqueue_editor_script() {
         wp_enqueue_script('my-editor-script', 'path/to/script.js', ['wp-editor'], null, true);
     }
     add_action('enqueue_block_editor_assets', 'enqueue_editor_script');
     ```

cc @abhishekfdd