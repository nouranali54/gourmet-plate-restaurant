<?php
session_start();
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PREMIER PLATE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Explora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="navbar">
    <div class="logo">Gourmet Plate</div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="#categories">Categories</a></li>
        <li><a href="#contact">Contact Us</a></li>

        <?php if (isset($_SESSION['user_id'])): ?>
            <li style="color:#d2ba6d;">
                Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>
            </li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</header>


<section class="hero">
    <div class="hero-text">
        <span class="label">Discover the Luxury of Fine Dining</span>
        <h1>Enjoy a refined culinary experience crafted with elegance and passion.</h1>
        <p>Our restaurant brings together exquisite flavors, warm ambiance, and world-class service for every guest.</p>
        <div class="restaurant-icons"></div>
    </div>
    <div class="hero-image">
        <img src="images/logo.jpg" alt="Restaurant Image">
    </div>
</section>


<section class="reservation-section">
    <h2>Reserve Your Table</h2>
    <p class="subtitle">Book a table in advance to enjoy your time with Friends & Family</p>
  <!-- <form class="reservation-form" method="POST" action="reserve_table.php">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="number" name="persons" placeholder="No. of Person" required>
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <button type="submit">Reserve A Table</button>
</form> -->
<form class="reservation-form" method="POST" action="reserve_table.php">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="number" name="persons" placeholder="No. of Guests" required>
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <button type="submit">Reserve A Table</button>
</form>

<!-- <form class="reservation-form" method="POST" action="reserve_table.php">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="number" name="persons" placeholder="No. of Guests" min="1" required>
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <button type="submit">Reserve A Table</button>
</form>
 -->


</section>


<section class="about">
    <div class="about-text">
        <h2>About Us</h2>
        <p>
            Gourmet Plate – a culinary art.<br><br>
            Culinary artists often take inspiration from various cuisines, cultural traditions, and creative techniques to create unforgettable dishes.
        </p>
        <button class="learn-more">Learn More</button>
    </div>
    <div class="about-img">
        <img src="images/about.jpg" alt="Chef">
    </div>
</section>


<section class="categories" id="categories">
    <h2>Our Categories</h2>
    <div class="category-container">

 
        <div class="category-card">
    <a href="menu.html#Appetizers">
            <img src="images/starter.jpg" alt="Starters">
            <h3>Appetizers</h3>
            </a>
        </div>
        

         <div class="category-card">
            <a href="menu.php#Main-Dishes">
                <img src="images/main.jpg" alt="Main Dishes">
                <h3>Main Dishes</h3>
            </a>
        </div>


        <div class="category-card">
             <a href="menu.php#Desserts">
                <img src="images/dessert.jpg" alt="Desserts">
                <h3>Desserts</h3>
            </a>
        </div>
        <div class="category-card">
             <a href="menu.php#DRINKS">
                <img src="images/drinks.jpg" alt="Drinks">
                <h3>Drinks</h3>
            </a>
        </div>
    </div>
</section>

<section class="contact" id="contact">
    <footer class="menu-footer">
        <div class="footer-inner">
            <h3>Thank You for Visiting</h3>
            <p>📍123 Food Street, Alexandria, Egypt</p>
            <p>📞Call: 01111111</p>
            <p>📧Open: 10:00 AM – 11:00 PM</p>
            <div class="footer-line"></div>
            <p class="copyright">© 2025 Gourmet Plate. All Rights Reserved.</p>
        </div>
    </footer>
</section>

<div id="reservation-alert" class="custom-modal">
    <div class="modal-content">
        <h3 class="modal-title"></h3> 
        <p class="modal-message"></p>
        <button class="modal-confirm-btn">Done</button>
    </div>
</div>
<div class="about-text">

</div>
<script src="main.js"></script>
<?php if (isset($_GET['reserved'])): ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("reservation-alert");
        const btn = modal.querySelector(".modal-confirm-btn");

        modal.classList.add("is-visible");

        btn.onclick = function () {
            modal.classList.remove("is-visible");
            // نشيل ?reserved من الـ URL
            window.history.replaceState({}, document.title, "index.php");
        };
    });
</script>
<?php endif; ?>

</body>
<?php if (isset($_GET['reserved'])): ?>
<script>
    alert("Reservation confirmed and saved!");
</script>
<?php endif; ?>

</html>