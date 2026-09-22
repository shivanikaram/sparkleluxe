# ✨ Sparkle Luxe — Luxury Jewellery & Watches E-Commerce Website

Sparkle Luxe is a full-stack e-commerce web application developed for selling luxury jewellery and watches online.

The application provides customers with an interactive shopping experience while allowing administrators to manage products, inventory and customer orders.

---

## 📌 Project Overview

Sparkle Luxe is designed as an online platform where customers can browse luxury jewellery and watches, view detailed product information, manage their shopping cart, complete checkout, and review their previous orders.

The system also provides administrative functionality for managing products, inventory and customer orders.

The application supports three main user classes:

- 👤 **Customers** — Registered users who can purchase products
- 👨‍💼 **Administrators** — Users who manage products and orders
- 👀 **Guest Users** — Visitors who can browse products and services

---

## ✨ Key Features

### 👤 Customer Features

- User registration
- User login and authentication
- Product browsing
- Product search
- Product details
- Product category browsing
- Shopping cart management
- Add products to cart
- Update product quantities
- Remove products from cart
- Promo code application
- Checkout
- Shipping information
- Payment method selection
- Service selection
- Order confirmation
- Order history
- Order status viewing
- Profile viewing
- Profile updating
- Customer service contact

### 👀 Guest Features

Guest users can:

- Browse the homepage
- Browse jewellery and watches
- View product details
- Search for products
- View available services

Guests must register or log in before adding products to the cart or placing orders.

### 🔐 Admin Features

Administrators can:

- Log in through the admin interface
- Manage products
- Add new products
- Edit product information
- Delete products
- Manage product categories
- Manage product images
- Manage inventory
- View customer orders
- Monitor order status
- View sales information
- Manage administrative operations

---

## 🛍️ Main Application Pages

The application includes:

- Home Page
- Sign Up
- Login
- Jewellery & Watches / Shop Page
- Product Description Page
- Services Page
- Shopping Cart
- Checkout
- Order History
- Customer Profile
- Admin Dashboard
- Manage Products
- View Orders

---

##  System Architecture

The application follows the **MVC (Model–View–Controller)** architecture provided by Laravel.

### Main Components

```text
Sparkle Luxe
│
├── Customer Interface
│   ├── Registration & Login
│   ├── Product Browsing
│   ├── Shopping Cart
│   ├── Checkout
│   ├── Orders
│   └── Profile
│
├── Admin Interface
│   ├── Product Management
│   ├── Inventory Management
│   └── Order Management
│
├── Application Backend
│   ├── Controllers
│   ├── Models
│   ├── Routes
│   └── Middleware
│
└── Database
    ├── Customers
    ├── Products
    ├── Categories
    ├── Orders
    ├── Order Items
    ├── Cart
    └── Payments
