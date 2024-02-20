# PHP Advance

## PHP Date
1. `d` represents **date** (1 to 31), `m` represents **month** (1 to 12), `y` represents **year**, `l` represents **weekday**.
2. `H` (24 hour format), `h` (12 hour format) represents **hour**, `i` represent **minutes**, `s` represents **seconds**, `a` represnts **am/pm**.
3. To set timezone use function `date_default_timezone_set(//timezone)`
4. `mkTime`
    ```php
    $d=mktime(11, 14, 54, 8, 12, 2014);
    echo "Created date is " . date("Y-m-d h:i:sa", $d);
    ```

## File Handling
1. `readFile(fileName)` reads the file and prints if used with `echo`.
2. `fopen(fileName, option)` opens a file 
3. Checkout option at [W3School/PHP/FileHandling](https://www.w3schools.com/php/php_file_open.asp)
4. `fread(file)` reads the file
5. `fclose(file)` closes the file

## Cookie
1. Set a cookie with `setcookie(name, value, expire, path, domain, secure, httponly);`
2. Retrive a cookie with `$_COOKIE['name']`
3. These cookies can be set to auto expire, this way we can have login sessions for limited time.

## Filters in PHP (To Explore in Depth)

