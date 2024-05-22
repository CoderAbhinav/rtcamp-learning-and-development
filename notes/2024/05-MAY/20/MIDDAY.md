# VIP GO: 20th May #218
## 1. How can you add some mu-plugins in WordPress VIP GO?
- **Directly Add to `/client-mu-plugins`:**
    
    - For simple plugins (single file), place them directly in the `/client-mu-plugins` directory at the root of your site's code repository.
    - This automatically loads them as MU plugins.
- **Use a Plugin Loader:**
    
    - For plugins with multiple files or requiring specific loading order, create a `plugin-loader.php` file within `/client-mu-plugins`.
    - Inside `plugin-loader.php`, use `include` or `require` statements to load your plugin files.
## 2. How can you add some custom wp-config in your VIP GO project?
* ***Not Allowed:** Due to security and consistency, modifying the core `wp-config.php` file is not permitted in VIP GO.
- **Environment Variables:** Define custom configurations using environment variables managed by VIP GO. These values can be accessed within your code using `getenv('VARIABLE_NAME')`.
- **VIP GO Configuration:** Some VIP GO settings might be configurable through the platform's control panel or by contacting VIP GO support.
## 3. Does WordPress VIP GO provide persistent object caching? If yes what caching service does it use?
- **Yes:** VIP GO offers a persistent object caching layer, but the specific service might not be publicly disclosed.
- **Benefits:** This cache improves website performance by storing frequently accessed data, reducing database load times.
## 4. Can you execute WP-CLI commands in a VIP GO application?
- **Generally Not Recommended:** Direct WP-CLI usage on production VIP GO sites is discouraged due to potential security risks and lack of environment control.
- **Alternatives:**
    - Consider using VIP GO's built-in tools or APIs for management tasks.
    - If absolutely necessary, contact VIP GO support to explore controlled WP-CLI access options.
## 5. Suppose you were implementing the dashboard widget task in a VIP GO project. What change do you have to make in the code where you were fetching the data from IMDB API?
- **Security Concerns:** Directly fetching data from external APIs within a VIP GO dashboard widget raises security concerns, as it exposes API keys and might introduce vulnerabilities.
- **Recommended Approach:**
    - Create a server-side component (e.g., a custom endpoint) to fetch data from the IMDB API securely.
    - This component can handle authentication, data retrieval, and proper formatting.
    - Your dashboard widget can then fetch data from this secure endpoint using AJAX or a similar method.

cc @abhishekfdd