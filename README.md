# 🏺 Golden Pyramids Tours - Egypt Travel Booking Platform

A comprehensive, multilingual tourism and travel booking platform built with Laravel 11, designed for managing and booking Egypt tours, day trips, and travel packages. This platform offers a seamless experience for both travelers and administrators with features including multi-language support, automated translations, intelligent caching, and a modern service-oriented architecture.

## 📋 Table of Contents

- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Project Structure](#-project-structure)
- [Key Features Explained](#-key-features-explained)
- [API Documentation](#-api-documentation)
- [Contributing](#-contributing)
- [License](#-license)

## ✨ Features

### 🎯 Core Functionality
- **Tour Management**: Day tours and tour packages with categories
- **Booking System**: Complete booking workflow with pricing calculations
- **Multi-language Support**: English, French, Spanish, Portuguese, Chinese (Arabic support ready)
- **Blog System**: City-based blog posts and attractions
- **Review System**: Customer reviews and ratings
- **FAQ Management**: Dynamic frequently asked questions
- **Contact Forms**: Contact and inquiry submission
- **Tailor-Made Tours**: Custom tour request system
- **Transfer Services**: Airport and hotel transfer bookings

### 🚀 Advanced Features
- **Automated Translations**: Azure Translator integration for automatic content translation
- **Intelligent Caching**: Service-layer caching for optimal performance
- **Image Management**: Advanced image handling with Intervention Image
- **SEO-Friendly URLs**: Slug-based routing for all content
- **Payment Integration**: PayPal payment gateway support
- **Admin Panel**: Vue.js-based admin interface for content management
- **API Endpoints**: RESTful API for admin operations
- **Visit Tracking**: Tour visit count tracking with IP management

## 🛠 Technology Stack

### Backend
- **Laravel 11** - PHP framework
- **PHP 8.2+** - Server-side language
- **MySQL** - Database
- **Laravel Sanctum** - API authentication
- **Spatie Laravel Translatable** - Multi-language content management
- **Eloquent Sluggable** - SEO-friendly URL generation
- **Intervention Image** - Image processing
- **PayPal SDK** - Payment processing
- **Azure Translator API** - Automated translations

### Frontend
- **Blade Templates** - Server-side rendering
- **Vite** - Build tool
- **Tailwind CSS** - Utility-first CSS framework
- **Vue.js 3** - Admin panel framework
- **PrimeVue** - Vue UI component library

### Development Tools
- **Laravel Breeze** - Authentication scaffolding
- **Laravel Pint** - Code style fixer
- **PHPUnit** - Testing framework
- **Laravel Sail** - Docker development environment

## 📦 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL or MariaDB
- Redis (optional, for caching)

### Step 1: Clone the Repository
```bash
git clone https://github.com/yourusername/golden-pyramids-tours.git
cd golden-pyramids-tours
```

### Step 2: Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### Step 3: Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Configure Environment Variables

```

### Step 5: Database Setup
```bash
# Run migrations
php artisan migrate

# Seed database (optional)
php artisan db:seed
```

### Step 6: Build Assets
```bash
# Development
npm run dev

```

### Step 7: Start Development Server
```bash
php artisan serve
```

## ⚙️ Configuration

### Cache Configuration
The application uses Laravel's cache system. Configure in `.env`:
```env
CACHE_DRIVER=redis  # or file, database, etc.
```

### Translation Setup
1. Obtain Azure Translator API credentials
2. Add credentials to `.env`
3. Use the `Translator` service for automatic translations

### Image Storage
Images are stored in `storage/app/public`. Create symlink:
```bash
php artisan storage:link
```

## 🎨 Key Features Explained

### Service Layer Architecture
The application follows a service-oriented architecture pattern where business logic is extracted into dedicated service classes:

- **TourService**: Manages tour-related operations with caching
- **BlogService**: Handles blog and city attraction logic
- **CityService**: City management and retrieval
- **PageTextService**: Dynamic page content management
- **ReviewService**: Customer review management
- **FaqService**: FAQ content management

Example usage:
```php
// In controller
public function __construct(
    private TourService $tourService,
    private BlogService $blogService
) {}

public function index()
{
    $tours = $this->tourService->getRecommendedDayTours();
    // ...
}
```

### Multi-language Support
Content is translatable using Spatie's Laravel Translatable:
- Models use `HasTranslations` trait
- Translations stored in JSON columns
- Automatic slug generation for each locale
- Language switching via route parameter

### Caching Strategy
- **Long-term caching**: Static content (all cities, all page texts)
- **Short-term caching**: Dynamic content (tours by category, blogs by city)
- **Cache invalidation**: Clear cache methods in each service

### Booking System
- Tiered pricing based on group size
- Support for adults, children, and students
- Price calculations with automatic discounts
- Booking confirmation emails

### SEO Optimization
- Slug-based URLs for all content
- Multi-language slugs
- SEO-friendly routing structure

## 📡 API Documentation

### Authentication
All API endpoints (except public routes) require Sanctum authentication.

### Available Endpoints

#### Tours
- `GET /api/products` - List all tours
- `GET /api/products/{id}` - Get tour details
- `POST /api/products` - Create tour
- `PUT /api/products/{id}` - Update tour
- `DELETE /api/products/{id}` - Delete tour

#### Blogs
- `GET /api/blog` - List all blogs
- `POST /api/blog` - Create blog
- `PUT /api/blog/{id}` - Update blog
- `DELETE /api/blog/{id}` - Delete blog

#### Cities
- `GET /api/city` - List all cities
- `POST /api/city` - Create city
- `PUT /api/city/{id}` - Update city

#### Bookings
- `GET /api/bookings` - List bookings (paginated)
- `GET /api/bookings/{id}` - Get booking details

#### Reviews
- `GET /api/reviews` - List reviews
- `POST /api/review` - Create review

#### FAQs
- `GET /api/faqs` - List FAQs
- `POST /api/faqs` - Create FAQ




### Server Requirements
- PHP 8.2+
- MySQL 5.7+ or MariaDB 10.3+
- Redis (recommended)
- Composer
- Node.js 18+ (for building assets)



- Built with [Laravel](https://laravel.com)
- UI Components: [PrimeVue](https://primevue.org)
- Styling: [Tailwind CSS](https://tailwindcss.com)
- Translations: [Azure Translator](https://azure.microsoft.com/services/cognitive-services/translator/)

