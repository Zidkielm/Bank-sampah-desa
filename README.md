# Bank Sampah Sumber Pawana

Bank Sampah Sumber Pawana adalah aplikasi manajemen bank sampah berbasis web yang dibangun menggunakan Laravel dan Tailwind CSS. Aplikasi ini mendukung pengelolaan data nasabah, transaksi setoran dan penarikan sampah, iuran bulanan, serta notifikasi WhatsApp untuk penjemputan sampah.

## Fitur Utama

-   **Manajemen Nasabah**: Tambah, edit, dan hapus data nasabah.
-   **Transaksi Setoran & Penarikan**: Catat setoran dan penarikan sampah dengan detail jenis, berat, dan harga.
-   **Iuran Bulanan**: Kelola pembayaran iuran bulanan nasabah.
-   **Dashboard Role-based**: Tampilan dashboard berbeda untuk Admin, Petugas, dan Nasabah.
-   **Notifikasi WhatsApp**: Nasabah dapat mengirim notifikasi penjemputan sampah ke petugas via WhatsApp.
-   **Laporan & Statistik**: Rekap data transaksi, saldo, dan statistik sampah.

## Teknologi

-   **Backend**: Laravel
-   **Frontend**: Blade, Tailwind CSS, Alpine.js
-   **Database**: MySQL
-   **Autentikasi**: Laravel Jetstream & Fortify

## Instalasi

1. Clone repository:
    ```bash
    git clone <repo-url>
    cd bank-sampah
    ```
2. Install dependencies:
    ```bash
    composer install
    npm install
    ```
3. Copy file environment:
    ```bash
    cp .env.example .env
    ```
4. Konfigurasi database dan variabel lain di file `.env`.
5. Generate key dan migrate database:
    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```
6. Build assets:
    ```bash
    npm run build
    ```
7. Jalankan server:
    ```bash
    php artisan serve
    ```

## Struktur Folder Penting

-   `app/Models` : Model Eloquent (User, Deposit, Withdrawal, MonthlyFee, dsb)
-   `app/Http/Controllers` : Controller aplikasi
-   `resources/views` : Blade templates (dashboard, sidebar, dsb)
-   `routes/web.php` : Routing aplikasi web

## Kontribusi

Pull request dan issue sangat terbuka untuk pengembangan lebih lanjut.

## Lisensi

Aplikasi ini menggunakan lisensi MIT.
