**1. How can you register a sub-menu page? Explain its arguments.**
   - To register a sub-menu page in WordPress, you can use the `add_submenu_page()` function.
   - Syntax:
     ```php
     add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
     ```
     - `$parent_slug`: The slug of the parent menu item under which the sub-menu should appear. This can be the slug of a top-level menu page or a previously registered sub-menu page.
     - `$page_title`: The title of the sub-menu page.
     - `$menu_title`: The title that will appear in the admin menu.
     - `$capability`: The capability required to access the sub-menu page. Typically, this should match the capability required for the parent menu page.
     - `$menu_slug`: The slug for the sub-menu page. Should be unique among all registered admin pages.
     - `$function`: The callback function that will render the content of the sub-menu page.

**2. Suppose I want a sub-menu page under default users page of WordPress? How can I do that?**
   - To add a sub-menu page under the default Users page in WordPress, you need to use the parent slug of the Users page, which is `'users.php'`.
   - Example:
     ```php
     add_action( 'admin_menu', 'add_user_sub_menu_page' );
     function add_user_sub_menu_page() {
         add_submenu_page(
             'users.php',       // Parent slug
             'My Submenu',      // Page title
             'My Submenu',      // Menu title
             'manage_options',  // Capability
             'my-submenu',      // Menu slug
             'my_submenu_page'  // Callback function
         );
     }

     function my_submenu_page() {
         // Submenu page content
     }
     ```

**3. How can you assign multiple roles to a user?**
- WordPress core doesn't provide a built-in function to assign multiple roles to a single user.
   - However, you can achieve this using custom code by updating the user's capabilities directly in the database or by using plugins or custom code that provides this functionality.
   - One approach is to create a custom function that combines the capabilities of multiple roles and assigns them to the user using the `add_role()` or `WP_User` methods. Alternatively, you can use plugins that offer role management features to assign multiple roles to a user through the WordPress admin interface.

**4. Explain the subcommands and their options of the following commands Also try them locally and paste the output**
1. **wp core**: Manage the WP Core installation
```bash
➜  public wp core
usage: wp core check-update [--minor] [--major] [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp core download [<download-url>] [--path=<path>] [--locale=<locale>] [--version=<version>] [--skip-content] [--force] [--insecure] [--extract]
   or: wp core install --url=<url> --title=<site-title> --admin_user=<username> [--admin_password=<password>] --admin_email=<email> [--locale=<locale>] [--skip-email]
   or: wp core is-installed [--network]
   or: wp core multisite-convert [--title=<network-title>] [--base=<url-path>] [--subdomains] [--skip-config]
   or: wp core multisite-install [--url=<url>] [--base=<url-path>] [--subdomains] --title=<site-title> --admin_user=<username> [--admin_password=<password>] --admin_email=<email> [--skip-email] [--skip-config]
   or: wp core update [<zip>] [--minor] [--version=<version>] [--force] [--locale=<locale>] [--insecure]
   or: wp core update-db [--network] [--dry-run]
   or: wp core verify-checksums [--include-root] [--version=<version>] [--locale=<locale>] [--insecure]
   or: wp core version [--extra]

See 'wp help core <command>' for more information on a specific command.
```
2. **wp import**: Used to import data from other CMS to be loaded into the current WP site.
```bash
➜  public wp import
usage: wp import <file>... --authors=<authors> [--skip=<data-type>]
```

3. **wp export**: Exports all the post and related data.
```bash
➜  public wp export
Starting export process...
Writing to file /Users/abhinavbelhekar/Local Sites/daily-plugin/app/public/movielibrary.wordpress.2024-03-08.000.xml
Success: All done with export.
➜  public 
```

4. **wp option**: Let's you manage wp options (@see WP Options Table)
```bash
➜  public wp option
usage: wp option add <key> [<value>] [--format=<format>] [--autoload=<autoload>]
   or: wp option delete <key>...
   or: wp option get <key> [--format=<format>]
   or: wp option get-autoload <key>
   or: wp option list [--search=<pattern>] [--exclude=<pattern>] [--autoload=<value>] [--transients] [--unserialize] [--field=<field>] [--fields=<fields>] [--format=<format>] [--orderby=<fields>] [--order=<order>]
   or: wp option patch <action> <key> <key-path>... [<value>] [--format=<format>]
   or: wp option pluck <key> <key-path>... [--format=<format>]
   or: wp option set-autoload <key> <autoload>
   or: wp option update <key> [<value>] [--autoload=<autoload>] [--format=<format>]

See 'wp help option <command>' for more information on a specific command.
➜  public 
```

