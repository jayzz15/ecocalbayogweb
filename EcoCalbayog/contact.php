<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCalbayog | Contact Us</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <!-- Header / Navbar -->
    <header>
        <div class="container navbar">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-leaf"></i> EcoCalbayog
            </a>
            
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="issue-data.php">Issue and Data</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="get-involved.php">Get Involved</a></li>
                <li><a href="contact.php" class="active">Contact</a></li>
            </ul>


            <button class="menu-btn" id="menu-btn"><i class="fa-solid fa-bars"></i></button>
        </div>
    </header>

    <!-- Header Banner -->
    <section class="dark-section" style="padding: 60px 0; text-align: left;">
        <div class="container" style="max-width: 800px; margin: 0;">
            <h1 style="color: white; font-size: 2.5rem; margin-bottom: 10px;">Contact Us</h1>
            <p style="font-size: 1.1rem; color: rgba(255,255,255,0.9);">We'd love to hear from you. Get in touch with our team.</p>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="container" style="padding: 80px 20px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 60px;">
            
            <!-- Contact Form -->
            <div>
                <h2 style="font-size: 1.8rem; margin-bottom: 30px; text-align: left;">Send Us a Message</h2>
                <form action="#" method="POST" style="background: white; padding: 40px; border-radius: 12px; box-shadow: var(--card-shadow);">
                    
                    <div style="margin-bottom: 20px;">
                        <label for="name" style="display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.95rem;">Your Name *</label>
                        <input type="text" id="name" name="name" placeholder="John Doe" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 1rem; outline: none; transition: border-color 0.3s;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label for="email" style="display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.95rem;">Email Address *</label>
                        <input type="email" id="email" name="email" placeholder="john@example.com" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 1rem; outline: none; transition: border-color 0.3s;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label for="subject" style="display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.95rem;">Subject *</label>
                        <select id="subject" name="subject" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 1rem; outline: none; background-color: white; appearance: none; cursor: pointer;">
                            <option value="" disabled selected>Select a subject</option>
                            <option value="volunteer">Volunteer Inquiry</option>
                            <option value="partner">Partnership Opportunity</option>
                            <option value="general">General Question</option>
                        </select>
                    </div>
                    
                    <div style="margin-bottom: 30px;">
                        <label for="message" style="display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.95rem;">Message *</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tell us how we can help you..." required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 1rem; outline: none; resize: vertical; transition: border-color 0.3s;"></textarea>
                    </div>
                    
                    <button type="submit" class="btn" style="width: 100%; padding: 14px; font-size: 1.1rem; border-radius: 8px;"><i class="fa-regular fa-paper-plane" style="margin-right: 10px;"></i>Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <h2 style="font-size: 1.8rem; margin-bottom: 30px; text-align: left;">Contact Information</h2>
                <p style="color: var(--text-gray); margin-bottom: 40px; font-size: 1.05rem;">Feel free to reach out to us through any of the following channels. We're here to help!</p>
                
                <div style="display: flex; flex-direction: column; gap: 30px;">
                    
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div class="card-icon bg-green" style="width: 45px; height: 45px; font-size: 1.2rem; flex-shrink: 0;"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <h4 style="margin-bottom: 5px; font-size: 1.1rem;">Office Address</h4>
                            <p style="color: var(--text-gray); margin-bottom: 0; line-height: 1.5;">123 Environmental Drive<br>Calbayog City, Samar 6710<br>Philippines</p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div class="card-icon bg-blue" style="width: 45px; height: 45px; font-size: 1.2rem; flex-shrink: 0;"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <h4 style="margin-bottom: 5px; font-size: 1.1rem;">Phone</h4>
                            <p style="color: var(--text-gray); margin-bottom: 0; line-height: 1.5;">Main: +63 (055) 123-4567<br>Mobile: +63 912 345 6789</p>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div class="card-icon bg-light-green" style="width: 45px; height: 45px; font-size: 1.2rem; flex-shrink: 0;"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <h4 style="margin-bottom: 5px; font-size: 1.1rem;">Email</h4>
                            <p style="color: var(--text-gray); margin-bottom: 0; line-height: 1.5;">General: info@ecocalbayog.ph<br>Volunteer: volunteer@ecocalbayog.ph</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div class="card-icon" style="background-color: #ff9800; width: 45px; height: 45px; font-size: 1.2rem; flex-shrink: 0;"><i class="fa-regular fa-clock"></i></div>
                        <div>
                            <h4 style="margin-bottom: 5px; font-size: 1.1rem;">Office Hours</h4>
                            <p style="color: var(--text-gray); margin-bottom: 0; line-height: 1.5;">Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 1:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>

                </div>

                <div style="margin-top: 50px;">
                    <h4 style="margin-bottom: 20px; font-size: 1.1rem;">Follow Us on Social Media</h4>
                    <div class="social-links" style="display: flex; gap: 15px;">
                        <a href="#" style="background: white; color: var(--text-gray); box-shadow: var(--card-shadow);"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" style="background: white; color: var(--text-gray); box-shadow: var(--card-shadow);"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" style="background: white; color: var(--text-gray); box-shadow: var(--card-shadow);"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>

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

    <!-- Main JS -->
    <script src="js/main.js"></script>
</body>
</html>
