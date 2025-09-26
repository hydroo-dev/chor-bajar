<?php 
include("../config/db.php"); 
include("../includes/header.php"); 

// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
/* Custom CSS for Chor Bajar Theme */
:root {
  --primary-green: #2d5016;
  --accent-orange: #ff6b35;
  --bright-yellow: #ffd23f;
  --dark-green: #1a3009;
}

.hero-section {
  background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
  color: white;
  padding: 80px 0;
  position: relative;
  overflow: hidden;
}

.hero-section::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="%23ffd23f" opacity="0.1"/></svg>') repeat;
  animation: float 20s infinite linear;
}

@keyframes float {
  0% { transform: translate(0, 0); }
  100% { transform: translate(-50px, -50px); }
}

.logo-character {
  width: 120px;
  height: 120px;
  background: var(--bright-yellow);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 60px;
  margin: 0 auto 20px;
  border: 5px solid var(--accent-orange);
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
  40% { transform: translateY(-10px); }
  60% { transform: translateY(-5px); }
}

.carousel-item {
  height: 400px;
  background-size: cover;
  background-position: center;
  position: relative;
}

.carousel-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(45, 80, 22, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
}

.section-title {
  color: var(--primary-green);
  font-weight: bold;
  position: relative;
  display: inline-block;
  margin-bottom: 30px;
  padding-right: 25px;
}

.section-title::after {
  content: '🔥';
  position: absolute;
  right: -30px;
  top: 0;
  animation: pulse 1.5s infinite;
}

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.2); }
}

.product-card {
  border: none;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
  overflow: hidden;
}

.product-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.price-tag {
  background: var(--accent-orange);
  color: white;
  padding: 5px 10px;
  border-radius: 20px;
  font-weight: bold;
  display: inline-block;
}

.original-price {
  text-decoration: line-through;
  color: #999;
  font-size: 0.9em;
}

.discount-badge {
  position: absolute;
  top: 10px;
  right: 10px;
  background: var(--accent-orange);
  color: white;
  padding: 5px 10px;
  border-radius: 15px;
  font-size: 0.8em;
  font-weight: bold;
}

.btn-chor {
  background: var(--accent-orange);
  border: none;
  color: white;
  border-radius: 20px;
  padding: 8px 20px;
  transition: all 0.3s ease;
}

.btn-chor:hover {
  background: var(--primary-green);
  color: white;
  transform: scale(1.05);
}

.testimonial-card {
  background: white;
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  margin: 15px 0;
  border-left: 5px solid var(--accent-orange);
}

.stars {
  color: var(--bright-yellow);
  font-size: 1.2em;
}

</style>


<!-- Automatic Slider Section -->
<div class="container-fluid p-0 my-5">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('https://picsum.photos/1200/400?random=1');">
        <div class="carousel-overlay">
          <div class="text-center">
            <h2 class="display-5 fw-bold">Electronics Chori Sale! 📱</h2>
            <p class="lead">Up to 70% OFF on all gadgets</p>
            <a href="#products" class="btn btn-chor btn-lg">Shop Now</a>
          </div>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('https://picsum.photos/1200/400?random=2');">
        <div class="carousel-overlay">
          <div class="text-center">
            <h2 class="display-5 fw-bold">Fashion Ki Chori! 👕</h2>
            <p class="lead">Branded clothes at unbelievable prices</p>
            <a href="#products" class="btn btn-chor btn-lg">Explore Fashion</a>
          </div>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('https://picsum.photos/1200/400?random=3');">
        <div class="carousel-overlay">
          <div class="text-center">
            <h2 class="display-5 fw-bold">Home & Kitchen Loot! 🏠</h2>
            <p class="lead">Make your home beautiful for less</p>
            <a href="#products" class="btn btn-chor btn-lg">Shop Home</a>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>