5. **wp menu**: Let's you manage wp site menu.
```bash
➜  public wp option
usage: wp option add <key> [<value>] [--format=<format>] [--autoload=<autoload>]
   or: wp option delete <key>...
   or: wp option get <key> [--format=<format>]
   or: wp option get-autoload <key>
   or: wp option list [--search=<pattern>] [--exclude=<pattern>] [--autoload=<value>] [--transients] [--unserialize] [--field=<field>] [--fields=<fields>] [--format=<format>] [--orderby=<fields>] [--order=<order>]
   or: wp option patch <action> <key> <key-path>... [<value>] [--format=<format>]
   or: wp option pluck <key> <key-path>... [--format=<format>]
   or: wp option set-autoload <key> <autoload>
   or: wp option update <key> [<value>] [--autoload=<autoload>] [--format=<format>]

See 'wp help option <command>' for more information on a specific command.
➜  public wp menu
usage: wp menu create <menu-name> [--porcelain]
   or: wp menu delete <menu>...
   or: wp menu item <command>
   or: wp menu list [--fields=<fields>] [--format=<format>]
   or: wp menu location <command>

See 'wp help menu <command>' for more information on a specific command.
```
6. **wp plugin**: Managing plugins, operations like installation, update, delete etc.
```bash
➜  public wp plugin
usage: wp plugin activate [<plugin>...] [--all] [--exclude=<name>] [--network]
   or: wp plugin auto-updates <command>
   or: wp plugin deactivate [<plugin>...] [--uninstall] [--all] [--exclude=<name>] [--network]
   or: wp plugin delete [<plugin>...] [--all] [--exclude=<name>]
   or: wp plugin get <plugin> [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp plugin install <plugin|zip|url>... [--version=<version>] [--force] [--activate] [--activate-network] [--insecure]
   or: wp plugin is-active <plugin> [--network]
   or: wp plugin is-installed <plugin>
   or: wp plugin list [--<field>=<value>] [--field=<field>] [--fields=<fields>] [--format=<format>] [--status=<status>] [--skip-update-check]
   or: wp plugin path [<plugin>] [--dir]
   or: wp plugin search <search> [--page=<page>] [--per-page=<per-page>] [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp plugin status [<plugin>]
   or: wp plugin toggle <plugin>... [--network]
   or: wp plugin uninstall [<plugin>...] [--deactivate] [--skip-delete] [--all] [--exclude=<name>]
   or: wp plugin update [<plugin>...] [--all] [--exclude=<name>] [--minor] [--patch] [--format=<format>] [--version=<version>] [--dry-run] [--insecure]
   or: wp plugin verify-checksums [<plugin>...] [--all] [--strict] [--version=<version>] [--format=<format>] [--insecure] [--exclude=<name>]

See 'wp help plugin <command>' for more information on a specific command.
```

7. **wp theme**: Manage your WP theme
```bash
➜  public wp theme 
usage: wp theme activate <theme>
   or: wp theme auto-updates <command>
   or: wp theme delete [<theme>...] [--all] [--force]
   or: wp theme disable <theme> [--network]
   or: wp theme enable <theme> [--network] [--activate]
   or: wp theme get <theme> [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp theme install <theme|zip|url>... [--version=<version>] [--force] [--activate] [--insecure]
   or: wp theme is-active <theme>
   or: wp theme is-installed <theme>
   or: wp theme list [--<field>=<value>] [--field=<field>] [--fields=<fields>] [--format=<format>] [--status=<status>] [--skip-update-check]
   or: wp theme mod <command>
   or: wp theme path [<theme>] [--dir]
   or: wp theme search <search> [--page=<page>] [--per-page=<per-page>] [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp theme status [<theme>]
   or: wp theme update [<theme>...] [--all] [--exclude=<theme-names>] [--format=<format>] [--version=<version>] [--dry-run] [--insecure]

See 'wp help theme <command>' for more information on a specific command.

```

