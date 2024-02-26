# Explain in detail how the `filter_input()` and `filter_var()` functions along with their various options work. What's the purpose of these functions?
## Purpose
These functions are used for data validation and sanitization in PHP. They help ensure that user input or other data conforms to expected formats and is safe for further processing.


## `filter_input()`
Gets a specific external variable by name and optionally filters it

```php
filter_input(
    int $type,
    string $var_name,
    int $filter = FILTER_DEFAULT,
    array|int $options = 0
): mixed
```

- `$type`: Specifies the type of input. Can be INPUT_GET, INPUT_POST, INPUT_COOKIE, etc.
- `$variable_name`: The name of the variable to filter.
- `$filter`: The filter to apply. Can be one of the FILTER_ constants.
- `$options`: Optional. Additional flags or options for the filter.

## `filter_var()`

```php
filter_var(
    mixed $value, 
    int $filter = FILTER_DEFAULT, 
    array|int $options = 0
): mixed
```
- `$variable`: The variable to filter.
- `$filter`: The filter to apply. Can be one of the FILTER_ constants.
- `$options`: Optional. Additional flags or options for the filter.

## Options

| Option         | Description                                                                                                   |
|----------------|---------------------------------------------------------------------------------------------------------------|
| FILTER_VALIDATE_BOOLEAN | Validates a boolean. Accepts 'true', 'false', '1', '0', 'yes', 'no'. Returns boolean value or false. |
| FILTER_VALIDATE_EMAIL   | Validates an email address. Returns the validated email or false.                                              |
| FILTER_VALIDATE_FLOAT   | Validates a float. Returns the validated float or false.                                                       |
| FILTER_VALIDATE_INT     | Validates an integer. Returns the validated integer or false.                                                   |
| FILTER_VALIDATE_IP      | Validates an IP address. Returns the validated IP address or false.                                             |
| FILTER_VALIDATE_URL     | Validates a URL. Returns the validated URL or false.                                                            |
| FILTER_SANITIZE_EMAIL   | Sanitizes an email address. Removes illegal characters. Returns the sanitized email or false.                  |
| FILTER_SANITIZE_STRING  | Sanitizes a string. Removes HTML tags and special characters. Returns the sanitized string or false.           |
| FILTER_SANITIZE_NUMBER_FLOAT | Sanitizes a float. Removes illegal characters. Returns the sanitized float or false.                        |
| FILTER_SANITIZE_NUMBER_INT   | Sanitizes an integer. Removes non-numeric characters. Returns the sanitized integer or false.                 |
| FILTER_SANITIZE_URL     | Sanitizes a URL. Removes illegal characters. Returns the sanitized URL or false.                              |


# What is i18n in WordPress?
1. i18n stands for internationalization.
2. It refers to the process of preparing a WordPress site or plugin/theme to be translated into multiple languages.
3. It involves making the code and content of the site ready for localization by using translation functions and making strings translatable.

# What is l10n in WordPress?
1. l10n stands for localization.
2. It refers to the process of adapting a WordPress site or plugin/theme to a specific locale or language.
3. It involves translating all translatable strings into the target language and loading the appropriate translation files.

# What is a locale related to l10n?
1. A locale specifies a set of conventions for a specific language and region.
2. It includes language and country codes, such as `en_US` for English (United States) or `fr_FR` for French (France).
3. Locales are used to determine the language and formatting preferences for users.

# What is a WordPress locale code? What are the WordPress locale codes for Gujrati, Marathi, and Tamil?
1. A locale specifies a set of conventions for a specific language and region.

Language | Locale Code
--- | ---
Marathi | `mr`
Gujrati | `gu_IN`
Tamil | `ta_IN`

# Can we create a Single file plugin without using any directory/folder?
1. **Yes**, it is possible to create a single-file plugin without using any directory.
2. The entire plugin code can be contained within a single PHP file, including the plugin header, hooks, and functionality.

# Can we rename the wp-content folder? If yes, what configuration will be needed to get it working?
1. **Yes**. To rename the wp-content and wp-admin folders in WordPress, you can use constants defined in the wp-config.php file.
```php
define('WP_CONTENT_FOLDERNAME', 'Folder_Name');
define('WP_CONTENT_DIR', ABSPATH . WP_CONTENT_FOLDERNAME);
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . WP_CONTENT_FOLDERNAME);
```

# What are the differences between deactivation and uninstall?
1. **Deactivation**: Occurs when a plugin is deactivated from the WordPress admin dashboard.
    - The plugin's code is still present on the server.
    - Hooks and registered settings remain intact.
    - Useful for temporary deactivation or troubleshooting.
2. **Uninstall**: Occurs when a plugin is uninstalled from the WordPress admin dashboard.
    - The plugin's code and files are removed from the server.
    - Hooks and registered settings are typically deleted.
    - Useful for permanently removing a plugin and its data from the site.