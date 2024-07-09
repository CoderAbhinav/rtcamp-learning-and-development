# Annotations
Annotations are a way to highlight a specific piece in a post created with the block editor.

## API

To see the API for yourself the easiest way is to have a block that is at least 200 characters long without formatting and putting the following in the console:

```js
wp.data.dispatch( 'core/annotations' ).addAnnotation( {
    source: 'my-annotations-plugin',
    blockClientId: wp.data.select( 'core/block-editor' ).getBlockOrder()[ 0 ],
    richTextIdentifier: 'content',
    range: {
        start: 50,
        end: 100,
    },
} );
```

To help with determining the correct positions, the `wp.richText.create` method can be used. This will split a piece of HTML into text and formats.

The property `richTextIdentifier` is the identifier of the RichText instance the annotation applies to.

# Block Annotations
It is also possible to annotate a block completely. In that case just provide the `selector` property and set it to `block`. The default `selector` is `range`, which can be used for text annotation.

```js
wp.data.dispatch( 'core/annotations' ).addAnnotation( {
    source: 'my-annotations-plugin',
    blockClientId: wp.data.select( 'core/block-editor' ).getBlockOrder()[ 0 ],
    selector: 'block',
} );
```

This doesn’t provide any styling out of the box, so you have to provide some CSS to make sure your annotation is shown:

```css
.is-annotated-by-my-annotations-plugin {
    outline: 1px solid black;
}
```