8. **wp post**: Manage, Create, Update, Delete posts
```bash
➜  public wp post
usage: wp post create [--post_author=<post_author>] [--post_date=<post_date>] [--post_date_gmt=<post_date_gmt>] [--post_content=<post_content>] [--post_content_filtered=<post_content_filtered>] [--post_title=<post_title>] [--post_excerpt=<post_excerpt>] [--post_status=<post_status>] [--post_type=<post_type>] [--comment_status=<comment_status>] [--ping_status=<ping_status>] [--post_password=<post_password>] [--post_name=<post_name>] [--from-post=<post_id>] [--to_ping=<to_ping>] [--pinged=<pinged>] [--post_modified=<post_modified>] [--post_modified_gmt=<post_modified_gmt>] [--post_parent=<post_parent>] [--menu_order=<menu_order>] [--post_mime_type=<post_mime_type>] [--guid=<guid>] [--post_category=<post_category>] [--tags_input=<tags_input>] [--tax_input=<tax_input>] [--meta_input=<meta_input>] [<file>] [--<field>=<value>] [--edit] [--porcelain]
   or: wp post delete <id>... [--force] [--defer-term-counting]
   or: wp post edit <id>
   or: wp post exists <id>
   or: wp post generate [--count=<number>] [--post_type=<type>] [--post_status=<status>] [--post_title=<post_title>] [--post_author=<login>] [--post_date=<yyyy-mm-dd-hh-ii-ss>] [--post_date_gmt=<yyyy-mm-dd-hh-ii-ss>] [--post_content] [--max_depth=<number>] [--format=<format>]
   or: wp post get <id> [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp post list [--<field>=<value>] [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp post meta <command>
   or: wp post term <command>
   or: wp post update <id>... [--post_author=<post_author>] [--post_date=<post_date>] [--post_date_gmt=<post_date_gmt>] [--post_content=<post_content>] [--post_content_filtered=<post_content_filtered>] [--post_title=<post_title>] [--post_excerpt=<post_excerpt>] [--post_status=<post_status>] [--post_type=<post_type>] [--comment_status=<comment_status>] [--ping_status=<ping_status>] [--post_password=<post_password>] [--post_name=<post_name>] [--to_ping=<to_ping>] [--pinged=<pinged>] [--post_modified=<post_modified>] [--post_modified_gmt=<post_modified_gmt>] [--post_parent=<post_parent>] [--menu_order=<menu_order>] [--post_mime_type=<post_mime_type>] [--guid=<guid>] [--post_category=<post_category>] [--tags_input=<tags_input>] [--tax_input=<tax_input>] [--meta_input=<meta_input>] [<file>] --<field>=<value> [--defer-term-counting]

See 'wp help post <command>' for more information on a specific command.

```

