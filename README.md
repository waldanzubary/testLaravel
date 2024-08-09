# Test Laravel Project

This is a test Laravel project repository. Follow the steps below to set up and run the project on your local machine.

## Prerequisites

Ensure you have the following installed on your system:

- **PHP >= 8.0**
- **Composer**
- **MySQL** (or any other compatible database)
- **Git**


# 1. Clone Repository
```https://github.com/waldanzubary/testLaravel.git```

# 2. Install Dependencies
composer install


# 3. Buat File Environment
cp .env.example .env


# 4. Setup Database
# Buat database baru di MySQL dan konfigurasikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di file `.env`.

# 5. Migrasi 
php artisan migrate 

# 6. Jalankan Server Lokal
php artisan serve

# 7. Akses Aplikasi
# Buka browser dan akses `http://127.0.0.1:8000/customers`.
