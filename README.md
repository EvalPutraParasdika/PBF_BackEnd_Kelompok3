# PBF_BackEnd_Kelompok3

## Deskripsi

Repositori ini berisi kode sumber untuk bagian Back-End dari proyek PBF (Proyek Bersama Frontend dan Backend) yang dikembangkan oleh Kelompok 3. Back-End ini dibangun menggunakan framework Laravel PHP.

## Fitur

*   Autentikasi dan otorisasi pengguna
*   Manajemen data (CRUD - Create, Read, Update, Delete)
*   API untuk komunikasi dengan Front-End
*   Dokumentasi API (Postman Collection)


## Teknologi yang Digunakan

*   [CodeIgniter 4](https://codeigniter.com/) - PHP Framework
*   [PHP](https://www.php.net/) - Bahasa Pemrograman
*   [MySQL](https://www.mysql.com/) - Database 
*   [Composer](https://getcomposer.org/) - Dependency Manager
*   [JWT](https://jwt.io/) - JSON Web Token 


## Persyaratan Sistem

*   PHP >= 7.4
*   Composer
*   MySQL / PostgreSQL (atau database lain yang kompatibel dengan Laravel)
*   Web Server (Apache, Nginx)

## Instalasi

1.  Clone repositori ini:

    ```bash
    git clone https://github.com/EvalPutraParasdika/PBF_BackEnd_Kelompok3.git
    ```

2.  Masuk ke direktori proyek:

    ```bash
    cd PBF_BackEnd_Kelompok3
    ```

3.  Install dependencies menggunakan Composer:

    ```bash
    composer install
    ```

4.  Salin file `.env.example` ke `.env` dan konfigurasi pengaturan database:

    ```bash
    cp .env.example .env
    ```

    Edit file `.env` dan sesuaikan pengaturan database (DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD, dll.) sesuai dengan konfigurasi lokal Anda.

5.  Jalankan migrasi database:

    ```bash
    php spark migrate
    ```

6.  Seed database (opsional, jika ada data dummy):

    ```bash
    php spark db:seed
    ```

7.  Jalankan server pengembangan CI4:

    ```bash
    php spark serve
    ```

    Aplikasi akan berjalan di `http://localhost:8080` (atau port lain yang tersedia).

## Konfigurasi

*   **File .env:**  Konfigurasi utama aplikasi disimpan dalam file `.env`.  Pastikan untuk mengkonfigurasi pengaturan database dan pengaturan lainnya sesuai dengan lingkungan Anda.
*   **Konfigurasi Database:**  Pastikan konfigurasi database di file `.env` sesuai dengan pengaturan database lokal Anda.
*   **Variabel Lingkungan:**  Gunakan variabel lingkungan untuk menyimpan pengaturan sensitif seperti kunci API dan kredensial database.

## Penggunaan

*   **API Endpoints:** 
    *   `http://localhost:8080/auth/register` - Mendaftarkan pengguna baru
    *   `http://localhost:8080/auth/login` - Login pengguna
    *   `http://localhost:8080/auth/me` - Cek profil pengguna

    *   `http://localhost:8080/jurusan` - Create & Get data jurusan
    *   `http://localhost:8080/jurusan/(id_jurusan)` - Dellete & Edit data jurusan

    *   `http://localhost:8080/mahasiswa` - Create & Get data Mahasiswa
    *   `http://localhost:8080/mahasiswa/(nim)` - Dellete & Edit data mahasiswa

    *   `http://localhost:8080/pengajuan` - Create & Get data pengajuan
    *   `http://localhost:8080/pengajuan/(id_pengajuan)` - Dellete & Edit data pengajuan

    *   `http://localhost:8080/prodi` - Create & Get data prodi
    *   `http://localhost:8080/pengajuan/(id_prodi)` - Dellete & Edit data prodi

    *   `http://localhost:8080/staff)` - Dellete & Edit data staff
    *   `http://localhost:8080/staff/(NIP)` - Dellete & Edit data staff
    *   
*   **Autentikasi:**  Aplikasi menggunakan JWT untuk autentikasi.  Token JWT harus disertakan dalam header `Authorization` dengan skema `Bearer` untuk mengakses endpoint yang dilindungi.

## Testing

*   Jalankan test dengan PHPUnit:

    ```bash
    php spark test
    ```

## Kontribusi

Kami menerima kontribusi dari siapa saja. Jika Anda ingin berkontribusi, silakan fork repositori ini, buat branch dengan fitur baru Anda, dan kirimkan pull request.

## Anggota Kelompok

*   Eval Putra Parasdika
*   Esnaeni Wulan Andari
*   Adimas Prawit Akbar
*   Khidir Afwan Amlabar

## Lisensi

Repositori ini dilisensikan di bawah Lisensi MIT. Lihat file [LICENSE](LICENSE) untuk informasi lebih lanjut.
