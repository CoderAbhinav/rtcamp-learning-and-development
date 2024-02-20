# WordPress Coding Standards: CSS
## Structure
1. Use tabs, not spaces, to indent each property.
2. Add two blank lines between sections and one blank line between blocks in a section.
3. Each selector should be on its own line, ending in either a comma or an opening curly brace. 
4. Property-value pairs should be on their own line, with one tab of indentation and an ending semicolon. 
5. The closing brace should be flush left, using the same level of indentation as the opening selector.

**Example:**
```css
#selector-1,
#selector-2,
#selector-3 {
    background: #fff;
    color: #000;
}
```

## Selectors
1. Use lowercase and separate words with hyphens when naming selectors. Avoid camelcase and underscores.
2. Use human readable selectors that describe what element(s) they style.
3. Attribute selectors should use double quotes around values.

```css
#comment-form {
    margin: 1em 0;
}

input[type="text"] {
    line-height: 1.1;
}
```


## Properties
1. Properties should be followed by a `colon` and a `space`.
2. All properties and values should be `lowercase`, except for font names and vendor-specific properties.
3. Use hex code for colors, or `rgba()` if **opacity** is needed. Avoid RGB format and uppercase, and shorten values when possible: #fff instead of #FFFFFF.
4. Use shorthand, except when overriding styles, for background, border, font, list-style, margin, and padding values as much as possible.
5. Group like properties together.

```css
#selector-1 {
    background: #fff;
    display: block;
    margin: 0;
    margin-left: 20px;
}
```


## Values

There are numerous ways to input values for properties. Follow the guidelines below to help us retain a high degree of consistency.
1. **Space** before the value, after the colon.
2. Do not pad parentheses with spaces.
3. Always **end in a semicolon**.
4. Use **double quotes** rather than single quotes, and **only when needed**, such as when a font name has a space or for the values of the content property.
5. Font **weights** should be **defined using numeric** values (e.g. 400 instead of normal, 700 rather than bold).
6. 0 values should not have units unless necessary, such as with transition-duration.
7. **Line height should also be unit-less**, unless necessary to be defined as a specific pixel value. This is more than just a style convention, but is worth mentioning here. More information: https://meyerweb.com/eric/thoughts/2006/02/08/unitless-line-heights/.
8. Use a leading zero for decimal values, including in rgba().
9. **Multiple comma-separated values for one property should be separated by either a space or a newline.** For better readability newlines should be used for lengthier multi-part values such as those for shorthand properties like box-shadow and text-shadow, including before the first value. Values should then be indented one level in from the property.
10. Lists of values within a value, like within rgba(), should be separated by a space.

```css
.class { /* Correct usage of quotes */
    background-image: url(images/bg.png);
    font-family: "Helvetica Neue", sans-serif;
    font-weight: 700;
}

.class { /* Correct usage of zero values */
    font-family: Georgia, serif;
    line-height: 1.4;
    text-shadow:
        0 -1px 0 rgba(0, 0, 0, 0.5),
        0 1px 0 #fff;
}

.class { /* Correct usage of short and lengthier multi-part values */
    font-family: Consolas, Monaco, monospace;
    transition-property: opacity, background, color;
    box-shadow:
        0 0 0 1px #5b9dd9,
        0 0 2px 1px rgba(30, 140, 190, 0.8);
}
```

## Media Queries

1. Media queries allow us to gracefully degrade the DOM for different screen sizes. If you are adding any, be sure to test above and below the break-point you are targeting.
2. It is generally advisable to **keep media queries grouped** by media **at the bottom of the stylesheet**.
3. An exception is made for the wp-admin.css file in core, as it is very large and each section essentially represents a stylesheet of its own. Media queries are therefore added at the bottom of sections as applicable.
4. Rule sets for media queries should be indented one level in.


```css
@media all and (max-width: 699px) and (min-width: 520px) {
        /* Your selectors */
}
```

## Commenting
1. Comment, and comment liberally. If there are concerns about file size, utilize minified files and the `SCRIPT_DEBUG` constant. 
2. Long comments should manually break the line length at 80 characters.
3. A table of contents should be utilized for longer stylesheets, especially those that are highly sectioned. Using an index number (1.0, 1.1, 2.0, etc.) aids in searching and jumping to a location.
4. Comments should be formatted much as **PHPDoc** is. 


```css
/**
 * #.# Section title
 *
 * Description of section, whether or not it has media queries, etc.
 */

.selector {
    float: left;
}
```

**For Inline**
```css
/* This is a comment about this selector */
.another-selector {
    position: absolute;
    top: 0 !important; /* I should explain why this is so !important */
}
```

