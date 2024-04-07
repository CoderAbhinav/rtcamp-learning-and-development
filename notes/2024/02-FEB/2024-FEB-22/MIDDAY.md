# Can we create two plugins with the same name?
1. **Yes**, it's possible to create two plugins with the same name.
2. But it's not recommended to have two plugins with the same name, as it might create confusion when managing plugin.

# What register_activation_hook function does? explain the parameters passed to the function.
1. The `register_activation_hook` function is used to register a callback function to be executed when the plugin is activated.
2. Function, Parameters
    ```php
    register_activation_hook( string $file, callable $callback )
    ```
    - `$file`: string (required)
        - Filename of plugin including the path
    - `$callback`: string (required)
        - The function hooked to the `'activate_PLUGIN'` action.

# What are the possible fields in a plugin header?
```php
/*
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */
```

field | description
--- | ---
`Plugin Name` **(required)** | The name of your plugin, which will be displayed in the Plugins list in the WordPress Admin.
`Plugin URI` | The home page of the plugin, which should be a unique URL, preferably on your own website. This must be unique to your plugin. You cannot use a WordPress.org URL here.
`Description` | A short description of the plugin, as displayed in the Plugins section in the WordPress Admin. Keep this description to fewer than 140 characters.
`Version` | The current version number of the plugin, such as 1.0 or 1.0.3.
`Requires at least`| The lowest WordPress version that the plugin will work on.
`Requires PHP`| The minimum required PHP version.
`Author`| The name of the plugin author. Multiple authors may be listed using commas.
`Author URI`| The author’s website or profile on another website, such as WordPress.org.
`License`| The short name (slug) of the plugin’s license (e.g. GPLv2). More information about licensing can be found in the WordPress.org guidelines.
`License URI`| A link to the full text of the license
`Text Domain`| The gettext text domain of the plugin. More information can be found in the Text Domain section of the How to Internationalize your Plugin page.
`Domain Path`| The domain path lets WordPress know where to find the translations. More information can be found in the Domain Path section of the How to Internationalize your Plugin page.
`Network`| Whether the plugin can only be activated network-wide. Can only be set to true, and should be left out when not needed.
`Update URI`| Allows third-party plugins to avoid accidentally being overwritten with an update of a plugin of a similar name from the WordPress.org Plugin Directory.


# Which fields are 'required' in the plugin header?
1. `Plugin Name` field is the required field in **plugin header**.

# Which are the basic hooks that you absolutely need when creating a plugin?
hook | description
--- | ---
`register_activation_hook` | On activation, plugins can run a routine to add rewrite rules, add custom database tables, or set default option values.
`register_deactivation_hook` | On deactivation, plugins can run a routine to remove temporary data such as cache and temp files and directories.
`init` | This is used for plugin initialization


# Does the deactivation hook get executed when you uninstall a plugin? Why?
1. **No**, the deactivation hook does not get executed when you uninstall a plugin.
2. Deactivation hook is **only triggered when a plugin is deactivated**, not uninstalled.
3. The purpose of the deactivation hook is to perform cleanup tasks or deactivate certain functionalities when the plugin is deactivated.

# Can the main plugin file be placed in a nested folder?
1. **Yes**, the main plugin file can be placed in a nested folder within the plugins directory.
2. However, the file path specified in the Plugin Name: header must be relative to the plugins directory.

# What will happen if more than one file in our plugin has plugin header information?
1. Only the first file will be considered as plugin and rest will be discarded

# Explore how WP core loads the activated plugin and what different hooks are fired. Hint - explore wp_get_active** functions to know this flow.
1. **Plugin Discovery**
    - `wp_get_active_plugins` get all the active plugins
2. **Main File Loading**
    - `plugin-name.php` file is loaded
3. **Activation** flow
    - `register_activation_hook` runs
    - `plugin_loaded`
    - `admin_init`
    - `init`
    - `wp_enqueue_scripts` & `wp_enqueue_style`
 
