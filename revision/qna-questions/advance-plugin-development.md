1. Whats the use of XML-RPC ? Why it's recommended to **disable** it ?
2. How to add a **dashboard** widget at the top ?
3. How to do a *http* `basic authentication` request to a url ?
4. How can I intercept an http request before it's sent and before it's response is returned ? (`pre_http_request`, `http_response`)
5. Can I send a cookie in WordPress http request ?
6. What is payload data format for `ADMIN AJAX` in WordPress ?
7. How to use the `ADMIN AJAX` in WordPress ?
8. What happens when you provide a *non existing* actions in `AJAX` call ?
9. How can we add custom  url structure for custom post type or taxonomy ?
	1. Where do we add `rewrite_slug` ?
10. Are rewrite rules site specific or network specific ? (In context of multisite setup) 
	1. How can you edit site specific rewrite rule or network specific rules ?
11. Ways to flush rewrite rules in WordPress ? (`flush_rules`, `flush_rewrite_rules`, `UI`, `WP CLI` etc.)
12. Which are the default roles in WordPress ?
13. What is `map_meta_cap()` function ?
14. What are some *user meta* used by WordPress?
15. How can you assign multiple roles to a user ? There's a programatic way to assign multiple roles. 
16. What will be execution sequence of following hooks and files
	1. wp-settings.php
	2. plugins_loaded
	3. mu_plugins_loaded
17. Explain the Database structure of multisite setup
18. Assuming we made changes to our custom database schema on plugin activation, how can we make sure the changes are applied when the plugin is updated ?
19. State any two limitations of mu plugins
20. What hooks are fired after php mailer has successfully sent a mail ? (It's `wp_mail_sucess`)
21. How does WP CRON works ?
	1. On low traffic site how do you ensure CRON jobs run on time ?
22. What are *cron schedules* ? What hooks to use to do so ? (`cron_schedules`)
23. What is disadvantage of WP CRON that background processing overcomes ?
24. Where are transients stored if object caching enabled ?
25. How to add *site-wide* transient ? What's the difference between these two ?
26. What are **drop ins** ?
27. When does drop ins are loaded ? (Before mu plugins)
28. What is `object-cache.php` **drop in** ?
29. 