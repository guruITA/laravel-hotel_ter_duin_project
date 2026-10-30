# Hotel ter Duin: room booking website in Laravel

Hotel ter Duin is a small hotel booking website built with Laravel 8. The pages are in Dutch. Guests book a room and get an invoice, and staff log in to manage bookings and rooms. Gurpreet Singh made it as a school project to practise Laravel.

- **Team:** Gurpreet Singh, with a few test commits by sultan-710
- **Period:** March to April 2023

## What it does

- **Guests** pick a start and end date and time. The site shows the rooms that are free in that period. The guest fills in name, email and phone number and books a room. The invoice page shows the booking and the total price (price per day times the number of full days).
- **Staff** log in and see all bookings. They can view, edit and delete a booking. They can add a room with a photo, and edit or delete a room. A room that still has a booking cannot be deleted.
- Staff can create a new account at `/register` and set a new password at `/forgot-password`.

## What is where

| Path | Contents |
| --- | --- |
| `routes/web.php` | All page addresses |
| `app/Http/Controllers/KlantController.php` | Guest pages: dates, free rooms, booking, invoice |
| `app/Http/Controllers/AdminController.php` | Staff pages: login, bookings, rooms |
| `app/Http/Middleware/checkLogin.php` | Sends visitors who are not logged in to `/login` |
| `resources/views/Klant/` | Guest page templates |
| `resources/views/Admin/` | Staff page templates |
| `database/hotel-ter-duin.sql` | The hotel tables and sample data (rooms, guests, bookings, staff) |
| `public/uploads/` | Room photos. New photos from the staff pages are saved here. |
| `docker-compose.yml`, `docker/` | The Docker setup: a PHP 8.1 container and a MariaDB container |
| `tests/` | The PHPUnit tests |

The planet, solar system and phone models in `app/Models` and `public/css/images` are left over from earlier exercises. The site does not use them.

## What you need

- [Git](https://git-scm.com/)
- Docker with Docker Compose v2. On Windows and macOS that is [Docker Desktop](https://www.docker.com/products/docker-desktop/). Tested with Docker 29.1.3 and Docker Compose 2.40.3 on Linux.
- Port 8000 must be free.

You do not need PHP, Composer, Node.js or MySQL on your own computer. The containers use PHP 8.1 (tested with 8.1.34), Composer 2 (tested with 2.11.0) and MariaDB 10.11 (tested with 10.11.19).

## Getting started

The commands below are the same in Windows PowerShell, unless a step says otherwise.

### 1. Clone the repository

```bash
git clone https://github.com/guruITA/laravel-hotel_ter_duin_project.git
cd laravel-hotel_ter_duin_project
```

### 2. Create the settings file

```bash
cp .env.example .env
```

The settings in `.env.example` already point to the database container. You do not have to change anything.

### 3. Start the containers

```bash
docker compose up -d --build
```

On Linux, check your user id with `id -u` first. If it is not 1000, start with `HOST_UID=$(id -u) docker compose up -d --build` instead. Then the files that the container writes stay yours.

The first start takes a few minutes. The database container loads `database/hotel-ter-duin.sql`. The app container installs the PHP packages, creates the app key in `.env`, runs the migrations and starts the web server. Follow the progress with:

```bash
docker compose logs -f app
```

The site is ready when you see `Development Server (http://0.0.0.0:8000) started`. Press Ctrl+C to stop following the log. The site keeps running.

### 4. Book a room as a guest

Open http://localhost:8000. You land on the date page.

1. Pick a start and an end date and time, and click "Kamers bekijken".
2. Click "Kamer bestellen" next to a room.
3. Fill in a name, email and phone number, and click "Bestellen".
4. The invoice page shows the booking and the total price.

### 5. Log in as staff

Open http://localhost:8000/login and log in with:

- Username: `admin`
- Password: `hotel123`

You now see all bookings. "Kamer toevoegen" opens the room page, where you add, edit and delete rooms. The two other staff accounts in the sample data (`Gurpreet` and `Gurpreet1`) have unknown passwords.

Laravel Telescope runs at http://localhost:8000/telescope. It shows every request and database query, which helps when something goes wrong.

### 6. Stop or reset

Stop the containers:

```bash
docker compose down
```

The bookings and rooms stay in the database for the next start. To start over with the sample data, remove the database as well:

```bash
docker compose down -v
```

Photos you added stay in `public/uploads/`.

## Tests

Run the tests while the containers are running:

```bash
docker compose exec app php artisan test
```

There are two tests. One checks that the home page sends guests to the date page. The other is the Laravel example unit test.

## Who did what

- **Gurpreet Singh:** all the work in `main`. That is the guest booking flow and invoice, the staff login, registration and password reset, the booking and room management with photo upload, and the database.
- **sultan-710:** test commits to `app/Http/Controllers/Controller.php` on the `controller` branch (pull request #4) and the `homepage` branch. That work is not part of `main`.
