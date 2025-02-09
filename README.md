# Contact Sources Management

## Overview
This project is a CRM system built with Laravel Breeze and Tailwind CSS. It allows admins to manage leads, contacts, and contact sources. Contacts can be created dynamically from different sources, such as user registrations and admin-created leads.

## Features
- Admin can create, update, and delete contact sources.
- Contacts are created automatically when a customer registers or an admin adds a lead.
- Admin has full control over leads (adding, editing, deleting).
- Frontend users can submit their contact details, which are saved into the system.
- The system follows a repository pattern to manage contacts efficiently.

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/muhammed-fasil-k-k/laravel.git
   cd project_directory
   ```
2. Install dependencies:
   ```sh
   composer install
   composer require laravel/breeze --dev
   npm install && npm run dev
   ```
3. Set up the environment file:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure the database in `.env`, then run:
   ```sh
   php artisan migrate
   ```
5. Start the application:
   ```sh
   php artisan serve
   php artisan breeze:install
   php artisan migrate
   ```

## Future Enhancements
- **Adding new sources dynamically:**
    - To add a new source, create a new entry in the `contact_sources` table.
    - Update the validation rules in `ContactService` to include the new source.
    - Update the UI to allow source selection.
    - Ensure new source contacts are processed through the repository.
- **API Integration:**
    - In the future, an API could be added for third-party integration to store leads.
- **Unit Testing:**
    - PHPUnit tests should be added to verify the functionality of repositories, controllers, and services.

## Authentication & Authorization
- Laravel Breeze is used for authentication.
- Middleware ensures that only admins can create, update, or delete records.

## Conclusion
This system provides a structured way to manage contacts. The repository pattern helps maintain clean code and reusability, making it easier to expand in the future.

