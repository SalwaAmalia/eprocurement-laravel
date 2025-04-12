Sistem E-Procurement sederhana

* Fitur Utama
- Containerized menggunakan Docker & Docker Compose
- Login & Register
- Pencarian dan Filter Produk
- Admin -> mengelola daftar vendor, verifikasi akun vendor, dan menyetujui RFQ buyer.
- Vendor -> mengelola produk (CRUD), dan menyetujui Purchase Order yang telah dibuat oleh admin setelah RFQ buyer disetujui.
- Buyer -> membuat RFQ dari katalog produk yang ditampilkan di sistem.

* Teknologi yang Digunakan
- PHP 8.2 + Laravel (Backend)
- HTML + JavaScript (Frontend)
- MySQL 8.0 (Database)
- Docker & Docker Compose

* Cara Menjalankan (Dev Environment)
- Clone Repository -> git clone https://github.com/SalwaAmalia/eprocurement-laravel.git
- cd eprocurement-laravel
- Copy .env dan sesuaikan
- cp .env.example .env
- Jalankan Docker Compose -> docker-compose up --build -d
- Install Dependency Laravel
  - docker exec -it laravel-app composer install
  - docker exec -it laravel-app php artisan migrate --seed