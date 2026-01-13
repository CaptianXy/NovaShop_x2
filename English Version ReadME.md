# 🎮 NovaShop  
## Digital Game & Gift Card Store  
### PHP + MySQL E-Commerce System

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-Frontend-7952B3?style=for-the-badge&logo=bootstrap)
![Chart.js](https://img.shields.io/badge/Chart.js-Analytics-FF6384?style=for-the-badge&logo=chartdotjs)
![Status](https://img.shields.io/badge/Status-Active-success?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-blue?style=for-the-badge)

---

## 📌 About the Project

**NovaShop** is a web-based application for selling  
🎮 **Digital Games** and 🎁 **Gift Cards**.

The system is developed using **PHP and MySQL**,  
featuring a modern UI/UX design, a complete admin panel,  
and a scalable architecture suitable for real-world  
**E-Commerce digital product platforms**.

> 🎓 This project was built for learning purposes and can be extended into a production-ready system.

---

## ✨ Core Features

### 👤 User System
- User registration with Email & Password
- Login / Logout
- Remember Me (Session-based authentication)
- Secure password hashing (`password_hash`)
- Role-based access control (User / Admin)

🔮 *Planned*
- Steam Login (OpenID)
- Google OAuth Login

---

### 🏠 Frontend
- Home / Index page
- Hero Section — **Pay Less. Game More.**
- Mega Menu (PC / Steam / Epic / Origin)
- Best Sellers section
- Card hover animations (fade & lift)
- Cool gradient color theme

🛒 **Shop Page**
- Product listing
- Modern card-based UI
- Hover effects
- Add to Cart functionality

---

### 🛍️ Cart System
- Add items to cart
- Remove items from cart
- Automatic total price calculation
- Two-column layout  
  - Left: Cart items  
  - Right: Order summary (sticky)

---

### 💳 Checkout System
- Login verification
- Wallet balance validation
- Automatic payment deduction
- Purchased items added to user library
- Cart cleared after successful checkout
- Back to Home button

---

### 🎮 My Library
- Displays purchased games
- Linked to user ID
- Responsive grid layout
- Card-based UI

---

### 💰 Wallet System
- Individual wallet per user
- Balance validation before checkout
- Automatic balance deduction
- Top-up system (planned)

---

### 🛠️ Admin Panel
- Admin dashboard overview
- Summary cards
- Sales & user statistics (Chart.js)

📦 **Product Management**
- Create / Read / Update / Delete (CRUD)
- Product image upload
- Category management

📑 **Order Management**
- View all orders
- View user purchase history

👥 **User Management**
- View all users
- Inspect customer data

---

### 🎨 UI / UX Design
- Cool color theme (Green → Blue → Purple)
- Glassmorphism / Card effects
- Smooth hover animations
- Floating card animations
- Typing effect on login page
- Fully responsive design

---

### 🔐 Security
- Session-based authentication
- Secure password hashing
- Role-based authorization
- Prepared SQL statements (SQL Injection protection)
- Admin route protection

---

## 🧱 System Architecture

```text
Client (Browser)
      ↓
PHP Application
      ↓
MySQL Database
## Diagram ##
users
- id
- email
- password
- role
- wallet_balance

products
- id
- name
- price
- image
- category_id

cart
- user_id
- product_id
- quantity

orders
- id
- user_id
- total_price
- created_at

order_items
- order_id
- product_id
- price

library
- user_id
- product_id
🚧 Development Status

README published first
Project Devalopment By Peeranut Wongsu Website E-commert (30%)
Source code will be uploaded soon
