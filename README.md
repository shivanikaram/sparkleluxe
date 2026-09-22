###  Sparkle Luxe — Luxury Jewellery & Watches E-Commerce Website

Sparkle Luxe is a full-stack e-commerce web application developed for selling luxury jewellery and watches online.

The application provides customers with an interactive shopping experience while allowing administrators to manage products, inventory and customer orders.

---

##  Project Overview

Sparkle Luxe is designed as an online platform where customers can browse luxury jewellery and watches, view detailed product information, manage their shopping cart, complete checkout, and review their previous orders.

The system also provides administrative functionality for managing products, inventory and customer orders.

The application supports three main user classes:

-  **Customers** — Registered users who can purchase products
-  **Administrators** — Users who manage products and orders
-  **Guest Users** — Visitors who can browse products and services

---

##  Key Features

###  Customer Features

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

###  Admin Features

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

##  Main Application Pages

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


<img width="708" height="1339" alt="image" src="https://github.com/user-attachments/assets/06576f6f-7cbf-4f24-80ce-5be5c2b1f7dc" />
<img width="905" height="1241" alt="image" src="https://github.com/user-attachments/assets/8da4d5ff-29d0-4c6b-943e-f34c82c58504" />
<img width="1043" height="1178" alt="image" src="https://github.com/user-attachments/assets/d879c2fa-b6eb-48d0-bf71-eb4582616f90" />
<img width="1039" height="961" alt="image" src="https://github.com/user-attachments/assets/c5efbac4-794d-45a1-bf01-89941922387a" />
<img width="1136" height="794" alt="image" src="https://github.com/user-attachments/assets/767fff2c-3cff-4440-a415-ce9bb3db4237" />
<img width="1197" height="1228" alt="image" src="https://github.com/user-attachments/assets/a2f19fe9-1016-417c-9bdc-c88aa1e9bb76" />
<img width="1136" height="794" alt="image" src="https://github.com/user-attachments/assets/8c067c7d-5a32-4fd0-b603-d6446215f635" />


