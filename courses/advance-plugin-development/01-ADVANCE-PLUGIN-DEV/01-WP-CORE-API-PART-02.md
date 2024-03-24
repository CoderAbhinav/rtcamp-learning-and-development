# WP Core API (Part 1)

## Dashboard Widgets API
1. The main tool needed to add Dashboard Widgets is the [`wp_add_dashboard_widget()`](https://developer.wordpress.org/reference/functions/wp_add_dashboard_widget/) function. 
2. The function blueprint
    - ```php
        wp_add_dashboard_widget(
            string $widget_id,
            string $widget_name, // Title of widget.
            callable $callback, // Render function.
            callable $control_callback, // It basically add the settings option there at the top of widget
            array $callback_args, 
            string $context = 'normal',
            string $priority = 'core'
        )
      ```
    - The `$control_callback` actually adds a new link called `configure` at the top right of the widget, clicking on that opens a settings page.
3. Action hooks
    - `‘wp_dashboard_setup’`: fires after all the core admin widgets are registerd, used for adding to a single site.
    - `‘wp_network_dashboard_setup’` for a multisite admin widget, appears on every site dashboard.
4. ```php
    <?php

    namespace RTML\Admin\Widget;

    class RTML_Weather
    {
        /**
         * Singleton class instance.
         *
         * @since    1.0.0
         * @access   private
         */
        private static $instance;
        
        /**
         * Method __construct
         *
         * @return void
         */
        public function __construct()
        {
        }

        /**
         * Return singleton instance of the class `RTML`.
         *
         * @since    1.0.0
         * @access   public
         */
        public static function get_instance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }

            return self::$instance;
        }
        
        /**
         * Registers the dashboard widget.
         *
         * @see wp_add_dashboard_widget()
         * @return void
         */
        public function register()
        {
            wp_add_dashboard_widget(
                'weather_widget',
                'Weather',
                [$this, 'render'],
                [$this, 'control']
            );
        }
        
        /**
         * Renders the UI of dashboard.
         *
         * @return void
         */
        public function render()
        {
            ?>
                    <input type="text" id="username" placeholder="Enter GitHub Username">
                    <button id="getProfileBtn">Get Profile</button>
                    <div id="profile">
                        <h2>User Profile</h2>
                        <img height=30 id="avatar" src="" alt="GitHub Avatar">
                        <p id="name"></p>
                        <p id="bio"></p>
                        <p id="followers"></p>
                        <p id="following"></p>
                        <p id="repos"></p>
                    </div>
            <?php
        }
        
        /**
         * Renders the controls for widget.
         *
         * @return void
         */
        public function control()
        {
            ?>
                    <input type="text" id="username" placeholder="Enter GitHub Username">
            <?php
        }
    }

    ```