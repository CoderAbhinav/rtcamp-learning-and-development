#### autop

Replaces double line-breaks with paragraph elements.

A group of regex replaces used to identify text formatted with newlines and replace double line-breaks with HTML paragraph tags. The remaining line-breaks after conversion become `<br />` tags, unless `br` is set to `false`.

```js
import { autop } from '@wordpress/autop';
autop( 'my text' ); // "<p>my text</p>"
```

_Parameters_

- _text_ `string`: The text which has to be formatted.
- _br_ `boolean`: Optional. If set, will convert all remaining line- breaks after paragraphing. Default true.

_Returns_

- `string`: Text which has been converted into paragraph tags.

#### removep

Replaces `<p>` tags with two line breaks. “Opposite” of `autop()`.

Replaces `<p>` tags with two line breaks except where the `<p>` has attributes. Unifies whitespace. Indents `<li>`, `<dt>` and `<dd>` for better readability.

_Usage_

```js
import { removep } from '@wordpress/autop';
removep( '<p>my text</p>' ); // "my text"
```

_Parameters_

- _html_ `string`: The content from the editor.

_Returns_

- `string`: The content with stripped paragraph tags.
