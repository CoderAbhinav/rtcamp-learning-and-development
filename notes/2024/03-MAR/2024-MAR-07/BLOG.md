# WP CLI Commands & REST API Notes for 7th March

## `wp cli`
    Manages the WP CLI
    1. `update`: updates the cli version
    2. `has-commnad`: check if command exists or not
    3. `version`: returns version

## `wp cache`
    1. Helps to manage the cache objects from the DB Queries
    2. `flush`: removes all object cache
    3. `add`: adds a cache with given key, group
    4. `delete`: deletes a cache
    5. `set`: sets value regardless if already present

## `wp config`
    1. Generates the wp-config.php file
    2. If used with --propmpt provides interactive way of creating the file.

## `wp cron`
### `wp cron event`
    1. It's used to manage all the cron events in wp
    2. `list`: lists all the events already schedule
    3. `run <hook>`: It will immediately run any given <hook>
    4. `unschedule <hook>`: This let's us unschedule the given hook

### `wp cron schedule`
    1. It's different from what you saw before
    2. This let's you see all the different schedules avaliable, like if you want to schedule the jobs every hour or so and so on

## `wp core`
    1. `check-update`: Let's you check update of wp-core installation
    2. `download`: download any given wp version
    3. `install`
    4. `multisite-convert`: Let's you convert the current url into a multisite environment

## `wp db`
    1. `check`: check db status
    2. `clean`: deletes all the db with wp_
    3. `cli`: opens the sql console for db
    4. `columns <table>`: let's you display columns which you want.

## `wp eval-file`
    1. Runs a php file

## `wp eval`
    1. Runs a php statement

## `wp export`
    1. Export your wp data
    2. Add `--format=<value>` flag in order to get that into custom format

## `wp languages`
    1. Used to manage language options for core/theme/plugin
    2. Commands like
        - install
        - uninstall
        - list
        - update
        - activate
    3. In the case of plugin/theme provide slug before subcommand

## `wp option`
    1. Let's you manage the options via the CLI
    2. Subcommands
        - add <option> <value>
        - delete
        - set-autoload
        - get: returns the option value

## `wp shell`
    1. Let's you directly interact with the wp php shell
    2. You can pretty much call any WP function from the shell itself

## `wp scaffold`
    1. Build the boilerplate fro things like plugin/theme

## `wp role`
    1. You can create differnt roles like admin, subscriber and more with different permissions

## `wp user`
    1. Manages users, along with their roles, capabilities, and meta.
    2. wp user create <login> <email> --role=<role_>
        - Other fields are added as in the form
    3. wp user generate: can be used to generate random users

## `wp i18n`
    1. make-pot: Creates a POT File
    2. make-mot: Creates a MOT file from existing POT file

# Common Parameters for WP CLI
1. `--path`: If you want to execute the command at specific location
2. `--prompt`: This allows interactively add different fields
3. `--exec`: Execute provided PHP code before the command
4. `--url`: Use this in the case of multisite installation
5. `--debug`: Also prints debug output
6. `--supress`: Supresses the output



    
# REST API

## Key Concepts
1. Routes are URI mapped to methods, and methods are mapped to Endpoints
2. Request is represented by `WP_REST_Request` class @see
3. Response is represented by `WP_REST_Response` class @see
4. There are multiple ways to authenticate the request
    - U can use the `rest_authentication_errors` filter in order to add any authorization, or add the argument `permission_callback` in the `register_rest_route` function itself.
5. You can send the requests withing itself,
    - Firstly create a `new WP_REST_Request('GET', 'URI')`, then use `rest_do_request()` to execute it and get response.

## Using the REST API

### Global Parameters
1. `_fields` => Use this to reduce number of fields you see in response
2. `_embed` => Why to use this? because we want some additional links which can be embeded, so the number of request might reduce if we use them.
3. `per_page` => This parameter is used to define how many posts you want to see
4. `page` => Which page you are looking at
5. `offset` => From where you want to start