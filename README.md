# Sazao Website

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE.md)
[![Laravel Version](https://img.shields.io/badge/Laravel-10.x%2B-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue.svg)](https://php.net)

A brief description of your Laravel project and its purpose.

## ✨ Features

- HTML, CSS, Javascript
- Ajax, OAuth
- Facebook Login, Google Login
- RESTful API endpoints
- Authentication & Authorization
- Database migrations & seeders
- Task scheduling with Laravel Scheduler
- Queue jobs for background processing
- Real-time features with Laravel Echo (if applicable)

## 📋 Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.3.29
- Composer 2.9.5
- Node.js >= 22.22.0 (if using frontend build tools)
- NPM or Yarn
- Database (MySQL)
- Web server (Apache/Nginx) or PHP built-in server
- Laravel Breeze
- OAuth

## 🚀 Installation

Follow these steps to set up the project locally:

1. **Clone the repository**

```bash
git clone https://github.com/Tibro0/sazao-laravel.git sazao-laravel
cd sazao-laravel
code .
```

2. **Open App\Providers\AppServiceProvider.php**

```bash
<?php

namespace App\Providers;

use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Paginator::useBootstrap();

        // $generalSetting = GeneralSetting::first();
        // $logoSetting = LogoSetting::first();
        // $mailSetting = EmailConfiguration::first();
        // /** Set Time Zone */
        // Config::set('app.timezone', $generalSetting->time_zone);

        // /** Set Site Name */
        // Config::set('app.name', $generalSetting->site_name);

        // /** Set Mail Config */
        // Config::set('mail.mailers.smtp.host', $mailSetting->host);
        // Config::set('mail.mailers.smtp.port', $mailSetting->port);
        // Config::set('mail.mailers.smtp.encryption', $mailSetting->encryption);
        // Config::set('mail.mailers.smtp.username', $mailSetting->username);
        // Config::set('mail.mailers.smtp.password', $mailSetting->password);

        // /** Share variable at all view */
        // View::composer('*', function ($view) use ($generalSetting, $logoSetting) {
        //     $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
        // });
    }
}
```

2. **Install PHP Dependencies**

```bash
composer install
cp .env.example .env
php artisan key:generate
```
3. **Configure Environment Variables** <br>
   Edit the .env file with your database credentials and other settings:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
4. **Run database migrations and seeders**

```bash
php artisan migrate:fresh --seed
```

5. **Open App\Providers\AppServiceProvider.php**

```bash
<?php

namespace App\Providers;

use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $generalSetting = GeneralSetting::first();
        $logoSetting = LogoSetting::first();
        $mailSetting = EmailConfiguration::first();
        /** Set Time Zone */
        Config::set('app.timezone', $generalSetting->time_zone);

        /** Set Site Name */
        Config::set('app.name', $generalSetting->site_name);

        /** Set Mail Config */
        Config::set('mail.mailers.smtp.host', $mailSetting->host);
        Config::set('mail.mailers.smtp.port', $mailSetting->port);
        Config::set('mail.mailers.smtp.encryption', $mailSetting->encryption);
        Config::set('mail.mailers.smtp.username', $mailSetting->username);
        Config::set('mail.mailers.smtp.password', $mailSetting->password);

        /** Share variable at all view */
        View::composer('*', function ($view) use ($generalSetting, $logoSetting) {
            $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
        });
    }
}

```
6. **Start The Development Server**

```bash
php artisan serve
```

7. **Access The Application**

```bash
http://127.0.0.1:8000/
```
