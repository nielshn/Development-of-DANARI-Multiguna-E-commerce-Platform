<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# DANARI Multiguna – Laravel E-commerce Platform

Capstone Project for Baparekraf Developer Talent 2024 – Team BDT24-FS033

## 📍 Project Overview

DANARI is a multi-purpose e-commerce platform built using Laravel, designed to support the digitalization of Micro, Small, and Medium Enterprises (MSMEs) and the creative economy sector. The platform enables business owners to manage products, interact with customers, and process transactions seamlessly.

## ⚙️ Key Features

- **User Management**
  - Role-based registration and login (customer vs business owner)
  - Secure authentication

- **Product Management**
  - Create, read, update, delete (CRUD) for product listings
  - Product filtering and search functionality

- **Shopping Cart & Checkout**
  - Add to cart and modify cart items
  - Checkout flow with payment integration via Midtrans

- **Order & Sales Dashboard**
  - Track orders, sales data, and business analytics in real time

- **Responsive UI**
  - Mobile-friendly and intuitive user interface

## 📈 Tech Stack

- **Backend**: Laravel 10+
- **Frontend**: Blade, Bootstrap 5
- **Database**: MySQL
- **Payment Gateway**: Midtrans (MAP)
- **Version Control**: Git + GitHub

## 📦 Installation & Setup

### Requirements:
- PHP 8.2+
- Composer
- MySQL
- Node.js & NPM (optional for asset compilation)
- Laravel CLI

### Installation Steps:

```bash
git clone https://github.com/nielshn/Development-of-DANARI-Multiguna-E-commerce-Platform.git
cd BDT24-FS033_Capstone
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

> Ensure you configure the `.env` file correctly with your database credentials and Midtrans server/client keys.

## 📷 App Screenshots

- **User Sign-Up Page**  
  <img src="https://github.com/user-attachments/assets/ea04e5f8-a598-4c9b-af7f-4e1ec1221ed7" width="600" />

- **Product Home View**  
  <img src="https://github.com/user-attachments/assets/2e6fcc9a-c905-4f8e-a39e-bd7112f01260" width="600" />

- **Product Detail Page**  
  <img src="https://github.com/user-attachments/assets/c7315ffb-7773-47cd-8d00-6cf25ae7f259" width="600" />

- **Admin Dashboard View**  
  <img src="https://github.com/user-attachments/assets/a574e11f-9db2-4c91-b99b-b6b55fac50d8" width="600" />

## 🌐 Live Demo

**[https://danaribdt2024.my.id](https://danaribdt2024.my.id)**

## 👨‍💼 Contributors

- Rizky Putra Perdana
- Daniel Siahaan
- Doni Mangampa

## 📅 Project Timeline

Developed over 8 weeks, from requirement analysis and UI/UX modeling to frontend-backend integration, testing, and deployment.

## 🔗 References & Resources

- [Indoregion API](https://github.com/azishapidin/indoregion.git)
- [Midtrans Payment Gateway](https://midtrans.com)
- [Dataset & Product Assets](https://drive.google.com/drive/folders/1ecEH7EcojR3-GZApged4JO2DSGkU8nWE)

---

Thanks for visiting our repository! Feedback and contributions are welcome. 🙌
>>>>>>> 13af5d7b518f69ac5476258d68e650286b55e4fc
