#  Book Rental Library - Exercise 4

Enhance the book rental library application by implementing various advanced features. Add support for different languages, send email notifications to users, utilize event-driven programming for various actions, and manage file storage for digital assets like book covers or digital copies.


## Installation

- Copy `.env.example` to `.env`: `copy .env.example .env`
- Run `composer install`
- Run `php artisan key:generate --ansi`
- Update database details in `.env`
- Run `php artisan migrate`
- Run `php artisan db:seed --class=GenresTableSeeder`
- Run `php artisan db:seed --class=BooksTableSeeder`

## Admin Account

To create an admin account run:

`php artisan db:seed --class=AdminSeeder`

## Public files

To make public  files accessible run: `php artisan storage:link`

## Sending Emails

- Sign up for [mailtrap.io](https://mailtrap.io/) account and fill `MAIL_*` related details in `.env` file.
- To test email functionality:
  - Email admins on user registration.
  - Email admins on book rental.
  
## Run Application

Run `php artisan serve` or open project from browser: `http://localhost/laravel-project/public`.
  
## Topics:

- [Artisan Console](https://laravel.com/docs/10.x/artisan)
- [Events](https://laravel.com/docs/10.x/events)
- [File Storage](https://laravel.com/docs/10.x/filesystem)
- [Localization](https://laravel.com/docs/10.x/localization)
- [Mail](https://laravel.com/docs/10.x/mail)
- [Task Scheduling](https://laravel.com/docs/10.x/scheduling)
