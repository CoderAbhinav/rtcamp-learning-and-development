# Does the custom post type have revisions?
**Yes**, they do have revisions. This can be achieved by adding `revisions` in the `support`.

# Does revision also store the post-meta information?
**Yes**, revisions store post meta information along with other post data. When a post is revised, WordPress creates a new revision entry in the database, which includes all the post meta data associated with that revision.

# How terms are stored in the database and how relations between a post and its terms are handled in the database?
Terms are stored in the `wp_terms` table in the database. The relationship between a post and its terms is managed through the `wp_term_relationships` table, which stores the post ID and the term taxonomy ID associated with each post-term relationship.

# What happens if you register a post type with the 'post' as the slug? Does WordPress throw any errors?
If you attempt to register a custom post type with the slug `post`, WordPress will **not throw any errors**, but it will **override the default post type**, which may lead to unexpected behavior.

# What's the difference between fetching posts using the get_posts() function and using the WP_Query class? 
1. `get_posts()` is a **wrapper function** for `WP_Query` that returns an array of posts based on the provided parameters. WP_Query is a class that allows for more complex queries and offers greater flexibility.
2. `get_posts()` is **simpler to use** and is suitable for basic queries, while `WP_Query` is more **powerful and customizable**.
3. The recommended approach **depends on the complexity of the query**. For simple queries, `get_posts()` may be sufficient, but for more complex queries, or when you need more control over the query parameters, WP_Query is preferred.

# What's the use of the wp_reset_postdata() function? When do you need to use it? What kind of unexpected behavior we can experience if we don't use this function?
1. `wp_reset_postdata()` is used to **reset the global $post variable** after using WP_Query or get_posts() to retrieve posts. It restores the original post data so that subsequent template tags and functions work correctly.
2. You need to use `wp_reset_postdata()` whenever you use `WP_Query` within a custom loop, especially if you plan to use template tags or functions that rely on the global $post variable.
3. If you don't use `wp_reset_postdata()`, you may experience unexpected behavior, such as incorrect post data being displayed or template tags not working as expected.

# What does the “s” parameter mean in WP_Query?
The `"s"` parameter in `WP_Query` is used to specify **search terms**. It allows you to retrieve posts that match the specified search criteria. When used, WordPress will search for posts that contain the provided search terms in their title, content, excerpt, or other relevant fields.