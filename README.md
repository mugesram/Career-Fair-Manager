# CareerSync: University Career Fair Management System

 
**A robust PHP-based platform to streamline career fair operations for large-scale university events**

## 📋 Project Overview

**CareerSync** is a sophisticated web application designed to revolutionize career fair management at the University of Moratuwa's Faculty of Engineering. Built using **PHP (CodeIgniter)** and powered by **Apache**, this platform efficiently orchestrates interview scheduling and coordination for **100+ students** and **30+ companies** simultaneously. It empowers company representatives to update candidate attendance and interview statuses in real-time, enables seamless inter-company scheduling, and provides students with transparent access to company availability, ensuring a smooth and organized career fair experience.

CareerSync addresses the complexities of large-scale career fair logistics with a focus on scalability, usability, and real-time collaboration. This project showcases advanced technical expertise and leadership in delivering impactful solutions for academic-industry interactions.

## 🚀 Features

- **Real-Time Interview Management**:  
  Company representatives can update candidate attendance and interview statuses instantly, ensuring accurate and up-to-date information.
- **Dynamic Scheduling**:  
  Enables companies to coordinate interview slots dynamically, minimizing conflicts and optimizing schedules across 30+ organizations.
- **Student Portal**:  
  Students can view real-time company availability and interview schedules, enhancing transparency and accessibility.
- **Scalable Architecture**:  
  Handles 100+ students and 30+ companies concurrently, designed for high-traffic university career fairs.
- **Role-Based Access Control**:  
  Securely manages permissions for company representatives, students, and administrators to ensure data integrity and privacy.
- **Responsive Design**:  
  Built with a user-friendly interface, optimized for both desktop and mobile devices.
- **Data Analytics Dashboard** (planned):  
  Provides insights into interview progress, attendance rates, and company engagement metrics.

## 🛠️ Technologies Used

- **Backend**: PHP (CodeIgniter 3.x) for robust server-side logic and MVC architecture
- **Frontend**: HTML5, CSS3, JavaScript (jQuery for dynamic interactions)
- **Server**: Apache for reliable web hosting
- **Database**: MySQL for efficient data management and real-time updates
- **Tools**: Git for version control, Composer for dependency management
- **Environment**: Configured for deployment on Linux-based servers

## 📈 System Architecture

CareerSync leverages the **Model-View-Controller (MVC)** pattern provided by CodeIgniter to ensure modular and maintainable code. The system integrates:

- **Database Layer**: MySQL tables for storing student profiles, company data, interview schedules, and status updates.
- **Business Logic**: PHP controllers handle real-time updates, scheduling logic, and role-based access.
- **Frontend Interface**: Responsive views for company representatives and students, with AJAX-driven updates for seamless interaction.
- **API Endpoints**: Internal APIs for efficient communication between frontend and backend, ensuring low latency.

## 📝 Setup Instructions

### Prerequisites
- PHP >= 7.4
- Apache Server with mod_rewrite enabled
- MySQL >= 5.7
- Composer
- Git

### Installation
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/mugesram/CareerSync.git
   cd CareerSync
   ```
2. **Install Dependencies**:
   ```bash
   composer install
   ```
3. **Configure Environment**:
   - Copy `.env.example` to `.env` and update database credentials:
     ```
     database.default.hostname = localhost
     database.default.database = careersync_db
     database.default.username = your_username
     database.default.password = your_password
     ```
   - Update `application/config/config.php` with your base URL.
4. **Set Up Database**:
   - Import the provided `careersync_db.sql` into MySQL to create the necessary tables.
   - Alternatively, run migrations:
     ```bash
     php index.php migrate
     ```
5. **Start Apache Server**:
   - Ensure Apache is running and configured to point to the project’s `public` directory.
6. **Access the Application**:
   - Open `http://localhost/careersync` in your browser.

## 🖥️ Usage

1. **Admin Setup**:
   - Log in as an admin to configure companies, students, and interview slots.
   - Default admin credentials: `[set in .env or database]`.
2. **Company Workflow**:
   - Representatives log in to update candidate attendance and interview statuses.
   - View and schedule interviews based on real-time availability of other companies.
3. **Student Workflow**:
   - Students log in to check company availability and their interview schedules.
   - Receive notifications for updates (if configured).
4. **Monitoring**:
   - Admins can track interview progress and generate reports (future feature).

## 🌟 Why CareerSync?

- **Scalability**: Designed to handle large-scale career fairs with ease.
- **Real-Time Collaboration**: Ensures seamless coordination among companies and students.
- **Leadership-Driven**: Spearheaded by an Electronic & Telecommunication Engineering undergrad, showcasing technical and organizational expertise.
- **Sustainability Focus**: Aligns with modern demands for efficient, tech-driven solutions in academic-industry ecosystems.

## 📂 Project Structure

```
careersync/
├── app/          # CodeIgniter application folder
│   ├── controllers/      # Handles business logic
│   ├── models/           # Database interactions
│   ├── views/            # Frontend templates
├── public/               # Publicly accessible assets (CSS, JS, images)
├── system/               # CodeIgniter core
├── .env                  # Environment configuration
├── composer.json         # PHP dependencies
└── README.md             # Project documentation
```

## 🔮 Future Enhancements

- **Analytics Dashboard**: Visualize interview metrics and attendance trends.
- **Notification System**: Email/SMS alerts for schedule changes.
- **Mobile App Integration**: Extend functionality to a dedicated mobile app.
- **AI-Powered Scheduling**: Optimize interview slots using machine learning algorithms.



## 📧 Contact

For inquiries or support, reach out via GitHub Issues or contact the project lead at [mugeshkrish007@gmail.com].

## 🌍 Acknowledgments

- University of Moratuwa, Faculty of Engineering, for inspiring this project.
- CodeIgniter community for robust framework support.
- Contributors and career fair organizers for their valuable feedback.

---

**CareerSync** is more than a tool—it's a testament to leadership, innovation, and the power of technology to transform university career fairs. Join us in shaping the future of academic-industry collaboration! 🌟
