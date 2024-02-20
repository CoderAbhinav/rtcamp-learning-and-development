# What is wordpress ?
1. It's a free, open source **web content management software (CMS)**
2. Started as simple blogging platform, later use cases such as ecommerce, LMS, membership sites were implemented.
3. Built with **PHP** & **MySQL** the platform supports wide range of web servers like apache, NGNIX, Mirosoft IIS etc.

## Block Editor
1. Login to the wordpress by visiting `wp-admin/`
2. You can see there's a left pane
    - Dashboard
    - Posts
    - Media
    - Pages
    - Comments
    - Appearance
    - Plugins
    - Users
    - Tools
    - Settings

### Creating a post
1. **Comments**, provides an interactive way
    - In order to block spams use *Akismet Anti-spam: Spam Protection* plugin
2. You can add the post catagories by going to `Posts > Categories` section on dashboard, create the categories there.

### Themes
1. Fundamentally, the WordPress Theme system is a way to “skin” your WordPress site.
2. A WordPress Theme is a collection of files that work together to produce a graphical interface with an underlying unifying design for a website. These files are called template files. 

### Plugins
1. These are extentions to the Wordpress site, which let's user add different functionalities to the site.
2. We can create our own plugin with PHP, MySQL, HTML.

## Wordpress Features

### User Features
1. Simplicity
2. Flexibility
3. Publish with ease
4. Publish with tools: features like schedule, draft are useful
5. User management: Different user roles, admin, editor, views etc.
6. Media Management: Easy image upload.
7. Full Standards Compliance: Generated code is in full compliance with **W3C** standards.
8. Easy Theme System: Available themes in `themes` folder.
9. Extend with Plugins
10. Built In Comments
11. Search Engine Optimization (SEO): With plugins.
12. Multiple Language Availability
13. Easy Installation & Upgrades
14. Importers: Easily import content from other blog sites.
15. Own your data
16. Freedom
17. Community
18. Contribute


### Developer Features
1. Plugin System: Build plugins.
2. Theme System: 
3. Application Framework: Also use with `REST API`
4. Custom Content Types: Custom post, taxonomies, meta data.

## Roles in Wordpress
### 1. Super Admin
•⁠  ⁠*Unique to Multi-Site Networks:* The Super Admin role is exclusive to WordPress multi-site installations. This role has the highest level of access, capable of managing the entire network of sites. 
•⁠  ⁠*Capabilities:* Includes creating and deleting sites, managing network-wide settings (plugins, themes, updates), and controlling access for all other roles across the network. The Super Admin can also perform any action on individual sites within the network.

### 2. Administrator
•⁠  ⁠*Single Site Management:* On a single site, Administrators have the highest level of access. In a multi-site network, they manage individual sites rather than the entire network.
•⁠  ⁠*Capabilities:* Includes activating plugins (with network restrictions), creating users, managing themes and plugins, and customizing site options. They have full control over content and user management for their site but cannot affect network-wide settings.

### 3. Editor
•⁠  ⁠*Content Management Focused:* Editors have comprehensive control over content sections, including posts, pages, comments, categories, and links. 
•⁠  ⁠*Capabilities:* Can publish, edit, or delete any posts or pages, including those written by others, manage categories, links, and moderate comments. They cannot change site settings, themes, or plugins.

### 4. Author
•⁠  ⁠*Self-Content Management:* Authors can publish and manage their own posts but have no access to content created by others.
•⁠  ⁠*Capabilities:* Includes writing, editing, publishing, and deleting their own posts, and uploading files. They cannot modify pages or posts written by others, nor can they manage site settings or access theme and plugin settings.

### 5. Contributor
•⁠  ⁠*Limited Content Creation:* Contributors can write and manage their own posts but cannot publish them. 
•⁠  ⁠*Capabilities:* They must submit their posts for review by an Editor or Administrator before they are published. They cannot upload files or manage any site settings.

### 6. Subscriber
•⁠  ⁠*Basic Interaction:* Subscribers can only manage their profile and read content. 
•⁠  ⁠*Capabilities:* This role is typically used for visitors who sign up to access specific content or to comment on posts. They have no content management or site administration capabilities.
