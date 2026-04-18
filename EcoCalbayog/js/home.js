// Sample event data structure with creator field
let events = [];

let currentUser = {
    id: "",
    name: " ",
    email: "",
    barangay: " ",
    phone: "",
    joinedEvents: [],
    donations: []
};

// Initialize the application
async function init() {
    await loadUser();
    await loadEvents();
    setupNavigation();
    setupEventListeners();
    renderEvents();
    await renderMyEvents();
    await renderCreatedEvents();
    updateUserDisplay();
}


// Load events from database
async function loadEvents() {
    try {
        const response = await fetch('database/get_events.php');
        const data = await response.json();

        if (data.success) {
            events = data.events;
        } else {
            events = [];
        }
    } catch (error) {
        console.error('Error loading events:', error);
        events = [];
    }
}

// Save user to localStorage
function saveUser() {
    localStorage.setItem('ecoUser', JSON.stringify(currentUser));
}

// load user from backend session
async function loadUser() {
    try {
        const response = await fetch('database/get_user.php');
        const data = await response.json();

        if (data.success) {
            //current user galing na sa database
            currentUser.id = data.user.id;
            currentUser.name = data.user.name;
            currentUser.email = data.user.email;
            currentUser.barangay = data.user.barangay || '';
            currentUser.phone = data.user.phone || '';
            currentUser.joinedEvents = data.user.joinedEvents || [];
            currentUser.donations = data.user.donations || [];
        } else {
            //  kapag walang session, balik login
            window.location.href = '../login.php';
            return;
        }

        updateUserDisplay();
    } catch (error) {
        console.error('Error loading user:', error);
    }
}

// Create a new event and save to database
async function createEvent(eventData) {
    const formData = new FormData();
    formData.append('title', eventData.title);
    formData.append('description', eventData.description);
    formData.append('date', eventData.date);
    formData.append('time', eventData.time);
    formData.append('location', eventData.location);
    formData.append('category', eventData.category);
    formData.append('contact', eventData.contact || '');
    formData.append('meetingPoint', eventData.meetingPoint || '');
    formData.append('maxParticipants', eventData.maxParticipants || '');

    try {
        const response = await fetch('database/create_event.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            showToast(data.message, "success");

            // reload utro  tikang  database
            await loadEvents();
            renderEvents();
        } else {
            showToast(data.message, "info");
        }
    } catch (error) {
        console.error('Error creating event:', error);
        showToast("Error creating event.", "info");
    }
}
// Render events
function renderEvents() {
    const eventsGrid = document.getElementById('eventsGrid');
    if (!eventsGrid) return;

    const searchTerm = document.getElementById('searchInput')?.value.toLowerCase() || '';
    const categoryFilter = document.getElementById('categoryFilter')?.value || 'all';
    const locationFilter = document.getElementById('locationFilter')?.value || 'all';

    let filteredEvents = events.filter(event => {
        const matchesSearch = event.title.toLowerCase().includes(searchTerm) ||
                             event.description.toLowerCase().includes(searchTerm);
        const matchesCategory = categoryFilter === 'all' || event.category === categoryFilter;
        const matchesLocation = locationFilter === 'all' || event.location === locationFilter;
        return matchesSearch && matchesCategory && matchesLocation;
    });

    if (filteredEvents.length === 0) {
        eventsGrid.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <h3>No events found</h3>
                <p>Try adjusting your filters or check back later for new events!</p>
            </div>
        `;
        return;
    }

    eventsGrid.innerHTML = filteredEvents.map(event => `
        <div class="event-card" data-event-id="${event.id}">
            <div class="event-category ${event.category.replace(/ & /g, '-').replace(/\s/g, '-')}">
                ${event.category}
            </div>
            <h3>${event.title}</h3>
            <div class="event-meta">
                <p><i class="fas fa-calendar-alt"></i> ${new Date(event.date).toLocaleDateString()}</p>
                <p><i class="fas fa-clock"></i> ${event.time}</p>
                <p><i class="fas fa-map-marker-alt"></i> ${event.location}</p>
                <p><i class="fas fa-user"></i> Created by: ${event.creator}</p>
            </div>
            <p class="event-description-preview">${event.description.substring(0, 100)}${event.description.length > 100 ? '...' : ''}</p>
            <button class="view-event-btn" onclick="viewEvent(${event.id})">View Details</button>
        </div>
    `).join('');
}

// render events created by current user
async function renderCreatedEvents() {
    const createdEventsList = document.getElementById('createdEventsList');
    if (!createdEventsList) return;

    try {
        const response = await fetch('database/get_created_events.php');
        const data = await response.json();

        if (!data.success || data.events.length === 0) {
            createdEventsList.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-calendar-times"></i>
                    <h3>No created events yet</h3>
                    <p>Create your first environmental activity.</p>
                </div>
            `;
            return;
        }

        createdEventsList.innerHTML = data.events.map(event => `
            <div class="my-event-card">
                <div class="event-category ${event.category.replace(/ & /g, '-').replace(/\s/g, '-')}">
                    ${event.category}
                </div>
                <h3>${event.title}</h3>
                <div class="event-meta">
                    <p><i class="fas fa-calendar-alt"></i> ${new Date(event.date).toLocaleDateString()}</p>
                    <p><i class="fas fa-clock"></i> ${event.time}</p>
                    <p><i class="fas fa-map-marker-alt"></i> ${event.location}</p>
                    <p><i class="fas fa-user"></i> Created by: ${event.creator}</p>
                </div>
                <p class="event-description-preview">
                    ${event.description.substring(0, 100)}${event.description.length > 100 ? '...' : ''}
                </p>

                <div class="created-event-actions">
                    <button class="view-event-btn" onclick="viewEvent(${event.id})">View Details</button>
                    <button class="edit-event-btn" onclick="editCreatedEvent(${event.id})">Edit</button>
                    <button class="participants-btn" onclick="viewParticipants(${event.id})">Participants</button>
                    <button class="delete-event-btn" onclick="deleteCreatedEvent(${event.id})">Delete</button>
                </div>
            </div>
        `).join('');
    } catch (error) {
        console.error('Error loading created events:', error);
    }
}

