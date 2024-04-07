# JavaScript Learning

## Variables
1. `let` keyword in JS
    - Introduced after **2015 (ES6)**, supported in latest browsers
    - Must be declared before use.
    - Can't redeclare.
    - Has a block scope
    - Not **Hoisted**
    ```js
    {
        let x;
    }
    // x can't be used outside the scope
    ```
2. `var` keyword in JS
    - No block scope
    - Supports older browsers
    ```js
    {
        var x;
    }

    // x can be used outside the scope
    ```
    - can be redeclared
    - hoisted variable


    Note: Hoisting the process whereby the interpreter appears to move the declaration of functions, variables, classes, or imports to the top of their scope, prior to execution of the code
3. `const` keyword
    - Can't be reassigned
        ```js
        const PI = 3.14159;
        ```
    - In the case of const array, you can't reassign array, but you can 
        - Change the elements of constant array
        - Change the properties of the elements
4. `Hoisting`
    - Variables defined with var are hoisted to the top and can be initialized at any time.
        ```js
        carName = 'Volvo';
        var carName;

        // this is allowed
        ```
    - 