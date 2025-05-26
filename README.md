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
