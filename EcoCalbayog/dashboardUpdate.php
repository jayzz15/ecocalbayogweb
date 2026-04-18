<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>EcoAdvocate | User Dashboard - View Events</title>
    <!-- Google Fonts & Font Awesome Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="dashboard-container">
       
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-leaf"></i>
                <span>EcoAdvocate</span>
            </div>
            <nav class="nav-menu">
                <a href="#" class="nav-item active" data-page="events">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Available Events</span>
                </a>
                <a href="#" class="nav-item" data-page="my-events">
                    <i class="fas fa-ticket-alt"></i>
                    <span>My Events</span>
                </a>
                <a href="#" class="nav-item" data-page="create-event">
                    <i class="fas fa-plus-circle"></i>
                    <span>Create Event</span>
                </a>
                <a href="#" class="nav-item" data-page="donate">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Donate</span>
                </a>
                <a href="#" class="nav-item" data-page="profile">
                    <i class="fas fa-user"></i>
                    <span>My Profile</span>
                </a>
            </nav>
            <div class="user-info-sidebar">
                <div class="user-avatar" id="sidebarAvatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-name" id="sidebarUserName">Guest User</div>
                <button class="logout-btn" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="main-header">
                <div class="header-title">
                    <h1 id="pageTitle">Available Events</h1>
                    <p id="pageSubtitle">Discover and join environmental activities in Calbayog</p>
                </div>
                <div class="header-actions">
                    <div class="search-bar">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Search events...">
                    </div>
                    <div class="notification-icon">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge" id="notificationBadge">0</span>
                    </div>
                </div>
            </header>

            <!-- Events Page (Default View) -->
            <div id="eventsPage" class="page-content active-page">
                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="filter-group">
                        <label><i class="fas fa-filter"></i> Filter by:</label>
                        <select id="categoryFilter">
                            <option value="all">All Categories</option>
                            <option value="Reforestation & Biodiversity">Reforestation & Biodiversity</option>
                            <option value="Plastic Ban & Waste Management">Plastic Ban & Waste Management</option>
                            <option value="Renewable Energy">Renewable Energy</option>
                            <option value="Sustainable Agriculture">Sustainable Agriculture</option>
                            <option value="Coastal Cleanup">Coastal Cleanup</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label><i class="fas fa-calendar-week"></i> Date:</label>
                        <select id="dateFilter">
                            <option value="all">All Dates</option>
                            <option value="upcoming">Upcoming</option>
                            <option value="this-week">This Week</option>
                            <option value="this-month">This Month</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label><i class="fas fa-map-marker-alt"></i> Location:</label>
                        <select id="locationFilter">
                            <option value="all">All Barangays</option>
                            <option value="Barangay 1">Barangay 1</option>
                            <option value="Barangay 2">Barangay 2</option>
                            <option value="Barangay 3">Barangay 3</option>
                            <option value="Barangay 4">Barangay 4</option>
                            <option value="Barangay 5">Barangay 5</option>
                        </select>
                    </div>
                </div>

                <!-- Events Grid -->
                <div class="events-grid" id="eventsGrid">
                    <!-- Events will be dynamically loaded here -->
                    <div class="loading-spinner">
                        <i class="fas fa-spinner fa-spin"></i> Loading events...
                    </div>
                </div>
            </div>

            <!-- My Events Page -->
           <div id="myEventsPage" class="page-content">
    <div class="my-events-header">
        <h2><i class="fas fa-ticket-alt"></i> My Events</h2>
        <p>View the events you joined and the events you created.</p>
    </div>

    <!-- bagong dagdag: tabs -->
    <div class="my-events-tabs">
        <button class="my-tab-btn active" id="joinedTabBtn">Joined Events</button>
        <button class="my-tab-btn" id="createdTabBtn">My Created Events</button>
    </div>

    <!-- Joined tab content -->
    <div id="joinedEventsSection" class="my-events-tab-content active-tab">
        <div class="my-events-list" id="myEventsList">
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <h3>No events joined yet</h3>
                <p>Browse available events and join your first advocacy activity!</p>
            </div>
        </div>
    </div>

    <!-- Created tab content -->
    <div id="createdEventsSection" class="my-events-tab-content">
        <div class="my-events-list" id="createdEventsList">
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <h3>No created events yet</h3>
                <p>Create your first environmental activity.</p>
            </div>
        </div>
    </div>
