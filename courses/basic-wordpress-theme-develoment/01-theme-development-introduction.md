# Theme Development Introduction
1. WordPress themes used to change design of your website including different layouts.

## Video Transcribe
### [Theme Development Introduction - Basics of Theme](https://www.youtube.com/watch?v=QojLwa5zBVc)
1. Wordpress comes with the default themes the **twenty-twenty** themes
    - The *twenty twenty one* theme is a classic theme
        - Developed with a classic edior, PHP templates
    - The *twenty twenty two* theme is a block based theme
        - Developed with a block based theme. So like user can pretty much manage his site with the gutenberg editor.
2. Plugin is more of managing the feature, while theme is for displaying & theming of the site.
3. For any information the wordpress needs it always get's it from the `style.css` file.
4. Apart from this we can also have some more files like JS and all.
5. What's the difference between plugins & theme ?
    - Basically, theme should control the presentation only, while plugin only features.

## What is a theme ?
A WordPress theme represents the design of your website. It can control everything from colors, to fonts, to the entire layout.

<img src="https://i0.wp.com/developer.wordpress.org/files/2023/11/twenty-twenty-two-collage.jpg?resize=2048%2C1280&ssl=1" width=720>

### What themes can do ?
As a theme creator, you can:
- Create different layouts, such as one, two or more columns.
- Control the typography of the site with custom font choices.
- Skin the site with any color scheme you want.
- Put a sidebar on the left or right side of the page. Or, have no sidebar at all.
- Display featured images alongside posts.

### Theme Types
#### Block Themes
<img src="https://i0.wp.com/developer.wordpress.org/files/2023/11/site-editor-styles.png?resize=2048%2C1071&ssl=1" width=720>

1. Block themes are the modern method of building WordPress themes. 
2. They generally follow a standard set of conventions and are built entirely out of blocks.
3. Block themes rely on HTML-based [block templates](https://developer.wordpress.org/themes/templates/) that contain block markup.
4. Users can also customize [global settings and styles](https://developer.wordpress.org/themes/global-settings-and-styles/) defined by the theme’s theme.json file through the Styles interface. 

#### Classic Themes
<img src="https://i0.wp.com/developer.wordpress.org/files/2023/11/customizer-twenty-twenty.jpg?resize=2048%2C1071&ssl=1" width=720>

1. Classic themes use a PHP-based templating system, which is still supported in WordPress today.
2. Unlike block themes, classic themes have far fewer standards to adhere to, but there are APIs you can use for specific features.

#### Hybrid Themes
Hybrid themes are merely classic themes that have adopted some modern block-related features, such as global settings and styles or block template parts.

### What are themes made of ?
Themes can include many different folders and file types. The list below is non-exhaustive, but it includes some of common things you might see:
- Templates (.html in block themes and .php in classic themes)
- CSS Stylesheets
- JavaScript
- PHP
- Media (images, audio, video, etc.)
- JSON

### What is difference between theme & plugin ?
- Themes control the presentation of content.
- Plugins control the behaviors and features of your site.

