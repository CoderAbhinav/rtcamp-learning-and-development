# Advance Theme Development : 15th April 2024 #164
## 1. How can you make your plugin accessible?
1. Fields should be labeled. Every form input needs to have an associated `<label>` element.
2. Checkboxes and radio buttons should be grouped inside a `<fieldset>` with a `<legend>`.
3. For things like buttons use `<button>` or `<input>` tags, avoid using the `<span>` or `<div>` tags.
4. When an AJAX action runs, announce it audibly or move focus to an appropriate new location on the page. WordPress contains a useful method called `wp.a11y.speak()` that you can use to announce results audibly.
5. When users input data into a form, provide them with feedback when a submission is made and notify them when they have entered something incorrectly.
6. The WCAG 2.1 guidelines measure contrast using a ratio comparing the relative luminosity of the colors. The guidelines stipulate a minimum contrast of 4.5:1 for normal text and 3.0:1 for large text using this ratio.
## 2. What is `wp.a11y.speak()`? and how to use it.
1. Understanding `aria-live` region: Simple content changes which are not interactive should be marked as live regions. A live region is explicitly denoted using the `aria-live` attribute.
2. When content changes dynamically in a web page, [`wp.a11y.speak()`](https://make.wordpress.org/accessibility/handbook/markup/wp-a11y-speak/) can announce a message using [aria-live](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/ARIA_Live_Regions).
### Usage
1. Enqueue your `javascript` which will be dependant on `'wp-a11y'`  add this in the `deps` array.
```php
add_action( 'wp_enqueue_scripts', 'add_accesibility_script' );

function add_accesibility_script() {
	// Register the script.
    wp_register_script( 'my-accesibility-script', get_template_directory_uri() . '/assets/js/your-ajax-file.js',[ 'wp-a11y',], false, true );

    // Localization.
    wp_localize_script( 'your-prefix-ajax', 'yourData', [
        strings' => [
            'resultsFound' => esc_html__( 'New results found and displayed in the table below', 'your-theme' )
        ],
    ] );
    wp_enqueue_script( 'my-accesibility-script' );
}
```

2. The `my-accesibility-script.js` file
```js
wp.a11y.speak( yourData.strings.resultsFound, 'polite' );
```

3. Generated Output
```html
<div id="wp-a11y-speak-polite" aria-live="polite" aria-relevant="additions text" aria-atomic="true" class="screen-reader-text wp-a11y-speak-region">
	New results found and displayed in the table below
</div>
```
## 3. Does choosing colours for the theme impact accessibility?
1. Colour is important to make a beautiful website, but not everyone sees colours the same way.
2. There might be colour blind users, so the colour contrast is quite necessary.
3. **Colour contrast** is an important issue to address, as your website background should differentiate between the text, foreground.
4. Apart from choosing right colours, we also need to add visual response such as change in shape on different actions. 

## 4. Write an example form (HTML) that is accessibility friendly.

In this example:
- Each form field has a corresponding `<label>` element associated with it using the `for` attribute.
- ARIA labels are added to form fields using the `aria-label` attribute to provide additional context for screen reader users.
- Required form fields are marked with the `required` attribute.
- The checkbox for subscribing to the newsletter includes a `<fieldset>` with a `<legend>` for better grouping and accessibility.
- ARIA live region `<div>` with `role="status"` and `aria-live="polite"` attributes is added to provide dynamic feedback to screen reader users. This region will announce changes to the form's status as they occur. We can use the [`wp.a11y.speak()`](https://make.wordpress.org/accessibility/handbook/markup/wp-a11y-speak/)  function to do so.

```html
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Accessible Form Example</title>
</head>
<body>

<h1>Contact Us</h1>

<form action="#" method="post">

  <label for="name">Name:</label>
  <input type="text" id="name" name="name" aria-label="Enter your name" required><br><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" aria-label="Enter your email address" required><br><br>

  <label for="message">Message:</label><br>
  <textarea id="message" name="message" rows="4" cols="50" aria-label="Enter your message" required></textarea><br><br>

  <input type="checkbox" id="subscribe" name="subscribe" value="subscribe">
  <label for="subscribe">Subscribe to newsletter</label><br><br>

  <fieldset>
    <legend>Preferred Contact Method:</legend>
    <input type="radio" id="contact-email" name="contact-method" value="email">
    <label for="contact-email">Email</label><br>
    <input type="radio" id="contact-phone" name="contact-method" value="phone">
    <label for="contact-phone">Phone</label><br>
  </fieldset><br>

  <button type="submit">Submit</button>
</form>

<!-- ARIA Live Region for Feedback -->
<div id="status" role="status" aria-live="polite"></div>

</body>
</html>

```
