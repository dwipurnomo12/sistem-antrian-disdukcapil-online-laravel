<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Antrian Disdukcapil Online Berbasis Web Dilengkapi Dengan Fitur Pemanggilan Suara


Sistem antrian Dukcapil (Dinas Kependudukan dan Catatan Sipil) online adalah platform yang memungkinkan orang untuk melakukan reservasi online untuk pelayanan administrasi kependudukan dan catatan sipil di kantor Dukcapil yang telah ditentukan. Dengan sistem ini, pengguna dapat melakukan reservasi dengan mudah dan menghindari antrean yang panjang di kantor Dukcapil.



## Fitur
- Pengunjung/Pengambil Antrian
    1. Ambil Antriean
    2. Lihat Daftar Antrian
    3. Cetak Nomor Antrian
    4. Hapus Antrian
  
- Admin/Operator
    1. Manajemen Layanan
    2. Manajemen Antrian
    3. Pemanggilan Antrian dengan Suara Otomatis
    4. Reset Antrian



## Teknologi

Sistem Antrian Disdukcapil Online menggunakan beberapa Teknologi diantaranya :

- Laravel - The PHP Framework for Web Artisans
- JavaScript - JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.
- Bootstrap - Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. 


## Installasi

Lakukan Clone Project/Unduh manual 

Buat database dengan nama 'antriandukcapil'

Jika melakukan Clone Project, rename file .env.example dengan env dan hubungkan
database nya dengan mengisikan nama database, 'DB_DATABASE=antriandukcapil'


Kemudian, Ketik pada terminal :
```sh
php artisan migrate
```

Lalu ketik juga

```sh
php artisan migrate:fresh --seed
```

Jalankan aplikasi 

```sh
php artisan serve
```

Akses Aplikasi di Web browser 
```sh
127.0.0.1:8000
```



![Screenshot_930](https://github.com/dwipurnomo12/sistem-antrian-disdukcapil-online-laravel/assets/105181667/b785677c-57ee-4729-ad3d-cebd6c9a5ed4)

![Screenshot_931](https://github.com/dwipurnomo12/sistem-antrian-disdukcapil-online-laravel/assets/105181667/e01f4f52-ada7-4422-aae9-cd0ce75c0d95)

![Screenshot_932](https://github.com/dwipurnomo12/sistem-antrian-disdukcapil-online-laravel/assets/105181667/f115546b-5144-4c6f-a09c-3de5cdb4dc51)

![Screenshot_933](https://github.com/dwipurnomo12/sistem-antrian-disdukcapil-online-laravel/assets/105181667/03b1a9c8-72cc-4b44-bd5e-b23e51fdde60)

![Screenshot_934](https://github.com/dwipurnomo12/sistem-antrian-disdukcapil-online-laravel/assets/105181667/1f0b3922-9925-40d8-bac3-75ab86d3e3d3)

