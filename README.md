# 📌 Projects Management System

This is a **Laravel 12** project management system featuring authentication via **Laravel Passport**, dynamic **EAV (Entity-Attribute-Value)** fields, and **flexible filtering** capabilities.

---

## 🚀 Getting Started

Follow these instructions to set up the project on your local machine.

---

## 📋 Prerequisites

Ensure you have the following installed before proceeding:

- **PHP** >= 8.2
- **Composer**
- **MySQL** (or compatible database)
- **Laravel 12**
- **Postman** (for API testing)

---

## 🛠 Installation Steps

### 1️⃣ Clone the Project Repository

Clone the project from GitHub:

```bash
git clone git@github.com:ibraheem9/ProjectsManagement.git
```

Navigate to the Project Directory

```bash
cd projects-management
```

### 2️⃣ Install Dependencies

Run the following command to install all required dependencies:

```bash
composer install
```

### 3️⃣ Set Up the Database

#### ✅ Create `.env` File
Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

#### ✅ Update Database Configuration  
Edit `.env` and configure your database connection:

```makefile
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projects_management
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Migrate the Database

Run the migration command to create all necessary tables:

```bash
php artisan migrate
```

### 5️⃣ Seed the Database (Optional)

To populate the database with sample data, run:

```bash
php artisan db:seed
```

Alternatively, import the SQL dump manually:

```bash
ProjectsManagement/database/backup/projects_management_17-03-2025.sql
```

### 6️⃣ Generate Laravel Passport Credentials

Run the following command to create personal access tokens:

```bash
php artisan passport:client --personal
```

### 7️⃣ Start the Laravel Development Server

Run the server:

```bash
php artisan serve
```

### 🔥 API Testing with Postman

#### 📑 Import Postman Collection

To test the API endpoints, import the Postman collection file:

```bash
ProjectsManagement/postman/projects_management.postman_collection.json
```

### Steps:

1. Open Postman.
2. Click **Import**.
3. Select `projects_management.postman_collection.json`.
4. Start testing the API.

#### 📌 API Documentation

The full API documentation is available on Postman:

👉 [Projects Management API Documentation](https://documenter.getpostman.com/view/6619421/2sAYkDLKbb)


### 🔑 Test Credentials

Use the following credentials to log in and test the system:

**Email:** john.doe@example.com  
**Password:** password123



### 📬 Contact

For inquiries or support, contact:

📧 Email: ibraheem9omar@example.com





