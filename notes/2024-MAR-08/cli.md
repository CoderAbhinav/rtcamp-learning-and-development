# Assignment: WP CLI custom command
1. Added subcommand `rtml` to `WP CLI`

## Documentation

**`rtml` documentation**

```bash
NAME

  wp rtml

DESCRIPTION

  CLI for rt Movie Library Plugin.

SYNOPSIS

  wp rtml <command>

SUBCOMMANDS

  export      Command to export your post data.

EXAMPLES
     # wp rtml export rt-person
     Success: Exported posts to /Users/abhinavbelhekar/Local
     Sites/abhinav-ramesh-belhekar/app/public/rt-person_export_2024-03-10_13-36-29.csv
     
     # wp rtml export rt-person --filename=test.csv
     Exported posts to /Users/abhinavbelhekar/Local
     Sites/abhinav-ramesh-belhekar/app/public/test.csv

GLOBAL PARAMETERS

  --path=<path>
      Path to the WordPress files.

  --url=<url>
      Pretend request came from given URL. In multisite, this argument is how
      the target site is specified.

  --ssh=[<scheme>:][<user>@]<host|container>[:<port>][<path>]
      Perform operation against a remote server over SSH (or a container using
      scheme of "docker", "docker-compose", "docker-compose-run", "vagrant").

  --http=<http>
      Perform operation against a remote WordPress installation over HTTP.

  --user=<id|login|email>
      Set the WordPress user.

  --skip-plugins[=<plugins>]
      Skip loading all plugins, or a comma-separated list of plugins. Note:
      mu-plugins are still loaded.

```

**`rtml export` documentation**

```bash
NAME

  wp rtml export

DESCRIPTION

  Command to export your post data.

SYNOPSIS

  wp rtml export <post-type> [--filename=<value>]

OPTIONS

  <post-type>
    The post type which you want to export (rt-movie or rt-person).

  [--<filename>=<value>]
    Default filename is combination of post type and date time.

EXAMPLES
     # wp rtml export rt-person
     Success: Exported posts to /Users/abhinavbelhekar/Local
     Sites/abhinav-ramesh-belhekar/app/public/rt-person_export_2024-03-10_13-36-29.csv
     
     # wp rtml export rt-person --filename=test.csv
     Exported posts to /Users/abhinavbelhekar/Local
     Sites/abhinav-ramesh-belhekar/app/public/test.csv

GLOBAL PARAMETERS

  --path=<path>
      Path to the WordPress files.

  --url=<url>
      Pretend request came from given URL. In multisite, this argument is how
      the target site is specified.

  --ssh=[<scheme>:][<user>@]<host|container>[:<port>][<path>]
      Perform operation against a remote server over SSH (or a container using
      scheme of "docker", "docker-compose", "docker-compose-run", "vagrant").

  --http=<http>
      Perform operation against a remote WordPress installation over HTTP.

  --user=<id|login|email>
      Set the WordPress user.

  --skip-plugins[=<plugins>]
      Skip loading all plugins, or a comma-separated list of plugins. Note:

```

## Usage
