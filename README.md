# Laravel Social Search Hub

## 📝 Project Overview
This project is a search and alert system that collects data from various sources, stores it in Elasticsearch, and allows users to set up alarms for new content.

## 🚀 Getting Started
Follow these steps to set up and run the project.

### 📦 Prerequisites
Ensure you have the following installed on your system:
- Docker & Docker Compose

### 🛠 Installation Steps
1. **Clone the repository**
   ```sh
   git clone <your-repository-url>
   cd <your-project-directory>
   ```

2. **Copy environment files**
   ```sh
   cp .env.example .env
   cp src/.env.example src/.env
   ```

3. **Run Docker services**
   ```sh
   docker-compose up -d
   ```
   This will start the application, database, Redis, and Elasticsearch services.

4. **Install PHP dependencies**
   ```sh
   composer install
   ```

5. **Run migrations and seeders**
   ```sh
   php artisan migrate --seed
   ```
   This will create the necessary database tables and populate them with sample data.


## 🔍 API Routes

### 📌 Search
- **Endpoint:** `GET /api/search`
- **Parameters:**
    - `query` (string) - The search keyword
    - `source` (string) - Filter by source
    - `from_date` & `to_date` (date) - Filter by published date

### ⏰ Alarms
- **Set an alarm:**
    - `POST /api/alarms`
    - Body: `{ "source": "isna.ir"}`

## 📌 Postman Collection
All API routes are documented in a Postman collection. You can import the collection.

---
💡 *Happy coding!* 🚀

