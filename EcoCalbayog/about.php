<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCalbayog | About Us</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Header / Navbar -->
    <header>
        <div class="container navbar">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-leaf"></i> EcoCalbayog
            </a>
            
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php" class="active">About</a></li>
                <li><a href="issue-data.php">Issue and Data</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="get-involved.php">Get Involved</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>



            <button class="menu-btn" id="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- Page Header -->
    <section class="dark-section" style="padding: 60px 0; text-align: left;">
        <div class="container" style="max-width: 800px; margin: 0;">
            <h1 style="color: white; font-size: 2.5rem; margin-bottom: 20px;">About EcoCalbayog</h1>
            <p style="font-size: 1.1rem; max-width: 600px;">We are a community-driven initiative dedicated to preserving and protecting the natural beauty of Calbayog City while building a sustainable future for all residents.</p>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="container" style="padding: 100px 20px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            
            <!-- Mission Card -->
            <div style="background-color: #f0fdf7; border-radius: 16px; padding: 40px; box-shadow: var(--card-shadow);">
                <div style="width: 50px; height: 50px; background-color: var(--primary-color); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 20px;">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 15px;">Our Mission</h3>
                <p style="font-size: 1rem; color: #444; line-height: 1.8;">To mobilize the people of Calbayog City in protecting our natural resources through education, community action, and sustainable practices that ensure a healthy environment for current and future generations.</p>
            </div>

            <!-- Vision Card -->
            <div style="background-color: #f0faff; border-radius: 16px; padding: 40px; box-shadow: var(--card-shadow);">
                <div style="width: 50px; height: 50px; background-color: #0dacc1; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 20px;">
                    <i class="fa-regular fa-eye"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 15px;">Our Vision</h3>
                <p style="font-size: 1rem; color: #444; line-height: 1.8;">A thriving Calbayog City where clean air, pure water, lush forests, and sustainable living are the norm. A place where every citizen is an environmental steward, actively participating in preserving our precious natural heritage.</p>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <a href="index.php" class="footer-logo">
                        <i class="fa-solid fa-leaf"></i> EcoCalbayog
                    </a>
                    <p style="font-size: 0.95em;">Building a sustainable future for Calbayog through community action and environmental stewardship.</p>
                </div>
                
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="about.php">About</a></li>
                        <li><a href="#">Protecting with us to build a better future</a></li>
                        <li><a href="programs.php">Our Programs</a></li>
                        <li><a href="get-involved.php">Get Involved</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <ul class="contact-info">
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Calbayog City, Samar, Philippines</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <span>+63 123 456 7890</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <span>info@ecocalbayog.ph</span>
                        </li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                    <p style="margin-top: 15px; font-size: 0.85em;">@Calbayog</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2026 EcoCalbayog. All rights reserved.</p>
                <div style="display: flex; gap: 20px;">
                    <a href="about.php" style="color: var(--text-gray); text-decoration: none;">About</a>
                    <span>Protecting with us to build a better future</span>
                </div>
                <p>@Calbayog</p>
            </div>
        </div>
    </footer>

    <!-- Floating Action Buttons -->
    <div class="floating-actions">
        <button class="action-btn btn-idea" title="Idea/FAQ"><i class="fa-regular fa-lightbulb"></i></button>
        <button class="action-btn btn-up" id="scrollTopBtn" title="Back to top"><i class="fa-solid fa-arrow-up"></i></button>
    </div>

    <!-- Main JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>