<!-- All Products Section -->
<div class="container my-5" id="products">
  <div class="text-center mb-5">
    <h2 class="section-title display-6">Chor Deals Collection</h2>
   <p style="color:black;">Asli products, chori jaise prices! 🎯</p>
  </div>
  
  <div class="row g-4">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM products ORDER BY RAND() LIMIT 12");
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){ 
        // Calculate discount percentage (assuming original price is 40-60% higher)
        $original_price = $row['price'] * 1.8;
        $discount = round((($original_price - $row['price']) / $original_price) * 100);
    ?>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card product-card h-100">
          <div class="position-relative">
            <?php if(!empty($row['image'])): ?>
              <img src="../assets/images/<?php echo $row['image']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            <?php else: ?>
              <img src="https://picsum.photos/300/200?random=<?php echo $row['id']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            <?php endif; ?>
            <div class="discount-badge"><?php echo $discount; ?>% OFF</div>
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate"><?php echo htmlspecialchars($row['name']); ?></h5>
            <div class="mb-3">
              <span class="price-tag">₹<?php echo number_format($row['price']); ?></span>
              <span class="original-price ms-2">₹<?php echo number_format($original_price); ?></span>
            </div>
            <div class="mt-auto">
              <div class="d-grid gap-2">
                <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success btn-sm">👀 Quick View</a>
                <a href="cart.php?add=<?php echo $row['id']; ?>" class="btn btn-chor btn-sm">🛒 Chori Kar Lo!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } 
    } else { ?>
      <div class="col-12 text-center">
        <div class="alert alert-warning">
          <h4>🚧 Abhi kuch products load nahi hue!</h4>
          <p>Thoda wait karo, naye deals aa rahe hain...</p>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<!-- Customer Testimonials Section -->
<div class="py-5" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title display-6">Customer Ki Awaaz</h2>
      <p>Dekho kya kehte hain hamare satisfied customers! 🗣️</p>
    </div>
    
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="testimonial-card">
          <div class="stars mb-3">★★★★★</div>
          <p class="mb-3">"Yaar, pehle toh laga scam hai! Lekin jab product mila, toh sach mein original tha aur price bhi kamaal ki thi! Chor Bajar rocks! 🔥"</p>
          <div class="d-flex align-items-center">
            <img src="https://picsum.photos/50/50?random=101" class="rounded-circle me-3" width="50" height="50">
            <div>
              <h6 class="mb-0">Rahul Sharma</h6>
              <small class="text-muted">Delhi</small>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="testimonial-card">
          <div class="stars mb-3">★★★★★</div>
          <p class="mb-3">"Maine iPhone liya tha 40% discount mein! Bilkul original piece mila. Ab main sirf yahi se shopping karti hun! Best website ever! 💯"</p>
          <div class="d-flex align-items-center">
            <img src="https://picsum.photos/50/50?random=102" class="rounded-circle me-3" width="50" height="50">
            <div>
              <h6 class="mb-0">Priya Singh</h6>
              <small class="text-muted">Mumbai</small>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="testimonial-card">
          <div class="stars mb-3">★★★★★</div>
          <p class="mb-3">"Bhai sahab, delivery bhi fast hai aur customer service bhi top class! Mera pura ghar Chor Bajar se furnished hai ab! 🏠"</p>
          <div class="d-flex align-items-center">
            <img src="https://picsum.photos/50/50?random=103" class="rounded-circle me-3" width="50" height="50">
            <div>
              <h6 class="mb-0">Amit Kumar</h6>
              <small class="text-muted">Bangalore</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
<!-- Enhanced Footer -->


<script>
// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});

// Add to cart animation
document.querySelectorAll('a[href*="cart.php?add="]').forEach(link => {
  link.addEventListener('click', function(e) {
    const btn = this;
    const originalText = btn.innerHTML;
    btn.innerHTML = '✅ Added!';
    btn.classList.add('btn-success');
    btn.classList.remove('btn-chor');
    
    setTimeout(() => {
      btn.innerHTML = originalText;
      btn.classList.remove('btn-success');
      btn.classList.add('btn-chor');
    }, 1500);
  });
});
</script>

<?php include("../includes/footer.php"); ?>