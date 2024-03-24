# Email With WordPress

## [`wp_mail()`](https://developer.wordpress.org/reference/functions/wp_mail/)
1. WordPress uses the default [`wp_mail()`](https://developer.wordpress.org/reference/functions/wp_mail/) function to send emails which is similar to PHP's mail function.

```php
wp_mail(
    string|string[] $to, // Reciver's email.
    string $subject, // Email Subject.
    string $message, // Message.
    string|string[] $headers = '', // Email Headers.
    string|string[] $attachments = array() // Paths to file to attach.
): bool
```

- `$to` : Array or comma-separated list of email addresses to send message.
    - The emails should comply [RFC 2822](http://www.faqs.org/rfcs/rfc2822.html) standards.
    - ```
      user@example.com
      user@example.com, anotheruser@example.com
      User <user@example.com>
      User <user@example.com>, Another User <anotheruser@example.com>
      ```
- `$subject`: Email subject.
- `$message`: Message contents.
- `$headers`: Additional headers. 
    - If you want to add `Cc` or `Bcc` then while providing emails, follow what we are following for the `$to`.
- `$attachments`: Paths to files to attach.

### Notes
- A `true` return value does not automatically mean that the user received the email successfully.
- For this function to work, the settings `SMTP` and `smtp_port` (default: `25`) need to be set in your php.ini file.
- The function is available after the hook `'plugins_loaded'`.
- The filenames in the `$attachments` attribute have to be filesystem paths.
- Optional filters `‘wp_mail_from‘` and `‘wp_mail_from_name‘` are run on the sender email address and name. The return values are reassembled into a `‘from’` address like ‘”Example User” ‘ If only ‘wp_mail_from‘ returns a value, then just the email address will be used with no name.

## Amazon Simple Email Service

![](https://d1.awsstatic.com/products/simple-email-service/product-page-diagram_Amazon-SES%402x.a001d84fea530fc4dcfca95c2a57e6752524596b.png)

- Amazon SES is a cloud-based email service provider that can integrate into any application for high volume email automation.
- Use cases
    - Automatic Transactional Messages.
    - Marketing Messages.
    - Send Timely notifications to consumers.
    - Send Bulk Communication Emails.