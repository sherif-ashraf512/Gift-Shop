# Gift Shop Web App

## Overview

The **Gift Shop Web App** is an online platform designed to manage a gift shop’s inventory, process orders, and handle customer interactions. This app includes features for viewing and purchasing products, managing the shopping cart, and processing payments through Stripe. It provides a seamless experience for both administrators and customers.

## Features

- **Product Management**: Add, edit, and delete products with details such as title, description, price, quantity, and category.
- **Shopping Cart**: Users can add products to their cart, view the cart, and proceed to checkout.
- **Order Management**: Admins can view and manage all orders, update order status, and print invoices.
- **User Management**: Admins can manage user roles and permissions.
- **Search and Filter**: Users can search for products and filter them by categories.
- **Stripe Integration**: Secure payment processing with Stripe.
- **Responsive Design**: The web app is designed to be responsive and accessible on various devices.

## Installation

### Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL or another database system
- Node.js and npm (for front-end assets)

### Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/sherif-ashraf512/gift-shop.git
   ```

2. **Navigate to the Project Directory**

   ```bash
   cd gift-shop
   ```

3. **Install Dependencies**

   Install PHP dependencies:

   ```bash
   composer install
   ```

   Install front-end dependencies:

   ```bash
   npm install
   ```

4. **Set Up Environment**

   Copy the example environment file and set up your environment variables:

   ```bash
   cp .env.example .env
   ```

   Edit the `.env` file to configure your database and other environment settings.

5. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

6. **Run Migrations**

   Create the database schema:

   ```bash
   php artisan migrate
   ```

7. **Compile Assets**

   Compile front-end assets:

   ```bash
   npm run dev
   ```

8. **Start the Development Server**

   ```bash
   php artisan serve
   ```

   The app should now be accessible at `http://localhost:8000`.

## Usage

1. **Visit the Application**

   Open your browser and go to `http://localhost:8000`.

2. **Admin Panel**

   Access the admin panel to manage products, orders, and users. The admin panel is usually located at `http://localhost:8000/admin`.

3. **Customer Interaction**

   Browse products, add items to the cart, and proceed to checkout. Payment processing is handled through Stripe.
## Acknowledgements

- [Laravel](https://laravel.com/) for the web application framework.
- [Bootstrap](https://getbootstrap.com/) for the UI components.
- [Stripe](https://stripe.com/) for payment processing.



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

1. Fork the repository.
2. Create a feature branch (`git checkout -b feature/YourFeature`).
3. Commit your changes (`git commit -am 'Add some feature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Create a new Pull Request.

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
