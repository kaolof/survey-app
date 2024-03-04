# Survey App

## Introduction

This project is built using Laravel 9, a popular PHP framework for web development. Follow the steps below to set up and run the project locally.

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:

- [PHP](https://www.php.net/) (8)
- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/kaolof/survey-app.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd survey-app
    ```

3. **Install dependencies using Composer:**

    ```bash
    composer install
    ```

4. **Copy the `.env.example` file and rename it to `.env`:**

    ```bash
    cp .env.example .env
    ```

5. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

6. **Configure your `.env` file with appropriate settings such as database credentials.**

7. **If the project uses a database, create a new database and update the `.env` file with the necessary database information.**

8. **Run the migrations and seed the database (if applicable):**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```
# Installing Sail Into Existing Applications

If you are interested in using Sail with an existing Laravel application, you may simply follow these steps:

1. Install Sail using the Composer package manager:
    ```bash
    composer require laravel/sail --dev
    ```

2. After Sail has been installed, run the `sail:install` Artisan command. This command will publish Sail's `docker-compose.yml` file to the root of your application:
    ```bash
    php artisan sail:install
    ```

3. Finally, you may start Sail:
    ```bash
    ./vendor/bin/sail up
    ```

For more information on how to use Sail, please continue reading the remainder of this documentation.

# Laravel Breeze Installation

1. Create a new Laravel application and configure your database.
2. Install Laravel Breeze using Composer:

    ```bash
    composer require laravel/breeze --dev
    ```

3. Scaffold your application with the Blade stack:

    ```bash
    php artisan breeze:install
    ```

4. Run database migrations:

    ```bash
    php artisan migrate
    ```

5. Install frontend dependencies and compile assets:

    ```bash
    npm install && npm run dev
    ```

For more information, refer to the [official documentation](https://laravel.com/docs/breeze).

# Laravel Permission Installation

## Installation

1. **Consult Prerequisites**: Refer to the [Prerequisites page](link_to_prerequisites_page) for important considerations regarding your User models.

2. **Composer Installation**: You can install the package via Composer:

    ```bash
    composer require spatie/laravel-permission
    ```

3. **Publish Migration and Config File**: Publish the migration and the `config/permission.php` config file:

    ```bash
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    ```

    Note: If you already have a `permission.php` file, you must rename or remove it.

    Before running migrations, make sure you have completed any necessary steps mentioned in the Advanced section of the documentation for UUIDs.


4. **Clear Configuration Cache**: Clear your config cache to ensure access to the permission config settings:

    ```bash
    php artisan optimize:clear
    # or
    php artisan config:clear
    ```

5. **Run Migrations**: After the config and migration have been published and configured, create the tables for this package by running:

    ```bash
    php artisan migrate
    ```

