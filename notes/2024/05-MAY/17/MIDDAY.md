# VIP GO: 17th May #215
## 1. What is page caching in VIP? Explain.
### Page Caching in VIP:
Page caching in VIP is a technique used to improve the performance of WordPress sites by storing static versions of pages and serving them to users. This reduces the need for the server to process PHP scripts and database queries for each page request.

### How It Works:
- **Static HTML Cache**: VIP Go uses a full-page caching system where the HTML output of a page is stored and served for subsequent requests.
- **Cache Invalidation**: When content is updated or published, the cache for that specific page or related pages is invalidated, ensuring users see the most up-to-date content.
- **Cache Layers**: VIP Go employs multiple layers of caching, including server-level caching (Nginx) and edge caching (CDN), to deliver content quickly to users globally.

### Benefits:
- **Improved Performance**: Reduces server load and speeds up page delivery.
- **Scalability**: Handles high traffic volumes efficiently.
- **SEO Benefits**: Faster page load times can positively impact search engine rankings.

## 2. Suppose you have enqueued some scripts and styles in your VIP project. And now on your site you go to the page source and search for the files you will not find those. But you can find some files with URLs like /\_static/, which contain all your styles. So, why this happens, and what is the benefit of this? Can we disable this behaviour?
### Explanation:
On the VIP platform, static assets like CSS and JS files are aggregated, minified, and served from a centralized location (`/_static/`). This process is part of the optimization performed by VIP to improve site performance.

### Benefits:
- **Reduced HTTP Requests**: By aggregating multiple files into a single request, it reduces the number of HTTP requests, speeding up the page load time.
- **Minification**: Minifying assets reduces their size, further enhancing performance.
- **Caching**: Serving static assets from a central location allows for better caching strategies, reducing the need to load assets repeatedly.

### Disabling this Behaviour:
Disabling this behavior is not recommended as it negates the performance benefits. However, if necessary for debugging or other reasons, you can contact VIP support to discuss potential adjustments to your configuration.
## 3. Which username is blocked by VIP GO for login (WordPress login)?
### Blocked Username:
The username `admin` is blocked by VIP Go for security reasons. Using `admin` as a username is a common practice, and blocking it helps prevent brute force attacks that target this common username.

## 4. In your local from where do you get these VIP-specific features (i.e. all the VIP-specific functions, features like this username login blocking, etc.)?

### VIP-Specific Features in Local Environment:
When developing locally, you typically use the VIP CLI and local development tools provided by VIP. These tools include VIP Go's specific features, configurations, and functions that mimic the production environment.

### Example Setup:
- **VIP CLI**: Install the VIP CLI to manage and develop your VIP project.
- **Local Environment**: Use tools like Local by Flywheel with VIP-specific configurations or Docker-based setups that replicate the VIP environment.

## 5. For declaring the IMDB API key in your config file you might have done something like this - define( 'IMDB_API_KEY', 'xxxxx' ); And then after your application has been deployed to the server, you SSH into the server and changed the 'xxxxx' above to the actual API key. But in the VIP GO platform, you can't SSH into the server, and you shouldn't also directly commit the actual API key in your config file. So, how can you do this (don't give a solution to create a setting and use that) (there is a VIP-specific solution for this)?
### VIP-Specific Solution for API Keys:
On the VIP Go platform, environment-specific configurations, including API keys, should be handled using environment variables. VIP Go supports this through their environment management.

### Setting Environment Variables:
1. **VIP Dashboard**: Access the VIP dashboard for your site.
2. **Environment Variables**: Use the environment configuration section to securely set environment variables.
3. **PHP Usage**: Access these variables in your code using the `$_ENV` superglobal or the `getenv()` function.

### Example:
1. **Setting the Variable** (in the VIP dashboard):
   ```sh
   IMDB_API_KEY=actual_api_key
   ```

2. **Accessing in PHP**:
   ```php
   define( 'IMDB_API_KEY', getenv( 'IMDB_API_KEY' ) );
   ```

cc @abhishekfdd