9. **wp user**
```bash
➜  public wp user
usage: wp user add-cap <user> <cap>
   or: wp user add-role <user> <role>
   or: wp user application-password <command>
   or: wp user check-password <user> <user_pass> [--escape-chars]
   or: wp user create <user-login> <user-email> [--role=<role>] [--user_pass=<password>] [--user_registered=<yyyy-mm-dd-hh-ii-ss>] [--display_name=<name>] [--user_nicename=<nice_name>] [--user_url=<url>] [--nickname=<nickname>] [--first_name=<first_name>] [--last_name=<last_name>] [--description=<description>] [--rich_editing=<rich_editing>] [--send-email] [--porcelain]
   or: wp user delete <user>... [--network] [--reassign=<user-id>] [--yes]
   or: wp user generate [--count=<number>] [--role=<role>] [--format=<format>]
   or: wp user get <user> [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp user import-csv <file> [--send-email] [--skip-update]
   or: wp user list [--role=<role>] [--<field>=<value>] [--network] [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp user list-caps <user> [--format=<format>]
   or: wp user meta <command>
   or: wp user remove-cap <user> <cap>
   or: wp user remove-role <user> [<role>]
   or: wp user reset-password <user>... [--skip-email] [--show-password] [--porcelain]
   or: wp user session <command>
   or: wp user set-role <user> [<role>]
   or: wp user spam <id>...
   or: wp user term <command>
   or: wp user unspam <id>...
   or: wp user update <user>... [--user_pass=<password>] [--user_nicename=<nice_name>] [--user_url=<url>] [--user_email=<email>] [--display_name=<display_name>] [--nickname=<nickname>] [--first_name=<first_name>] [--last_name=<last_name>] [--description=<description>] [--rich_editing=<rich_editing>] [--user_registered=<yyyy-mm-dd-hh-ii-ss>] [--role=<role>] --<field>=<value> [--skip-email]

See 'wp help user <command>' for more information on a specific command.
```
10. **wp site**
```
➜  public wp site
usage: wp site activate [<id>...] [--slug=<slug>]
   or: wp site archive [<id>...] [--slug=<slug>]
   or: wp site create --slug=<slug> [--title=<title>] [--email=<email>] [--network_id=<network-id>] [--private] [--porcelain]
   or: wp site deactivate [<id>...] [--slug=<slug>]
   or: wp site delete [<site-id>] [--slug=<slug>] [--yes] [--keep-tables]
   or: wp site empty [--uploads] [--yes]
   or: wp site list [--network=<id>] [--<field>=<value>] [--site__in=<value>] [--field=<field>] [--fields=<fields>] [--format=<format>]
   or: wp site mature [<id>...] [--slug=<slug>]
   or: wp site meta <command>
   or: wp site option <command>
   or: wp site private [<id>...] [--slug=<slug>]
   or: wp site public [<id>...] [--slug=<slug>]
   or: wp site spam [<id>...] [--slug=<slug>]
   or: wp site switch-language <language>
   or: wp site unarchive [<id>...] [--slug=<slug>]
   or: wp site unmature [<id>...] [--slug=<slug>]
   or: wp site unspam [<id>...] [--slug=<slug>]

```
11. **wp super-admin**: super admin management.
```bash
➜  public wp super-admin
usage: wp super-admin add <user>...
   or: wp super-admin list [--format=<format>]
   or: wp super-admin remove <user>...

See 'wp help super-admin <command>' for more information on a specific command.
```
12. **wp role**: create, update, remove roles.
```bash
➜  public wp role
usage: wp role create <role-key> <role-name> [--clone=<role>]
   or: wp role delete <role-key>
   or: wp role exists <role-key>
   or: wp role list [--fields=<fields>] [--field=<field>] [--format=<format>]
   or: wp role reset [<role-key>...] [--all]

See 'wp help role <command>' for more information on a specific command.
➜
```

13. **wp cap**
```bash
➜  public wp cap
usage: wp cap add <role> <cap>... [--grant]
   or: wp cap list <role> [--format=<format>] [--show-grant]
   or: wp cap remove <role> <cap>...

See 'wp help cap <command>' for more information on a specific command.
```

**5. How do you debug a WordPress plugin that's causing a fatal error, but you can't access the WordPress admin dashboard?**
1. Disable the plugin via FTP by renaming its folder, then access your site to resolve the error. Use WP_DEBUG in wp-config.php for error details.

**6. You have a WordPress multisite network with several subsites. One of the subsites is experiencing a fatal error due to a specific plugin. You need to deactivate the problematic plugin for that subsite only, without affecting other subsites. Using WP-CLI, explain:**
- How would you identify the subsite by its subdomain?
    - `wp site list` command to identify the subsite by its subdomain.

- List the active plugins for that subsite.
    - `wp plugin list --url=subsite.example.com` command to list the active plugins for the specified subsite.
- Deactivate the problematic plugin only for that subsite.
    - `wp plugin deactivate <plugin-name> --url=subsite.example.com` command.


**7. Using WP-CLI, illustrate the steps involved to search all the database values from http://xyz.com to https://abc.com.**
```bash
wp search-replace 'http://xyz.com' 'https://abc.com' --all-tables
```

**8. What is the --skip-plugin switch in WP CLI?**
- The `--skip-plugin` switch is used with some WP-CLI commands to temporarily disable other plugins during the operation.
