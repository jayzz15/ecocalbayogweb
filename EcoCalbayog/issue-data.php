<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCalbayog | Issue and Data</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Header / Navbar (Same as index.php) -->
    <header>
        <div class="container navbar">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-leaf"></i> EcoCalbayog
            </a>
            
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="issue-data.php" class="active">Issue and Data</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="get-involved.php">Get Involved</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>


            <button class="menu-btn" id="menu-btn"><i class="fa-solid fa-bars"></i></button>
        </div>
    </header>

    <!-- Dashboard Header -->
    <section class="dark-section" style="padding: 50px 0; text-align: left;">
        <div class="container" style="max-width: 800px; margin: 0;">
            <h1 style="color: white; font-size: 2.5rem; margin-bottom: 10px;">Environmental Data Dashboard</h1>
            <p style="font-size: 1.1rem;">Real-time insights into Calbayog's environmental progress</p>
        </div>
    </section>

    <!-- Data Metrics Cards -->
    <section class="container" style="padding: 40px 20px; margin-top: -60px; position: relative; z-index: 10;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <div style="background: var(--primary-color); color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; margin-bottom: 15px;"><i class="fa-solid fa-tree"></i></div>
                <h3 style="font-size: 1.5rem; margin-bottom: 5px;">10,847</h3>
                <p style="font-size: 0.85rem; color: var(--text-gray); margin-bottom: 10px;">Trees Planted</p>
                <div style="color: #4CAF50; font-size: 0.8rem; font-weight: 500;"><i class="fa-solid fa-arrow-trend-up"></i> +12.5%</div>
            </div>
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <div style="background: #4CAF50; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; margin-bottom: 15px;"><i class="fa-solid fa-recycle"></i></div>
                <h3 style="font-size: 1.5rem; margin-bottom: 5px;">85.2%</h3>
                <p style="font-size: 0.85rem; color: var(--text-gray); margin-bottom: 10px;">Waste Recycled</p>
                <div style="color: #4CAF50; font-size: 0.8rem; font-weight: 500;"><i class="fa-solid fa-arrow-trend-up"></i> +5.2%</div>
            </div>
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <div style="background: #2196F3; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; margin-bottom: 15px;"><i class="fa-solid fa-droplet"></i></div>
                <h3 style="font-size: 1.5rem; margin-bottom: 5px;">2.4M L</h3>
                <p style="font-size: 0.85rem; color: var(--text-gray); margin-bottom: 10px;">Water Saved</p>
                <div style="color: #4CAF50; font-size: 0.8rem; font-weight: 500;"><i class="fa-solid fa-arrow-trend-up"></i> +8.1%</div>
            </div>
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <div style="background: #03A9F4; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; margin-bottom: 15px;"><i class="fa-solid fa-wind"></i></div>
                <h3 style="font-size: 1.5rem; margin-bottom: 5px;">Good</h3>
                <p style="font-size: 0.85rem; color: var(--text-gray); margin-bottom: 10px;">Air Quality</p>
                <div style="color: #4CAF50; font-size: 0.8rem; font-weight: 500;"><i class="fa-solid fa-arrow-trend-down"></i> -5.2 AQI</div>
            </div>
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <div style="background: var(--secondary-color); color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; margin-bottom: 15px;"><i class="fa-solid fa-users"></i></div>
                <h3 style="font-size: 1.5rem; margin-bottom: 5px;">1,245</h3>
                <p style="font-size: 0.85rem; color: var(--text-gray); margin-bottom: 10px;">Active Volunteers</p>
                <div style="color: #4CAF50; font-size: 0.8rem; font-weight: 500;"><i class="fa-solid fa-arrow-trend-up"></i> +18.5%</div>
            </div>
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <div style="background: #3F51B5; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; margin-bottom: 15px;"><i class="fa-solid fa-chart-line"></i></div>
                <h3 style="font-size: 1.5rem; margin-bottom: 5px;">450 tons</h3>
                <p style="font-size: 0.85rem; color: var(--text-gray); margin-bottom: 10px;">Carbon Offset</p>
                <div style="color: #4CAF50; font-size: 0.8rem; font-weight: 500;"><i class="fa-solid fa-arrow-trend-up"></i> +15.7%</div>
            </div>
        </div>
    </section>

    <!-- Charts Section 1 -->
    <section class="container" style="padding-bottom: 40px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 30px;">
            <!-- Line Chart -->
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <h3 style="font-size: 1.1rem; margin-bottom: 20px;">Monthly Environmental Progress</h3>
                <div style="height: 250px; position: relative; width: 100%;">
                    <canvas id="monthlyProgressChart"></canvas>
                </div>
            </div>
            
            <!-- Pie Chart -->
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: var(--card-shadow); display: flex; flex-direction: column;">
                <h3 style="font-size: 1.1rem; margin-bottom: 20px;">Waste Management Distribution</h3>
                <div style="flex: 1; display: flex; align-items: center; justify-content: center; position: relative;">
                    <!-- Ensure the canvas wrapper is not arbitrarily resizing -->
                    <div style="height: 250px; position: relative; width: 100%;">
                        <canvas id="wasteDistributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Charts Section 2 -->
    <section class="container" style="padding-bottom: 80px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 30px;">
            <!-- Area Chart -->
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <h3 style="font-size: 1.1rem; margin-bottom: 20px;">Air Quality Index (Weekly)</h3>
                <div style="height: 250px; position: relative; width: 100%;">
                    <canvas id="airQualityChart"></canvas>
                </div>
                <p style="font-size: 0.85rem; color: var(--text-gray); margin-top: 15px; margin-bottom: 0;">Lower is better. AQI below 50 is considered good.</p>
            </div>
            
            <!-- Bar Chart -->
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: var(--card-shadow);">
                <h3 style="font-size: 1.1rem; margin-bottom: 20px;">Water Usage by Sector</h3>
                <div style="height: 250px; position: relative; width: 100%;">
                    <canvas id="waterUsageChart"></canvas>
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

    <!-- Main JS & Charts Builder -->
    <script src="js/main.js"></script>
    <script src="js/charts.js"></script>
</body>
</html>
