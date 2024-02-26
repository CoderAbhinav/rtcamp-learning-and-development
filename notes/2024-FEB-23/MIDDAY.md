# If we replace all instances of add_action with add_filter in our plugin, will there be any error?
1. **No**, there will be no any error.
2. `add_filter()` uses `add_action()` function internally.
3. `add_action()` is used to do specific action, at specific points, while `add_filter()` intended for modifying data rather than directly executing actions. so this might change the behaviour, so this won't be suitable.

# In a multisite env, if we network activate a plugin, will our activation hook be called for all sites or for just one site or not called at all?
1. Activation hook is called when a plugin is activated for single site (within the network).
2. Activation hook is called for all site, if the plugin is activated for network.

# What will happen if we return nothing in a filter that we added?
If nothing is returned in a filter that was added, the **default behavior** or value of the filtered data will be **preserved**. Essentially, the filter will have no effect on the data being filtered.

# What does the remove_action() hook do?
1. The `remove_action()` function is used to remove a previously added action hook from a specified action.
2. It prevents the execution of the callback function associated with the action hook.

# Where would you use remove_action() hook?
`remove_action()` is typically used when you need to modify or customize the behavior of a plugin or theme that adds actions you want to remove.

# What hooks can be leveraged if we want to measure the time taken by each hook?
We can use strategically placed `do_action()` or `apply_filters()` calls to mark the start and end of specific hook executions.


# List names of hooks you came across till now.
- `init`
- `wp_enqueue_scripts`
- `wp_enqueue_styles`
- `admin_init`
- `save_post`

# Difference between do_action and do_action_ref_array . Where does do_action_ref_array come in handy?
1. `do_action`: Executes all functions hooked to a specified action hook.
2. `do_action_ref_array`: Similar to do_action, but passes arguments as an array instead of individual arguments. It comes in handy when you need to pass a dynamic number of arguments to the hooked functions.


# How to change the default excerpt length? And what is the default length?

1. The default excerpt length in WordPress is **55 words**. You can change it using the excerpt_length filter.

**Example:**
```php
function custom_excerpt_length( $length ) {
    return 20; // Change to desired length
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );
```
