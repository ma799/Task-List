# 📝 TaskFlow: Simple Task Management

![App Screenshot](https://via.placeholder.com/800x500?text=TaskFlow+Dashboard) <!-- Replace with actual screenshot -->

A minimalist yet powerful Laravel application to create, organize, and track your tasks' progress with elegant animations and intuitive interface.

✨ **Why TaskFlow?**
- ✅ Dead-simple task creation and management
- 📊 Visual progress tracking
- 🎨 Pleasant UI with smooth interactions
- 🚀 Lightweight and fast

## 🛠️ Installation Guide

### 📋 Prerequisites
- PHP 8.1+
- Composer 2.0+
- Node.js 16+
- MySQL 8.0+ (or Docker)
- NPM/Yarn

### ⚙️ Environment Configuration

1. Copy the environment template:

   
   Create file name .env
   cp .env.example to .env
   

🧰 Dependency Installation
# Install PHP dependencies

```bash
composer install
```
# Install JavaScript dependencies

```cmd
 npm install
```
🗃️ Database Setup

Using Docker (Recommended)
bash

```bash
docker compose up 
```


Create a database named task-list

Update your .env with correct credentials

Run migrations:
```bash
php artisan migrate --seed
```

🚦 Running the Application
Start the development servers in two separate terminals:

Backend Server:

```bash
php artisan serve
```

Frontend Assets:

```bash
npm run dev
```

🌐 Access the application at: http://localhost:8000

🚨 Troubleshooting
Issue	Solution
Database connection errors	Verify MySQL service is running
Asset compilation issues	Run npm run build
Permission errors	Run chmod -R 775 storage bootstrap/cache
Missing APP_KEY	Run php artisan key:generate

🌟 Features
✔️ Beautiful task management interface

✔️ Smooth animations and transitions

✔️ Responsive design

✔️ Database persistence
