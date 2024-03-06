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

5. Configure a shell alias for Sail:
    ```bash
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
    ```
6. Start sail
    ```bash
    sail up -d
    ```
7. install npm
    ```bash
    sail npm install
    ```
8. **Generate an application key:**

    ```bash
    sail artisan key:generate
    ```
9. To seed questions, responses and users

    ```bash
    sail artisan migrate --seed
    ```
10. Start npm

    ```bash
    sail npm run dev
    ```

10. If you want to use the app as a admin user:
    email: admin@example.com
    password: 12345678
`
