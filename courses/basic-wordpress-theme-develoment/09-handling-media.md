# Handling Media
In WordPress you can upload, store, and display a variety of media such as image, video and audio files.

So there are few function which you should know

1. [`wp_get_attachment_image()`](https://developer.wordpress.org/reference/functions/wp_get_attachment_image/) 
2. [`wp_get_attachment_image_src()`](https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/)
Whenever you upload an image, WordPress automatically creates 4 different image sizes:

- Thumbnail size (150 x 150 pixels)
- Medium size (maximum 300 x 300 pixels)
- Large size (maximum 1024 x 1024 pixels)
- Full size (the original size of the uploaded image)
### CHANGING WORDPRESS DEFAULT IMAGE SIZES

In addition to the default image sizes, you can also upload your custom image sizes to fit your needs.

Here’s how:

1. Go to your WordPress Admin Dashboard
2. Click on Settings – Media
3. In the Media Settings, adjust the default image settings to fit your preferences
4. Click Save Changes to confirm

![](https://cdn-babnh.nitrocdn.com/yTCeykVJyIHAxPkMUOhbcsQPyphGzkvj/assets/images/optimized/rev-73b6e00/enginescout.com.au/wp-content/uploads/2020/05/wordpress-default-image-sizes.png)

WordPress settings for changing default image sizes.


You can programatically add some image sizes using
```php
<?php
add_action( 'after_setup_theme', function() {
  add_image_size( 'product-thumbnail', 200, 150 );
} );
?>

```

