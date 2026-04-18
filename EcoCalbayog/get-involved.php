<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCalbayog | Get Involved</title>
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
                <li><a href="get-involved.php" class="active">Get Involved</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>

            <button class="menu-btn" id="menu-btn"><i class="fa-solid fa-bars"></i></button>
        </div>
    </header>

    <!-- Header Banner -->
    <section class="dark-section" style="padding: 60px 0; text-align: left;">
        <div class="container" style="max-width: 800px; margin: 0;">
            <h1 style="color: white; font-size: 2.5rem; margin-bottom: 10px;">Get Involved</h1>
            <p style="font-size: 1.1rem; color: rgba(255,255,255,0.9);">Be part of the change. Every action counts.</p>
        </div>
    </section>

    <!-- Ways to Get Involved -->
    <section class="container text-center" style="padding: 80px 20px;">
        <h2 style="color: var(--text-dark);">Ways to Get Involved</h2>
        <p class="subtitle" style="margin-bottom: 50px;">Choose how you'd like to contribute to our mission</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; text-align: left;">
            
            <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: var(--card-shadow); display: flex; flex-direction: column;">
                <div class="card-icon bg-green"><i class="fa-solid fa-user-plus"></i></div>
                <h3 style="margin-bottom: 15px; font-size: 1.25rem;">Become a Volunteer</h3>
                <p style="margin-bottom: 25px; font-size: 0.95rem; flex-grow: 1;">Join our team of passionate environmental advocates and make a direct impact.</p>
                <a href="registerForm.php" class="btn" style="width: 100%;">Sign Up Now</a>
            </div>
            
            <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: var(--card-shadow); display: flex; flex-direction: column;">
                <div class="card-icon bg-blue"><i class="fa-regular fa-calendar"></i></div>
                <h3 style="margin-bottom: 15px; font-size: 1.25rem;">Attend Events</h3>
                <p style="margin-bottom: 25px; font-size: 0.95rem; flex-grow: 1;">Participate in tree planting, beach cleanups, and educational workshops.</p>
                <a href="#" class="btn action-trigger-btn" style="width: 100%; background-color: #2196F3;">Sign Up for Events</a>
            </div>
            
            <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: var(--card-shadow); display: flex; flex-direction: column;">
                <div class="card-icon bg-light-green"><i class="fa-solid fa-dollar-sign"></i></div>
                <h3 style="margin-bottom: 15px; font-size: 1.25rem;">Make a Donation</h3>
                <p style="margin-bottom: 25px; font-size: 0.95rem; flex-grow: 1;">Support our programs financially and help us expand our environmental initiatives.</p>
                <a href="donate.php" class="btn" style="width: 100%; background-color: #4CAF50;">Donate</a>
            </div>
            
            <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: var(--card-shadow); display: flex; flex-direction: column;">
                <div class="card-icon" style="background-color: #2196F3;"><i class="fa-solid fa-share-nodes"></i></div>
                <h3 style="margin-bottom: 15px; font-size: 1.25rem;">Spread the Word</h3>
                <p style="margin-bottom: 25px; font-size: 0.95rem; flex-grow: 1;">Share our mission on social media and encourage others to get involved.</p>
                <a href="#" class="btn" style="width: 100%; background-color: #2196F3;">Share</a>
            </div>

            <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: var(--card-shadow); display: flex; flex-direction: column;">
                <div class="card-icon" style="background-color: #008f75;"><i class="fa-solid fa-handshake-angle"></i></div>
                <h3 style="margin-bottom: 15px; font-size: 1.25rem;">Partner With Us</h3>
                <p style="margin-bottom: 25px; font-size: 0.95rem; flex-grow: 1;">Collaborate with EcoCalbayog as a business, school, or organization.</p>
                <a href="#" class="btn" style="width: 100%; background-color: #008f75;">Learn More</a>
            </div>

            <!-- ADVOCATE CARD - Now connected to modal -->
            <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: var(--card-shadow); display: flex; flex-direction: column;">
                <div class="card-icon" style="background-color: #5C6BC0;"><i class="fa-solid fa-bullhorn"></i></div>
                <h3 style="margin-bottom: 15px; font-size: 1.25rem;">Advocate</h3>
                <p style="margin-bottom: 25px; font-size: 0.95rem; flex-grow: 1;">Help us advocate for stronger environmental policies and sustainable practices.</p>
                <button class="btn advocate-trigger-btn" style="width: 100%; background-color: #5C6BC0; border: none; cursor: pointer;">Take Action</button>
            </div>
            
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="container text-center" style="padding-bottom: 80px;">
        <h2>Upcoming Events</h2>
        <p class="subtitle" style="margin-bottom: 40px;">Join us at our next environmental event</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px; text-align: left; max-width: 900px; margin: 0 auto;">
            
            <div class="event-card" data-event-title="Community Tree Planting" data-event-location="Malajog Ridge" data-event-date="2026-04-10" data-event-time="07:00" data-event-spots="45">
                <div style="background: var(--primary-color); color: white; width: 100px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;">
                    <span style="font-size: 2rem; font-weight: 700; line-height: 1;">10</span>
                    <span style="font-size: 1rem; text-transform: uppercase;">Apr</span>
                </div>
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="font-size: 1.2rem; margin-bottom: 10px;">Community Tree Planting</h3>
                    <p style="margin-bottom: 5px; font-size: 0.9rem; color: var(--text-gray);"><i class="fa-solid fa-location-dot" style="color: var(--primary-color); margin-right: 8px;"></i>Malajog Ridge</p>
                    <p style="margin-bottom: 15px; font-size: 0.9rem; color: var(--text-gray);"><i class="fa-regular fa-clock" style="color: var(--primary-color); margin-right: 8px;"></i>7:00 AM - 12:00 PM</p>
                    <span class="spots-badge" style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 500; font-size: 0.8rem; padding: 4px 10px; border-radius: 20px;">45 spots left</span>
                   
                </div>
            </div>

            <div class="event-card" data-event-title="Beach Cleanup Drive" data-event-location="Maquinit Beach" data-event-date="2026-04-15" data-event-time="06:00" data-event-spots="30">
                <div style="background: var(--primary-color); color: white; width: 100px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;">
                    <span style="font-size: 2rem; font-weight: 700; line-height: 1;">15</span>
                    <span style="font-size: 1rem; text-transform: uppercase;">Apr</span>
                </div>
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="font-size: 1.2rem; margin-bottom: 10px;">Beach Cleanup Drive</h3>
                    <p style="margin-bottom: 5px; font-size: 0.9rem; color: var(--text-gray);"><i class="fa-solid fa-location-dot" style="color: var(--primary-color); margin-right: 8px;"></i>Maquinit Beach</p>
                    <p style="margin-bottom: 15px; font-size: 0.9rem; color: var(--text-gray);"><i class="fa-regular fa-clock" style="color: var(--primary-color); margin-right: 8px;"></i>6:00 AM - 10:00 AM</p>
                    <span class="spots-badge" style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 500; font-size: 0.8rem; padding: 4px 10px; border-radius: 20px;">30 spots left</span>
                    
                </div>
            </div>

            <div class="event-card" data-event-title="Earth Day Celebration" data-event-location="City Plaza" data-event-date="2026-04-22" data-event-time="15:00" data-event-spots="100">
                <div style="background: var(--primary-color); color: white; width: 100px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;">
                    <span style="font-size: 2rem; font-weight: 700; line-height: 1;">22</span>
                    <span style="font-size: 1rem; text-transform: uppercase;">Apr</span>
                </div>
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="font-size: 1.2rem; margin-bottom: 10px;">Earth Day Celebration</h3>
                    <p style="margin-bottom: 5px; font-size: 0.9rem; color: var(--text-gray);"><i class="fa-solid fa-location-dot" style="color: var(--primary-color); margin-right: 8px;"></i>City Plaza</p>
                    <p style="margin-bottom: 15px; font-size: 0.9rem; color: var(--text-gray);"><i class="fa-regular fa-clock" style="color: var(--primary-color); margin-right: 8px;"></i>3:00 PM - 8:00 PM</p>
                    <span class="spots-badge" style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 500; font-size: 0.8rem; padding: 4px 10px; border-radius: 20px;">100+ spots left</span>
                  
                </div>
            </div>

            <div class="event-card" data-event-title="Composting Workshop" data-event-location="Community Center" data-event-date="2026-04-28" data-event-time="14:00" data-event-spots="20">
                <div style="background: var(--primary-color); color: white; width: 100px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;">
                    <span style="font-size: 2rem; font-weight: 700; line-height: 1;">28</span>
                    <span style="font-size: 1rem; text-transform: uppercase;">Apr</span>
                </div>
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="font-size: 1.2rem; margin-bottom: 10px;">Composting Workshop</h3>
                    <p style="margin-bottom: 5px; font-size: 0.9rem; color: var(--text-gray);"><i class="fa-solid fa-location-dot" style="color: var(--primary-color); margin-right: 8px;"></i>Community Center</p>
                    <p style="margin-bottom: 15px; font-size: 0.9rem; color: var(--text-gray);"><i class="fa-regular fa-clock" style="color: var(--primary-color); margin-right: 8px;"></i>2:00 PM - 5:00 PM</p>
                    <span class="spots-badge" style="display: inline-block; background: #e8f7fa; color: var(--primary-color); font-weight: 500; font-size: 0.8rem; padding: 4px 10px; border-radius: 20px;">20 spots left</span>
                 
                </div>
            </div>

        </div>

        <div style="margin-top: 40px;">
            <button class="btn view-calendar-btn" style="padding: 12px 30px; font-size: 1.05rem; cursor: pointer;">
                <i class="fa-regular fa-calendar-alt"></i> View Full Event Calendar
            </button>
        </div>
    </section>

    <!-- ACTION MODAL POPUP - Updated for Advocate -->
    <div class="modal-overlay" id="actionModal">
        <div class="modal-container">
            <div class="modal-header">
                <div class="modal-icon">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
                <h2 id="modalTitle">Take Environmental Action</h2>
                <button class="modal-close" id="closeModalBtn">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            
            <div class="modal-body">
                <p class="modal-subtitle" id="modalSubtitle">Fill out the form below to become an environmental advocate and help shape Calbayog's sustainable future!</p>
                
                <form id="actionForm" class="action-form">
                    <!-- Action Type (hidden field to track which action) -->
                    <input type="hidden" id="actionType" name="actionType" value="advocate">
                    
                    <!-- Event Title Group (for events) -->
                    <div class="form-group" id="eventTitleGroup" style="display: none;">
                        <label for="eventTitle">
                            <i class="fa-solid fa-calendar-day"></i> 
                            Event
                        </label>
                        <input type="text" id="eventTitle" name="eventTitle" readonly style="background: #f5f5f5; cursor: default;">
                    </div>
                    
                    <!-- ADVOCACY SPECIFIC FIELDS -->
                    <div class="form-group" id="advocacyAreaGroup">
                        <label for="advocacyArea">
                            <i class="fa-solid fa-leaf"></i> 
                            Advocacy Area
                        </label>
                        <select id="advocacyArea" name="advocacyArea" required>
                            <option value="">Select an advocacy area</option>
                            <option value="plastic-ban">Plastic Ban & Reduction</option>
                            <option value="reforestation">Reforestation & Forest Protection</option>
                            <option value="clean-energy">Clean Energy Transition</option>
                            <option value="waste-management">Proper Waste Management</option>
                            <option value="water-conservation">Water Conservation</option>
                            <option value="climate-education">Climate Change Education</option>
                            <option value="wildlife-protection">Wildlife Protection</option>
                            <option value="sustainable-agriculture">Sustainable Agriculture</option>
                        </select>
                        <div class="form-error" id="advocacyAreaError"></div>
                    </div>
                    
                    <!-- Location Input -->
                    <div class="form-group">
                        <label for="actionLocation">
                            <i class="fa-solid fa-location-dot"></i> 
                            Location / Barangay
                        </label>
                        <select id="actionLocation" name="location" required>
                            <option value="">Select your location</option>
                            <option value="downtown">Downtown Calbayog</option>
                            <option value="oquendo">Oquendo District</option>
                            <option value="tinambacan">Tinambacan District</option>
                            <option value="calbayog-plaza">Calbayog Plaza</option>
                            <option value="malajog-beach">Malajog Beach</option>
                            <option value="malajog-ridge">Malajog Ridge</option>
                            <option value="maquinit-beach">Maquinit Beach</option>
                            <option value="community-center">Community Center</option>
                            <option value="city-plaza">City Plaza</option>
                            <option value="other">Other Location</option>
                        </select>
                        <div class="form-error" id="locationError"></div>
                    </div>
                    
                    <!-- Preferred Date (for advocacy events) -->
                    <div class="form-group" id="dateGroup">
                        <label for="actionDate">
                            <i class="fa-regular fa-calendar"></i> 
                            Preferred Date for Activity
                        </label>
                        <input type="date" id="actionDate" name="date">
                        <div class="form-error" id="dateError"></div>
                    </div>
                    
                    <!-- Time Input -->
                    <div class="form-group" id="timeGroup">
                        <label for="actionTime">
                            <i class="fa-regular fa-clock"></i> 
                            Preferred Time
                        </label>
                        <input type="time" id="actionTime" name="time">
                        <div class="form-error" id="timeError"></div>
                    </div>
                    
                    <!-- Spots Input (for events) -->
                    <div class="form-group" id="spotsGroup" style="display: none;">
                        <label for="actionSpots">
                            <i class="fa-solid fa-users"></i> 
                            Number of Participants
                        </label>
                        <input type="number" id="actionSpots" name="spots" min="1" max="500" placeholder="How many people are joining?">
                        <div class="form-error" id="spotsError"></div>
                    </div>
                    
                    <!-- Advocacy Message -->
                    <div class="form-group">
                        <label for="advocacyMessage">
                            <i class="fa-solid fa-message"></i> 
                            Your Advocacy Message / Why do you want to advocate?
                        </label>
                        <textarea id="advocacyMessage" name="advocacyMessage" rows="4" placeholder="Share your passion for environmental advocacy. What changes would you like to see in Calbayog? How can you help?" required></textarea>
                        <div class="form-error" id="advocacyMessageError"></div>
                    </div>
                    
                    <!-- Personal Information -->
                    <div class="form-group">
                        <label for="participantName">
                            <i class="fa-solid fa-user"></i> 
                            Your Full Name
                        </label>
                        <input type="text" id="participantName" name="participantName" placeholder="Enter your full name" required>
                        <div class="form-error" id="nameError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="participantEmail">
                            <i class="fa-solid fa-envelope"></i> 
                            Email Address
                        </label>
                        <input type="email" id="participantEmail" name="participantEmail" placeholder="Enter your email address" required>
                        <div class="form-error" id="emailError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="participantPhone">
                            <i class="fa-solid fa-phone"></i> 
                            Phone Number
                        </label>
                        <input type="tel" id="participantPhone" name="participantPhone" placeholder="Contact number for updates" required>
                        <div class="form-error" id="phoneError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="organization">
                            <i class="fa-solid fa-building"></i> 
                            Organization / School (Optional)
                        </label>
                        <input type="text" id="organization" name="organization" placeholder="e.g., School name, Organization, or 'Individual'">
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="submit-action-btn">
                        <i class="fa-solid fa-paper-plane"></i> 
                        Submit Advocacy Form
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Toast Notification -->
    <div class="toast-notification" id="toastNotification">
        <div class="toast-content">
            <i class="fa-solid fa-check-circle"></i>
            <span id="toastMessage">Advocacy form submitted successfully!</span>
        </div>
    </div>

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
        <button class="action-btn btn-action" id="takeActionBtn" title="Take Environmental Action">
            <i class="fa-solid fa-hand-sparkles"></i>
        </button>
        <button class="action-btn btn-idea" title="Idea/FAQ"><i class="fa-regular fa-lightbulb"></i></button>
        <button class="action-btn btn-up" id="scrollTopBtn" title="Back to top"><i class="fa-solid fa-arrow-up"></i></button>
    </div>

    <!-- Main JS -->
    <script src="js/main.js"></script>
    
    <!-- Additional JavaScript for Get Involved Page - Advocate Focused -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get modal elements
            const modal = document.getElementById('actionModal');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const actionForm = document.getElementById('actionForm');
            const toast = document.getElementById('toastNotification');
            const modalTitle = document.getElementById('modalTitle');
            const modalSubtitle = document.getElementById('modalSubtitle');
            const actionTypeInput = document.getElementById('actionType');
            
            // Get form groups
            const eventTitleGroup = document.getElementById('eventTitleGroup');
            const advocacyAreaGroup = document.getElementById('advocacyAreaGroup');
            const dateGroup = document.getElementById('dateGroup');
            const timeGroup = document.getElementById('timeGroup');
            const spotsGroup = document.getElementById('spotsGroup');
            
            // Get form elements
            const advocacyArea = document.getElementById('advocacyArea');
            const locationSelect = document.getElementById('actionLocation');
            const dateInput = document.getElementById('actionDate');
            const timeInput = document.getElementById('actionTime');
            const advocacyMessage = document.getElementById('advocacyMessage');
            const nameInput = document.getElementById('participantName');
            const emailInput = document.getElementById('participantEmail');
            const phoneInput = document.getElementById('participantPhone');
            const organizationInput = document.getElementById('organization');
            
            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            if (dateInput) dateInput.min = today;
            
            // Function to show toast
            function showToast(message, isError = false) {
                const toastMessage = document.getElementById('toastMessage');
                const toastContent = toast.querySelector('.toast-content');
                
                if (toastMessage) toastMessage.textContent = message;
                if (toastContent) {
                    if (isError) {
                        toastContent.classList.add('error');
                    } else {
                        toastContent.classList.remove('error');
                    }
                }
                
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 3000);
            }
            
            // Function to clear all errors
            function clearAllErrors() {
                const errors = document.querySelectorAll('.form-error');
                errors.forEach(error => {
                    error.classList.remove('show');
                    error.textContent = '';
                });
                const inputs = document.querySelectorAll('.form-group input, .form-group select, .form-group textarea');
                inputs.forEach(input => input.classList.remove('error'));
            }
            
            // Function to show error
            function showError(elementId, message) {
                const errorElement = document.getElementById(elementId);
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.classList.add('show');
                }
                const inputField = document.querySelector(`#${elementId.replace('Error', '')}`);
                if (inputField) inputField.classList.add('error');
            }
            
            // Open modal for Advocate
            function openAdvocateModal() {
                // Reset form
                actionForm.reset();
                clearAllErrors();
                
                // Set mode to Advocate
                actionTypeInput.value = 'advocate';
                modalTitle.innerHTML = '<i class="fa-solid fa-bullhorn"></i> Become an Environmental Advocate';
                modalSubtitle.textContent = 'Join our advocacy program! Help us push for stronger environmental policies and sustainable practices in Calbayog.';
                
                // Show advocate fields, hide event fields
                if (eventTitleGroup) eventTitleGroup.style.display = 'none';
                if (advocacyAreaGroup) advocacyAreaGroup.style.display = 'block';
                if (dateGroup) dateGroup.style.display = 'block';
                if (timeGroup) timeGroup.style.display = 'block';
                if (spotsGroup) spotsGroup.style.display = 'none';
                
                // Make date and time not required for advocate (they can be optional)
                if (dateInput) dateInput.required = false;
                if (timeInput) timeInput.required = false;
                
                // Set default values
                if (dateInput) dateInput.min = today;
                
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            
            // Open modal for Events (original functionality)
            function openEventModal(eventData = null) {
                actionForm.reset();
                clearAllErrors();
                
                actionTypeInput.value = 'event';
                modalTitle.innerHTML = '<i class="fa-solid fa-calendar-check"></i> Join Environmental Event';
                modalSubtitle.textContent = 'Fill out the form below to participate in our eco-initiatives and make a difference in Calbayog!';
                
                // Hide advocate fields, show event fields
                if (eventTitleGroup) eventTitleGroup.style.display = 'block';
                if (advocacyAreaGroup) advocacyAreaGroup.style.display = 'none';
                if (dateGroup) dateGroup.style.display = 'block';
                if (timeGroup) timeGroup.style.display = 'block';
                if (spotsGroup) spotsGroup.style.display = 'block';
                
                // Make fields required for events
                if (dateInput) dateInput.required = true;
                if (timeInput) timeInput.required = true;
                if (spotsInput) spotsInput.required = true;
                
                if (dateInput) dateInput.min = today;
                
                if (eventData) {
                    modalSubtitle.textContent = `You're signing up for: ${eventData.title}`;
                    if (eventTitleField) eventTitleField.value = eventData.title;
                    
                    if (locationSelect && eventData.location) {
                        const locationMap = {
                            'Malajog Ridge': 'malajog-ridge',
                            'Maquinit Beach': 'maquinit-beach',
                            'City Plaza': 'city-plaza',
                            'Community Center': 'community-center'
                        };
                        const mappedValue = locationMap[eventData.location];
                        if (mappedValue) locationSelect.value = mappedValue;
                    }
                    
                    if (dateInput && eventData.date) dateInput.value = eventData.date;
                    if (timeInput && eventData.time) timeInput.value = eventData.time;
                }
                
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            
            // Close modal
            function closeModal() {
                modal.classList.remove('active');
                document.body.style.overflow = '';
                actionForm.reset();
                clearAllErrors();
            }
            
            // Validate Advocate Form
            function validateAdvocateForm() {
                let isValid = true;
                
                const advocacy = advocacyArea?.value;
                const location = locationSelect?.value;
                const message = advocacyMessage?.value.trim();
                const name = nameInput?.value.trim();
                const email = emailInput?.value.trim();
                const phone = phoneInput?.value.trim();
                
                if (!advocacy) {
                    showError('advocacyAreaError', 'Please select an advocacy area');
                    isValid = false;
                }
                
                if (!location) {
                    showError('locationError', 'Please select your location');
                    isValid = false;
                }
                
                if (!message) {
                    showError('advocacyMessageError', 'Please share your advocacy message');
                    isValid = false;
                } else if (message.length < 20) {
                    showError('advocacyMessageError', 'Please provide more details (at least 20 characters)');
                    isValid = false;
                }
                
                if (!name) {
                    showError('nameError', 'Please enter your full name');
                    isValid = false;
                } else if (name.length < 2) {
                    showError('nameError', 'Name must be at least 2 characters');
                    isValid = false;
                }
                
                if (!email) {
                    showError('emailError', 'Please enter your email address');
                    isValid = false;
                } else {
                    const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        showError('emailError', 'Please enter a valid email address');
                        isValid = false;
                    }
                }
                
                if (!phone) {
                    showError('phoneError', 'Please enter your phone number');
                    isValid = false;
                } else if (phone.length < 10) {
                    showError('phoneError', 'Please enter a valid phone number');
                    isValid = false;
                }
                
                return isValid;
            }
            
            // Save Advocate to localStorage
            function saveAdvocate(advocateData) {
                let advocates = JSON.parse(localStorage.getItem('ecoAdvocates') || '[]');
                const newAdvocate = {
                    id: Date.now(),
                    ...advocateData,
                    submittedAt: new Date().toISOString(),
                    status: 'pending'
                };
                advocates.push(newAdvocate);
                localStorage.setItem('ecoAdvocates', JSON.stringify(advocates));
                return newAdvocate;
            }
            
            // Handle form submission
            async function handleSubmit(e) {
                e.preventDefault();
                
                const actionType = actionTypeInput?.value;
                let isValid = false;
                
                if (actionType === 'advocate') {
                    isValid = validateAdvocateForm();
                } else {
                    isValid = validateEventForm();
                }
                
                if (!isValid) {
                    showToast('Please fix the errors above', true);
                    return;
                }
                
                const submitBtn = document.querySelector('.submit-action-btn');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-pulse"></i> Submitting...';
                submitBtn.disabled = true;
                
                let registrationData = {};
                
                if (actionType === 'advocate') {
                    registrationData = {
                        type: 'advocate',
                        advocacyArea: advocacyArea.options[advocacyArea.selectedIndex]?.text || advocacyArea.value,
                        location: locationSelect.options[locationSelect.selectedIndex]?.text || locationSelect.value,
                        preferredDate: dateInput?.value || 'Not specified',
                        preferredTime: timeInput?.value || 'Not specified',
                        advocacyMessage: advocacyMessage?.value || '',
                        name: nameInput?.value.trim(),
                        email: emailInput?.value.trim(),
                        phone: phoneInput?.value.trim(),
                        organization: organizationInput?.value.trim() || 'Individual'
                    };
                } else {
                    registrationData = {
                        type: 'event',
                        eventTitle: eventTitleField?.value || 'General Volunteer',
                        location: locationSelect.options[locationSelect.selectedIndex]?.text || locationSelect.value,
                        date: dateInput?.value,
                        time: timeInput?.value,
                        participants: parseInt(spotsInput?.value || 1),
                        name: nameInput?.value.trim(),
                        email: emailInput?.value.trim(),
                        phone: phoneInput?.value.trim(),
                        notes: descriptionTextarea?.value || ''
                    };
                }
                
                setTimeout(() => {
                    if (actionType === 'advocate') {
                        saveAdvocate(registrationData);
                        showToast(`✅ Thank you ${registrationData.name}! Your advocacy for ${registrationData.advocacyArea} has been recorded. An EcoCalbayog representative will contact you soon.`);
                    } else {
                        saveRegistration(registrationData);
                        showToast(`✅ Thank you ${registrationData.name}! You've registered for ${registrationData.eventTitle} on ${registrationData.date}.`);
                    }
                    closeModal();
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    console.log('Submission saved:', registrationData);
                }, 800);
            }
            
            // Setup Advocate Button
            const advocateTriggerBtn = document.querySelector('.advocate-trigger-btn');
            if (advocateTriggerBtn) {
                advocateTriggerBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openAdvocateModal();
                });
            }
            
            // Setup other buttons
            const attendEventsBtn = document.querySelector('.action-trigger-btn');
            if (attendEventsBtn) {
                attendEventsBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openEventModal();
                });
            }
            
            const viewCalendarBtn = document.querySelector('.view-calendar-btn');
            if (viewCalendarBtn) {
                viewCalendarBtn.addEventListener('click', () => openEventModal());
            }
            
            const takeActionBtn = document.getElementById('takeActionBtn');
            if (takeActionBtn) {
                takeActionBtn.addEventListener('click', () => openAdvocateModal());
            }
            
            // Modal close events
            if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) closeModal();
                });
            }
            
            // Form submit
            if (actionForm) actionForm.addEventListener('submit', handleSubmit);
            
            // Clear errors on input
            const formInputs = document.querySelectorAll('#actionForm input, #actionForm select, #actionForm textarea');
            formInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const errorId = this.id + 'Error';
                    const errorElement = document.getElementById(errorId);
                    if (errorElement) {
                        errorElement.classList.remove('show');
                        errorElement.textContent = '';
                    }
                    this.classList.remove('error');
                });
            });
            
            // ESC key to close
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && modal && modal.classList.contains('active')) closeModal();
            });
            
            console.log('Get Involved page initialized - Advocate feature connected to modal');
        });
    </script>
</body>
</html>