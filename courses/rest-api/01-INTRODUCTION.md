# REST API Introduction
1. An API is an **Application Programming Interface**. 
2. REST, stands for “`Representational State Transfer`,” is a set of concepts for modelling and accessing your application’s data as interrelated objects and collections.
3. Your application can send and receive JSON data to these endpoints to query, modify and create content on your site.

# Key Concepts
## Routes
In the context of the WordPress REST API a route is a URI which can be mapped to different HTTP methods. The mapping of an individual HTTP method to a route is known as an endpoint.

## Request
A REST API request is represented within WordPress by an instance of the **`WP_REST_Request`** class, which is used to store and retrieve information for the current request.

## Response
Responses are the data you get back from the API. The **`WP_REST_Response`** class provides a way to interact with the response data returned by endpoints.

## Schema
The schema structures API data and provides a comprehensive list of all of the properties the API can return and which input parameters it can accept. 

## Controller
With a controller class you can manage the registration of routes & endpoints, handle requests, utilize schema, and generate API responses.


# Notes
1. You **can't disable** REST API as it will break the WP Admin Functionality.
2. Adding Authentication
    - You can require authentication for all REST API requests by adding an `is_user_logged_in` check to the `rest_authentication_errors` filter.
        ```php
        add_filter( 'rest_authentication_errors', function( $result ) {
            // If a previous authentication check was applied,
            // pass that result along without modification.
            if ( true === $result || is_wp_error( $result ) ) {
                return $result;
            }

            // No authentication has been performed yet.
            // Return an error if user is not logged in.
            if ( ! is_user_logged_in() ) {
                return new WP_Error(
                    'rest_not_logged_in',
                    __( 'You are not currently logged in.' ),
                    array( 'status' => 401 )
                );
            }

            // Our custom authentication check should have no effect
            // on logged-in requests
            return $result;
        });
        ```
3. You can absolutely make request with PHP within a Plugin.
4. Because the WordPress REST API does not verify the Origin header of incoming requests, public REST API endpoints may therefore be accessed from any site.


