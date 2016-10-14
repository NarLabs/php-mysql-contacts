# php-mysql-contacts
*almost* Complete Contacts book CRUD Web app made for LAMP server

## Features
- User account registration & authentification
- Each auth user can `Create`, `Read`, `Update` and `Delete` owned contacts

## Requirements
- [XAMPP](https://www.apachefriends.org/download.html) or [LAMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04) server

## For optimal testing:
- create and configure an Apache virtual host `www.contactsbook.xyz`
- enter a gmail account in `send_mail($email,$message,$subject)` function in `php-mysql-contacts/class.user.php` file
- create `address_book` db and import from `php-mysql-contacts/util/db/address_book.sql`
- start Apache, acces `www.contactsbook.xyz` in browser, create account, verify email addres and then login in the app.
