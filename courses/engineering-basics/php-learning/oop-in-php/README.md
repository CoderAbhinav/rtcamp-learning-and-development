# OOP in PHP
1. Class in PHP
    ```php
    class Fruit {
        public string $name;
        public string $color;
        private string $id;

        function setName(string $name) {
            $this->name = $name;
        }

        function setColor(string $color) {
            $this->color = $color;
        }
    }
    ```
2. To check if a variable is instance of any class use keyword `instanceof`
    ```php
    echo $apple instanceof Fruit;
    ```
3. **Constructor is defined by**
    ```php
    function __constructor($var...) {
        // body
    }
    ```
4. **Constructor is defined by**
    ```php
    function __destructor() {
        // body
    }
    ```
5. In order to access the variables inside the class use `$this` variable. ex. `$this->color`
6. **Access Modifiers**
    modifier | description
    --- | ---
    `public` | the property or method can be accessed from everywhere. This is default
    `protected` | the property or method can be accessed within the class and by classes derived from that class
    `private` | the property or method can ONLY be accessed within the class
