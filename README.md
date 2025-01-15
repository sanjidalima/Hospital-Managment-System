
# Hospital Management System
Project Overview

The Hospital Management System is a comprehensive web-based application designed to streamline the operations and administration of a hospital. This system facilitates efficient management of essential functions, including patient registration, doctor management, appointment scheduling, income tracking, and reporting. It offers a centralized platform for hospital staff to ensure seamless communication and operational efficiency.


## Features

1.Admin Management: Manage all users, including doctors and patients.

2.Doctor Management: Add, update, search, and manage doctor profiles.

3.Patient Management: Register and manage patient details.

4.Appointment Scheduling: Book, update, cancel, and view appointments.

5.Income Management: Track payments, discharge details, and hospital revenue.

6.Report Management: Generate and view reports for hospital operations and communication.

7.Search Functionality: Search for doctors, patients, and appointments using various criteria.

8.Role-based Access: Role-specific features for admins, doctors, and patients.


## Technologies Used
Frontend: HTML, CSS

Backend: PHP

Database: MySQL
## Installation
Prerequisites
A web server (e.g., XAMPP, WAMP, or any server with PHP support).
MySQL installed and running.
Steps
Clone this repository:

bash
Copy code
git clone https://github.com/your-repo/hospital-management.git  
Move the project folder:
Place the project folder in your web server’s root directory (e.g., htdocs for XAMPP).

Import the database:

Open phpMyAdmin.
Create a new database (e.g., hospital_db).
Import the SQL file located at /database/hospital_db.sql.
Configure the database connection:

Open the config.php file in the root directory.
Update the database credentials:
php
Copy code
define('DB_HOST', 'localhost');  
define('DB_USER', 'root');  
define('DB_PASS', '');  
define('DB_NAME', 'hospital_db');  
Start the web server:
Access the application in your browser:

arduino
Copy code
http://localhost/hospital-management 
## Usage
1.Login:
Use the default admin credentials (if applicable):

Username: admin
Password: admin123
Update the credentials after logging in for security.
Manage Doctors:
Navigate to the "Doctors" section to add, edit, or remove doctors.

2.Manage Patients:
Navigate to the "Patients" section to register or update patient details.

3.Schedule Appointments:
Use the "Appointments" section to book or manage patient appointments.

4.Track Income:
Use the "Income" section to view payments and generate revenue reports.

5.Generate Reports:
Navigate to the "Reports" section to generate or view system reports.


## Project Structure
hospital-management/  
|-- assets/          # CSS, JS, and images  
|-- database/        # SQL files  
|-- includes/        # Reusable PHP components  
|-- config.php       # Database configuration  
|-- index.php        # Main entry point  
|-- admin/           # Admin-specific pages  
|-- doctor/          # Doctor-specific pages  
|-- patient/         # Patient-specific pages  
|-- ...              # Other files and folders  

## Future Enhancements
1.Implement email notifications for appointments and follow-ups.
2.Add analytics dashboards for better operational insights.
3.Enable telemedicine support for virtual appointments.
4.Integrate an automated billing system.