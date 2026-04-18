<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCalbayog | Programs</title>
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
                <li><a href="about.php">About</a></li>
                <li><a href="issue-data.php">Issue and Data</a></li>
                <li><a href="programs.php" class="active">Programs</a></li>
                <li><a href="get-involved.php">Get Involved</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>


            <button class="menu-btn" id="menu-btn"><i class="fa-solid fa-bars"></i></button>
        </div>
    </header>

    <!-- Programs Header Section (Light bg like Home) -->
    <section class="container" style="padding-top: 60px; padding-bottom: 20px;">
        <div style="padding-top: 40px;">
            <!-- Not a hero, just a white/light area -->
        </div>
    </section>

    <!-- Our Eco Initiatives Detailed Section -->
    <section class="bg-light" style="padding: 60px 0;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                
                <!-- Clean Water Initiative Card -->
                <div style="background: white; border-radius: var(--border-radius); padding: 30px; box-shadow: var(--card-shadow); border-top: 4px solid #2196F3;">
                    <div class="card-icon bg-blue" style="margin-bottom: 15px;"><i class="fa-solid fa-droplet"></i></div>
                    <h3>Clean Water Initiative</h3>
                    <p style="margin-bottom: 15px;">Protecting water sources and ensuring access to safe drinking water for all communities.</p>
                    <span style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 600; font-size: 0.85rem; padding: 6px 12px; border-radius: 20px; margin-bottom: 20px;">Impact: 50,000 residents served</span>
                    
                    <h4 style="font-size: 0.95rem; margin-bottom: 10px;">Program Features:</h4>
                    <ul style="list-style: none; color: var(--text-gray); font-size: 0.9rem;">
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>River cleanup campaigns</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Water quality monitoring</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Rainwater harvesting systems</li>
                        <li><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Watershed protection</li>
                    </ul>
                </div>

                <!-- Renewable Energy Card -->
                <div style="background: white; border-radius: var(--border-radius); padding: 30px; box-shadow: var(--card-shadow); border-top: 4px solid #ff9800;">
                    <div class="card-icon" style="background-color: #ff9800; margin-bottom: 15px;"><i class="fa-solid fa-sun"></i></div>
                    <h3>Renewable Energy Project</h3>
                    <p style="margin-bottom: 15px;">Transitioning to clean energy through solar installations and community energy programs.</p>
                    <span style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 600; font-size: 0.85rem; padding: 6px 12px; border-radius: 20px; margin-bottom: 20px;">Impact: 500+ solar panels installed</span>
                    
                    <h4 style="font-size: 0.95rem; margin-bottom: 10px;">Program Features:</h4>
                    <ul style="list-style: none; color: var(--text-gray); font-size: 0.9rem;">
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Solar panel subsidies</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Community solar gardens</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Energy efficiency workshops</li>
                        <li><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Green building incentives</li>
                    </ul>
                </div>

                <!-- Environmental Education Card -->
                <div style="background: white; border-radius: var(--border-radius); padding: 30px; box-shadow: var(--card-shadow); border-top: 4px solid #1976D2;">
                    <div class="card-icon" style="background-color: #1976D2; margin-bottom: 15px;"><i class="fa-solid fa-graduation-cap"></i></div>
                    <h3>Environmental Education</h3>
                    <p style="margin-bottom: 15px;">Teaching the next generation about sustainability and environmental stewardship.</p>
                    <span style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 600; font-size: 0.85rem; padding: 6px 12px; border-radius: 20px; margin-bottom: 20px;">Impact: 10,000+ students reached</span>
                    
                    <h4 style="font-size: 0.95rem; margin-bottom: 10px;">Program Features:</h4>
                    <ul style="list-style: none; color: var(--text-gray); font-size: 0.9rem;">
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>School programs</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Eco-clubs support</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Field trips to nature sites</li>
                        <li><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Teacher training workshops</li>
                    </ul>
                </div>

                <!-- Urban Gardening Card -->
                <div style="background: white; border-radius: var(--border-radius); padding: 30px; box-shadow: var(--card-shadow); border-top: 4px solid #4CAF50;">
                    <div class="card-icon" style="background-color: #4CAF50; margin-bottom: 15px;"><i class="fa-solid fa-seedling"></i></div>
                    <h3>Urban Gardening</h3>
                    <p style="margin-bottom: 15px;">Creating green spaces and promoting local food production in urban areas.</p>
                    <span style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 600; font-size: 0.85rem; padding: 6px 12px; border-radius: 20px; margin-bottom: 20px;">Impact: 200+ community gardens</span>
                    
                    <h4 style="font-size: 0.95rem; margin-bottom: 10px;">Program Features:</h4>
                    <ul style="list-style: none; color: var(--text-gray); font-size: 0.9rem;">
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Community garden plots</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Organic farming training</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Seed library program</li>
                        <li><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Rooftop garden initiatives</li>
                    </ul>
                </div>

                <!-- Air Quality Monitoring Card -->
                <div style="background: white; border-radius: var(--border-radius); padding: 30px; box-shadow: var(--card-shadow); border-top: 4px solid #03A9F4;">
                    <div class="card-icon" style="background-color: #03A9F4; margin-bottom: 15px;"><i class="fa-solid fa-wind"></i></div>
                    <h3>Air Quality Monitoring</h3>
                    <p style="margin-bottom: 15px;">Tracking and improving air quality through data collection and emission reduction.</p>
                    <span style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 600; font-size: 0.85rem; padding: 6px 12px; border-radius: 20px; margin-bottom: 20px;">Impact: AQI improved by 25%</span>
                    
                    <h4 style="font-size: 0.95rem; margin-bottom: 10px;">Program Features:</h4>
                    <ul style="list-style: none; color: var(--text-gray); font-size: 0.9rem;">
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Real-time air monitoring</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Tree-planting for air quality</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Vehicle emission testing</li>
                        <li><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Industrial compliance</li>
                    </ul>
                </div>

                <!-- Coastal Conservation Card -->
                <div style="background: white; border-radius: var(--border-radius); padding: 30px; box-shadow: var(--card-shadow); border-top: 4px solid #009688;">
                    <div class="card-icon" style="background-color: #009688; margin-bottom: 15px;"><i class="fa-solid fa-fish"></i></div>
                    <h3>Coastal Conservation</h3>
                    <p style="margin-bottom: 15px;">Protecting marine ecosystems and promoting sustainable fishing practices.</p>
                    <span style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 600; font-size: 0.85rem; padding: 6px 12px; border-radius: 20px; margin-bottom: 20px;">Impact: 10km coastline protected</span>
                    
                    <h4 style="font-size: 0.95rem; margin-bottom: 10px;">Program Features:</h4>
                    <ul style="list-style: none; color: var(--text-gray); font-size: 0.9rem;">
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Mangrove restoration</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Beach cleanup drives</li>
                        <li style="margin-bottom: 8px;"><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Marine protected areas</li>
                        <li><i class="fa-solid fa-circle" style="font-size: 0.4rem; color: var(--primary-color); margin-right: 8px; vertical-align: middle;"></i>Sustainable fishing education</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="dark-section" style="padding: 100px 0;">
        <div class="container text-center">
            <h2 style="margin-bottom: 20px;">Want to participate?</h2>
            <p style="margin-bottom: 40px; font-size: 1.1rem; color: rgba(255,255,255,0.9);">Join us in making Calbayog greener and more sustainable</p>
            <a href="get-involved.php" class="btn" style="background: white; color: var(--primary-color); font-weight: 600; padding: 12px 30px;">Get Involved Today</a>
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

    <script src="js/main.js"></script>
</body>
</html>
