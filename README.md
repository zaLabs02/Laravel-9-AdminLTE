<p align="right">
بِسْــــــــــــــمِ اللَّهِ الرَّحْمَنِ الرَّحِيم 
</p>

# Laravel 9 + Admin LTE

Laravel Admin Starter project dengan AdminLTE v3.

## Apa aja yang ada didalam?
- Laravel ^9.x
- Laravel UI untuk auth ^3.4
- Laraindo untuk localization(locale) indonesian [^1.0](https://github.com/afrizal423/laraindo)

## Fitur apa saja?
- Admin LTE admin theme
- Register, Login, Forgot Password, Reset Password by default dengan Laravel UI dengan tema Admin LTE
- User Management (update profile user)
- ~~Role~~ **(u can custom it)**
- Profile

## Cara penggunaan
- Simple
    - Jalankan perintah dibawah ini untuk memulai project baru
        ```shell
        composer create-project afrizalmy/laravel9-adminlte:dev-master <nama_project>
        ```
        Ubah *nama_project* sesuai yang diinginkan.
     - Silahkan isi yang valid di variabel env pada DB_DATABASE, DB_USERNAME, dan DB_PASSWORD dengan konfigurasi yang kamu punya
     - Jalankan server dengan ```php artisan serve```

- Advanced (tidak memakai composer)
    - Download [repository ini](https://github.com/zaLabs02/Laravel-9-AdminLTE/archive/refs/heads/master.zip).
    - Silahkan copy ```.env.example``` menjadi ```.env```. Contoh penggunaan command linux ```cp .env.example .env```
    - Silahkan isi yang valid di variabel env pada DB_DATABASE, DB_USERNAME, dan DB_PASSWORD dengan konfigurasi yang kamu punya
    - Jalankan ```php artisan key:generate``` untuk membuat unique key aplikasi
    - Jalankan ```php artisan storage:link``` untuk membuat symlink direktori.
    - Jalankan server dengan ```php artisan serve```

## Terima Kasih Kepada
- AdminLTE
- [Taylor Ottwell](https://github.com/taylorotwell) for Laravel.

## Kontribusi
Silahkan ke halaman issue berikan untuk penjelasan lebih lanjutnya.
Saya menerima dengan baik kontribusi kamu untuk project starter ini.

## Support Me
Dukung aku [https://saweria.co/afrizalmy](https://saweria.co/afrizalmy)
