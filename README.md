# 🎟️ Event Management API

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>


## ✨ About the Project

The **Event Management API** is a robust RESTful API built with Laravel that empowers users to create, manage, and track events with ease. Perfect for event organizers and attendees alike!

## 🚀 Key Features

| Feature | Description |
|---------|-------------|
| 🎪 **Event CRUD Operations** | Create, read, update, and delete events |
| 👥 **Attendee Management** | Register and track event participants |
| 🔍 **Advanced Search** | Filter events by date, location, category |
| 🛡️ **Rate Limiting** | API request throttling for security |

---

## 🛠️ Installation

### Prerequisites
- PHP 8.0+
- Composer
- MySQL 5.7+

### Setup Steps
```bash
# 1. Clone repository
git clone https://github.com/your-username/event-management-api.git
cd event-management-api

# 2. Install dependencies
composer install

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Set up database (edit .env first)
php artisan migrate --seed

# 5. Start development server
php artisan serve
