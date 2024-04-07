# What all things run on the main thread in browsers?
1. It parses the **HTML and builds the DOM, parses the CSS and applies the specified styles, and parses, evaluates, and executes the JavaScript**.
2. The main thread also processes **user events** & paints.


# What’s the benefit of using async-await over handling promises through then()?
1. `asyn-await`, when called it returns a new promise which resolves with value returned by the async function, or rejects with an `EXCEPTION`.
2. Async functions can contain zero or more await expressions. 
3. Await expressions make promise-returning functions behave as though they're synchronous by suspending execution until the returned promise is fulfilled or rejected. 
4. With async-await, you can write asynchronous code in a more synchronous style, making it look similar to traditional synchronous code.
5. Leads to **clean** code.

# Explain the different ways to use API calls in Javascript. Which one is your favourite?
1. ` is an object used to make API calls in JavaScript.
2. `fetch`, all moder browser use this methode, easier than `XMLHttpRequests` 
3. `Axios`, Axios is an open-source library for making HTTP requests to servers. It is a promise-based approach. It supports all modern browsers and is used in real-time applications. It is easy to install using the npm package manager.
4. `jQuery AJAX`, jQuery is a library used to make JavaScript programming simple and if you are using it then with the help of the $.ajax() method you can make asynchronous HTTP requests to get data.
5. Favourite method is `Axios`, quite easy to understand, clean.

# What is 'DOM'? How does it help the web developers?
1. The Document Object Model (DOM) is the data representation of the objects that comprise the structure and content of a document on the web. 
2. As an object-oriented representation of the web page, it can be modified with a scripting language such as JavaScript.
    ```js
    const paragraphs = document.querySelectorAll("p");
    // paragraphs[0] is the first <p> element
    // paragraphs[1] is the second <p> element, etc. 
    alert(paragraphs[0].nodeName);
    ```
4. All of the properties, methods, and events available for manipulating and creating web pages are organized into objects.

# Is PHP more secure than Javascript? If yes, explain why.
1. PHP is usually more secure than JavaScript since it’s a server-side scripting language. You can’t access the code from the browser. Whereas almost anybody can see the code behind a web page in JavaScript. Since it runs in the browser, it is less secure.
2. 

# What is the difference between PHP Cookies and Javascript Cookies?
1. In both cookies are stored in client side
2. PHP Cookies are *set*, *manipulated* by server side, while JS cookies are manipulated by client side.
3. PHP cookies are often used for server-side sessions and user authentication, while JavaScript cookies are commonly used for client-side data storage and user preferences.