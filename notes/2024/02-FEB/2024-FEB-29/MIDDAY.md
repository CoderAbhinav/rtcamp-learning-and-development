1. **Where are shortcodes stored after using `add_shortcode()`?**
   - Shortcodes are stored in **global variable** `$shortcode_tags`
   - The shortcode callbacks are stored in the `$shortcode_tags` array with the key being the `$tag`
   

2. **Does WordPress use a constant regex to replace shortcodes from content, or does it construct the regex on the fly?**
   - It constructs the regex on the fly.
   - Inside `get_shortcode_tags_in_content($content)` (Function from WP Core), it scans all the content, with the function `get_shortcode_regex()` it constructs the regex for the tags present in the global variable `$shortcode_tags`

3. **What is the process called when WordPress applies formatting to the entire content of the site to replace characters like quotes and dashes with formatted entities? What function is responsible for doing that?**
   - The process is called "texturization" or "smart quotes conversion." WordPress applies this formatting to improve typography and ensure consistent presentation of text across the site.
   - The primary function responsible for texturization is `wptexturize()`. It converts standard ASCII characters into typographically correct entities, such as converting straight quotes (`"` and `'`) into curly quotes (`“`, `”`, `‘`, `’`) and hyphens (`--`) into en dashes (`–`) or em dashes (`—`).

4. **How can you disable texturization using a filter?**
   - You can disable texturization using the `run_wptexturize` filter hook. By setting the filter to `false`, you can prevent WordPress from applying texturization.
   ```php
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_title', 'wptexturize'); 
   ```

5. **What is 'Post Meta Data'? What fields can be accessed from that?**
   - Post meta data, also known as custom fields, allows you to store additional information about posts in the WordPress database. It consists of key-value pairs associated with individual posts.
   - Fields commonly accessed from post meta data include:
     - Meta keys: Identifiers for the stored data.
     - Meta values: The actual data associated with each key.
     - Post IDs: Identifiers for the posts to which the meta data belongs.
     - Meta data creation and update timestamps.

6. **What's the difference between `add_post_meta()` and `update_post_meta()`?**
   - `add_post_meta()` adds a new meta data entry to a post, but it won't update an existing meta data entry if one with the same key already exists.
   - `update_post_meta()` updates an existing meta data entry with the specified key for a post. If the meta data entry doesn't exist, it will be added.

7. **Should metadata be used for querying posts? If no, what's the overhead in such a query and what's the actual need for metadata then? Explain with an example scenario.**
   - While metadata can be used for querying posts, it's not as efficient as querying native post fields like title, content, and categories. Querying metadata involves additional joins and can impact performance, especially on large datasets.
   - Metadata is useful for storing custom information specific to each post that doesn't fit into the standard post fields. For example, if you're building a real estate website, you might use metadata to store property features, amenities, or pricing details. While querying metadata might be slower, it allows for greater flexibility and customization in your application.