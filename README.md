# 🚗 CarDekho Clone — Backend

A RESTful API backend for a CarDekho-inspired car listing platform, built with **Laravel 12** and **PHP 8.2+**. Supports car listings, brand management, user authentication, and contact form functionality.

---

## 🛠️ Tech Stack

| Technology | Version |
|---|---|
| PHP | ^8.2 |
| Laravel | ^12.0 |
| Authentication | Laravel Sanctum |
| Database | SQLite (default) / MySQL |
| Storage | Local / AWS S3 |

---

## ✨ Features

- 🔐 User Registration & Login (Laravel Sanctum token-based auth)
- 🚘 Car Listings — Add, View, Filter by Type, Delete
- 🏷️ Brand Management — List and Add brands
- 📩 Contact Form — Submit and View contact messages
- 🛡️ Admin Panel Routes with middleware protection
- 🗑️ Soft Deletes support

---

## 📁 Project Structure

```
carDekho-clone-backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin-specific controllers
│   │   │   ├── AuthController.php
│   │   │   ├── CarController.php
│   │   │   ├── BrandController.php
│   │   │   └── ContactController.php
│   │   └── Middleware/
│   │       └── AdminAuth.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Car.php
│   │   ├── Brand.php
│   │   └── Contact.php
│   └── Providers/
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   └── api.php
├── public/
│   └── images/
├── .env.example
└── composer.json
```

---

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/carDekho-clone-backend.git
cd carDekho-clone-backend
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

By default, the project uses **SQLite**. Edit `.env` if you want to use MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cardekho_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Start the Server

```bash
php artisan serve
```

The API will be available at: `http://localhost:8000`

---

## 📡 API Endpoints

### Auth

| Method | Endpoint | Description | Auth Required |
|---|---|---|---|
| POST | `/api/register` | Register new user | No |
| POST | `/api/login` | Login user | No |
| POST | `/api/logout` | Logout user | ✅ Yes |

### Cars

| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/cars` | Get all cars |
| GET | `/api/cars/{type}` | Get cars by type |
| GET | `/api/cars/type/{type}` | Get cars by type (alt route) |
| POST | `/api/cars` | Add a new car |
| DELETE | `/api/cars/{id}` | Delete a car |

### Brands

| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/brands` | Get all brands |
| POST | `/api/brands` | Add a new brand |

### Contact

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/contact` | Submit a contact message |
| GET | `/api/contact` | Get all contact messages |

---

## 🔑 Authentication

This project uses **Laravel Sanctum** for token-based API authentication.

After login, include the token in request headers:

```
Authorization: Bearer YOUR_TOKEN_HERE
```

---

## ⚙️ Environment Variables

Key variables to configure in `.env`:

```env
APP_NAME=Laravel
APP_ENV=local
APP_URL=http://localhost

DB_CONNECTION=sqlite   # or mysql

FILESYSTEM_DISK=local  # or s3 for AWS

MAIL_MAILER=log        # configure for real email
```

Refer to `.env.example` for the full list.

---

## 🧪 Running Tests

```bash
php artisan test
```

---

## 📦 Requirements

- PHP >= 8.2
- Composer
- SQLite (default) or MySQL/MariaDB

---

## 🤝 Contributing

Pull requests are welcome! For major changes, please open an issue first.

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