</div>

            <!-- Create Event Page -->
            <div id="createEventPage" class="page-content">
                <div class="create-event-header">
                    <h2><i class="fas fa-plus-circle"></i> Create New Event</h2>
                    <p>Organize an environmental activity and inspire others to join!</p>
                </div>
                <div class="create-event-form">
                    <div class="form-group">
                        <label><i class="fas fa-tag"></i> Event Title *</label>
                        <input type="text" id="eventTitle" placeholder="Enter event title">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-align-left"></i> Description *</label>
                        <textarea id="eventDescription" rows="4" placeholder="Describe the event, activities, and what participants should expect..."></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-calendar-alt"></i> Date *</label>
                            <input type="date" id="eventDate">
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-clock"></i> Time *</label>
                            <input type="time" id="eventTime">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-map-marker-alt"></i> Location/Barangay *</label>
                            <select id="eventLocation">
                                <option value="">Select Barangay</option>
                                <option value="Barangay 1">Barangay 1</option>
                                <option value="Barangay 2">Barangay 2</option>
                                <option value="Barangay 3">Barangay 3</option>
                                <option value="Barangay 4">Barangay 4</option>
                                <option value="Barangay 5">Barangay 5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-layer-group"></i> Category *</label>
                            <select id="eventCategory">
                                <option value="">Select Category</option>
                                <option value="Reforestation & Biodiversity">Reforestation & Biodiversity</option>
                                <option value="Plastic Ban & Waste Management">Plastic Ban & Waste Management</option>
                                <option value="Renewable Energy">Renewable Energy</option>
                                <option value="Sustainable Agriculture">Sustainable Agriculture</option>
                                <option value="Coastal Cleanup">Coastal Cleanup</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-users"></i> Maximum Participants (Optional)</label>
                        <input type="number" id="maxParticipants" placeholder="Leave empty for unlimited">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-phone-alt"></i> Contact Number (Optional)</label>
                        <input type="tel" id="eventContact" placeholder="Contact number for inquiries">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-map-pin"></i> Specific Meeting Point (Optional)</label>
                        <input type="text" id="meetingPoint" placeholder="e.g., Barangay Hall, Plaza, etc.">
                    </div>
                    <button class="create-event-btn" id="createEventBtn">Create Event</button>
                </div>
            </div>

            <!-- Donate Page -->
            <div id="donatePage" class="page-content">
                <div class="donate-header">
                    <h2><i class="fas fa-hand-holding-usd"></i> Support Environmental Advocacy</h2>
                    <p>Your donation helps fund reforestation, cleanup drives, and policy campaigns in Calbayog.</p>
                </div>
                <div class="donate-form-container">
                    <div class="donation-options">
                        <div class="donation-card" data-amount="100">
                            <h3>₱100</h3>
                            <p>Plant a tree</p>
                        </div>
                        <div class="donation-card" data-amount="500">
                            <h3>₱500</h3>
                            <p>Support a cleanup drive</p>
                        </div>
                        <div class="donation-card" data-amount="1000">
                            <h3>₱1,000</h3>
                            <p>Fund educational materials</p>
                        </div>
                        <div class="donation-card custom-amount" data-amount="custom">
                            <h3>Custom</h3>
                            <p>Enter any amount</p>
                        </div>
                    </div>
                    <div class="donation-form">
                        <input type="number" id="customAmount" placeholder="Enter amount (₱)" style="display: none;">
                        <div class="input-group">
                            <label>Full Name *</label>
                            <input type="text" id="donorName" placeholder="Enter your full name">
                        </div>
                        <div class="input-group">
                            <label>Email Address *</label>
                            <input type="email" id="donorEmail" placeholder="your@email.com">
                        </div>
                        <div class="input-group">
                            <label>Message (Optional)</label>
                            <textarea id="donationMessage" rows="3" placeholder="Leave a message of support..."></textarea>
                        </div>
                        <button class="submit-donation-btn" id="submitDonationBtn">Donate Now</button>
                    </div>
                </div>
            </div>

            <!-- Profile Page -->
            <div id="profilePage" class="page-content">
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h2 id="profileName">Guest User</h2>
                        <p id="profileEmail">guest@example.com</p>
                        <button class="edit-profile-btn" id="editProfileBtn"><i class="fas fa-edit"></i> Edit Profile</button>
                    </div>
                    <div class="profile-stats">
                        <div class="stat-item">
                            <i class="fas fa-calendar-check"></i>
                            <span class="stat-number" id="joinedEventsCount">0</span>
                            <span class="stat-label">Events Joined</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span class="stat-number" id="totalDonated">₱0</span>
                            <span class="stat-label">Total Donated</span>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-leaf"></i>
                            <span class="stat-number" id="impactPoints">0</span>
                            <span class="stat-label">Impact Points</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Event Details Modal -->
    <div id="eventModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="event-details">
                <h2 id="modalEventTitle">Event Title</h2>
                <div class="event-info">
                    <p><i class="fas fa-user"></i> <strong>Created by:</strong> <span id="modalEventCreator"></span></p>
                    <p><i class="fas fa-calendar-alt"></i> <span id="modalEventDate"></span></p>
                    <p><i class="fas fa-clock"></i> <span id="modalEventTime"></span></p>
                    <p><i class="fas fa-map-marker-alt"></i> <span id="modalEventLocation"></span></p>
                    <p><i class="fas fa-users"></i> <strong>Max Slots:</strong> <span id="modalMaxSlots"></span></p>
                    <p><i class="fas fa-user-friends"></i> <strong>Joined:</strong> <span id="modalJoinedCount"></span></p>
                    <p><i class="fas fa-phone-alt"></i> <strong>Contact:</strong> <span id="modalEventContact"></span></p>
                    <p><i class="fas fa-map-pin"></i> <strong>Meeting Point:</strong> <span id="modalMeetingPoint"></span></p>
                </div>
                <div class="event-description">
                    <h4>About this activity</h4>
                    <p id="modalEventDescription"></p>
                </div>
                <div class="event-participants-section">
                    <h4>Participants</h4>
                    <div id="modalParticipantsList">No participants yet.</div>
                </div>
                <button class="join-event-btn" id="joinEventBtn">Join This Event</button>
            </div>
        </div>
    </div>

        <div id="participantsModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeParticipantsModal">&times;</span>

            <div class="modal-header">
                <h2><i class="fas fa-users"></i> Participants</h2>
            </div>

            <div class="modal-body">
                <div id="participantsList">
                    <p>No participants yet.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" id="closeEditModal">&times;</span>
            <h3><i class="fas fa-user-edit"></i> Edit Profile</h3>
            <div class="form-modal">
                <div class="input-group">
                    <label>Full Name</label>
                    <input type="text" id="editFullName">
                </div>
                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" id="editEmail">
                </div>
                <div class="input-group">
                    <label>Barangay</label>
                    <input type="text" id="editBarangay" placeholder="Your location in Calbayog">
                </div>
                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="text" id="editPhone" placeholder="Contact number">
                </div>
                <button class="save-profile-btn" id="saveProfileBtn">Save Changes</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast">
        <i class="fas fa-check-circle"></i>
        <span id="toastMessage"></span>
    </div>

    <script src="js/home.js"></script>
</body>
</html>