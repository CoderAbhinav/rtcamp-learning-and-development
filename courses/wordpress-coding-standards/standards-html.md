# WP Coding Standards: HTML

## Validation
All HTML pages should be verified against the [W3C](https://validator.w3.org) validator to ensure that the markup is well formed. 

## Self - Closing Elements
For tags that are self-closing, the forward slash should have exactly one space preceding it:

```html
<br />
```

## Attributes
1. All tags and attributes must be written in lowercase.
    
    For machines:
    `<meta http-equiv="content-type" content="text/html; charset=utf-8" />`

    For humans:
    `<a href="http://example.com/" title="Description Here">Example.com</a>`


## Quotes
According to the W3C specifications for XHTML, all attributes must have a value, and must use double- or single-quotes

```html
<input type="text" name="email" disabled="disabled" />
<input type='text' name='email' disabled='disabled' />
```

## Indentation
1.As with PHP, HTML indentation should always reflect logical structure. Use tabs and not spaces.
1. When mixing PHP and HTML together, indent PHP blocks to match the surrounding HTML code. Closing PHP blocks should match the same indentation level as the opening block.

```php
<?php if ( ! have_posts() ) : ?>
<div id="post-1" class="post">
    <h1 class="entry-title">Not Found</h1>
    <div class="entry-content">
        <p>Apologies, but no results were found.</p>
        <?php get_search_form(); ?>
    </div>
</div>
<?php endif; ?>
```


