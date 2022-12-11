# GET-TICKET

### Platform is a platform that allows users to sell event tickets online. The admin is responsible for adding the tickets to the site, and then the user can add them to their cart and make payment.

## Tech Stack

**Client:** BladePHP, TailwindCSS

**Server:** PHP, Laravel, MySql

## Run Locally

Clone the project

```bash
  git clone https://github.com/MuhammadFahimulHuq/getticket.git
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
 composer install
```

Install npm dependencies

```bash
 npm install
```

Create a copy of your .env file

```bash
cp .env.example .env
```

Generate an app encryption key

```bash
php artisan key:generate
```

Add database information into your .env

Migrate the database

```bash
php artisan migrate
```

Run the server

```bash
php artisan serve
```
