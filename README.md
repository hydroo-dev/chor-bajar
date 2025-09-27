https://github-production-user-asset-6210df.s3.amazonaws.com/228237575/494699319-20091d35-d868-46e6-a2d2-14641d3993a9.mp4?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAVCODYLSA53PQK4ZA%2F20250927%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20250927T082645Z&X-Amz-Expires=300&X-Amz-Signature=02ccae62f0b35df367dfbb2b5a4357edec1e41fcd09563b98c994f0c278480de&X-Amz-SignedHeaders=host



# 🥷 Chor Bajar - E-commerce Website

**Sab kuch asli, bas daam chori jaise!**

A complete e-commerce platform built with PHP, MySQL, and Bootstrap. Chor Bajar offers authentic products at incredibly affordable prices with a fun, engaging user experience.

<img width="1024" height="1536" alt="logo" src="https://github.com/user-attachments/assets/2aa60ce9-b31e-4967-afc6-37b89dbd4e49" />


## 🎯 Features

### 👥 User Features
- **User Registration & Login** - Secure authentication system
- **Product Browsing** - Browse products with categories and filters
- **Shopping Cart** - Add/remove items, quantity management
- **Order Placement** - Complete checkout process
- **Order Tracking** - View order history and status
- **User Profile** - Manage personal information
- **Responsive Design** - Works on all devices

### 🛡️ Admin Features
- **Admin Dashboard** - Overview of site statistics
- **Product Management** - Add, edit, delete products
- **Order Management** - View and update order status
- **User Management** - View registered users
- **Inventory Control** - Track stock levels

## 🏗️ Project Structure

```
CHOR-BAJAR/
├── admin/
│   ├── dashboard.php          # Admin dashboard
│   ├── add_product.php        # Add new products
│   ├── edit_product.php       # Edit existing products
│   ├── delete_product.php     # Delete products
│   ├── products.php           # Manage all products
│   ├── orders.php             # Manage customer orders
│   └── users.php              # Manage users
├── assets/
│   ├── css/                   # Stylesheets
│   ├── js/                    # JavaScript files
│   └── images/                # Product images
├── config/
│   └── db.php                 # Database connection
├── includes/
│   ├── header.php             # Common header/navbar
│   ├── footer.php             # Common footer
│   └── functions.php          # Helper functions
└── public/
    ├── index.php              # Homepage
    ├── login.php              # User login
    ├── register.php           # User registration
    ├── logout.php             # Logout functionality
    ├── cart.php               # Shopping cart
    ├── checkout.php           # Order checkout
    ├── myorders.php           # User order history
    ├── aboutus.php            # About us page
    ├── product.php            # Single product view
    └── order_success.php      # Order confirmation
```

## 🚀 Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (optional)

### Step 1: Clone Repository
```bash
git clone https://github.com/hydroo-dev/chor-bajar.git
cd chor-bajar
```

### Step 2: Database Setup
1. Create a MySQL database named `chor_bajar`
2. Import the database structure:

```sql
-- Users Table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Products Table
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    image VARCHAR(255),
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Orders Table
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    shipping_address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Order Items Table
CREATE TABLE order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
```

### Step 3: Configure Database Connection
Update `config/db.php` with your database credentials:

```php
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "chor_bajar";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

### Step 4: Create Admin User
Create an admin user manually in the database:

```sql
INSERT INTO users (name, email, password, role) 
VALUES (
    'Admin User', 
    'admin@chorbajar.com', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', -- password: 'password'
    'admin'
);
```

### Step 5: Set Permissions
```bash
chmod -R 755 assets/images/
chmod -R 755 uploads/ (if you have an uploads directory)
```

## 🎨 Design & Theme

### Color Scheme
- **Primary Green:** `#2d5016`
- **Accent Orange:** `#ff6b35`
- **Bright Yellow:** `#ffd23f`
- **Dark Green:** `#1a3009`

### Features
- Modern gradient backgrounds
- Smooth hover animations
- Mobile-responsive design
- Hindi-English mixed content for Indian audience
- Emoji integration for playful experience

## 🔐 Security Features

- Password hashing with PHP's `password_hash()`
- SQL injection prevention with prepared statements
- XSS protection with input sanitization
- Session management for user authentication
- Role-based access control (User/Admin)

## 📱 Browser Support

- Chrome (recommended)
- Firefox
- Safari
- Edge
- Mobile browsers

## 🚀 Usage

### For Users:
1. Register/Login to your account
2. Browse products on homepage
3. Add items to cart
4. Proceed to checkout
5. Track your orders in "My Orders"

### For Admins:
1. Login with admin credentials
2. Access admin panel from navbar
3. Manage products, orders, and users
4. View dashboard analytics

## 🛠️ API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/public/index.php` | Homepage with products |
| POST | `/public/login.php` | User authentication |
| POST | `/public/register.php` | User registration |
| GET | `/public/cart.php` | Shopping cart |
| POST | `/public/checkout.php` | Order placement |
| GET | `/admin/dashboard.php` | Admin dashboard |
| POST | `/admin/add_product.php` | Add new product |

## 🔧 Configuration

### Environment Variables
Create a `.env` file (recommended for production):
```
DB_HOST=localhost
DB_USERNAME=your_username
DB_PASSWORD=your_password
DB_NAME=chor_bajar
```

### Session Configuration
Sessions are handled automatically. Make sure your server has proper session configuration.

## 🚦 Testing

### Test Credentials

**Admin User:**
- Email: `admin@chorbajar.com`
- Password: `password`

### Manual Testing Steps
1. User registration and login
2. Product browsing and cart functionality
3. Order placement and confirmation
4. Admin product management
5. Order status updates

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error:**
- Check database credentials in `config/db.php`
- Ensure MySQL service is running
- Verify database exists

**Session Issues:**
- Check PHP session configuration
- Ensure proper file permissions
- Clear browser cookies

**Image Upload Issues:**
- Check folder permissions for `assets/images/`
- Verify file size limits in `php.ini`

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request


## 👨‍💻 Author

**Your Name**
- GitHub: [@hydroo-dev](https://github.com/hydroo-dev)
- Email: harshit.joshi.in@gmail.com

## 🙏 Acknowledgments

- Bootstrap for responsive design
- Font Awesome for icons
- Lorem Picsum for placeholder images
- PHP community for excellent documentation

## 📞 Support

If you encounter any issues or have questions:

1. Check the [Issues](https://github.com/yourusername/chor-bajar/issues) page
2. Create a new issue with detailed description
3. Contact via email: harshit.joshi.in@gmail.com

---

### 🎉 Made with ❤️ for Indian E-commerce

**Chor Bajar** - Where authentic products meet unbeatable prices! 🛒✨

---

## 📈 Future Enhancements

- [ ] Payment gateway integration (Razorpay/PayPal)
- [ ] Email notifications for orders
- [ ] Product reviews and ratings
- [ ] Wishlist functionality
- [ ] Advanced search and filters
- [ ] Mobile app development
- [ ] Multi-vendor support
- [ ] Analytics dashboard
- [ ] SEO optimization
- [ ] Multi-language support

## 🏆 Features Completed

- [x] User authentication system
- [x] Product catalog with images
- [x] Shopping cart functionality
- [x] Order management system
- [x] Admin panel with CRUD operations
- [x] Responsive design
- [x] Session management
- [x] Security implementations
- [x] Database optimization
- [x] User-friendly UI/UX
