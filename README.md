# Suwasarana - Donation Management System

## Overview

Suwasarana is a web-based donation management platform built with PHP, designed to simplify the process of accepting and tracking donations. The system provides an intuitive interface for users to contribute, integrates email confirmations, and ensures a responsive user experience.

## 🌟 Features

- **Seamless Donation Submission**: Easy-to-use donation form
- **Email Notifications**: Automatic confirmation emails via PHPMailer
- **Responsive Design**: Fully compatible across devices
- **Robust Error Handling**: Graceful management of system errors

## 📋 Prerequisites

### Software Requirements

- **XAMPP** (Apache, PHP, MySQL)
  - PHP 7.4 or later
  - MySQL 8.0
- **PHPMailer** (included in the project)

## 🚀 Installation Guide

### Step 1: Install XAMPP

1. Download XAMPP from [Apache Friends](https://www.apachefriends.org/download.html)
2. Install and launch XAMPP Control Panel
3. Start Apache and MySQL services

### Step 2: Set Up Database

1. Open [phpMyAdmin](http://localhost/phpmyadmin)
2. Create a new database (`suwasarana`)
3. Import the provided database structure (if available)

### Step 3: Configure Application

1. Extract project to XAMPP `htdocs` directory
2. Update `connection.php` with your database credentials:
   ```php
   <?php
   $host = 'localhost';
   $user = 'root';
   $password = '';
   $database = 'suwasarana';
   ?>
   ```

### Step 4: Launch Application

1. Navigate to `http://localhost/Suwasarana`
2. Test donation functionality

## 📂 Project Structure

### PHP Files
- `index.php`: Main application entry point
- `connection.php`: Database connection handler
- `addDonationProcess.php`: Donation submission logic
- `donation.php`: Donation management
- `Error.php`: Error handling
- `handler.php`: Event processing
- `success.php`: Success message display

### Email Integration
- Located in `email/` directory
- Uses PHPMailer for email functionality

### Frontend Assets
- **CSS**:
  - Bootstrap framework
  - Custom stylesheets
- **JavaScript**:
  - Bootstrap interactivity
  - Custom scripts

## 🛠 Troubleshooting

### Common Issues
- Ensure Apache (port 80) and MySQL (port 3306) are available
- Verify database connection credentials
- Enable PHP error reporting in `php.ini`

## 🔮 Future Enhancements

- User authentication system
- Admin dashboard for donation management
- Performance query optimization

## 📄 License

This project is licensed under the MIT License. See `LICENSE` file for details.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📬 Contact

For support or inquiries, please open an issue in the GitHub repository.