// view an participants
window.viewParticipants = async function(eventId) {
    try {
        const response = await fetch(`database/get_event_participants.php?event_id=${eventId}`);
        const data = await response.json();

        const listContainer = document.getElementById('participantsList');

        if (!data.success || data.participants.length === 0) {
            listContainer.innerHTML = `<p>No participants yet.</p>`;
        } else {
            listContainer.innerHTML = data.participants.map(p => `
                <div class="participant-item">
                    <strong>${p.fullname}</strong><br>
                    <small>${p.email}</small>
                </div>
            `).join('');
        }

        document.getElementById('participantsModal').style.display = 'block';

    } catch (error) {
        console.error('Error loading participants:', error);
        showToast("Error loading participants.", "info");
    }
};

//delete an created event
window.deleteCreatedEvent = async function(eventId) {
    if (!confirm('Are you sure you want to delete this event?')) {
        return;
    }

    try {
        const formData = new FormData();
        formData.append('event_id', eventId);

        const response = await fetch('database/delete_event.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            showToast("Event deleted successfully!", "success");
            await loadEvents();
            await renderCreatedEvents();
            await renderMyEvents();
        } else {
            showToast(data.message || "Failed to delete event.", "info");
        }
    } catch (error) {
        console.error('Delete error:', error);
        showToast("Error deleting event.", "info");
    }
};

//edit create event
window.editCreatedEvent = function(eventId) {
    const event = events.find(e => e.id == eventId);

    if (!event) {
        showToast("Event not found.", "info");
        return;
    }

    document.getElementById('eventTitle').value = event.title;
    document.getElementById('eventDescription').value = event.description;
    document.getElementById('eventDate').value = event.date;
    document.getElementById('eventTime').value = event.time;
    document.getElementById('eventLocation').value = event.location;
    document.getElementById('eventCategory').value = event.category;
    document.getElementById('eventContact').value = event.contact || '';
    document.getElementById('meetingPoint').value = event.meetingPoint || '';
    document.getElementById('maxParticipants').value = event.maxParticipants || '';


    // save current editing id
    window.currentEditingEventId = event.id;

    // sav edit event
    document.getElementById('createEventBtn').textContent = 'Save Changes';

    document.querySelector('[data-page="create-event"]').click();
    showToast("You are now editing this event.", "info");
};

