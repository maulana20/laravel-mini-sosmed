# laravel-mini-sosmed
Sosial media mini untuk latihan notifikasi realtime laravel dengan pusher

[sumber](https://github.com/nafiesl/mini-socmed)

## Getting Started

### Instalasi

1.  `$ git clone https://github.com/maulana20/laravel-mini-sosmed`
2.  `$ composer install`
3.  Buat **.env** dari file **.env.example**
4.  `$ php artisan key:generate`
5.  `$ php artisan storage:link`
6.  `$ php artisan passport:install` (fresh api token)
7.  `$ php artisan migrate`
8.  `$ php artisan serve`

### note

- register akun pada pusher untuk dapat app key [disini](https://dashboard.pusher.com/accounts/sign_in)
- kemudian refresh config
```bash
$ php artisan config:cache
$ php artisan cache:clear
```
