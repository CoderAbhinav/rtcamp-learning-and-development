
# How to create a new site and delete it using Local?
**Create A New Site**
1. Open LocalWP
2. Click on Add New Site button (Present at the left-bottom)
3. Choose your environment, by selecting either the default configuration or a custom choice of PHP, MySQL, Ngnix/Apache version
**Delete An Existing Site**
1. On the left pane of the app, navigate to the site
2. Right Click and select **Delete** from the options.
3. Confirm deletation.

# Explain briefly about the other local development environments.
1. **XAMPP**: A free and open-source cross-platform web server solution stack package developed by Apache Friends. It includes Apache HTTP Server, MySQL database, and interpreters for scripts written in PHP and Perl.
2. **MAMP**: Similar to XAMPP, MAMP is a free and easy-to-use local server environment that includes Apache, MySQL, and PHP. It is available for macOS and Windows.

# If you have tried local development environments before which one is your favorite?
1.**LocalWP** is my favourite local development envrionment as it provides a better graphical user interface, along with features like live link to use the app over internet.
2. LocalWP's GUI makes it quite easier to use. 

# Explore/Define the Singleton pattern in detail. Could you explain its benefits and use cases with examples?
1. The Singleton pattern ensures that a class has only one instance and provides a global point of access to that instance. It is useful when you want to limit the instantiation of a class to a single object, which is useful for tasks like managing resources or controlling access to shared resources.
2. Examples, Database service, when you don't want the app to open multiple instances of connection.
Benefits and Use Cases:
3. Resource Management: Singleton pattern helps in managing resources such as database connections, file systems, or network connections, ensuring that only one instance is created and shared across the application.
4. Global Configuration: Singleton pattern is useful for maintaining global configuration settings that need to be accessed throughout the application.
5. Logging and Caching: Singleton pattern can be used for implementing logging or caching mechanisms, ensuring that there's only one instance responsible for managing logs or cache data.

# Implement a Singelton pattern with a trait.
```php
trait SingletonTrait {
    private $instance;

    protected function __construct() { };

    public function getInstance() {
        if (!self::$instance) {
            // new self() will refer to the class that uses the trait
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function __clone() { }
    protected function __sleep() { }
    protected function __wakeup() { }
}
```