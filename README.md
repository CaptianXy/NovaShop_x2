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

## 📌 About Project

**NovaShop** คือระบบเว็บแอปพลิเคชันสำหรับจำหน่าย  
🎮 เกมดิจิทัล และ 🎁 Gift Card  

พัฒนาด้วย **PHP + MySQL**  
ออกแบบ UI/UX สมัยใหม่ รองรับการใช้งานจริง  
มีระบบ **User / Wallet / Cart / Checkout / Library / Admin Dashboard** ครบวงจร  

> 🎓 พัฒนาเพื่อการเรียนรู้ และต่อยอดเป็นระบบ E-Commerce สำหรับ Digital Product

---

## ✨ Main Features

### 👤 User System
- สมัครสมาชิก (Email / Password)
- Login / Logout
- Remember Me (Session)
- Password Hashing (`password_hash`)
- Role-based Access (User / Admin)

🔮 *Future*
- Steam Login (OpenID)
- Google OAuth

---

### 🏠 Frontend
- Home / Index Page
- Hero Section — **Pay Less. Game More.**
- Mega Menu (PC / Steam / Epic / Origin)
- Best Sellers Section
- Card Hover Animation (Fade / Lift)
- Gradient Theme (โทนเย็น)

🛒 **Shop Page**
- แสดงสินค้า
- Modern Card UI
- Hover Effect
- Add to Cart Button

---

### 🛍️ Cart System
- เพิ่ม / ลบ สินค้า
- คำนวณราคารวมอัตโนมัติ
- Layout 2 คอลัมน์  
  - ซ้าย: รายการสินค้า  
  - ขวา: Summary (Sticky)

---

### 💳 Checkout System
- ตรวจสอบ Login
- ตรวจสอบยอดเงิน Wallet
- ตัดเงินอัตโนมัติ
- เพิ่มเกมเข้า My Library
- ล้าง Cart หลังชำระเงิน
- ปุ่มย้อนกลับหน้าหลัก

---

### 🎮 My Library
- แสดงเกมที่ซื้อแล้ว
- แยกตาม User ID
- Card UI
- Responsive Grid Layout

---

### 💰 Wallet System
- Wallet แยกต่อผู้ใช้
- ตรวจสอบยอดเงินก่อน Checkout
- หักเงินอัตโนมัติ
- รองรับระบบเติมเงิน (Future)

---

### 🛠️ Admin System
- Admin Dashboard
- Card Summary
- Sales / Users Chart (Chart.js)

📦 **Product Management**
- เพิ่ม / แก้ไข / ลบ สินค้า (CRUD)
- อัปโหลดรูปสินค้า
- จัดการหมวดหมู่เกม

📑 **Order Management**
- ดูออเดอร์ทั้งหมด
- ดูประวัติการซื้อผู้ใช้

👥 **User Management**
- ดูรายชื่อผู้ใช้
- ตรวจสอบข้อมูลลูกค้า

---

### 🎨 UI / UX Design
- Cool Theme (เขียว → ฟ้า → ม่วง)
- Glass / Card Effect
- Smooth Hover Animation
- Floating Card Animation
- Typing Effect (Login)
- Responsive ทุกหน้า

---

### 🔐 Security
- Session-based Authentication
- Password Hashing
- Role-based Authorization
- Prepared Statements (SQL Injection Protection)
- ป้องกันเข้าหน้า Admin โดยตรง

---

## 🧱 System Architecture

```text
Browser
   ↓
PHP (MVC-like Structure)
   ↓
MySQL Database

## Diagram รูปภาพแบบรวม ##
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

## 🚧 Development Status
> README published first
> Project This Devalopment > Peeranut Wongsu Website E-commert 
> Source code will be uploaded soon
