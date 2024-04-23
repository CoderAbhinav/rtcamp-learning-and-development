**1. How many tables are present in WordPress by default? in both single site and multisite?**
1. In a single site, there are total of 12 tables present.
2. In a multisite setup, there are total of 18 tables present.

**2. How does WordPress store different post types?**
WordPress stores different post types, such as posts, pages, and custom post types, in the `wp_posts` table. Each post type is distinguished by the value stored in the `post_type` **column** of the wp_posts table. Custom post types registered by themes or plugins are also stored in this table with their respective `post_type` values.

**3. Explain how Post and Taxonomy relationship is maintained in WP DB?**
1. The relationship between posts and taxonomies (such as categories and tags) is maintained through the `wp_term_relationships` table. This table establishes a **many-to-many** relationship between posts and terms (categories or tags).
2. Each record in the `wp_term_relationships` table associates a post (identified by its object_id) with a specific term (identified by its term_taxonomy_id). Multiple records can exist for the same post, allowing it to be associated with multiple terms within the same taxonomy.

**4. What are meta tables? How many meta tables are present in WP DB?**
1. Meta tables in WordPress are used to store metadata associated with various elements in the WordPress database, such as posts, users, terms, and comments.
2. Metadata provides additional information or attributes that are not directly represented in the main tables.
3. There are typically four meta tables in a WordPress database:
    - `wp_postmeta`: Stores metadata for posts.
    - `wp_usermeta`: Stores metadata for users.
    - `wp_termmeta`: Stores metadata for terms (categories, tags, custom taxonomies).
    - `wp_commentmeta`: Stores metadata for comments.


**5. How are navigation menus stored in WordPress DB?**
When a navigation menu is created, each menu item is represented as a term in the `wp_terms` table, with the menu item's properties stored as metadata in the `wp_postmeta` table. The relationships between menu items and their parent menu items are stored in the `wp_term_taxonomy` table, while the connections between menu items and the actual menus they belong to are stored in the `wp_term_relationships` table.

**6. Explain the DB structure of the multisite setup**
In a multisite setup, WordPress uses additional tables to manage network-wide functionality and the relationships between sites within the network.

- `wp_sitemeta`: Stores metadata specific to the entire network, such as network-wide options and settings.
- `wp_blogs`: Stores information about individual sites within the network, including their domain, path, and site-specific options.
- `wp_blogmeta`: Stores metadata specific to individual sites within the network.
- `wp_site`: Stores information about the network itself, including its domain and site-specific options.
- `wp_registration_log`: Stores information about user registrations across the network.
- `wp_signups`: Stores information about pending site registrations.
