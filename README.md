# Shorty - URL Shortener

Shorty is a Laravel-based URL shortener application. This guide will help you set up the project locally for development and testing.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

-   [PHP](https://www.php.net/) (version 8.1 or higher)
-   [Composer](https://getcomposer.org/)
-   [Node.js](https://nodejs.org/) (version 16 or higher)
-   [npm](https://www.npmjs.com/) (comes with Node.js)
-   [MySQL](https://www.mysql.com/) or any other database supported by Laravel
-   [Laravel CLI](https://laravel.com/docs/10.x/installation) (optional but recommended)

## Installation

Follow these steps to set up the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/shorty.git
cd shorty
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Set Up Environment Variables

Update the .env file with your local environment configuration, such as database credentials:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shorty
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Run Database Migrations

```bash
php artisan migrate
```

### 6. Start the Development Server

```bash
php artisan servre
```

# Happy Shortenning (if it is a word)!
