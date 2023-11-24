# Hospital-Management-System

## Overview

The Hospital Management System is a web application built using Laravel, designed to streamline the management and operation of a hospital or healthcare facility.

## Features

- **Patient Management**: Register and manage patient records.
- **Appointment Scheduling**: Schedule and manage appointments for doctors and patients.
- **Doctor Management**: Add, update, and manage information about doctors.
- **User Authentication and Authorization**: Secure access with role-based authentication.

## Technologies Used

- **Laravel**: The PHP web framework used for backend development.
- **MySQL**: Database management system for storing application data.
- **Bootstrap**: Frontend framework for responsive and modern user interfaces.

## Prerequisites

- [PHP](https://www.php.net/) installed on your server.
- [Composer](https://getcomposer.org/) for Laravel package management.
- [Xampp](https://www.apachefriends.org/) for cross platform web server
- [Node.js](https://nodejs.org/) for frontend asset compilation.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/hospital-management.git
2. Install dependencies:

   ```bash
   cd hospital-management
   composer install
   npm install

3. Configure environment variables:

   ```bash
   cp .env.example .env

4. Run migrations and seed the database:

   ```bash
   php artisan migrate --seed

5. Compile frontend assests

   ```bash
   npm run dev

6. Start development server

   ```bash
   php artisan serve



