# Building a Github Timeline Newsletter

## Requirements

1. Your app should include email verification to avoid people using others' email addresses.
2. Monitor https://github.com/timeline for changes
3. Send new updates to appear in the last five minutes
4. Please make sure emails are formatted nicely, so one can jump to any part of the application
5. Please make sure your emails contain an unsubscribe link, so a user can stop getting emails.
6. These are the technical requirements expected out of the assignment,
    - Follows OOP
    - Makes use of the PHP namespace
    - Has proper inline documentation
    - Follows PHP clean code concepts

## User Flow
1. A user wants to subscribe to our platform / newsletter
    - got to the domain
    - enter his email
    - he will receive an verification link
    - once he clicks on the link (within next 1 hour) the service gets activated
    - if he didn't subscribed and wants to block that then he can use the report button in the same verification email, this way he can block his email
    - Once someone request email blocking, his email can't be used for subscribing to service for the next two hours
    - Once the email verified, the person will receive the emails from github.com/timeline every 5 minutes


## Features
1. Uses a link based email verification
2. Doesn't need any OTP to enter
3. Provides seemless experiece
4. User can unsubscribe the mailing list by clicking on the unsubscribe link

## Database Structure
table name: verification
attributes:
    email	varchar(255)	
    token	varchar(255) NULL	
    issue_time	timestamp NULL [CURRENT_TIMESTAMP]	
    state	enum('unverified','verified','blocked') NULL	

## Project Structure
```bash
.
├── README.md
├── composer.json
├── composer.lock
├── docs
├── phpcs.xml
├── public
│   ├── css
│   │   └── style.css
│   ├── index.php
│   ├── scripts
│   ├── wp-config.php
│   └── wp-includes
│       └── certificates
│           └── ca-bundle.crt
├── sql
│   └── local.sql
├── src
│   ├── controllers
│   │   └── subscription.php
│   ├── core
│   │   ├── app.php
│   │   ├── controller.php
│   │   ├── request.php
│   │   └── router.php
│   ├── cron
│   │   └── temp.txt
│   ├── models
│   │   ├── newsletter.php
│   │   ├── subscriber.php
│   │   ├── subscriber_state.php
│   │   └── test.xml
│   ├── services
│   │   ├── database.php
│   │   ├── mail.php
│   │   └── templates
│   └── views
│       ├── 404.php
│       ├── 500.php
│       ├── about.php
│       ├── home.php
│       ├── includes
│       │   ├── footer.html
│       │   ├── header.php
│       │   └── navbar.html
│       ├── policy.php
│       ├── report.php
│       ├── subscribe.php
│       ├── unsubscribe.php
│       └── verify.php
└── vendor
    ├── autoload.php
    └── composer
        ├── ClassLoader.php
        ├── InstalledVersions.php
        ├── LICENSE
        ├── autoload_classmap.php
        ├── autoload_namespaces.php
        ├── autoload_psr4.php
        ├── autoload_real.php
        ├── autoload_static.php
        ├── installed.json
        └── installed.php

```


### Design Patter
1. MVC Design Patter is used

