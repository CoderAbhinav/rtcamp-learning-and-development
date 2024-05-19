# Commands
1. The `WP-CLI` commands are used to manage your WordPress site via command line tool.
2. The `--url=<site>` argument can be used to run the command for specific site in the case of multisite environment
3. The `--debug` argument can be used to let the WP CLI log all the errors in the terminal.
4. The `--quiet` argument can be used to let WP CLI suppress the errors.
5. The `--user` argument can be used to make the commands done by specific user.

## Some Important Commands
### `wp cache`
1. Adds, removes, fetches, and flushes the WP Object Cache object.
2. **`wp cache flush`** flushes the cache data.

### `wp cap`
1. Adds, removes, and lists capabilities of a user role.
```shell
	# Add 'spectate' capability to 'author' role.
    $ wp cap add 'author' 'spectate'
    Success: Added 1 capability to 'author' role.

    # Add all caps from 'editor' role to 'author' role.
    $ wp cap list 'editor' | xargs wp cap add 'author'
    Success: Added 24 capabilities to 'author' role.

    # Remove all caps from 'editor' role that also appear in 'author' role.
    $ wp cap list 'author' | xargs wp cap remove 'editor'
    Success: Removed 34 capabilities from 'editor' role.
```

### `wp core`
1. Downloads, install, updates the #WordPress core
2. Here are few sub commands
	1. `wp core check-update` Checks for WordPress updates via Version Check API.
	2. `wp core download` Downloads core WordPress files.
	3. `wp core install` Runs the standard WordPress installation process.
	4. `wp core multisite convert`
	5. `wp core multisite install`
	6. `wp core update --version=<version>` 
	7. `wp core version`
3. There is a `--local` argument, which can be used to download the WP Core in specific local.

### `wp cron`
1. Tests, runs, and deletes WP-Cron events; manages WP-Cron schedules.
2. Here are few subcommands
	1. `wp cron event` Schedules, runs, and deletes WP-Cron events.
		1. `delete <hook>`
		2. `list`
		3. `wp cron event schedule <hook> [<next-run>] [<recurrence>] [--<field>=<value>]`
			1. Schedules a new cron event.
	2. `wp cron schedule`
		1. Gets WP-Cron schedules.
```shell
    # List available cron schedules
    $ wp cron schedule list
    +------------+-------------+----------+
    | name       | display     | interval |
    +------------+-------------+----------+
    | hourly     | Once Hourly | 3600     |
    | twicedaily | Twice Daily | 43200    |
    | daily      | Once Daily  | 86400    |
    +------------+-------------+----------+
```

3. `wp cron test`
	1.  Tests the WP Cron spawning system and reports back its status.

### `wp db`
1. Performs basic database operations using credentials stored in `wp-config.php`
```shell
  check         Checks the current status of the database.
  clean         Removes all tables with `$table_prefix` from the database.
  cli           Opens a MySQL console using credentials from wp-config.php
  columns       Displays information about a given table.
  create        Creates a new database.
  drop          Deletes the existing database.
  export        Exports the database to a file or to STDOUT.
  import        Imports a database from a file or from STDIN.
  optimize      Optimizes the database.
  prefix        Displays the database table prefix.
  query         Executes a SQL query against the database.
  repair        Repairs the database.
  reset         Removes all tables from the database.
  search        Finds a string in the database.
  size          Displays the database name and size.
  tables        Lists the database tables.
```


### `wp export`
1. Exports WordPress content to a WXR file.
```shell
wp export [--dir=<dirname>] [--stdout] [--skip_comments] [--max_file_size=<MB>] [--filename_format=<format>] [--include_once=<before_posts>] [--allow_orphan_terms] [--start_date=<date>] [--end_date=<date>] [--post_type=<post-type>] [--post_type__not_in=<post-type>] [--post__in=<pid>] [--with_attachments] [--start_id=<pid>] [--max_num_posts=<num>] [--author=<author>] [--category=<name|id>] [--post_status=<status>]
	
	
Generates one or more WXR files containing authors, terms, posts,
comments, and attachments. WXR files do not include site configuration
(options) or the attachment files themselves.
```

### `wp i18n`

![[Screenshot 2024-05-18 at 2.11.14 PM.png]]

### `wp user`
![[Screenshot 2024-05-18 at 4.01.30 PM.png]]



# Commands Cookbook
```
<?php
/**
 * Implements example command.
 */
class Example_Command {

    /**
     * Prints a greeting.
     *
     * ## OPTIONS
     *
     * <name>
     * : The name of the person to greet.
     *
     * [--type=<type>]
     * : Whether or not to greet the person with success or error.
     * ---
     * default: success
     * options:
     *   - success
     *   - error
     * ---
     *
     * ## EXAMPLES
     *
     *     wp example hello Newman
     *
     * @when after_wp_load
     */
    function hello( $args, $assoc_args ) {
        list( $name ) = $args;

        // Print the message with type
        $type = $assoc_args['type'];
        WP_CLI::$type( "Hello, $name!" );
    }
}

WP_CLI::add_command( 'example', 'Example_Command' );
```


#### Longdesc
The longdesc is middle part of the PHPDoc:

```
     * ## OPTIONS
     *
     * <name>
     * : The name of the person to greet.
     *
     * [--type=<type>]
     * : Whether or not to greet the person with success or error.
     * ---
     * default: success
     * options:
     *   - success
     *   - error
     * ---
     *
     * ## EXAMPLES
     *
     *     wp example hello Newman
```

Options defined in the longdesc are interpreted as the command’s **synopsis**:

- `<name>` is a required positional argument. Changing it to `<name>...` would mean the command can accept one or more positional arguments. Changing it to `[<name>]`would mean that the positional argument is optional and finally, changing it to `[<name>...]` would mean that the command can accept multiple optional positional arguments.
- `[--type=<type>]` is an optional associative argument which defaults to ‘success’ and accepts either ‘success’ or ‘error’. Changing it to `[--error]` would change the argument to behave as an optional boolean flag.
- `[--field[=<value>]]` allows an optional argument to be used with or without a value. An example of this would be using a global parameter like `--skip-plugins[=<plugins>]` which can either skip loading all plugins, or skip a comma-separated list of plugins. 

_Note_: To accept arbitrary/unlimited number of optional associative arguments you would use the annotation `[--<field>=<value>]`. So for example:

```
     * [--<field>=<value>]
     * : Allow unlimited number of associative parameters.
```

A command’s synopsis is used for validating the arguments, before passing them to the implementation.

The longdesc is also displayed when calling the `help` command, for example, `wp help example hello`. Its syntax is [Markdown Extra](http://michelf.ca/projects/php-markdown/extra/) and here are a few more notes on how it’s handled by WP-CLI:

- The longdesc is generally treated as a free-form text. The `OPTIONS` and `EXAMPLES`section names are not enforced, just common and recommended.
- Sections names (`## NAME`) are colorized and printed with zero indentation.
- Everything else is indented by 2 characters, option descriptions are further indented by additional 2 characters.
- Word-wrapping is a bit tricky. If you want to utilize as much space on each line as possible and don’t get word-wrapping artifacts like one or two words on the next line, follow these rules:
    - Hard-wrap option descriptions at **75 chars** after the colon and a space.
    - Hard-wrap everything else at **90 chars**.

For more details on how you should format your command docs, please see WP-CLI’s [documentation standards](https://make.wordpress.org/cli/handbook/documentation-standards/).