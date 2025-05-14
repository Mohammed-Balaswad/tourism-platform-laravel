<h1>Tourism Platform - Laravel Travel Guide System<h1>
A fully-featured travel guide platform built with Laravel and Blade only (no Vite, no Bootstrap).
The project facilitates tourists to explore destinations and enables different levels of administrators to manage the content with strict access control.
    
Features:
1) Three user roles: Tourist, Admin, Super Admin
2) Custom Middleware-based role permissions
3) Separate dashboard for each role
4) Manage destinations, agencies, and reviews
5) Fully hand-crafted Blade views without external libraries
6) Key Pages: Landing, Explore, Destination Details, Reviews, Auth pages

Requirements:
PHP >= 8.0
Composer
MySQL
Laravel 10+
XAMPP or Laravel Valet/Homestead

Local Setup Instructions:
Clone the repository:
git clone https://github.com/Mohammed-Balaswad/tourism-platform-laravel.git
cd tourism-platform

Install dependencies:
composer install

Copy .env file and configure DB:
cp .env.example .env
Update DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env

Create DB and run migrations:
php artisan key:generate
php artisan migrate --seed

Run the server:
php artisan serve
Visit http://127.0.0.1:8000

Demo Credentials:
Tourist: tourist@example.com | 123456
Admin: admin@example.com | 123456
Super Admin: superadmin@example.com | 123456

Technical Highlights:
- Custom Middleware for role-based access control
- Well-structured folder hierarchy for each user role
- Manual UI built with Blade templates and raw CSS
  
Project Structure:
routes/
├── web.php - All route definitions
app/Http/Middleware/ - Role middleware
app/Http/Controllers/
├── Auth/
├── Tourists/
├── Admin/
└── SuperAdmin/
resources/views/
├── layouts/
├── auth/
├── tourists/
├── admin/
└── superadmin/

Authors:
👤 Mohammed Saleh Balaswad
📧 muhammed.design20@gmail.com
GitHub: https://github.com/Mohammed-Balaswad

👤 Mohammed
📧 youremail@example.com
GitHub: https://github.com/username

👤 Mohammed
📧 youremail@example.com
GitHub: https://github.com/username

Final Notes:
This project was developed as a university project with a focus on clean code, organized structure, and realistic permissions. It is a solid base for any future tourism platform.
