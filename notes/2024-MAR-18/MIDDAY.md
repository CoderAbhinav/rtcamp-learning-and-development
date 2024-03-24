**1. Suppose two rewrite rules (the regex) are matching the current URL then which one will be selected?**
- If two or more rewrite rules have the same specificity, WordPress applies the rule that appears first in the rewrite rules array.

**2. Are rewrite rules site-specific or network-specific in the case of multisite?**

In the case of multisite WordPress installations, rewrite rules can be both site-specific and network-specific:
- Each individual site in a multisite network can have its own set of rewrite rules defined using the rewrite_rules option. These rules apply only to the specific site they are defined for and affect the URLs within that site's scope.
- Some rewrite rules may apply network-wide and affect the URLs across the entire multisite network. These rules are typically added using plugins or themes at the network level and are stored in the main site's rewrite_rules option.

**3. When to use flush_rewrite_rules?**
1. Removes rewrite rules and then recreate rewrite rules.
2. This function is useful when used with custom post types as it allows for automatic flushing of the WordPress rewrite rules (usually needs to be done manually for new custom post types). However, this is an expensive operation so it should only be used when necessary.

**4. What is ep_mask? Where can we use ep_none?**
1. `ep_mask` refers to the endpoint mask used to define the position and context of rewrite endpoints. It is a bitmask used in WordPress to determine the endpoints associated with a particular URL.
2. The `ep_none` constant is a specific value of the ep_mask and indicates that an endpoint should not be added to the URL. This is useful when registering custom endpoints that should not affect the URL structure or rewrite rules. 

**5. What is the difference between flush_rules and flush_rewrite_rules?**
1. **`flush_rules`**: This method can be used to refresh WordPress’ rewrite rule cache. Generally, this should be used after programmatically adding one or more custom rewrite rules.
2. **`flush_rewrite_rules`**: This function is useful when used with custom post types as it allows for automatic flushing of the WordPress rewrite rules. This is an **expensive** operation so it should only be used when necessary.

 

**6. What are the default roles in WordPress?**
1. Super Administrator (for multisite installations only)
2. Administrator
3. Editor
4. Author
5. Contributor
6. Subscriber

**7. What are the default capabilities assigned to each default role?**

Role | Capabilities Description | Capabilites | Reference
--- | --- | --- | ---
**Super Admin** | All capabilities (for multisite installations only). |create_sites, delete_sites , manage_network, manage_sites, manage_network_users, manage_network_plugins, manage_network_themes,manage_network_options, upgrade_network, setup_network | [see](https://wordpress.org/documentation/article/roles-and-capabilities/#super-admin)
**Admin** | All capabilities except for a few sensitive capabilities related to network administration (for multisite installations) or the ability to delete users. |activate_plugins, delete_others_pages, delete_others_posts, delete_pages, delete_posts, delete_private_pages, delete_private_posts, delete_published_pages, delete_published_posts, edit_dashboard, edit_others_pages, edit_others_posts, edit_pages, edit_posts, edit_private_pages, edit_private_posts, edit_published_pages, edit_published_posts, edit_theme_options, export, import, list_users, manage_categories, manage_links, manage_options, moderate_comments, promote_users, publish_pages, publish_posts, read_private_pages, read_private_posts, read, remove_users, switch_themes, upload_files, customize, delete_site | [see]( https://wordpress.org/documentation/article/roles-and-capabilities/#administrator )
**Editor** | Edit published posts, moderate comments, manage categories, manage links, upload files, and other capabilities related to content management. |delete_others_pages, delete_others_posts, delete_pages, delete_posts, delete_private_pages, delete_private_posts, delete_published_pages, delete_published_posts, edit_others_pages, edit_others_posts, edit_pages, edit_posts, edit_private_pages, edit_private_posts, edit_published_pages, edit_published_posts, manage_categories, manage_links, moderate_comments, publish_pages, publish_posts, read, read_private_pages, read_private_posts, unfiltered_html (not with Multisite), upload_files | [see](https://wordpress.org/documentation/article/roles-and-capabilities/#editor)
**Author** | Edit and publish their own posts, upload files. |delete_posts, delete_published_posts, edit_posts, edit_published_posts, publish_posts, read, upload_files| [see](https://wordpress.org/documentation/article/roles-and-capabilities/#author)
**Contributor** | Write and edit their own posts but cannot publish them. |delete_posts, edit_posts, read | [see](https://wordpress.org/documentation/article/roles-and-capabilities/#contributor)
**Subscriber** | Read content and manage their own profile. |read | [see](https://wordpress.org/documentation/article/roles-and-capabilities/#contributor)