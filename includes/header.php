<?php include("../config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Chor Bajar - Sab kuch asli, bas daam chori jaise</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../assets/images/logo.png" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Custom Navbar Styles for Chor Bajar Theme */
    :root {
      --primary-green: #2d5016;
      --accent-orange: #ff6b35;
      --bright-yellow: #ffd23f;
      --dark-green: #1a3009;
    }

    .navbar-chor {
      background: linear-gradient(90deg, var(--primary-green), var(--dark-green)) !important;
      border-bottom: 3px solid var(--accent-orange);
      box-shadow: 0 2px 15px rgba(0,0,0,0.1);
      padding: 15px 0;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      font-weight: bold;
      font-size: 1.5rem;
      color: white !important;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .navbar-brand:hover {
      color: var(--bright-yellow) !important;
      transform: scale(1.05);
    }

    .logo-img {
      width: 50px;
      height: 50px;
      margin-right: 12px;
      border-radius: 50%;
      border: 2px solid var(--accent-orange);
      transition: all 0.3s ease;
    }

    .navbar-brand:hover .logo-img {
      transform: rotate(360deg);
      border-color: var(--bright-yellow);
    }

    .brand-text {
      display: flex;
      flex-direction: column;
      line-height: 1.2;
    }

    .brand-main {
      font-size: 1.3rem;
      font-weight: bold;
    }

    .brand-tagline {
      font-size: 0.7rem;
      color: var(--bright-yellow);
      font-style: italic;
    }

    .nav-link {
      color: white !important;
      font-weight: 500;
      margin: 0 8px;
      padding: 8px 16px !important;
      border-radius: 20px;
      transition: all 0.3s ease;
      position: relative;
    }

    .nav-link:hover {
      background: var(--accent-orange);
      color: white !important;
      transform: translateY(-2px);
    }

    .dropdown-toggle::after {
      margin-left: 8px;
    }

    .dropdown-menu {
      background: var(--primary-green);
      border: 2px solid var(--accent-orange);
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .dropdown-item {
      color: white;
      padding: 10px 20px;
      transition: all 0.3s ease;
      border-radius: 8px;
      margin: 2px;
    }

    .dropdown-item:hover {
      background: var(--accent-orange);
      color: white;
    }

    .navbar-toggler {
      border: 2px solid var(--accent-orange);
      border-radius: 8px;
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23ffd23f' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Cart Badge */
    .cart-badge {
      background: var(--accent-orange);
      color: white;
      border-radius: 50%;
      padding: 2px 8px;
      font-size: 0.8rem;
      position: absolute;
      top: -5px;
      right: 5px;
      animation: pulse 2s infinite;
    }

    /* Welcome Message */
    .welcome-banner {
      background: linear-gradient(90deg, var(--bright-yellow), #ffed4e);
      color: var(--dark-green);
      padding: 8px 0;
      text-align: center;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .welcome-banner marquee {
      color: var(--primary-green);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .brand-tagline {
        display: none;
      }
      
      .logo-img {
        width: 40px;
        height: 40px;
      }
      
      .brand-main {
        font-size: 1.1rem;
      }
    }

 

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }
  </style>
</head>
<body>

<!-- Welcome Banner -->
<div class="welcome-banner">
  <marquee behavior="scroll" direction="left" scrollamount="3">
    🎉 Welcome to Chor Bajar! | 🔥 Mega Sale Live Now - Up to 70% OFF | 🚚 Free Delivery on Orders Above ₹499 | 💯 100% Authentic Products | ⚡ Flash Sale Every Hour!
  </marquee>
</div>

<nav class="navbar navbar-expand-lg navbar-chor">
  <div class="container">
    <!-- Brand with Logo -->
    <a class="navbar-brand" href="../public/index.php">
      <!-- You can replace this with your actual logo image -->
      <img src="../assets/images/logo.png" alt="Chor Bajar Logo" class="logo-img" 
           onerror="this.style.display='none'; this.nextElementSibling.innerHTML='🥷';">
      <div style="font-size: 50px; display: none;">🥷</div>
      <div class="brand-text">
        <div class="brand-main">Chor Bajar</div>
        <div class="brand-tagline">Sab kuch asli!</div>
      </div>
    </a>

    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
        <!-- Home Link -->
        <li class="nav-item">
          <a class="nav-link" href="../public/index.php">🏠 Home</a>
        </li>

        <!-- Products/Categories -->
         <li class="nav-item">
          <a class="nav-link" href="../public/aboutus.php">ℹ️ About Us</a>
        </li>

        <?php if(isset($_SESSION['user_id'])): ?>

          <?php if($_SESSION['user_role'] == 'admin'): ?>
          <!-- Admin Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              ⚙️ Admin Panel
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../admin/dashboard.php">📊 Dashboard</a></li>
              <li><a class="dropdown-item" href="../admin/products.php">📦 Manage Products</a></li>
              <li><a class="dropdown-item" href="../admin/orders.php">🛒 View Orders</a></li>
              <li><a class="dropdown-item" href="../admin/users.php">👥 View Users</a></li>
            </ul>
          </li>
          <?php endif; ?>

          <!-- User Account Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              👤 My Account
            </a>
            <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="../public/logout.php">🚪 Logout</a></li>
            </ul>
          </li>

          <!-- Cart with Badge -->
          <li class="nav-item position-relative">
            <a class="nav-link" href="../public/cart.php">
              🛒 Cart
              <span class="cart-badge" id="cartBadge">
                <?php
                // Get cart count (you can modify this based on your cart logic)
                $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                echo $cart_count > 0 ? $cart_count : '';
                ?>
              </span>
            </a>
          </li>

        <?php else: ?>
          <!-- Guest links -->
          <li class="nav-item"><a class="nav-link" href="../public/login.php">🔐 Login</a></li>
          <li class="nav-item"><a class="nav-link" href="../public/register.php">📝 Register</a></li>
        <?php endif; ?>

     

      </ul>
    </div>
  </div>
</nav>



<div class="container mt-4">

<script>
// Toggle search bar


// Update cart badge dynamically (you can call this function when items are added to cart)
function updateCartBadge(count) {
  const badge = document.getElementById('cartBadge');
  if (badge) {
    badge.textContent = count > 0 ? count : '';
  }
}

// Add some interactivity
document.addEventListener('DOMContentLoaded', function() {
  // Add click sound effect (optional)
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function() {
      // You can add a subtle click effect here
      this.style.transform = 'scale(0.95)';
      setTimeout(() => {
        this.style.transform = 'scale(1)';
      }, 100);
    });
  });
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>