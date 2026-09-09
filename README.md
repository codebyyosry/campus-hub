# Campus Hub — Campus Request & Resource Booking Platform

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-B73BFE?style=for-the-badge&logo=vite&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)
![License](https://img.shields.io/badge/License-Open--Source-green?style=for-the-badge)

[![Stars](https://img.shields.io/github/stars/codebyyosry/campus-hub?style=for-the-badge&color=yellow)](https://github.com/codebyyosry/campus-hub/stargazers)
[![Forks](https://img.shields.io/github/forks/codebyyosry/campus-hub?style=for-the-badge&color=blue)](https://github.com/codebyyosry/campus-hub/network/members)
[![Last Commit](https://img.shields.io/github/last-commit/codebyyosry/campus-hub?style=for-the-badge&color=orange)](https://github.com/codebyyosry/campus-hub/commits/main)
[![Issues](https://img.shields.io/github/issues/codebyyosry/campus-hub?style=for-the-badge&color=red)](https://github.com/codebyyosry/campus-hub/issues)

A centralized enterprise platform engineered to streamline campus operational workflows, process support requests with interactive threaded comments, and manage resource bookings seamlessly. Built with **Laravel 11**, **Laravel Breeze**, and **Tailwind CSS**.

---

## 🚀 Project Overview & Features

- **Support Requests:** Submit, track, and administer campus maintenance or administrative help tickets with state tracking and updates.
- **Threaded Discussions:** Engage in targeted discussions, exchange clarifications, and log progress notes directly inside individual ticket views.
- **Resource Bookings:** Reserve labs, equipment, conference rooms, and campus amenities with structured scheduling and approval pipelines.
- **Robust Authentication:** Secure login, registration, password resets, and email verification powered by Laravel Breeze.

---

## 🛠️ Technical Stack & Architecture

- **Backend Framework:** Laravel 11 (Routing, Eloquent ORM, Middleware Protection)
- **Authentication:** Laravel Breeze
- **Frontend:** Blade Templating, Tailwind CSS, Vite asset compiler
- **Database & Testing:** SQLite / MySQL, PHPUnit feature testing suite

---

## 📋 Platform Routes & Navigation Map

| Endpoint / Path    | Controller / Action             | Middleware Protection | Description                                                                |
| :----------------- | :------------------------------ | :-------------------- | :------------------------------------------------------------------------- |
| `/`                | Welcome View (Readme)           | `Public`              | Project introduction, routes reference, and quick authentication triggers. |
| `/dashboard`       | DashboardController@index       | `auth`, `verified`    | Real-time metrics, active bookings summary, and request tracking overview. |
| `/requests`        | SupportRequestController@index  | `auth`                | Browse and filter campus support tickets and maintenance requests.         |
| `/requests/create` | SupportRequestController@create | `auth`                | Form interface to raise a new support issue or request help.               |
| `/requests/{id}`   | SupportRequestController@show   | `auth`                | View detailed request description, status updates, and threaded comments.  |
| `/bookings`        | ResourceBookingController@index | `auth`                | Overview of campus resource allocations, rooms, and equipment schedules.   |
| `/profile`         | ProfileController@edit          | `auth`                | Manage user credentials, security passwords, and account termination.      |

---

## ⚙️ Local Setup & Installation Instructions

Follow these steps to set up and run Campus Hub locally on your machine:

### 1. Clone the Repository

```bash
git clone https://github.com/codebyyosry/campus-hub.git
cd campus-hub
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

Copy the example environment configuration file and generate your application key:

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Local Database

Open your `.env` file and configure your database connection. By default, Laravel uses SQLite for lightweight local setups:

```env
DB_CONNECTION=sqlite
```

_(If you are using MySQL or PostgreSQL, update the `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` variables accordingly)._

If using SQLite, ensure the database file exists:

```bash
touch database/database.sqlite
```

### 5. Run Database Migrations & Seeders

Run the migration and seeding commands to construct the database schema and prepopulate testing credentials:

```bash
php artisan migrate --seed
```

### 6. Install Frontend Dependencies & Compile Assets

```bash
npm install
npm run dev
```

_(Keep `npm run dev` running in a separate terminal window to compile Tailwind CSS assets via Vite)._

### 7. Start the Local Development Server

Open another terminal window and start the Laravel local server:

```bash
php artisan serve
```

Access your application in your browser at `http://127.0.0.1:8000`.

---

## 🧪 Running Tests

To execute the test suite and ensure all features pass successfully:

```bash
php artisan test
```

---

## 📄 License

This project is open-source software.
