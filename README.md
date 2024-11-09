# Car Catalog Project

This is a Laravel 10 project with Vue.js 3 and Tailwind CSS 3 for a car catalog application. The project includes a database of cars with attributes such as brand, model, year, price, engine type, drive type, and images. The catalog page allows users to filter cars by these characteristics, with pagination, results per page, and slider-based filtering for price and year.

## Requirements

- PHP 8.1+
- Composer
- Node.js & npm
- MySQL or another compatible database

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/amalya-shaghat/car-catalog.git
    cd car-catalog
    ```

2. **Install PHP dependencies**:
    ```bash
    composer install
    ```

3. **Install JavaScript dependencies**:
    ```bash
    npm install
    ```

4. **Set up environment variables**:
    - Copy `.env.example` to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Update `.env` with your database configuration and other necessary settings.

5. **Generate the application key**:
    ```bash
    php artisan key:generate
    ```

## Database Setup

1. **Run migrations to create the database tables**:
    ```bash
    php artisan migrate
    ```

2. **Seed the database with car data**:
    ```bash
    php artisan db:seed
    ```

## Development Server

1. **Run the Laravel development server**:
    ```bash
    php artisan serve
    ```

2. **Run Vite for asset bundling**:
    ```bash
    npm run dev
    ```

    - This will start Vite in development mode, which compiles your assets and watches for changes.

## Additional Commands

- **Compile assets for production**:
    ```bash
    npm run build
    ```

- **Run database migrations with rollback if needed**:
    ```bash
    php artisan migrate:rollback
    ```

- **Clear Laravel caches** (useful if you encounter issues with routes or configuration caching):
    ```bash
    php artisan optimize:clear
    ```

## Project Structure

- **Database Migrations**: Define the structure of the `cars` table in `database/migrations`.
- **Factories**: Located in `database/factories` to generate random car data for seeding.
- **Seeders**: Located in `database/seeders` to populate the database with sample car data.
- **Frontend Components**: Vue.js components are in `resources/js/components`.
- **CSS and Styles**: Tailwind CSS is configured in `tailwind.config.js` and styles are in `resources/css`.

## Features

- Filter cars by brand, model, engine type, drive type, price, and year.
- URL parameter persistence for filter options.
- Pagination with selectable results per page.
- Responsive design with Tailwind CSS 3.

## Notes

- Ensure your `.env` file has the correct database credentials.
- If you encounter any issues, use `php artisan optimize:clear` to clear cached routes, views, and configurations.
