# Block Editor : 3rd May 2024 #189

## 1. How do you add a Color Palette to a custom block in WordPress?
To add a `ColorPalette` component to a custom block in WordPress, developers can use the `ColorPalette` component provided by the `@wordpress/block-editor` package.

```js
import { ColorPalette } from '@wordpress/block-editor';

const MyCustomBlockEdit = ({ attributes, setAttributes }) => {
    return (
        <div>
            <ColorPalette
                colors={[
                    { name: 'Red', color: '#ff0000' },
                    { name: 'Green', color: '#00ff00' },
                    { name: 'Blue', color: '#0000ff' },
                ]}
                value={attributes.backgroundColor}
                onChange={(color) => setAttributes({ backgroundColor: color })}
            />
        </div>
    );
};

```

## 2. What is the FontSizePicker component in WordPress?
The `FontSizePicker` component in WordPress provides a user interface for selecting font sizes within the Block Editor.

```js
import { FontSizePicker } from '@wordpress/block-editor';

const MyCustomBlockEdit = ({ attributes, setAttributes }) => {
    return (
        <div>
            <FontSizePicker
                fontSizes={[
                    { name: 'Small', slug: 'small', size: 12 },
                    { name: 'Medium', slug: 'medium', size: 16 },
                    { name: 'Large', slug: 'large', size: 20 },
                ]}
                value={attributes.fontSize}
                onChange={(fontSize) => setAttributes({ fontSize })}
            />
        </div>
    );
};

```


## 3. What is the purpose of the BlockVerticalAlignmentToolbar in WordPress?
The `BlockVerticalAlignmentToolbar` in WordPress serves the purpose of providing a toolbar for vertically aligning block content within a container or layout.

```js
import { BlockVerticalAlignmentToolbar } from '@wordpress/block-editor';

const MyCustomBlockEdit = ({ attributes, setAttributes }) => {
    return (
        <div>
            <BlockVerticalAlignmentToolbar
                onChange={(verticalAlignment) => setAttributes({ verticalAlignment })}
            />
            {/* Other block content */}
        </div>
    );
};

```

## 4. What is the core idea behind using block supports?
- The core idea behind using block supports in WordPress is to enable blocks to declare and utilize additional features, capabilities, or settings beyond their basic functionality.
- Block supports allow developers to define various attributes, behaviors, or options associated with blocks, enhancing their versatility and usability in different contexts.
- Examples of block supports include alignment options, custom colors, font sizes, block variations, and more, which can be enabled or disabled based on block requirements.

## 5. What is the equivalent of useBlockProps.save() in PHP?
- In PHP, the equivalent of `useBlockProps.save()` is the `get_block_wrapper_attributes()` function, which retrieves the attributes for the block wrapper element during the rendering process.


cc @abhishekfdd