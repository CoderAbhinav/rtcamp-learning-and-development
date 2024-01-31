# Engineering Basics (31st January)

## 1. Explain briefly about the Include vs Require vs Include once vs Require Once in PHP.
- The `include` & `require` keywords are used in order to add content existing in specified file to the current file
- Usage
    ```php
    <?php include "optional.php" ?>
    <?php include "necessary.php" ?>
    ```
- The basic difference between them is `include file.php` allows the php code even if the the file is missing, whereas the `require file.php` produces a **fatal error** if the file is *missing*.
- Coming to `require_once` keyword, this allows the file to include only once, if it's being added already, the statement won't include the file again. If the file is missing **fatal error** is raised.

## 2. What is the difference between $GLOBALS, $_SERVER, $_REQUEST, $_GET and $_POST?
- These all are called **superglobals**.
- `$GLOBALS` is used to access all the global variables, allows access to gloabl variables even inside a function. syntax: `$GLOBAL['variable_name']`
- `$_SERVER` hold information about headers, paths, and script locations. For example, in order to print the server name `<?php echo $_SERVER['SERVER_NAME'] ?>`
- `$_GET`, `$POST` contains data received via **HTTP GET**, **HTTP POST** method respectively. For example, if a form send data with GET methode it can be accesed by using `$GET['form_field_name']`

## 3. Where should we use the $_SERVER and $GLOBALS, and can we override them?
- We can use `$GLOBALS` withing the scope of program, and can be used to access any global variables
- We can use `$_SERVER` to get details about the server. 
- Overriding `$GLOBALS` is not allowed

## 4. How to read XML files in PHP?
- We can use `SimpleXML` parser
    ```php
    $xml_string = "<?xml version='1.0' encoding='UTF-8'?>
        <note>
        <to>Tove</to>
        <from>Jani</from>
        <heading>Reminder</heading>
        <body>Don't forget me this weekend!</body>
        </note>"
    
        $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
        
        print_r($xml); // to print the xml variable1
        
        $to = $xml->to; // to access specific attribute of the xml
        echo $to;
    ```


## 5. Let's suppose I have a template HTML (such as an email template) and I want to put its content inside a PHP file, is it possible? Which functions can be used to achieve the same?
- we can use the keyword `include`