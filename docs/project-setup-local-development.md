## Project Setup & Local Development

This README provides a high‐level overview of getting the project up and running locally, whether you choose **Laravel
Sail**, **Laravel Herd (Free or Pro)**, or **MAMP Pro**. Follow the sections below based on your chosen environment.

---

### Table of Contents

1. [Prerequisites](#prerequisites)
2. [Clone & Basic Installation](#clone--basic-installation)
3. [Environment Bootstrapping (`core:init`)](#environment-bootstrapping-coreinit)
4. [Laravel Sail](#laravel-sail)
5. [Laravel Herd (Free & Pro)](#laravel-herd-free--pro)
6. [MAMP Pro](#mamp-pro)
7. [Common Commands & Tips](#common-commands--tips)

---

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

* **Git** (to clone the repository)
* **PHP 8.4** (compatible with Laravel 12+)
* **Composer** (for PHP dependency management)
* **Node.js ≥ 22 and npm (or Yarn)** (for frontend tooling)
* **Docker & Docker Compose** (only if you plan to use Laravel Sail)
* **Laravel Herd** (macOS; Free or Pro) – if choosing Herd
* **MAMP Pro** (macOS) – if choosing MAMP Pro

> **Note:** You do *not* need all three choices—pick the one that matches your local workflow.

---

## Clone & Basic Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/your‐org/your‐repo.git
   cd your‐repo
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Install JavaScript dependencies & build assets**

   ```bash
   npm ci
   npm run dev
   ```

   Or, if you prefer Yarn:

   ```bash
   yarn install
   yarn dev
   ```

4. **Copy example environment file**
   If not automatically created, ensure you have a `.env` in the project root:

   ```bash
   cp .env.example .env
   ```

---

## Environment Bootstrapping (`core:init`)

We provide a single Artisan command to help you configure your `.env` for whichever local environment you choose. This
command will:

* Generate (or preserve) `APP_KEY`
* Prompt for database & cache settings
* Write correct values into `.env`
* Clear any cached config

Run:

```bash
php artisan core:init
```

* If you don’t pass any flags, you’ll be asked to choose between:

    * **herd‐free** (Herd Free + PostgreSQL)
    * **herd‐pro** (Herd Pro + PostgreSQL + HTTPS)
    * **sail** (Laravel Sail + MySQL + Valkey)
    * **mamp** (MAMP Pro + MySQL)

* To skip the interactive prompt, pass `--env=`:

  ```bash
  php artisan core:init --env=sail
  php artisan core:init --env=herd-free
  php artisan core:init --env=herd-pro
  php artisan core:init --env=mamp
  ```

After running `core:init`, your `.env` will contain the correct `DB_*`, `APP_URL`, and (if using Sail)
`REDIS_CLIENT=valkey` + `VALKEY_*` entries.

---

## Laravel Sail

If you choose **Laravel Sail**, you’ll run everything inside Docker containers. Sail is the recommended approach if you
want an environment that closely mirrors production.

1. **Ensure Docker & Docker Compose are running**.

2. **Run the `core:init` command for Sail**

   ```bash
   php artisan core:init --env=sail
   ```

    * By default, it will configure:

        * `DB_CONNECTION=mysql`
        * `DB_HOST=mysql`, `DB_PORT=3306`
        * `DB_USERNAME=sail`, `DB_PASSWORD=password`
        * `REDIS_CLIENT=valkey`, along with `VALKEY_HOST=valkey`, `VALKEY_PORT=6379`, `VALKEY_PASSWORD=`
        * `APP_URL=http://localhost` (you can override)

3. **Bring up Sail containers**

   ```bash
   ./vendor/bin/sail up -d
   ```

   This command will:

    * Start MySQL at `mysql:3306`
    * Start Valkey (instead of Redis) at `valkey:6379`
    * Spin up PHP, Nginx, and any other configured services

4. **Run migrations & seeders**

   ```bash
   ./vendor/bin/sail artisan migrate --force
   ./vendor/bin/sail artisan db:seed --force
   ```

5. **Access your application**
   Open your browser to `http://localhost` (or whatever you set `APP_URL` to).

6. **Stopping Sail**

   ```bash
   ./vendor/bin/sail down
   ```

   This will tear down all containers.

---

## Laravel Herd (Free & Pro)

**Laravel Herd** (macOS) provides a lightweight native PHP + MySQL/Postgres environment. Use Herd Free for a simple
`.test` domain without TLS, or Herd Pro if you want HTTPS + custom domains.

### 1. Herd Free

1. **Install Herd Free** from laravel.com/desktop if you haven’t already.
2. **Point Herd to this project folder** (e.g. in Herd’s dashboard, add a new site and select your repo directory).
3. **Specify your desired `.test` domain** in Herd’s site settings (e.g. `my-app.test`). Herd Free auto-configs PHP and
   MySQL.
4. **Run `core:init --env=herd-free`**

   ```bash
   php artisan core:init --env=herd-free
   ```

    * Defaults to `DB_CONNECTION=pgsql`, `DB_HOST=127.0.0.1`, `DB_PORT=5432` (PostgreSQL).
    * Asks for database name (e.g. `laravel`), user (e.g. `postgres`), password (often blank).
    * Suggests `APP_URL=http://my-app.test`.
5. **Create / migrate your database**
   Herd Free typically provides a local Postgres instance listening on port 5432. Ensure you’ve created the database
   name you specified in Step 4. Then run:

   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```
6. **Visit your site**
   Open browser to `http://my-app.test`.

### 2. Herd Pro

1. **Install Herd Pro** and create a profile for your app, choosing a custom domain (e.g. `https://my-app.local`). Herd
   Pro will handle TLS for you.
2. **Run `core:init --env=herd-pro`**

   ```bash
   php artisan core:init --env=herd-pro
   ```

    * Defaults to Postgres (`DB_CONNECTION=pgsql`, etc.).
    * Prompts you to enter your Herd Pro URL (e.g. `https://my-app.local`).
3. **Ensure your Postgres database exists** (create via `psql` or a GUI).
4. **Run migrations & seeders**

   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```
5. **Preview in browser**
   Visit `https://my-app.local` (Herd’s TLS layer is already in place).

---

## MAMP Pro

**MAMP Pro** is a popular macOS stack (Apache/PHP/MySQL). This section assumes you have MAMP Pro installed and
configured.

1. **Open MAMP Pro** and create a new Virtual Host, pointing to this project’s folder.
2. **Assign a hostname** (e.g. `my-app.test`) and port (usually `8888` for HTTP, `8889` for MySQL).
3. **Run `core:init --env=mamp`**

   ```bash
   php artisan core:init --env=mamp
   ```

    * Prompts for:

        * `DB_HOST` (default: `127.0.0.1`)
        * `DB_PORT` (default: `8889`)
        * `DB_DATABASE` (e.g. `laravel`)
        * `DB_USERNAME` (e.g. `root`)
        * `DB_PASSWORD` (e.g. `root`)
        * `APP_URL` (e.g. `http://localhost:8888` or your custom hostname)
4. **Start MAMP Pro servers** (Apache & MySQL).
5. **Create / migrate your database**
   In MAMP Pro, open “Tools → phpMyAdmin” (or use `mysql` CLI) to create the database name you specified. Then, from
   your terminal:

   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```
6. **Open your site**
   Visit `http://localhost:8888` (or your chosen hostname) to see the app.

---

## Common Commands & Tips

* **Run Laravel Tinker**

  ```bash
  php artisan tinker
  ```
* **Clear & cache configuration**

  ```bash
  php artisan config:clear
  php artisan config:cache
  php artisan route:clear
  php artisan route:cache
  php artisan view:clear
  php artisan view:cache
  ```
* **Creating a New Migration**

  ```bash
  php artisan make:migration create_foo_table
  ```
* **Generating a New Controller**

  ```bash
  php artisan make:controller FooController
  ```

> **Note:** If you make changes to `.env` outside of `core:init`, run `php artisan config:clear` to pick them up.

---

## Summary

1. **Clone & install dependencies** (`composer install`, `npm ci`, `npm run dev`).
2. **Run** `php artisan core:init` **and choose** `herd-free`, `herd-pro`, `sail`, or `mamp`.
3. **Bring up services**:

    * **Sail** → `./vendor/bin/sail up -d`
    * **Herd Free/Pro** → toggle on the site in Herd’s GUI
    * **MAMP Pro** → click “Start Servers” in MAMP
4. **Create database** (ensure it exists based on your choice)
5. **Run migrations & seeds** (`php artisan migrate --force`, `php artisan db:seed --force`)
6. **Visit your chosen `APP_URL`** and you’re ready to develop!

That’s it—you should now have a fully functional local environment tailored to your preference (Sail, Herd, or MAMP
Pro). Happy coding!
