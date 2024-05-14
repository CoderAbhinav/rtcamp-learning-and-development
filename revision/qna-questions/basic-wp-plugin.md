1. How WordPress handles date & time for different locale ?
2. What is difference between `__()` and `_e()` ?
3. How can you generate `.po` and `.mo` file ? 
4. Suppose user logs out from the WordPress dashboard and logs back in few seconds, in this case does the nonce remains the same ?
5. What is data validation ? 
	1. What is the use case ?
	2. What is difference between client side validation and server side validation ?
	3. What language we write client side & server side validation ?
6. What is escaping ?
	1. How can we escape JS ?
7. What is SQL injection attack ?
8. What kind of attacks can happen if there is no DB ? (Like attacks not related to DB)
9. Describe the process of sanitisation & validating user inputs in WP Plugin to prevent SQL injection attacks
10. Parameters of `wp_enqueue_scripts`.
11. Whats unhooking in WordPress ? How can you unhook an action or filter
12. How can we find all the registered callbacks for a hook in WP.
13. What is a custom post type ? 
	1. Does creating a custom post type also creates a new table ?
	2. So how will you recognise which post it is in the table ?
14. What is rewrite argument in registering a custom post type ?
15. What is a `meta_query` ?
16. What is `add_query_arg()` ?
17. How do you paginate using `WP_Query` ?
18. What are meta-boxes ? Which hook is used to add a meta-box ?
19. Suppose we want to add / update / remove any type of metadata what function we can use ? ( We can use `get_metadata()`, `update_metadata()` etc. function )
20. Why do we need to return output instead of echoing it in a short-code function ?
21. How can we use a short-code in Theme of Plugin file ? (`do_shortcode`) How will you use a short-code in a widget ?
22. What is an administrative menu ? What are top-level menus & sub-menus ?
23. How can we add some menu under settings & tools menu ?
24. What is significance of `autoload` parameter in parameter is `add_option` function ?
25. Why should I use WordPress settings API instead of own custom function with options API ?
26. How does WordPress handles post revisions in database ?
27. Explain the structure of `wp_postmeta` table.