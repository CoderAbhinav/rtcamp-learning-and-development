# Using REST API

## Authentication
### Cookie Authentication
1. When you log in to your dashboard, this sets up the cookies correctly for you, so plugin and theme developers need only to have a logged-in user.
2. For developers using the built-in Javascript API, this is handled automatically for you. This is the recommended way to use the API for plugins and themes. Custom data models can extend `wp.api.models.Base` to ensure this is sent correctly for any custom requests.
3. If you are going to make any Ajax request, remember to add `_wpnonce` parameter in body or `X-WP-Nonce` in the header parameter
    - If no nonce is provided user is set to 0 and request becomes **unauthenticated**.

### Basic Authentication with Application Passwords
1. From WP 5.6 it's shipped with **Application Passwords**, they can be generated in `wp-admin -> Users -> Edit User`
    ```bash
    curl --user "USERNAME:PASSWORD" https://HOSTNAME/wp-json/wp/v2/users?context=edit
    ```
2. Here's how the request looks
    ![](assets/02-01.png)

    - As you can see the **Authorization** header contains the value, it's the Base
    - This basic method sends a *base 64* encoded string along with the request, so it should be avoided for HTTP transport.

3. If you would rather have curl first test if the authentication is really required, you can ask curl to figure that out and then automatically use the most safe method it knows about with `--anyauth`. This makes curl try the request unauthenticated, and then switch over to authentication if necessary:

    ```bash
    curl --anyauth --user daniel:secret http://example.com/
    ```
### Authentication Plugins

