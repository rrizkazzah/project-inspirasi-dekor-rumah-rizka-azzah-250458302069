## Deskripsi Website 
Website inspirasi dekor rumah ini dibuat untuk memberikan kemudahan bagi pengguna dalam mencari berbagai ide dekorasi hunian secara digital. Melalui kumpulan konten yang tertata, pengguna dapat menemukan referensi desain yang sesuai dengan kebutuhan dan selera mereka. Selain itu, website ini juga menyediakan wadah bagi pengguna untuk membagikan inspirasi dan ide dekorasi mereka sendiri, sehingga tercipta ruang berbagi yang interaktif dan saling menginspirasi antar pengguna.

## Fitur Utama 
1. Simpan ke favorite
2. Sistem like gambar
3. Sistem komentar pada gambar
4. filter (terbaru – terlama)
5. Unggah inspirasi (upload ide mereka)
6. Moderasi unggahan user (tolak atau terima unggahannya)
7. Pencarian inspirasi 
8. Laporkan Gambar
9. Arahan chat wa
10. Testimoni 

## Teknologi yang digunakan 

- Tailwind CSS
Framework CSS utility-first untuk membuat tampilan website yang responsif, modern, dan mudah dikustomisasi.
- Alpine.js
JavaScript framework ringan untuk menambahkan interaktivitas sederhana di front-end tanpa perlu library besar seperti Vue atau React.
- Laravel
Framework backend PHP yang digunakan untuk membangun keseluruhan logika aplikasi, routing, controller, model, dan database.
- Livewire
Library Laravel untuk membuat komponen UI yang interaktif tanpa perlu menulis JavaScript secara manual. Menghubungkan frontend dan backend secara realtime.

## Cara Instalasi 
1. Konfigurasi Database
Buka file .env lalu sesuaikan pengaturan database kamu, misalnya:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
Pastikan kamu juga sudah membuat database-nya di phpMyAdmin atau MySQL.
________________________________________
2. Migrasi Database
Setelah konfigurasi benar, jalankan:
php artisan migrate
Jika ingin sekaligus mengisi data awal (seeder):
php artisan db:seed
Atau menjalankan keduanya sekaligus:
php artisan migrate --seed
________________________________________
3. Jalankan Server Laravel
Setelah database siap, jalankan aplikasi:
php artisan serve
Akses di browser:
http://127.0.0.1:8000

