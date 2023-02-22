<!-- info -->
Laravel versi 7
PHP versi 7.4

<!-- langkat langkah instalasi -->
1. git clone https://github.com/agungkusaeri9/msib4-day3.git
2. masuk ke direktori msib4-day3 dan ketikan "composer install"
3. copy fil .env.example dan paste kemudian rename yang sudah di copy menjadi .env
4. sesuaikan konfigurasi database
5. ketikan "php artisan key:generate"
6. ketikan "php artisan migrate --seed"
7. ketika "php artisan serve"
8. buka browser lalu ketikan 127.0.0.1:8000 dan login sebagai superadmin
    username : superadmin
    password : superadmin
9. atau bisa langsung import databasenya


<!-- update tugas day 4 -->
Untuk tugas day 4 ini, saya memakai repo yang sebelumnya yakni yang day ke 3 dikarenakan biar tidak banyak folder/repo.
pertanyaannya gimana cara melihat tugas day 4?
untuk melihat tugas day 4 di halaman admin saya sudah membuat nama menu day 4, yang di kategori menu tersebut itu tugas tugas yang berhubungan dengan pertemuan day 4.
untuk melakukan update jika sebelumnya sudah melakukan kloning, bisa mengikuti langkah berikut:
1. ketikan "php artisan migrate" di terminal/cmd
2. ketikan "php artisan db:seed --class=ProductTableSeeder" untuk membuat 5 data
