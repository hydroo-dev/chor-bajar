<?php 
include("../config/db.php"); 
include("../includes/header.php"); 

// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
/* Chor Bajar About Page Styles */
:root {
  --primary-green: #2d5016;
  --accent-orange: #ff6b35;
  --bright-yellow: #ffd23f;
  --dark-green: #1a3009;
}

.hero-about {
    background: linear-gradient(135deg, #e7600d, var(--dark-green));
    color: white;
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.hero-about::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="%23ffd23f" opacity="0.1"/></svg>') repeat;
  animation: float 30s infinite linear;
}

@keyframes float {
  0% { transform: translate(0, 0) rotate(0deg); }
  100% { transform: translate(-50px, -50px) rotate(360deg); }
}

.hero-character {
  font-size: 120px;
  animation: bounce 3s infinite;
  text-shadow: 0 0 20px var(--bright-yellow);
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
  40% { transform: translateY(-20px); }
  60% { transform: translateY(-10px); }
}

.section-title {
  color: var(--primary-green);
  font-weight: bold;
  position: relative;
  margin-bottom: 30px;
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 4px;
  background: linear-gradient(90deg, var(--accent-orange), var(--bright-yellow));
  border-radius: 2px;
}

.story-card {
  background: white;
  border-radius: 20px;
  padding: 40px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  border-left: 5px solid var(--accent-orange);
  margin-bottom: 30px;
  transition: all 0.3s ease;
}

.story-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.feature-icon {
  background: linear-gradient(135deg, var(--accent-orange), var(--bright-yellow));
  color: white;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  margin: 0 auto 20px;
  box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
  transition: all 0.3s ease;
}

.feature-icon:hover {
  transform: scale(1.1) rotate(10deg);
}

.feature-card {
  text-align: center;
  padding: 30px 20px;
  background: white;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
  border: 2px solid transparent;
}

.feature-card:hover {
  border-color: var(--accent-orange);
  transform: translateY(-5px);
}

.stats-section {
  background: linear-gradient(135deg, var(--bright-yellow), #ffed4e);
  padding: 80px 0;
  color: var(--dark-green);
}

.stat-item {
  text-align: center;
  margin-bottom: 30px;
}

.stat-number {
  font-size: 3rem;
  font-weight: bold;
  color: var(--primary-green);
  display: block;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.stat-label {
  font-size: 1.1rem;
  font-weight: 600;
  margin-top: 10px;
}

.team-card {
  background: white;
  border-radius: 20px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
  border: 3px solid transparent;
}

.team-card:hover {
  border-color: var(--accent-orange);
  transform: translateY(-10px);
}

.team-avatar {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  margin: 0 auto 20px;
  border: 4px solid var(--bright-yellow);
  transition: all 0.3s ease;
}

.team-card:hover .team-avatar {
  border-color: var(--accent-orange);
  transform: scale(1.05);
}

.cta-section {
  background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
  color: white;
  padding: 80px 0;
  text-align: center;
}

.btn-chor {
  background: var(--accent-orange);
  border: none;
  color: white;
  padding: 15px 40px;
  border-radius: 50px;
  font-weight: bold;
  font-size: 1.1rem;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-block;
}

.btn-chor:hover {
  background: var(--bright-yellow);
  color: var(--dark-green);
  transform: scale(1.05);
  box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.timeline {
  position: relative;
  padding: 20px 0;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 50%;
  top: 0;
  bottom: 0;
  width: 4px;
  background: linear-gradient(to bottom, var(--accent-orange), var(--bright-yellow));
  transform: translateX(-50%);
}

.timeline-item {
  margin-bottom: 50px;
  position: relative;
}

.timeline-item:nth-child(odd) .timeline-content {
  margin-left: 0;
  margin-right: 50%;
  text-align: right;
}

.timeline-item:nth-child(even) .timeline-content {
  margin-left: 50%;
  margin-right: 0;
}

.timeline-content {
  background: white;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  position: relative;
}

.timeline-year {
  background: var(--accent-orange);
  color: white;
  width: 58px;
  height: 58px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  font-weight: bold;
  font-size: 1.2rem;
  z-index: 10;
  border: 4px solid white;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

@media (max-width: 768px) {
  .timeline::before {
    left: 30px;
  }
  
  .timeline-item:nth-child(odd) .timeline-content,
  .timeline-item:nth-child(even) .timeline-content {
    margin-left: 60px;
    margin-right: 0;
    text-align: left;
  }
  
  .timeline-year {
    left: 30px;
  }
}
</style>

<style>
.logo-container {
  text-align: center;
  margin: 20px 0;
  padding: 15px;
}

.logo-image {
  max-width: 200px;
  height: auto;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
  border: 3px solid #ff6b35; /* Orange border matching your theme */
}

.logo-image:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
  border-color: #ffd23f; /* Yellow border on hover */
}

/* Responsive */
@media (max-width: 768px) {
  .logo-image {
    max-width: 150px;
  }
}
</style>
<!-- Hero Section -->
<div class="hero-about">
  <div class="container text-center">
  <div class="logo-container">
  <img src="../assets/images/logo.png" alt="Chor Bajar Logo - Sab kuch asli, bas daam chori jaise" class="logo-image">
</div>
    <h1 class="display-3 fw-bold mb-4">Hamare Baare Mein</h1>
    <p class="lead mb-4">Chor Bajar - Jahan har deal ek naya adventure hai!</p>
    <p class="h4 text-warning">✨ Sab kuch asli, bas daam chori jaise! ✨</p>
  </div>
</div>

<!-- Our Story Section -->
<div class="container my-5 py-5">
  <div class="text-center mb-5">
    <h2 class="section-title display-5">Hamari Kahani 📖</h2>
    <p class="lead text-muted">Kaise shuru hui ye digital revolution ki journey</p>
  </div>
  
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="story-card">
        <h3 class="text-primary mb-4">🚀 Kaise Shuru Hua Ye Safar</h3>
        <p class="mb-4">
          Saal 2020 mein, jab duniya lockdown mein thi, tab humne socha - "Yaar, log online shopping karte hain lekin genuine products milte nahi, aur jo genuine hain woh bahut expensive hain!" 
        </p>
        <p class="mb-4">
          Bas wahi se idea aaya - <strong>"Chor Bajar"</strong> ka! Ek aisi jagah banane ka jahan log authentic products le saken, lekin price itni kam ho ki lagے जैसे चोरी कर रहे हैं! 😄
        </p>
        <p class="mb-4">
          Hamare founders - Rahul (tech genius) aur Priya (business mastermind) - ne decide kiya ki ye idea ko reality mein convert karna hai. Shuru mein sirf 50 products the, lekin dekh lo aaj kahan pahunch gaye hain!
        </p>
        <blockquote class="blockquote text-center border-start border-warning border-5 ps-4 fst-italic">
          "Humara mission simple hai - Har Indian ko branded products affordable price mein dena, bina quality compromise kiye!"
        </blockquote>
      </div>
    </div>
  </div>
</div>

<!-- Company Timeline -->
<div class="container-fluid py-5" style="background: #f8f9fa;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title display-5">Hamara Journey Timeline ⏰</h2>
      <p class="lead text-muted">Dekhiye kaise grow kiye hum step by step</p>
    </div>
    
    <div class="timeline">
      <div class="timeline-item">
        <div class="timeline-year">2020</div>
        <div class="timeline-content">
          <h4>🌟 Shuruat</h4>
          <p>Pandemic mein idea aaya aur 2 founders ke saath journey start hui. Sirf 50 products ke saath Chor Bajar launch hua.</p>
        </div>
      </div>
      
      <div class="timeline-item">
        <div class="timeline-year">2021</div>
        <div class="timeline-content">
          <h4>📈 Growth</h4>
          <p>Pehle saal mein hi 10,000+ customers mil gaye! Product range expand kiya - Electronics se Fashion tak.</p>
        </div>
      </div>
      
      <div class="timeline-item">
        <div class="timeline-year">2022</div>
        <div class="timeline-content">
          <h4>🏆 Recognition</h4>
          <p>"Best Startup of the Year" award mila! Team size 20 tak pahunch gayi aur warehouse bhi setup kiya.</p>
        </div>
      </div>
      
      <div class="timeline-item">
        <div class="timeline-year">2023</div>
        <div class="timeline-content">
          <h4>🌍 Expansion</h4>
          <p>Pan-India delivery start kiya! Ab har corner mein Chor Bajar ki delivery pahunchti hai same day mein.</p>
        </div>
      </div>
      
      <div class="timeline-item">
        <div class="timeline-year">2024</div>
        <div class="timeline-content">
          <h4>🚀 Innovation</h4>
          <p>AI-powered recommendations launch kiye! Ab customers ko exactly wahi mil raha jo chahiye unko.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Key Features Section -->
<div class="container my-5 py-5">
  <div class="text-center mb-5">
    <h2 class="section-title display-5">Kyun Choose Karenge Hume? 🤔</h2>
    <p class="lead text-muted">Ye hai hamare superpowers jo hume different banate hain</p>
  </div>
  
  <div class="row g-4">
    <div class="col-lg-3 col-md-6">
      <div class="feature-card">
        <div class="feature-icon">💯</div>
        <h5>100% Authentic</h5>
        <p>Har product genuine hai, fake products ka koi chance nahi! Quality guarantee ke saath.</p>
      </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
      <div class="feature-card">
        <div class="feature-icon">⚡</div>
        <h5>Lightning Fast</h5>
        <p>Same day delivery major cities mein! Order kiya aur milmega turant, bilkul jadoo jaisa.</p>
      </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
      <div class="feature-card">
        <div class="feature-icon">💰</div>
        <h5>Best Prices</h5>
        <p>Market mein sabse kam price guarantee! Agar kahin aur kam mila, toh hum aur bhi kam kar denge.</p>
      </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
      <div class="feature-card">
        <div class="feature-icon">🛡️</div>
        <h5>Safe Shopping</h5>
        <p>Secure payment, easy returns, aur 24/7 customer support. Tension-free shopping experience!</p>
      </div>
    </div>
  </div>
</div>

<!-- Statistics Section -->
<div class="stats-section">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-5 fw-bold" style="color: var(--dark-green);">Numbers Mein Humari Story 📊</h2>
      <p class="lead">Dekho kitna pyaar mila hai customers se</p>
    </div>
    
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <span class="stat-number">5L+</span>
          <div class="stat-label">Happy Customers 😊</div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <span class="stat-number">50K+</span>
          <div class="stat-label">Products Available 📦</div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <span class="stat-number">500+</span>
          <div class="stat-label">Cities Covered 🌍</div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <span class="stat-number">4.8★</span>
          <div class="stat-label">Customer Rating 🌟</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Team Section -->
<div class="container my-5 py-5">
  <div class="text-center mb-5">
    <h2 class="section-title display-5">Hamari Dream Team 👥</h2>
    <p class="lead text-muted">Mil ke banate hain ye magic possible</p>
  </div>
  
  <div class="row g-4">
    <div class="col-lg-4 col-md-6">
      <div class="team-card">
        <img src="https://picsum.photos/200/200?random=201" class="team-avatar" alt="CEO">
        <h5>Harshit Joshi 👨‍💼</h5>
        <p class="text-muted mb-3">CEO & Founder</p>
        <p>"Technology ke through sabki life better banane ka dream hai mera!"</p>
      </div>
    </div>
    
    <div class="col-lg-4 col-md-6">
      <div class="team-card">
        <img src="https://picsum.photos/200/200?random=202" class="team-avatar" alt="COO">
        <h5>Harshit Joshi</h5>
        <p class="text-muted mb-3">COO & Co-Founder</p>
        <p>"Customer satisfaction hi hamare business ka foundation hai!"</p>
      </div>
    </div>
    
    <div class="col-lg-4 col-md-6">
      <div class="team-card">
        <img src="https://picsum.photos/200/200?random=203" class="team-avatar" alt="CTO">
        <h5>Harshit Joshi</h5>
        <p class="text-muted mb-3">Head of Technology</p>
        <p>"Code ke through innovation create karna, ye mera passion hai!"</p>
      </div>
    </div>
  </div>
</div>

<!-- Call to Action -->
<div class="cta-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2 class="display-5 fw-bold mb-4">Ready Ho Chor Bajar Experience Ke Liye? 🚀</h2>
        <p class="lead mb-4">Join karo 5 lakh+ happy customers ka family! Shuru karo apna shopping adventure today!</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
          <a href="../public/index.php" class="btn-chor">🏠 Start Shopping</a>
          <a href="../public/register.php" class="btn-chor">📝 Create Account</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Contact Info Section -->
<div class="container my-5 py-5">
  <div class="text-center mb-5">
    <h2 class="section-title display-5">Connect Karo Humse 📞</h2>
    <p class="lead text-muted">Koi problem ho toh batao, hum hain na!</p>
  </div>
  
  <div class="row g-4">
    <div class="col-lg-4 text-center">
      <div class="feature-card">
        <div class="feature-icon">📍</div>
        <h5>Visit Us</h5>
        <p>Sector 14, Gurugram<br>Haryana - 122001<br>India</p>
      </div>
    </div>
    
    <div class="col-lg-4 text-center">
      <div class="feature-card">
        <div class="feature-icon">📞</div>
        <h5>Call Us</h5>
        <p>+91 98765-43210<br>24/7 Customer Support<br>Toll Free Available</p>
      </div>
    </div>
    
    <div class="col-lg-4 text-center">
      <div class="feature-card">
        <div class="feature-icon">📧</div>
        <h5>Email Us</h5>
        <p>help@chorbajar.com<br>Response within 24 hours<br>Priority Support</p>
      </div>
    </div>
  </div>
</div>

<script>
// Animate stats on scroll
document.addEventListener('DOMContentLoaded', function() {
  const animateStats = () => {
    const stats = document.querySelectorAll('.stat-number');
    stats.forEach(stat => {
      const target = stat.textContent;
      const numTarget = parseInt(target.replace(/[^\d]/g, ''));
      if (numTarget) {
        let current = 0;
        const increment = numTarget / 100;
        const timer = setInterval(() => {
          current += increment;
          if (current >= numTarget) {
            current = numTarget;
            clearInterval(timer);
          }
          stat.textContent = Math.floor(current) + target.replace(/[\d]/g, '').replace(/\d+/, '');
        }, 20);
      }
    });
  };

  // Trigger animation when stats section is visible
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateStats();
        observer.unobserve(entry.target);
      }
    });
  });

  const statsSection = document.querySelector('.stats-section');
  if (statsSection) {
    observer.observe(statsSection);
  }
});
</script>

<?php include("../includes/footer.php"); ?>