# Laravel-Fresh

<p align="center">
<img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400">
</p>

<p align="center">
<a href="https://travis-ci.org/aklim/laravel-fresh"><img src="https://travis-ci.org/aklim/laravel-fresh.svg?branch=master" alt="Build Status"></a>
</p>

Fresh Laravel installation with all configured resources to start build new project's based on this template.

## Installation

This is a basic step to setup new application, cloned from this repository.

- Clone repository into You web server folder: 
```sh
> git clone https://github.com/aklim/laravel-fresh.git you_project
```

- Login into the project folder and install required vendor libraries:
```sh
> cd you_project
> composer install
> npm install
```

- Let writable permission to the web server for this folders:
```sh
> chmod 0777 storage
> chmod 0777 bootstrap/cache
```

- Environment file

To use application You should have environment file `.env`.
Copy file `.env.example` to a new file named `.env`:
```sh
> cp .env.example .env
```

- Application Key

The next thing you should do after installing Laravel is set your application key to a random string. To do this use
this command:
```sh
php artisan key:generate
```

- The `storage/app/public` directory may be used to store user-generated files, such as profile avatars, that should 
be publicly accessible. You should create a symbolic link at `public/storage` which points to this directory. 
You may create the link using this command:
```sh
> php artisan storage:link
```

- To test application You can run local web server:
```sh
> php artisan serve
```
This command will start a development server at http://localhost:8000.
