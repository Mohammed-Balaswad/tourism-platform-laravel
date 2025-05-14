<h1>Tourism Platform - Laravel Travel Guide System</h1>
A fully-featured travel guide platform built with Laravel and Blade only (no Vite, no Bootstrap).
The project facilitates tourists to explore destinations and enables different levels of administrators to manage the content with strict access control.
   <hr> 
<strong>Features:</strong> <br>
1) Three user roles: Tourist, Admin, Super Admin<br>
2) Custom Middleware-based role permissions<br>
3) Separate dashboard for each role<br>
4) Manage destinations, agencies, and reviews<br>
5) Fully hand-crafted Blade views without external libraries<br>
6) Key Pages: Landing, Explore, Destination Details, Reviews, Auth pages<br>
<hr>
Requirements:<br>
PHP >= 8.0<br>
Composer<br>
MySQL<br>
Laravel 10+<br>
XAMPP or Laravel Valet/Homestead<br>
<hr>
Local Setup Instructions:<br>
Clone the repository:
git clone https://github.com/Mohammed-Balaswad/tourism-platform-laravel.git<br>
cd tourism-platform<br>
<hr>
Install dependencies:<br>
composer install<br>
Copy .env file and configure DB:<br>
cp .env.example .env<br>
Update DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env<br>

Create DB and run migrations:<br>
php artisan key:generate<br>
php artisan migrate --seed<br>

Run the server:<br>
php artisan serve<br>
Visit http://127.0.0.1:8000<br>
<hr>
Demo Credentials:<br>
Tourist: tourist@example.com | 123456<br>
Admin: admin@example.com | 123456<br>
Super Admin: superadmin@example.com | 123456<br>
<hr>
Technical Highlights:<br>
- Custom Middleware for role-based access control<br>
- Well-structured folder hierarchy for each user role<br>
- Manual UI built with Blade templates and raw CSS<br>
  <hr>
Project Structure:<br>
routes/
├── web.php - All route definitions<br>
app/Http/Middleware/ - Role middleware<br>
app/Http/Controllers/<br>
├── Auth/<br>
├── Tourists/<br>
├── Admin/<br>
└── SuperAdmin/<br>

resources/views/<br>
├── layouts/<br>
├── auth/<br>
├── tourists/<br>
├── admin/<br>
└── superadmin/<br>
<hr>
Authors:<br>
👤 Mohammed Saleh Balaswad<br>
📧 muhammed.design20@gmail.com<br>
GitHub: https://github.com/Mohammed-Balaswad<br>
<br>
👤 Mohammed Faiz Bashamkha<br>
📧 mb877402@gmail.com<br>
GitHub: https://github.com/mohammed-bashamkha<br>

👤 Mohammed Saleh Badhabi<br>
📧 mo7bds@gmail.com<br>
GitHub: https://github.com/username<br>
<hr>
Final Notes:<br>
This project was developed as a university project with a focus on clean code, organized structure, and realistic permissions. It is a solid base for any future tourism platform.
