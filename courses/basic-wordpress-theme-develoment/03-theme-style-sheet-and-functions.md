# Theme Stylesheet and Functions file, [Core Concepts](https://developer.wordpress.org/themes/core-concepts/)

## Theme Structure
1. WordPress themes are nothing more than a collection of various files that rely on different web technologies, such as HTML, CSS, and PHP. 
2. Block themes also follow a standard structure in how many of those files are laid out.

### Required Files
1. [`style.css`](https://developer.wordpress.org/themes/core-concepts/main-stylesheet/): This file is required for configuring theme data, such as its name and description. It can also be used for adding custom CSS.
2. [`templates/index.html`](https://developer.wordpress.org/themes/core-concepts/templates/): The default/fallback template. This is necessary for WordPress to consider this a block theme.

### Optional Files
1. [`README.md`](https://make.wordpress.org/themes/handbook/review/required/#9-files): This is not used directly by the WordPress software. But it is a required file when submitting a theme to the official WordPress theme directory, meant to provide information about the theme to users.
2. [`functions.php`](https://developer.wordpress.org/themes/core-concepts/custom-functionality/): A PHP file that WordPress **automatically loads** after the theme is initialized during the page-loading process. **You can use it to run custom PHP.**
3. `screenshot.png`: A 1200×900 screenshot image of your theme. Used for displaying your theme under **Appearance > Themes** in the WordPress admin and in the WordPress theme directory (if submitted there). Both `.png` and `.jpg` are acceptable file formats. 
4. [`theme.json`](https://developer.wordpress.org/themes/core-concepts/global-settings-and-styles/): Used to configure settings and styles for the site, integrating with the user interface.

### Standard Folders
1. [`parts`](https://developer.wordpress.org/themes/templates/template-parts/): Parts are smaller sections that you can include within top-level templates. Often, this will include things like headers, footers, and sidebars.
2. [`patterns`](https://developer.wordpress.org/themes/features/block-patterns/): Reusable patterns made up of one or more blocks that users can insert via the editor interface.
3. [`styles`](https://developer.wordpress.org/themes/global-settings-and-styles/style-variations/): Variations on the theme’s global settings and styles stored in individual JSON files.
4. [`templates`](https://developer.wordpress.org/themes/templates/templates/): Files that represent the overall document structure of the front-end. Templates are made up of block markup and are what site visitors see.

# Templates
In block themes, templates are made up of a collection of blocks.
1. Theme templates represent the markup of the webpage. They create the document structure and print both static data and dynamic data to the front end of your site.

Go to **Appearance > Editor > Templates > Single Posts** in your WordPress admin. This will show you what a Single post template looks like:

<img src="https://i0.wp.com/developer.wordpress.org/files/2023/11/tt3-single-template-editor.jpg?w=2048&ssl=1" width=720>


