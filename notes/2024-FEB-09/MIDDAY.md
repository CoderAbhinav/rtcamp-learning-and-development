# Which hashing algorithms do you know about?
1. Hashing refers to the process of generating a fixed-size output from an input of variable size using the mathematical formulas known as hash functions. 
2. Hashing works by adding fixed noise in the given data, and process it to generate a hash.
3. Another way is to generate the digest to get get the hash of data, like MD5 or SHA.

# What are collisions? Is there any realistic chance that a collision will happen in the hashing algorithm you have used for your assignment?
1. Collisions happen when two item generates same hash, resulting in collision.
2. There's always a chance that two items can have same hash, in this case chaining can be used to resolve this, for instance we can add the new entry to a next available posision.


# How can we mitigate collisions in hashing?
There are two mitigation techniques
1. Separete Chaining
    - All the values can be linked to each other, and use of linked list
2. Open Addressing
    - In linear probing, the hash table is searched sequentially that starts from the original location of the hash. If in case the location that we get is already occupied, then we check for the next location. 


# What are traits? Could you explain with an example?
1. In PHP, a trait is a way to enable developers to reuse methods of independent classes that exist in different inheritance hierarchies.

2. Simply put, traits allow you to create desirable methods in a class setting, using the trait keyword. You can then inherit this class through the use keyword.
    ```php
    <?php
    class MainClass {
        public function greeting() {
            echo 'Good Day From MainClass'."\n";
        }
    }

    trait DesiredClass {
        public function welcome() {
            //parent::greeting();
            echo 'Welcome To Traits';
        }
    }

    class NewClass extends Mainclass {
        use DesiredClass;
    }

    $myObject = new NewClass();
    $myObject ->greeting();
    $myObject->welcome();
    /* You can uncomment line 10 while commenting out 
    *line 20 and the result remains the same.
    */
    ?>
    ```

    **Output:**
    ```bash
    Good Day From MainClass
    Welcome To Traits
    ```

# Difference between Abstract Class, Interface, and Traits with examples.


| Feature        | Abstract Class                | Interface                     | Trait                         |
|----------------|-------------------------------|-------------------------------|-------------------------------|
| Definition     | A class that cannot be instantiated on its own and may contain abstract methods. | Defines a contract for classes to implement, consisting of method signatures without implementations. | Facilitates code reuse by allowing methods to be included in multiple classes. |
| Method         | Can contain both abstract and concrete methods. | Contains only method signatures without implementations. | Can contain method implementations. |
| Inheritance    | Subclasses extend and override methods. | Classes implement and provide concrete implementations for all methods. | Methods are included in classes using the `use` keyword. |
| Member Variables | Can contain member variables.   | Cannot contain member variables. | Can contain member variables. |
| Constructors   | Can have constructors.         | Cannot have constructors.       | Cannot have constructors.     |
| Usage          | Provides a template for subclasses to extend. | Defines a contract for classes to implement specific behaviors. | Allows code reuse across multiple classes without multiple inheritance. |

**Examples:**

1. Class 
```php

abstract class DatabaseService {
    function connect();
    function executeQuery();
    function printDetails() {
        return "Something Something....";
    }
    ...
    ...
}

```

2. Interface
```php
interface DatabaseService {
   function connect();
   function executeQuery();
   function fetchRows(); 
}

class MySQL implements DatabaseService {
    function connect() {
        // do something
    }

   function executeQuery() {
        // do something
   }

   function fetchRows() {
        // do something
   }
}
```

3. Trait
```php
trait logService {
    function log($data) {
        // log data
    }
}

class MySQL {
    use logService;

    function connect() {
        // do something
    }
}

$obj = new MySQL();
$obj->log("Some Data");
```