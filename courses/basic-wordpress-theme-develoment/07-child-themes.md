# Child Themes

## [Child Themes- Basics of Child Themes](https://www.youtube.com/watch?v=0VZhNqhPePc)
1. Child themes allows your parent theme to change slightly.
2. And btw, you don't need to add the index.php file.
3. As soon as we activate the child theme, in the options table, the `stylesheet` option value changes to the name of your child theme, but `template` option remains the same name.

## [Child Themes - Overriding Parent Functionality Pt 1](https://www.youtube.com/watch?v=4xI1H0jhxYk)
1. In order to override the functionality just, make sure you follow the hierarchy.
2. The wordpress will ever time look into the child theme then the parent theme.

## [Child Themes - Overriding Parent Functionality Pt 2](https://www.youtube.com/watch?v=kIoJLXf5q0I)
1. In order to get the current / child theme directory you can use the `get_stylesheet_uri()`.
2. In order to get the parent theme directory we can use the `get_template_directory_uri()`.


1. Child themes are extensions of a parent theme.
2. **Parent Themes**: 
    - All themes—unless they are specifically a child theme—are technically parent themes. 
    - Parent themes must have all of the required files, as outlined in the [Theme Structure](https://developer.wordpress.org/themes/core-concepts/theme-structure/) documentation.
3. **Child Themes**:
    - A child theme includes everything from its parent theme by default.
    - It can also be used to make customizations to the parent theme without directly modifying the parent theme’s files. 
4. **Grandchild Themes**: This is not currently possible.
    - In a way, the user customization layer works as a “grandchild” theme of sorts. The big difference is that the changes are stored in the database instead of the filesystem.

## How to create a child theme ?
1. **Create a child theme folder**
    - Now create a new folder in your `wp-content/themes` directory with a kebab-case version of your theme name: `grand-sunrise`.
2. **Create a `style.css`**
    - Now you’ll need to create a file named style.css. It is the one absolutely necessary file for a child theme to exist.
    - Add an additional header called **Template** and give the value to the parent theme name.

## Customizing the Stylesheet
### Loading style.css
1. The [`get_stylesheet_uri()`](https://developer.wordpress.org/reference/functions/get_stylesheet_uri/), this will return the current active (in this case the child theme) stylesheet uri.
2. If you want the parent theme uri then, [`get_parent_theme_file_uri()`](https://developer.wordpress.org/reference/functions/get_parent_theme_file_uri/)

### Template Parts, And Patterns
1. You can override the template parts, just the condition is the template slug should be matching.

### `functions.php`
Unlike templates and patterns, the `functions.php` file of a child theme does not override the `functions.php` file in the parent theme. In fact, they are both loaded, with the child being loaded immediately before the parent.

### Internationalization
1. Use the function [`load_child_theme_textdomain()`](https://developer.wordpress.org/reference/functions/load_child_theme_textdomain/) in order to load the child theme text domain, now this means you also need to write that domain.
