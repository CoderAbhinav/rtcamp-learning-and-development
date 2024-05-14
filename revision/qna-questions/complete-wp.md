1. Can a translation file (mo) be loaded without the file nomenclature - `<text-domain>-<lang>_<local>` ? (Yes)
2. How to change the default excerpt length ? (`excerpt_length` filter) What's the default excerpt length ? (55) 
3. Can we use negative number as a priority ? And Why ?
	1. They are 0 to `InF`
4. What is the `relation` parameter in `tax_query` ?
5. Which function is used to save metadata of any type ?
	1. `get_metadata()`, `update_metadata()` these functions are used.
	2. They need to be provided with the table variable name (You will see that in custom DB assignment).
6. Can we use nested short-codes ? (Yup recursively we scan those.)
7. Explain how taxonomies & terms are stored in database ?
8. How to intercept the `HTTP` request before it's sent and immediately before it's response is returned ? (`pre_http_request`, `http_request`)
9. What is `db.php` drop-ins file ? (It replaces the WPDB class)
10.  Can we view the `raw` sql query ? (Yes, we can with `$wpdb->request` variable).
11. Which action runs first when WordPress loaded ? (`muplugins_loaded`)
12. What are the different notices (admin notices) we can show ? Which classes are used to print/show different type of notices.
13. What is `menu_order` where it can be used ?
14. How can I escape a short-code ? (Add more `[[]]` to it). 
15. How WordPress decides which template file to use when displaying a page ? 
16. If there are multiple templates matching then what is the priority ? (Template Hierarchy)
17. Discuss how to properly enqueue scripts and styles to avoid conflict with plugins, themes ?
18. What is the serialisation ? And how WordPress serialises the meta ?
19. In a multisite network how to check if current site is the main site ?
	1. There are two methods, is_main_site, and then there is other option `get_site_options('site_id')`  and then check `get_current_block_id`