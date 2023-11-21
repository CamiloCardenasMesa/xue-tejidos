
# About

Xue Tejidos is an online store in development built using the TALL Stack (Tailwind CSS, Alpine, Laravel and Liverwire).
It includes the following features:

- Product and category management.
- User administration with their roles and permissions.
- Forum panel
- Post section.

## Requirements
- PHP: ^8.0.2 `required`
- MYSQL 5.7+ `required`

## If you want to see the progress you can follow the steps below

## Installation

- Clone the repository:
```bash
$ git clone https://github.com/CamiloCardenasMesa/xue-tejidos.git
```
- Enter the repository folder:
```bash
$ cd xue-tejidos
```
- If you want to access the entire development history, use the command:
```bash
$ git fetch --all
```
- Install PHP dependencies through the [composer](https://getcomposer.org/download/) package manager:
```bash
$ composer install
```
- Install NodeJS dependencies using the [npm](https://nodejs.org/es/) package manager:
```bash
$ npm install
```
## Configuration

- Copy the .env.example file to .env and env.testing, and then add each environment variable:

`DB_USERNAME` Database username.  
`DB_PASSWORD` Database Password.  
`MAIL_USERNAME` Mailtrap username for testing.  
`MAIL_PASSWORD` Mailtrap password for testing.  
`MAIL_FROM_ADDRESS` System Email.  

- Generate the application key:
```bash
$ php artisan key:generate
```
- Migrate and seed the database:
```bash
$ php artisan migrate --seed
```
- Create the connection between the public and storage directories:
```bash
$ php artisan storage:link
```
- Start the Laravel development server:
```bash
$ php artisan serve
```
- Open another terminal and navigate to your project directory. Then, run:
```bash
$ npm run dev
```
## Finally,  register and log in. 

## Contributions

You can make your contributions through pull requests. For significant changes, please create an ISSUE first.  

Make sure to update the tests accordingly.

## License

**XueTejidos**  is a project under the MIT license. [MIT license](https://opensource.org/licenses/MIT).