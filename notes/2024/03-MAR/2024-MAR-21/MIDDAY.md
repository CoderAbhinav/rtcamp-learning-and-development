**1. How does wp-cron work?**
1. WP-Cron works by checking, on every page load, a list of scheduled tasks to see what needs to be run. Any tasks due to run will be called during that page load.
    - If a page is not loaded for a long time, then all the scheduled tasks will run as soon as the next page load takes place.
2. Why to use WP CRON over the system one ?
    - Most of the providers don't give access to system (in the case of WP hosting).
    - WordPress core and many plugins need a scheduling system to perform time-based tasks. Without the need of the system cron.
    -  With WP-Cron, all scheduled tasks are put into a queue and will run at the next opportunity, and all the tasks will run 100%.

**2. What is the purpose of the WordPress Database API, and what are its key functions?**
The WordPress Database API provides a set of functions and classes for interacting with the WordPress database in a secure and efficient manner. Its main purpose is to abstract away the complexities of database management and provide developers with a standardized way to perform database operations within WordPress.

Key functions of the WordPress Database API include:

- `wpdb::get_results()`: Executes a SQL query and returns the results as an array of objects or associative arrays.
- `wpdb::get_var()`: Executes a SQL query and returns a single value from the result set.
- `wpdb::get_row()`: Executes a SQL query and returns a single row from the result set as an object or associative array.
- `wpdb::query()`: Executes a SQL query that doesn't return results (e.g., INSERT, UPDATE, DELETE).
- `wpdb::prepare()`: Prepares a SQL query for safe execution by escaping variables and placeholders.
- `wpdb::insert()`: Inserts a new row into a database table.
- `wpdb::update()`: Updates existing rows in a database table based on specified criteria.
- `wpdb::delete()`: Deletes rows from a database table based on specified criteria.

**3. How does the $wpdb object work, and what are some of the most commonly used methods to interact with the database using it?**
The `$wpdb` object is a global instance of the `wpdb` class, which represents the WordPress database connection. It provides methods to perform various database operations, such as querying, inserting, updating, and deleting data.

Some commonly used methods of the `$wpdb` object include:

- `get_results()`: Executes a SQL query and returns the results.
- `get_var()`: Retrieves a single value from the database.
- `get_row()`: Retrieves a single row from the database.
- `query()`: Executes a SQL query that doesn't return results.
- `prepare()`: Prepares a SQL query for safe execution.
- `insert()`: Inserts a new row into a database table.
- `update()`: Updates existing rows in a database table.
- `delete()`: Deletes rows from a database table.

**4. What are the advantages of using the Database API over direct SQL queries in WordPress development?**
Using the Database API instead of direct SQL queries in WordPress development offers several advantages:

- **Security**: The Database API automatically handles escaping and sanitization of input data, reducing the risk of SQL injection vulnerabilities.
- **Compatibility**: The Database API is designed to work with different database management systems supported by WordPress, ensuring compatibility across different environments.
- **Portability**: Plugins and themes using the Database API can be easily migrated between WordPress installations without worrying about database-specific syntax or quirks.
- **Abstraction**: The Database API provides a higher-level abstraction for database operations, making code more readable and maintainable.
- **Future-proofing**: The Database API abstracts away underlying database schema changes, ensuring that plugins and themes remain compatible with future versions of WordPress.

**5. How can you safely insert, update, or delete data in the WordPress database using the Database API to prevent SQL injection vulnerabilities?**
To safely insert, update, or delete data in the WordPress database using the Database API and prevent SQL injection vulnerabilities, follow these best practices:

- Use the `prepare()` method of the `$wpdb` object to prepare SQL queries with placeholders for dynamic data.
- Pass data as parameters to the prepared SQL queries instead of directly concatenating them into the query string.
- Avoid using direct SQL queries constructed from user input without proper sanitization or validation.
- Use built-in WordPress functions and methods whenever possible to interact with the database, as they handle data sanitization internally.

**6. What are common Tables shared across multisite?**
In a WordPress multisite installation, common tables shared across all sites in the network include:

- `wp_blogs`: Stores information about individual sites within the network.
- `wp_blogmeta`: Stores metadata specific to individual sites within the network.
- `wp_site`: Stores information about the network itself, including its domain and site-specific options.
- `wp_sitemeta`: Stores metadata specific to the entire network, such as network-wide options and settings.

These tables help manage the multisite network structure and store site-specific and network-wide configuration settings and metadata.