// View event details
window.viewEvent = function(eventId) {
    const event = events.find(e => e.id === eventId);
    if (event) {
        document.getElementById('modalEventTitle').textContent = event.title;
        document.getElementById('modalEventCreator').textContent = event.creator;
        document.getElementById('modalEventDate').textContent = new Date(event.date).toLocaleDateString();
        document.getElementById('modalEventTime').textContent = event.time;
        document.getElementById('modalEventLocation').textContent = event.location;
        document.getElementById('modalEventDescription').textContent = event.description;
        document.getElementById('modalEventContact').textContent = event.contact || 'Not provided';
        document.getElementById('modalMeetingPoint').textContent = event.meetingPoint || 'Will be announced';
        
        const joinBtn = document.getElementById('joinEventBtn');
        joinBtn.onclick = () => joinEvent(event.id);
        
        document.getElementById('eventModal').style.display = 'block';
    }
};

// Join an event and save to database
async function joinEvent(eventId) {
    const formData = new FormData();
    formData.append('event_id', eventId);

    try {
        const response = await fetch('database/join_event.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            showToast(data.message, "success");

            // reload utro an data
            await loadEvents();
            await renderMyEvents();

            document.getElementById('eventModal').style.display = 'none';
        } else {
            showToast(data.message, "info");
        }
    } catch (error) {
        console.error('Error joining event:', error);
        showToast("Error joining event.", "info");
    }
}

