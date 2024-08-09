# 1. Clone Repository
git clone https://github.com/username/repo-name.git
cd repo-name

# 2. Install Dependencies
composer install
npm install
npm run dev

# 3. Buat File Environment
cp .env.example .env

# 4. Generate Application Key
php artisan key:generate

# 5. Setup Database
# Buat database baru di MySQL dan konfigurasikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di file `.env`.

# 6. Migrasi & Seed Database
php artisan migrate --seed

# 7. Jalankan Server Lokal
php artisan serve

# 8. Akses Aplikasi
# Buka browser dan akses `http://localhost:8000`.
