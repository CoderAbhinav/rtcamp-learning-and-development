# Which function will you use to check if a query parameter verify_code is (a) not null (b) not an empty string
1. `isset()` function can be used to check if a query parameter **is not null**, returns `true` if the query parameter is **not null**, else `false`
2. `empty()` funcion can be used to check if a query parameter empty string or not, return `true` if parameter is **empty**, else `false`
    ```php
    <? php
        if (isset($_GET['verify_code']) && !empty($_GET['verify_code'])) {
        // The 'verify_code' parameter is set and not empty
        $verifyCode = $_GET['verify_code'];
        // Your code to handle the verification code goes here
        } else {
            // The 'verify_code' parameter is either not set or empty
            echo "Verification code is missing or empty.";
        }
    ?>
    ```

# What will you use, for calling the same function with different parameters within a class? Is there any way to have the same function within the class but with different parameters?
1. Setting up default parameter values can be used to achieve the result
    ```php
        class MyClass {
            public function exampleMethod($param1, $param2 = null) {
                // Your code here
            }
        }
    ```
2. Variable Length Arguments can be used to achieve the same result
    ```php
        class MyClass {
            public function exampleMethod(...$params) {
                // Your code here
            }
        }
    ```

# How to debug the errors in a PHP file? How do you tackle Fatal errors? Is there any way to avoid fatal errors?
1. Dumping variables to stdout

    function | use
    --- | ---
    `var_dump ($var)` | dumps the variable type and value to stdout.
    `print_r ($var)` | prints the variable value in human-readable form to stdout.
    `get_defined_vars()` | gets all the defined variables including built-ins and custom variables (print_r to view them).
    `debug_zval_dump ($var)` | dumps the variable with its reference counts. This is useful when there are multiple paths to update a single reference.
    `debug_print_backtrace()` | prints a backtrace that shows the current function call-chain.
    `debug_backtrace()` | gets the backtrace. You can print_r, log it to a file, or send it to a logging endpoint asynchronously.
2. In order to handle fatal errors we can use function `set_error_handler(error_handler)` which will handle the fatal error is cutom way, we can restore to default error handler with `restore_error_handler()`
    ```php
        <?php 

        // Set a custom error handler
        function custom_error_handler($errno, 
        $errstr, $errfile, $errline) {
            echo "Error: $errstr\n";
        }
        set_error_handler('custom_error_handler');
        echo $age ;

        // Restore the default error handler
        restore_error_handler();

        // Generate another error
        echo $access_granted ;
        ?>
    ```

    **Output**
    ```bash
    Error: Undefined variable $age
    Warning: Undefined variable $access_granted in /Users/abhinavbelhekar/Local Sites/updateme/app/public/index.php on line 15
    ```
# What is the difference between Global Variable and Class Variable?
1. **Global Variable**
    - A global variable is declared outside of any function or class, making it accessible from anywhere in the script.
    - Global variables have a global scope, meaning they can be accessed both inside and outside functions.
2. **Class Variables**
    - Class variables are associated with a specific class and are defined within the class but outside any methods.
    - They are accessed using the scope resolution operator `::` or through an instance of the class ($this within non-static methods).
    - Class variables are also known as properties or attributes, and they store data related to the class.

# If there are multiple tabs open in the browser, will all pages with their javascript run simultaneously or only the currently open tab's javascript will run? Explain briefly why.
1. JavaScript execution is typically **tied to the active tab** or window. Only the JavaScript code associated with the **currently active tab is actively executed**, while the code in **other tabs is usually paused** or slowed down to conserve system resources.
2. Running JavaScript for all open tabs simultaneously could **consume significant system resources**, leading to slower performance and potential issues.
3. When you switch tabs, the browser *may pause or limit the execution of JavaScript* in the inactive tabs to allocate resources to the active one. This helps in maintaining the responsiveness of the user interface and prevents unnecessary background processing.