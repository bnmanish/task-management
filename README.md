# Task Management

## Project Setup

### 1. Create Database

Create a database in MySQL.

### 2. Configure Database

Update the database details in the `.env` file:

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 3. Open Project

Open the project folder in terminal:

```bash
cd task-management
```

### 4. Install Dependencies

```bash
composer install
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Migration

```bash
php artisan migrate
```

### 7. Run Seeder

```bash
php artisan db:seed
```

### 8. Start the Server

```bash
php artisan serve
```

The project will be available at:

```text
http://127.0.0.1:8000
```