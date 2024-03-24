**1. What does the wp scaffold command do?**
1. The `wp scaffold` command is used to generate boilerplate code for WP site component
2. We can generate following components, and more.
    - `block`
    - `child-theme`
    - `package`
    - `plugin`
    - `post-type`
    - `taxonomy`
3. With the use of `--prompt` flag, we can interactively create those component boilerplate.

**2. What does the wp package command do?**
1. The `wp package` is used to list, install and remove **WP-CLI** package.
2. Here are some of the subcommands:
    - **browse**    :Browses WP-CLI packages available for installation.
    - **install**   :Installs a WP-CLI package.
    - **list**      :Lists installed WP-CLI packages.
    - **path**      :Gets the path to an installed WP-CLI package, or the package directory.
    - **uninstall** :Uninstalls a WP-CLI package.
    - **update**    :Updates all installed WP-CLI packages to their latest version.


**3. Can we execute the WP CLI command via code? If yes then how? Should we execute the WP CLI command via code?**
1. **Yes**, we can execute the WP CLI command via code.
2. We can use `shell_exec()` or `exec()` command
    
    **Example**
    ```php
    $output = shell_exec( 'wp command-name arg1 arg2' );
    ```

**4. Write a WP-CLI command to add two capabilities( read, edit_posts ) to a custom role name 'Approver'.**
```bash
➜  public wp cap add approver edit_posts
Success: Added 1 capability to 'approver' role.
➜  public wp cap add approver read      
Success: Added 1 capability to 'approver' role.
```

**5. How can you use WP CLI to: create a new user rtDummy with subscriber role and password = 1234 update the user's role to administrator**
```bash
# Create user with subscriber role
wp user create rtDummy rtDummy@example.com --role=subscriber --user_pass=1234

# Update user role to administrator
wp user set-role rtDummy administrator
```

**6. Explain Different methods to log output in WP CLI.**

No. | method | description
--- | --- | ---
1 | `WP_CLI::log()` | Outputs the log message.
2 | `WP_CLI::sucess()` | Outputs a success message. 
3 | `WP_CLI::warning()` | Outputs a warning message.
4 | `WP_CLI::error()` | Outputs an error message.
5 | `WP_CLI::debug()` | Output a debug message.


**7. How to add a command as a subcommand to an already existing command in WP CLI? Explain with an example.**
```php
    class RTML_Commands {
        function hello ($args, $asso_args) {
            print_r($args);
            print_r($asso_args);
        }
    }

    WP_CLI::add_command('scaffold', 'RTML_Commands');
```
1. This will display a hello subcommand under the command `scaffold`.


**8. Command to downgrade version to 6.3 of WordPress install.**
```bash
wp core update --version=6.3 --force
```