// Render joined events from database
async function renderMyEvents() {
    const myEventsList = document.getElementById('myEventsList');
    if (!myEventsList) return;

    try {
        const response = await fetch('database/get_my_events.php');
        const data = await response.json();

        if (!data.success || data.events.length === 0) {
            myEventsList.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-calendar-times"></i>
                    <h3>No events joined yet</h3>
                    <p>Browse available events and join your first advocacy activity!</p>
                </div>
            `;
            return;
        }

        myEventsList.innerHTML = data.events.map(event => `
            <div class="my-event-card">
                <div class="event-category ${event.category.replace(/ & /g, '-').replace(/\s/g, '-')}">
                    ${event.category}
                </div>
                <h3>${event.title}</h3>
                <div class="event-meta">
                    <p><i class="fas fa-calendar-alt"></i> ${new Date(event.date).toLocaleDateString()}</p>
                    <p><i class="fas fa-clock"></i> ${event.time}</p>
                    <p><i class="fas fa-map-marker-alt"></i> ${event.location}</p>
                    <p><i class="fas fa-user"></i> Created by: ${event.creator}</p>
                </div>
            </div>
        `).join('');
    } catch (error) {
        console.error('Error loading my events:', error);
    }
}



// Cancel event participation
window.cancelEvent = function(eventId) {
    const eventIndex = events.findIndex(e => e.id === eventId);
    if (eventIndex !== -1) {
        const eventTitle = events[eventIndex].title;
        currentUser.joinedEvents = currentUser.joinedEvents.filter(id => id !== eventId);
        events[eventIndex].participants = events[eventIndex].participants.filter(pid => pid !== currentUser.id);
        saveEvents();
        saveUser();
        renderEvents();
        renderMyEvents();
        updateUserDisplay();
        showToast(`Removed from ${eventTitle}`, "info");
    }
};

// Update user display
function updateUserDisplay() {
    document.getElementById('sidebarUserName').textContent = currentUser.name;
    document.getElementById('profileName').textContent = currentUser.name;
    document.getElementById('profileEmail').textContent = currentUser.email;
    document.getElementById('joinedEventsCount').textContent = currentUser.joinedEvents.length;
    
    const totalDonated = currentUser.donations.reduce((sum, d) => sum + d.amount, 0);
    document.getElementById('totalDonated').textContent = `₱${totalDonated}`;
    document.getElementById('impactPoints').textContent = currentUser.joinedEvents.length * 100 + Math.floor(totalDonated / 10);
}

// Show toast notification
function showToast(message, type = "success") {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');
    const icon = toast.querySelector('i');
    
    toastMessage.textContent = message;
    icon.className = type === "success" ? "fas fa-check-circle" : "fas fa-info-circle";
    toast.classList.add('show');
    
    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

// Setup navigation
function setupNavigation() {
    const navItems = document.querySelectorAll('.nav-item');
    const pages = {
        'events': { element: 'eventsPage', title: 'Available Events', subtitle: 'Discover and join environmental activities in Calbayog' },
        'my-events': { element: 'myEventsPage', title: 'My Events', subtitle: 'Events you have joined' },
        'create-event': { element: 'createEventPage', title: 'Create Event', subtitle: 'Organize an environmental activity' },
        'donate': { element: 'donatePage', title: 'Donate', subtitle: 'Support environmental advocacy in Calbayog' },
        'profile': { element: 'profilePage', title: 'My Profile', subtitle: 'Your personal information and impact' }
    };

    navItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const page = item.dataset.page;
            
            navItems.forEach(nav => nav.classList.remove('active'));
            item.classList.add('active');
            
            Object.values(pages).forEach(p => {
                const pageElement = document.getElementById(p.element);
                if (pageElement) pageElement.classList.remove('active-page');
            });
            
            const activePage = pages[page];
            if (activePage) {
                const pageElement = document.getElementById(activePage.element);
                if (pageElement) pageElement.classList.add('active-page');
                document.getElementById('pageTitle').textContent = activePage.title;
                document.getElementById('pageSubtitle').textContent = activePage.subtitle;
            }
            
            if (page === 'my-events') {
                renderMyEvents();
                renderCreatedEvents();

                // default tab = joined
                document.getElementById('joinedTabBtn')?.classList.add('active');
                document.getElementById('createdTabBtn')?.classList.remove('active');

                document.getElementById('joinedEventsSection')?.classList.add('active-tab');
                document.getElementById('createdEventsSection')?.classList.remove('active-tab');
            }
            if (page === 'events') renderEvents();
        });
    });
}

// Setup event listeners
function setupEventListeners() {
    // Create event button
    document.getElementById('closeParticipantsModal')?.addEventListener('click', () => {
    document.getElementById('participantsModal').style.display = 'none';
});
    document.getElementById('createEventBtn')?.addEventListener('click', async () => {
    const title = document.getElementById('eventTitle').value.trim();
    const description = document.getElementById('eventDescription').value.trim();
    const date = document.getElementById('eventDate').value;
    const time = document.getElementById('eventTime').value;
    const location = document.getElementById('eventLocation').value;
    const category = document.getElementById('eventCategory').value;
    const contact = document.getElementById('eventContact').value.trim();
    const meetingPoint = document.getElementById('meetingPoint').value.trim();
    const maxParticipants = document.getElementById('maxParticipants').value || '';
    

    console.log({
        title,
        description,
        date,
        time,
        location,
        category,
        maxParticipants
        
    });

    if (!title || !description || !date || !time || !location || !category) {
        showToast("Please fill in all required fields!", "info");
        return;
    }

   if (window.currentEditingEventId) {
    await updateCreatedEvent({
        id: window.currentEditingEventId,
        title,
        description,
        date,
        time,
        location,
        category,
        contact,
        meetingPoint,
        maxParticipants
    });

    window.currentEditingEventId = null;
} else {
    await createEvent({
        title,
        description,
        date,
        time,
        location,
        category,
        contact,
        meetingPoint,
        maxParticipants
    });
}
    document.getElementById('eventTitle').value = '';
    document.getElementById('eventDescription').value = '';
    document.getElementById('eventDate').value = '';
    document.getElementById('eventTime').value = '';
    document.getElementById('eventLocation').value = '';
    document.getElementById('eventCategory').value = '';
    document.getElementById('maxParticipants').value = '';
    document.getElementById('eventContact').value = '';
    document.getElementById('meetingPoint').value = '';

    document.getElementById('createEventBtn').textContent = 'Create Event'; 

    document.querySelector('[data-page="events"]').click();
});

async function updateCreatedEvent(eventData) {
    const formData = new FormData();
    formData.append('event_id', eventData.id);
    formData.append('title', eventData.title);
    formData.append('description', eventData.description);
    formData.append('date', eventData.date);
    formData.append('time', eventData.time);
    formData.append('location', eventData.location);
    formData.append('category', eventData.category);
    formData.append('contact', eventData.contact || '');
    formData.append('meetingPoint', eventData.meetingPoint || '');
    formData.append('maxParticipants', eventData.maxParticipants || '');

    try {
        const response = await fetch('database/update_event.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            showToast("Event updated successfully!", "success");
            await loadEvents();
            await renderCreatedEvents();
            renderEvents();
        } else {
            showToast(data.message || "Failed to update event.", "info");
        }
    } catch (error) {
        console.error('Error updating event:', error);
        showToast("Error updating event.", "info");
    }
}

//tabs for My Events page
document.getElementById('joinedTabBtn')?.addEventListener('click', async () => {
    document.getElementById('joinedTabBtn').classList.add('active');
    document.getElementById('createdTabBtn').classList.remove('active');

    document.getElementById('joinedEventsSection').classList.add('active-tab');
    document.getElementById('createdEventsSection').classList.remove('active-tab');

    await renderMyEvents();
});

document.getElementById('createdTabBtn')?.addEventListener('click', async () => {
    document.getElementById('createdTabBtn').classList.add('active');
    document.getElementById('joinedTabBtn').classList.remove('active');

    document.getElementById('createdEventsSection').classList.add('active-tab');
    document.getElementById('joinedEventsSection').classList.remove('active-tab');

    await renderCreatedEvents();
});

    // Search and filters
    document.getElementById('searchInput')?.addEventListener('input', () => renderEvents());
    document.getElementById('categoryFilter')?.addEventListener('change', () => renderEvents());
    document.getElementById('locationFilter')?.addEventListener('change', () => renderEvents());

    // Modal close
    document.querySelectorAll('.close-modal').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('eventModal').style.display = 'none';
            document.getElementById('editProfileModal').style.display = 'none';
        });
    });

    window.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal')) {
            e.target.style.display = 'none';
        }
    });

    // Edit profile
    document.getElementById('editProfileBtn')?.addEventListener('click', () => {
        document.getElementById('editFullName').value = currentUser.name;
        document.getElementById('editEmail').value = currentUser.email;
        document.getElementById('editBarangay').value = currentUser.barangay || '';
        document.getElementById('editPhone').value = currentUser.phone || '';
        document.getElementById('editProfileModal').style.display = 'block';
    });

    document.getElementById('saveProfileBtn')?.addEventListener('click', () => {
        currentUser.name = document.getElementById('editFullName').value;
        currentUser.email = document.getElementById('editEmail').value;
        currentUser.barangay = document.getElementById('editBarangay').value;
        currentUser.phone = document.getElementById('editPhone').value;
        saveUser();
        updateUserDisplay();
        showToast("Profile updated successfully!", "success");
        document.getElementById('editProfileModal').style.display = 'none';
    });

    // Donation
    document.querySelectorAll('.donation-card').forEach(card => {
        card.addEventListener('click', () => {
            const amount = card.dataset.amount;
            if (amount === 'custom') {
                document.getElementById('customAmount').style.display = 'block';
            } else {
                document.getElementById('customAmount').style.display = 'none';
                document.getElementById('customAmount').value = amount;
            }
        });
    });

   document.getElementById('submitDonationBtn')?.addEventListener('click', async () => {
    const name = document.getElementById('donorName').value.trim();
    const email = document.getElementById('donorEmail').value.trim();
    const message = document.getElementById('donationMessage').value.trim();
    let amount = document.getElementById('customAmount').value;

    if (!name || !email || !amount) {
        showToast("Please fill in all required fields!", "info");
        return;
    }

    const formData = new FormData();
    formData.append('fullName', name);
    formData.append('email', email);
    formData.append('amount', amount);
    formData.append('message', message);

    try {
        const response = await fetch('database/donate.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            showToast(`Thank you for donating ₱${amount}!`, "success");

            document.getElementById('donorName').value = '';
            document.getElementById('donorEmail').value = '';
            document.getElementById('donationMessage').value = '';
            document.getElementById('customAmount').value = '';

            await loadUser();
        } else {
            showToast(data.message, "info");
        }
    } catch (error) {
        console.error('Donation error:', error);
        showToast("Error processing donation.", "info");
    }
});
// Logout
document.getElementById('logoutBtn')?.addEventListener('click', async () => {
    if (confirm('Are you sure you want to logout?')) {
        try {
            const response = await fetch('database/logout.php');
            const data = await response.json();

            if (data.success) {
                //  alisin local data kung meron
                localStorage.removeItem('ecoUser');
                localStorage.removeItem('ecoEvents');

                showToast("Logged out successfully!", "success");

                // bagong dagdag: balik sa login page
                window.location.href = 'login.php';
            } else {
                showToast(data.message, "info");
            }
        } catch (error) {
            console.error('Logout error:', error);
            showToast("Error during logout.", "info");
        }
    }
});
}

// Start the application
init();