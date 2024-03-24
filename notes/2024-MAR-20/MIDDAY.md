## How will you create a custom table in WordPress?
1. In order to create a custom table in we need to use [`dbDelt()`](https://developer.wordpress.org/reference/functions/dbdelta/), this function modifies the database based on SQL statements. It's useful for creating **new tables** and **updating exisiting tables**.
2. Example
    ```php
    global $wpdb;
    $table_name = $wpdb->prefix . 'my_custom_table';

    if( ! function_exists( 'dbDelta' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    }

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        field1 varchar(50) NOT NULL,
        field2 varchar(100) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    dbDelta( $sql );

    ```

## How will you perform CRUD operations on the custom tables in WordPress

### INSERT row
The [`insert()`](https://developer.wordpress.org/reference/classes/wpdb/insert/) method is used to insert a row into a table.
- ```php
  insert( $table, $data, $format );
  ```
- `$table`: (string) The name of the table to insert data into.
- `$data`: (array) Data to insert (in column => value pairs). Both $data columns and $data values should be “raw” (neither should be SQL escaped).
- `$format` (array|string) (optional): An array of formats to be mapped to each of the values in $data.
- **Example**
    ```php
    $wpdb->insert(
        'table',
        array(
            'column1' => 'value1',
            'column2' => 123,
        ),
        array(
            '%s',
            '%d',
        )
    );
    ```

### REPLACE row
We can use the [`replace()`](https://developer.wordpress.org/reference/classes/wpdb/#replace-row)
- ```php
  replace( $table, $data, $format );
  ```
- `$table`: The name of the table to replace data in.
- `$data`: Data to replace (in column => value pairs).
- `$format`: (array|string) (optional) An array of formats to be mapped to each of the value in `$data`.  
- **Example**
  ```php
  $wpdb->replace(
    'table',
    array(
        'indexed_id' => 1,
        'column1' => 'value1'
    ),
    array(
        '%d',
        '%s'
    )
  );
  ```

### UPDATE row
We can use [`update()`](https://developer.wordpress.org/reference/classes/wpdb/#update-rows)
- ```php
  update( $table, $data, $where, $format = null, $where_format = null ); 
  ```
-  `$table`: (string) The name of the table to update.
- `$data`: (array) Data to update (in column => value pairs).  
- `$where`: (array) A named array of WHERE clauses (in column => value pairs). 
- `$format` (array|string) (optional) An array of formats to be mapped to each of the values in `$data`. 
- `$where_format`: (array|string) (optional) An array of formats to be mapped to each of the values in `$where`.

**Example**
```php
$wpdb->update(
    'table',
    array(
        'column1' => 'value1',	// string
        'column2' => 'value2'	// integer (number)
    ),
    array( 'ID' => 1 ),
    array(
        '%s',	// value1
        '%d'	// value2
    ),
    array( '%d' )
);
```

### DELETE row
We can use the [`delete()`](https://developer.wordpress.org/reference/classes/wpdb/#delete-rows) to delete row.

```php
delete( $table, $where, $where_format = null );
```
- `$table`:  Table name.Default: None
- `$where`: A named array of WHERE clauses (in column -> value pairs).
- `$where_format`: An array of formats to be mapped to each of the values in `$where`.

**Example**
```php
// Default usage.
$wpdb->delete( 'table', array( 'ID' => 1 ) );

// Using where formatting.
$wpdb->delete( 'table', array( 'ID' => 1 ), array( '%d' ) );
```


## What is the difference between WP_Query and a custom Query?
1. **`WP_Query`**: It's used to specifically query the WP content, like posts, posts with metadata and other related metadata.
2. **`Custom Query`**: This will be utilized to make custom queries, it offers flexibility to make custom queries.

## How will you optimize custom SQL queries?
1. Use of indexes in the schema, results in efficient search, compare operations.
2. Use of LIMIT in order to limit how many rows returned.
3. Use caching: Implement caching mechanisms, to store the data and retrive without doing the database query.
4. Select only needed columns.

## If you run a SQL query on WordPress database on wp_posts table with a WHERE clause like post_author = , what do you think the time complexity of that query will be?
1. The `post_author` column is not indexed, so this operation should have a complexity of `O(n)`.

## Assuming we made changes to our custom database schema that our plugin creates on activation hook, how can we ensure that those changes will be applied when the plugin is updated(the plugin is already installed and active)?
1. We can use a version check, we can store the current version in the options table. 
2. On plugin update, run the script to apply the changes to the DB schema