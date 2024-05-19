# Testing : 15th May 2024 #211
## 1. What is a unit test, how is it different from other types of tests, and how is Unit testing done in WordPress?
**Definition**: A unit test focuses on verifying the functionality of a single "unit" of code, typically a function or a method, in isolation from other parts of the program.
**Difference from Other Tests**:
  - **Integration Tests**: Verify the interaction between different units or modules to ensure they work together correctly.
  - **Functional Tests**: Validate the software against the functional requirements by simulating user interactions.
  - **End-to-End (E2E) Tests**: Test the entire application flow from start to finish to ensure all components work together as expected.
### Unit Testing in WordPress:
PHPUnit is the standard tool for writing and running unit tests in WordPress.
```php
  class SampleTest extends WP_UnitTestCase {
      public function test_addition() {
          $this->assertEquals(4, 2 + 2);
      }
  }
```

## 2. What are assertions? Write the 5 most common assertion methods available in Wordpress. Explain with examples.
**Definition**: Assertions are statements used in tests to verify that a certain condition holds true. If the assertion fails, the test fails.
**Common Assertion Methods**:
  1. **assertEquals**: Checks if two values are equal.
     ```php
     $this->assertEquals(4, 2 + 2);
     ```
  2. **assertTrue**: Checks if a condition is true.
     ```php
     $this->assertTrue(true);
     ```
  3. **assertFalse**: Checks if a condition is false.
     ```php
     $this->assertFalse(false);
     ```
  4. **assertNull**: Checks if a value is null.
     ```php
     $this->assertNull(null);
     ```
  5. **assertNotNull**: Checks if a value is not null.
     ```php
     $this->assertNotNull('WordPress');
     ```

## 3. What is mocking, and how is it used in PHP Unit Testing? Explain with examples.
**Definition**: Mocking is a technique used to simulate the behavior of real objects in controlled ways. It helps in isolating the unit of code being tested by providing predefined responses to method calls.
```php
  class UserServiceTest extends WP_UnitTestCase {
      public function test_getUserName() {
          $userMock = $this->createMock(User::class);
          $userMock->method('getName')->willReturn('John Doe');

          $userService = new UserService();
          $this->assertEquals('John Doe', $userService->getUserName($userMock));
      }
  }
```
  In this example, `User` is a class with a `getName` method. We create a mock of the `User` class and define that the `getName` method should return 'John Doe'.
## 4. What is a test fixture, and why is it important for unit testing? Explain with examples.
**Definition**: A test fixture is a fixed state of a set of objects used as a baseline for running tests. It involves setting up the environment and conditions needed for tests to run.

```php
  class UserTest extends WP_UnitTestCase {
      protected $user;

      protected function setUp(): void {
          parent::setUp();
          $this->user = new User('John', 'Doe');
      }

      public function testFullName() {
          $this->assertEquals('John Doe', $this->user->getFullName());
      }
  }
  ```
  In this example, the `setUp` method initializes the `$user` object before each test, ensuring a consistent state.
## 5. What is code coverage, and how do you measure code coverage using PHPUnit in WordPress?
**Definition**: Code coverage is a measure that describes the degree to which the source code of a program is tested by a particular test suite. It helps identify untested parts of the codebase.

**Measuring Code Coverage with PHPUnit**:
  - **Setup**: Ensure Xdebug or PCOV extension is installed for code coverage analysis.
  - **Configuration**: Add the following to your `phpunit.xml` file:
    ```xml
    <phpunit>
        <coverage processUncoveredFiles="true">
            <include>
                <directory>./path/to/your/code</directory>
            </include>
        </coverage>
    </phpunit>
    ```
  - **Running Tests**: Use the following command to run tests with coverage:
    ```bash
    phpunit --coverage-html coverage-report
    ```
  - **Result**: This will generate an HTML report in the `coverage-report` directory, showing the percentage of code covered by tests.

cc @abhishekfdd