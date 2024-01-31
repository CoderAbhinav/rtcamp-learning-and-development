
## Strings in PHP
- For all the string related functions go to [PHP Docs](https://www.php.net/manual/en/ref.strings.php)
- String indexing is similar to python

    LETTER | INDEX FROM START | INDEX FROM END
    -------| ---------------- | -------------
    H | 0 | -1
    E | 1 | -2
    L | 2 | -3
    L | 3 | -4
    O | 4 | -5

## Numbers in PHP
- Data types are `Integer`, `Float`, `Number Strings` & two more `Infinity`, `NaN`
- Predefined Constants
    Data Type | Constants
    --- | ---
    Integer | `PHP_INT_MAX`, `PHP_INT_MIN`, `PHP_INT_SIZE`
    Float | `PHP_FLOAT_MAX`, `PHP_FLOAT_MIN`, `PHP_FLOAT_DIG`, `PHP_FLOAT_EPSILON` (read about the last two)
- Value larger than `PHP_FLOAT_MAX` is considered `Infinity`, use function `is_finit()`, `is_infinite()`
- `NaN` stands for **Not A Number**, use `is_nan()`
- Casting variables
    ```php
    $x = 2345.67;
    $int_cast = (int) $x;

    echo var_dump($x);
    echo var_dump(int_cast);
    ```
- `pi()` function returns the value of `π`
- `min(args...)`, `max(args...)` we can pass the list of arguments to get minimum value
- `abs()` functions returns **absolute** value.
- `sqrt()` -> square root
- `round()` -> rounds to nearest integer
- `rand(start, inclusive_end)`-> random number function

## Defining constants in PHP
- `define(name, value, case-insensitive);`
    - `name`: name of constant
    - `value`: value of constant
    - `case-sensitive`: default value `false`
- Constants are **global**

