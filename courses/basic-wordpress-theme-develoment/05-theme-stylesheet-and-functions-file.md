# Theme Stylesheet & Functions File

@see [File Header - Codex](https://codex.wordpress.org/File_Header#Theme_File_Header_Example)

## Main Stylesheet (style.css)
1. WP requires all the themes to include a `style.css` file. It registers the theme.
2. The file header is an important part of the theme, wordpress uses this information to determine how some functions work.
3. When determining which themes are available to activate, WordPress searches through each folder under `/wp-content/themes`, looking for a `style.css` file. If one is found, it pulls the first **8kb** of data from the file and determines if there is a file header with standard fields defined.
4. In order for your theme to work, you header should be at least
    ```css
    /**
    * Theme Name: Fabled Sunset
    */
    ```
    **And then there are some more fields**
    ```css
    /**
     * Theme Name:        Fabled Sunset
     * Theme URI:         https://example.com/fabled-sunset
     * Description:       Custom theme description...
     * Version:           1.0.0
     * Author:            Your Name
     * Tags:              block-patterns, full-site-editing
     * Text Domain:       fabled-sunset
     * Domain Path:       /assets/lang
     * Tested up to:      6.4
     * Requires at least: 6.2
     * Requires PHP:      7.4
     * License:           GNU General Public License v2.0 or later
     * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
     */
    ```
5. For building **child** themes, we need an additional field
    ```css
    /**
     * Theme Name: Grand Sunrise
     * Template:   fabled-sunset
     * ...other header fields
     */
    ```
6. You can also have some custom header fields, as there might be some plugins which needs those fields.

## Functions (functions.php)
1. The `functions.php` essentially acts like a WordPress plugin, letting you add custom PHP functions, classes, interfaces, and more. It opens up the entirety of the PHP programming language to your theme.
2. WordPress automatically loads `functions.php` as soon as it loads the theme. While all themes can have `functions.php` file, but wordpress loads only of the current one.

## Common usage
1. Adding actions & filters.
2. Theme setup functions, so they basically give you the way to add some custom theme supports, let's say I want the icon support just add it to the hook `after_theme_setup` and you are mostly done.
3. Don't add a closing php tag `?>` at the end of this file, this might result in broken site.
