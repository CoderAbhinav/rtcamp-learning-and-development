## 1. Can a theme have only one file?
**Yes**, we can create a theme with only one file. 

## 2. How does a theme differ from a plugin?
**Themes**: Themes control the visual appearance and presentation of your website. They determine the layout, colors, fonts, and overall styling.

**Plugins**: Plugins add functionality to your WordPress website. They can extend features, add new content types, integrate with third-party services, and provide specialized functionalities that themes don't typically handle.

## 3. Which files are absolutely required in a WordPress theme?
`style.css` and `index.php` are absolutely required in a WordPress theme.

## 4. What files and directories we may see inside any WordPress theme directory?
1. **Template files**: As mentioned earlier, these files (like index.php, header.php, footer.php, single.php, etc.) control the structure and display of your website's content.
2. **Images**: Themes often include images for logos, backgrounds, icons, or other visual elements.
3. **Javascript files**: These files can add interactive elements or dynamic functionalities to your theme.
4. **Fonts directory**: Some themes include custom fonts for a unique design.
5. **Languages directory**: For themes supporting multiple languages, this directory might contain translation files.
6. **Includes directory**: This is an optional directory where you can store reusable code snippets used across multiple template files.

## 5. What is the difference between wp_title and get_the_title?
1. `wp_title()` function is used in the `<title>` tag of your header. It allows you to dynamically set the title based on the current page being viewed
2. `get_the_title($post_id)`: This function retrieves the title of a specific post or page. You can pass the post ID or use it within the loop to display the title of the current post.

## 6. What is responsive design? why it's needed?
Responsive design is a web design approach that ensures your website adapts its layout and content to different screen sizes and devices (desktop, tablet, mobile). It's crucial in today's world because users access websites from various devices with varying screen resolutions and capabilities.

## 7. What are media queries?
Media queries are CSS rules that allow you to apply styles conditionally based on specific characteristics of the device or browser window. 

### What are common breakpoints?
Common breakpoints for responsive design are:
- `320px`: For very small screens (older smartphones)
- `768px`: For tablets in portrait mode and smaller screens.
- `992px`: For tablets in landscape mode and larger screens.
- `1200px`: For large desktops.

### What will be the media query that applies if the browser window is above 720px.
```css
@media (min-width: 720px) {
  /* Styles for screens wider than 720px */
  body {
    /* Your styles here */
  }
}
```

### How to prevent the browser from scaling a design on mobile?
```css
@media only screen and (max-width: 767px) {
  /* Styles for mobile devices */
  body {
    -webkit-user-scalable: no;
    -moz-user-scalable: no;
    -ms-user-scalable: no;
    user-scalable: no;
  }
}
```

### What is orientation?
Orientation refers to whether a device is held in portrait (vertical) or landscape (horizontal) mode. 

## 8. How can your site display Hebrew, Arabic, or Japanese content?
### What changes are required to accommodate those languages?
1. **Character encoding**: Change the character encoding of your website to UTF-8, which supports a wide range of characters.
2. **Right-to-left (RTL) support**: For languages like Arabic and Hebrew, which read right-to-left, you might need to adjust styles or layouts to ensure proper rendering.
3. **Font selection**: Choose fonts that support the desired languages and their character sets.
4. **Content translation**: Translate your existing content and provide a way for users to switch languages (if applicable).

### what is "lang" and "hreflang" attribute?
1. **lang attribute**: This attribute specifies the primary language of a page or element. It helps search engines understand your content and potentially serve it to users searching

