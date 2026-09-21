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
<h2>Blog Platform</h2>

A web-based blog platform built with Laravel, designed to provide users with a simple and structured way to create, manage, and explore blog content.

Features
User registration and login
User profiles with avatar and bio
Create blog posts with images
Edit and delete posts
Unique post URLs using a slug system
Categories for organizing and filtering content
Image and file management using Laravel Storage
Authentication and route protection with middleware
Database interaction using Laravel Eloquent ORM
Technologies
Laravel — Backend Framework
Blade — Frontend Templating Engine
Eloquent ORM — Database Interaction
Laravel Storage — File and Image Management
Middleware — Authentication and Route Protection
PHP
MySQL
Application Architecture

The project follows Laravel's MVC architecture and separates the main responsibilities of the application into different layers.

Request Flow
User
  ↓
Route
  ↓
Middleware
  ↓
Controller
  ↓
Model (Database)
  ↓
View (Blade UI)
  ↓
User sees the page
Main Components

Routes
Define which URL should lead to a specific part of the application.

Middleware
Acts as a security layer that checks requests before they reach the controller. It is used to protect routes and authenticated user functionality.

Controllers
Handle request processing and application logic, connecting routes, models, and views.

Models
Represent and interact with database data using Laravel's Eloquent ORM.

Views
Built with Blade and responsible for displaying the user interface.

Database Interaction

The project uses Eloquent ORM, which allows database records to be managed through PHP objects and Laravel models instead of writing raw SQL queries for every operation.

This approach is used for working with users, posts, categories, and other application entities.

Image and File Storage

Laravel's Storage system is used to manage uploaded files and images.

Uploaded public files are stored through Laravel's storage system and can be accessed by the application when displaying post images or profile avatars.

Post Management

Authenticated users can:

Create new posts
Upload images
Assign posts to categories
Edit their existing posts
Delete their posts
Access posts through unique slug-based URLs
Goal of the Project

The main goal of this project was to gain practical experience in Laravel backend development, MVC architecture, database interaction, authentication, middleware, file handling, and building a complete web application.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
