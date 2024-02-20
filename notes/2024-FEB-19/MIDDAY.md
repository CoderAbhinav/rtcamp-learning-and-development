# What are the nonces in WordPress?

1. WordPress’s **security tokens** are called “nonces”.
2. A nonce is a **“number used once”** to help protect URLs and forms from certain types of misuse, malicious or otherwise.
3. WordPress nonces aren’t strictly numbers; **they are a hash** made up of numbers and letters. Nor are they used only once: they have a limited “lifetime” after which they expire. 
4. They are **crucial for preventing CSRF** (Cross-Site Request Forgery) attacks, where an attacker tricks a user into executing unwanted actions on a web application.



# How WordPress Nonces are different from the general concept of Nonces?
1. WordPress nonces are **specific to WordPress** and are used primarily for security purposes, particularly in forms and AJAX requests.
2. Unlike general nonces, WordPress nonces are **tied to specific actions**, making them more targeted and secure.


# Could you explain the role of Nonces in WordPress plugin security? Where you can use them? How do they get checked and verified?
**Role in WordPress Plugin Security:**
1. Nonces play a vital role in WordPress plugin security by ensuring that only authorized users can perform certain actions, such as submitting forms, updating settings, or executing `AJAX requests`.
2. They can be used in various scenarios, including form submissions, AJAX requests, and administrative actions, to verify that the user's request originates from an authorized source.

# Should we use nonces in authentication? Why or why not?
1. Nonces should **not** be used for authentication purposes. They are not intended to replace proper authentication mechanisms such as passwords or session tokens.
2. Nonces are designed to prevent **CSRF attacks**, not to authenticate users.

# If a user logs in or out, will the nonce still be valid?
1. Nonces typically remain valid for a specific period, even after a user logs in or out.

# How is a Nonce's lifetime calculated in WordPress?
1. WordPress uses a system with **two ticks** (half of the lifetime) and validates nonces from the current tick and the last tick.
2. In default settings (24h lifetime) this means that the time information in the nonce is related to how many 12h periods of time have passed since the Unix epoch.
3. When a nonce is valid, the `functions that validate` nonces return the current tick number, `1` or `2`. 

# How can we add a nonce to a URL?
1. To add a nonce to a URL, **call** `wp_nonce_url()` specifying the bare URL and a string representing the action. For example:

```php
$complete_url = wp_nonce_url( $base_url, 'trash-post_'.$post->ID );
```

2. By default, wp_nonce_url() adds a field named _wpnonce. You can specify a different name in the function call. For example:


```php
$complete_url = wp_nonce_url( $bare_url, 'trash-post_'.$post->ID, 'my_nonce' );
```