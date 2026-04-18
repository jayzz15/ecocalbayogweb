<?php
session_start();
include __DIR__ . '/connections/config.php';

// Access control
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@gmail.com') {
    header("Location: login.php");
    exit();
}

// Add user logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $n = $_POST['new_name'];
    $e = $_POST['new_email'];
    $p = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $n, $e, $p);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: admin_dashboard.php");
    exit;
}

// Gather data counts
$userCountResult = $conn->query("SELECT COUNT(*) as cnt FROM users");
$userCount = $userCountResult ? $userCountResult->fetch_assoc()['cnt'] : 0;

$eventCountResult = $conn->query("SELECT COUNT(*) as cnt FROM events");
$eventCount = $eventCountResult ? $eventCountResult->fetch_assoc()['cnt'] : 0;

$donationSumResult = $conn->query("SELECT SUM(amount) as total FROM donations");
$donationSumRow = $donationSumResult ? $donationSumResult->fetch_assoc() : null;
$totalDonations = ($donationSumRow && $donationSumRow['total']) ? $donationSumRow['total'] : 0;

// Gather limit data for dashboard
$recentUsers = $conn->query("SELECT id, fullname, email, created_at FROM users ORDER BY id DESC LIMIT 5");
$recentDonations = $conn->query("SELECT d.id, u.fullname, d.amount, d.created_at FROM donations d JOIN users u ON d.user_id = u.id ORDER BY d.id DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | EcoAdvocate System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .tab-content { display: none; }
        .tab-content.active { display: block; animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 h-screen overflow-hidden flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col shadow-xl z-20 relative">
        <div class="h-20 flex items-center px-6 border-b border-slate-800 mt-2">
            <i class="fa-solid fa-leaf text-teal-400 text-2xl mr-3"></i>
            <span class="text-xl font-bold text-white tracking-tight">EcoAdmin</span>
        </div>
        
        <nav class="flex-1 mt-6 px-4 space-y-1.5 overflow-y-auto">
            <p class="px-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Menu</p>
            
            <button onclick="switchTab('dashboard')" id="btn-dashboard" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 bg-teal-500/10 text-teal-400 font-medium">
                <i class="fa-solid fa-chart-line w-5 text-center"></i>
                Dashboard
            </button>
            <button onclick="switchTab('donations')" id="btn-donations" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-slate-800 hover:text-white">
                <i class="fa-solid fa-hand-holding-dollar w-5 text-center"></i>
                Donations
            </button>
            <button onclick="switchTab('users')" id="btn-users" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-slate-800 hover:text-white">
                <i class="fa-solid fa-users w-5 text-center"></i>
                Manage Users
            </button>
            <button onclick="switchTab('profile')" id="btn-profile" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-slate-800 hover:text-white">
                <i class="fa-solid fa-circle-user w-5 text-center"></i>
                Profile
            </button>
        </nav>

        <div class="p-4 border-t border-slate-800 m-2">
            <div class="bg-slate-800 rounded-xl p-4 flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-bold">
                    A
                </div>
                <div>
                    <p class="text-sm font-medium text-white">Administrator</p>
                    <p class="text-xs text-slate-400">admin@eco.ph</p>
                </div>
            </div>
            <a href="index.php" class="flex items-center justify-center gap-2 w-full py-2.5 text-sm font-medium text-rose-400 hover:text-white hover:bg-rose-500 rounded-lg transition-colors">
                <i class="fa-solid fa-right-from-bracket"></i> Exit to App
            </a>
        </div>
    </aside>

    <!-- Main Content Box -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        
        <!-- Topbar -->
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-8 z-10 sticky top-0">
            <div class="flex items-center gap-4">
                <h1 id="page-title" class="text-2xl font-bold text-slate-800">Dashboard Overview</h1>
            </div>
            <div class="flex items-center gap-5">
                <div class="relative cursor-pointer text-slate-400 hover:text-teal-600 transition">
                    <i class="fa-solid fa-bell text-xl"></i>
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-rose-500 rounded-full border-2 border-white"></span>
                </div>
                <div class="h-8 w-px bg-slate-200"></div>
               
            </div>
        </header>

        <!-- Dynamic Content Area -->
        <div class="flex-1 overflow-y-auto p-8 pb-12">
            <div class="max-w-7xl mx-auto">
                
                <!-- 1. DASHBOARD TAB -->
                <div id="tab-dashboard" class="tab-content active">
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-md transition">
                            <div class="flexjustify-between items-start flex">
                                <div>
                                    <p class="text-sm font-medium text-slate-500 mb-1">Total Registered Users</p>
                                    <h3 class="text-3xl font-bold text-slate-800"><?php echo number_format($userCount); ?></h3>
                                </div>
                                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-500 ml-auto">
                                    <i class="fa-solid fa-users text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-xs text-emerald-600 font-medium">
                                <i class="fa-solid fa-arrow-trend-up mr-1"></i> +12% from last month
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-md transition">
                            <div class="flex text-left">
                                <div>
                                    <p class="text-sm font-medium text-slate-500 mb-1">Total Activities/Events</p>
                                    <h3 class="text-3xl font-bold text-slate-800"><?php echo number_format($eventCount); ?></h3>
                                </div>
                                <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-500 ml-auto">
                                    <i class="fa-solid fa-calendar-check text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-xs text-emerald-600 font-medium">
                                <i class="fa-solid fa-arrow-trend-up mr-1"></i> +5 new this week
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col justify-between hover:shadow-md transition relative overflow-hidden">
                            <div class="absolute -right-4 -bottom-4 opacity-5">
                                <i class="fa-solid fa-peso-sign text-9xl"></i>
                            </div>
                            <div class="flex text-left relative z-10">
                                <div>
                                    <p class="text-sm font-medium text-slate-500 mb-1">Total Donations Raised</p>
                                    <h3 class="text-3xl font-bold text-slate-800">₱<?php echo number_format($totalDonations, 2); ?></h3>
                                </div>
                                <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-500 ml-auto">
                                    <i class="fa-solid fa-hand-holding-dollar text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-xs text-indigo-600 font-medium relative z-10">
                                Thank you community!
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Recent Users Table -->
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                            <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                                <h2 class="font-bold text-slate-800">Newest Members</h2>
                                <button onclick="switchTab('users')" class="text-xs font-semibold text-teal-600 hover:text-teal-700">View All</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left whitespace-nowrap">
                                    <thead>
                                        <tr class="bg-slate-50/50 text-xs text-slate-400 uppercase font-semibold tracking-wider">
                                            <th class="px-6 py-3 border-b border-slate-100">User Name</th>
                                            <th class="px-6 py-3 border-b border-slate-100">Email</th>
                                            <th class="px-6 py-3 border-b border-slate-100 text-right">Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 text-sm">
                                        <?php if($recentUsers && $recentUsers->num_rows > 0): ?>
                                            <?php while($u = $recentUsers->fetch_assoc()): ?>
                                            <tr class="hover:bg-slate-50/80 transition">
                                                <td class="px-6 py-3.5">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 text-xs font-bold shrink-0">
                                                            <?php echo strtoupper(substr($u['fullname'], 0, 1)); ?>
                                                        </div>
                                                        <span class="font-medium text-slate-700"><?php echo htmlspecialchars($u['fullname']); ?></span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3.5 text-slate-500"><?php echo htmlspecialchars($u['email']); ?></td>
                                                <td class="px-6 py-3.5 text-slate-400 text-right"><?php echo date('M d', strtotime($u['created_at'])); ?></td>
                                            </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr><td colspan="3" class="text-center py-6 text-slate-400">No users found.</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Recent Donations Table -->
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                            <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                                <h2 class="font-bold text-slate-800">Latest Donations</h2>
                                <button onclick="switchTab('donations')" class="text-xs font-semibold text-teal-600 hover:text-teal-700">View All</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left whitespace-nowrap">
                                    <thead>
                                        <tr class="bg-slate-50/50 text-xs text-slate-400 uppercase font-semibold tracking-wider">
                                            <th class="px-6 py-3 border-b border-slate-100">Donor</th>
                                            <th class="px-6 py-3 border-b border-slate-100">Amount</th>
                                            <th class="px-6 py-3 border-b border-slate-100 text-right">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 text-sm">
                                        <?php if($recentDonations && $recentDonations->num_rows > 0): ?>
                                            <?php while($d = $recentDonations->fetch_assoc()): ?>
                                            <tr class="hover:bg-slate-50/80 transition">
                                                <td class="px-6 py-3.5 font-medium text-slate-700"><?php echo htmlspecialchars($d['fullname']); ?></td>
                                                <td class="px-6 py-3.5">
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                        ₱<?php echo number_format($d['amount'], 2); ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-3.5 text-slate-400 text-right"><?php echo date('M d', strtotime($d['created_at'])); ?></td>
                                            </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr><td colspan="3" class="text-center py-6 text-slate-400">No donations found.</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. DONATIONS TAB -->
                <div id="tab-donations" class="tab-content">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex flex-col min-h-[500px]">
                        <div class="px-6 py-5 border-b border-slate-100 flex flex-wrap gap-4 justify-between items-center bg-white">
                            <h2 class="font-bold text-slate-800 text-lg">Transaction History</h2>
                            <div class="flex gap-3">
                                <div class="relative">
                                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="text" placeholder="Search transactions..." class="pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 w-64 transition">
                                </div>
                                <button class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                                    <i class="fa-solid fa-download"></i> CSV
                                </button>
                            </div>
                        </div>
                        <div class="flex-1 overflow-x-auto">
                            <table class="w-full text-left whitespace-nowrap">
                                <thead>
                                    <tr class="bg-slate-50/80 text-xs text-slate-500 uppercase font-semibold tracking-wider">
                                        <th class="px-6 py-4 border-b border-slate-200">Txn ID</th>
                                        <th class="px-6 py-4 border-b border-slate-200">Donor Name</th>
                                        <th class="px-6 py-4 border-b border-slate-200">Amount</th>
                                        <th class="px-6 py-4 border-b border-slate-200">Message</th>
                                        <th class="px-6 py-4 border-b border-slate-200">Date Logged</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm">
                                    <?php 
                                    $allDonations = $conn->query("SELECT d.id, u.fullname, d.amount, d.message, d.created_at FROM donations d JOIN users u ON d.user_id = u.id ORDER BY d.created_at DESC");
                                    if($allDonations && $allDonations->num_rows > 0):
                                        while($row = $allDonations->fetch_assoc()): 
                                    ?>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="px-6 py-4 font-mono text-xs text-slate-500">T-<?php echo str_pad($row['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                        <td class="px-6 py-4 font-medium text-slate-700"><?php echo htmlspecialchars($row['fullname']); ?></td>
                                        <td class="px-6 py-4 font-bold text-indigo-600">₱<?php echo number_format($row['amount'], 2); ?></td>
                                        <td class="px-6 py-4 text-slate-500 max-w-[200px] truncate" title="<?php echo htmlspecialchars($row['message']); ?>">
                                            <?php echo htmlspecialchars($row['message'] ? $row['message'] : '-'); ?>
                                        </td>
                                        <td class="px-6 py-4 text-slate-500"><?php echo date('M d, Y • h:i A', strtotime($row['created_at'])); ?></td>
                                    </tr>
                                    <?php 
                                        endwhile; 
                                    else:
                                    ?>
                                    <tr><td colspan="5" class="py-12 text-center text-slate-400">No donations recorded yet.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- 3. MANAGE USERS TAB -->
                <div id="tab-users" class="tab-content">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex flex-col min-h-[500px]">
                        <div class="px-6 py-5 border-b border-slate-100 flex flex-wrap gap-4 justify-between items-center bg-white">
                            <h2 class="font-bold text-slate-800 text-lg">System Users</h2>
                            <div class="flex gap-3 items-center">
                                <div class="relative">
                                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="text" placeholder="Search name or email..." class="pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 w-64 transition">
                                </div>
                                <button onclick="document.getElementById('add-user-modal').style.display='flex'" class="cursor-pointer bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                                    <i class="fa-solid fa-user-plus"></i> Add User
                                </button>
                            </div>
                        </div>
                        <div class="flex-1 overflow-x-auto">
                            <table class="w-full text-left whitespace-nowrap">
                                <thead>
                                    <tr class="bg-slate-50/80 text-xs text-slate-500 uppercase font-semibold tracking-wider">
                                        <th class="px-6 py-4 border-b border-slate-200">User</th>
                                        <th class="px-6 py-4 border-b border-slate-200">Email Address</th>
                                        <th class="px-6 py-4 border-b border-slate-200">Barangay</th>
                                        <th class="px-6 py-4 border-b border-slate-200">Phone</th>
                                        <th class="px-6 py-4 border-b border-slate-200 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm">
                                    <?php 
                                    $allUsers = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
                                    if($allUsers && $allUsers->num_rows > 0):
                                        while($row = $allUsers->fetch_assoc()): 
                                    ?>
                                    <tr class="hover:bg-slate-50 transition group">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center text-white font-bold shrink-0 shadow-sm">
                                                    <?php echo strtoupper(substr($row['fullname'], 0, 1)); ?>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-800"><?php echo htmlspecialchars($row['fullname']); ?></p>
                                                    <p class="text-xs text-slate-400">ID: #<?php echo $row['id']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600"><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td class="px-6 py-4 text-slate-500">
                                            <span class="inline-flex py-1 px-3 rounded-full bg-slate-100 text-xs">
                                                <?php echo htmlspecialchars($row['barangay'] ? $row['barangay'] : 'N/A'); ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-slate-500"><?php echo htmlspecialchars($row['phone'] ? $row['phone'] : '-'); ?></td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition flex items-center justify-center" title="Edit User">
                                                    <i class="fa-solid fa-pen text-xs"></i>
                                                </button>
                                                <button class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition flex items-center justify-center" title="Suspend/Delete">
                                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                        endwhile; 
                                    else:
                                    ?>
                                    <tr><td colspan="5" class="py-12 text-center text-slate-400">No users found.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- 4. PROFILE TAB -->
                <div id="tab-profile" class="tab-content">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 max-w-3xl border-t-4 border-t-teal-500 mt-2">
                        
                        <div class="flex flex-col sm:flex-row gap-8 items-start mb-8 pb-8 border-b border-slate-100">
                            <div class="w-28 h-28 rounded-2xl bg-slate-800 flex flex-col items-center justify-center text-white shadow-lg shrink-0 relative overflow-hidden group cursor-pointer">
                                <span class="text-4xl font-bold">A</span>
                                <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <i class="fa-solid fa-camera text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-slate-800 mb-1">Administrator</h2>
                                <p class="text-slate-500 flex items-center gap-2 mb-4">
                                    <i class="fa-regular fa-envelope"></i> admin@ecocalbayog.ph
                                </p>
                                <div class="flex gap-2">
                                    <span class="bg-teal-100 text-teal-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Super Admin</span>
                                    <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Active</span>
                                </div>
                            </div>
                        </div>

                        <form class="space-y-6">
                            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 space-y-5">
                                <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wider mb-2">Personal Information</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1.5">First Name</label>
                                        <input type="text" value="System" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition bg-white">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1.5">Last Name</label>
                                        <input type="text" value="Administrator" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition bg-white">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-600 mb-1.5">System Email</label>
                                    <input type="email" value="admin@ecocalbayog.ph" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition bg-white text-slate-500" readonly>
                                    <p class="text-xs text-slate-400 mt-1">Contact IT support to change the core system email.</p>
                                </div>
                            </div>

                            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 space-y-5">
                                <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wider mb-2">Security</h3>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-600 mb-1.5">Current Password</label>
                                    <input type="password" placeholder="••••••••" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition bg-white">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-600 mb-1.5">New Password</label>
                                    <input type="password" placeholder="Enter new password" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition bg-white">
                                </div>
                            </div>

                            <div class="pt-2 flex justify-end">
                                <button type="button" class="bg-teal-600 hover:bg-teal-700 active:transform active:scale-95 text-white font-semibold py-2.5 px-8 rounded-lg transition-all shadow-md hover:shadow-lg">
                                    Save Profile Settings
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <!-- Add User Modal -->
        <div id="add-user-modal" class="fixed inset-0 bg-slate-900/50 z-50 hidden flex items-center justify-center backdrop-blur-sm">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-8 w-full max-w-md mx-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-slate-800">Add New User</h2>
                    <button type="button" onclick="document.getElementById('add-user-modal').style.display='none'" class="text-slate-400 hover:text-slate-600 transition"><i class="fa-solid fa-xmark text-lg"></i></button>
                </div>
                <form method="POST">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-600 mb-1.5">Full Name</label>
                            <input type="text" name="new_name" required class="w-full border border-slate-200 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition bg-slate-50">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-600 mb-1.5">Email Address</label>
                            <input type="email" name="new_email" required class="w-full border border-slate-200 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition bg-slate-50">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-600 mb-1.5">Password</label>
                            <input type="password" name="new_password" required class="w-full border border-slate-200 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition bg-slate-50">
                        </div>
                    </div>
                    <div class="mt-8 flex gap-3">
                        <button type="button" onclick="document.getElementById('add-user-modal').style.display='none'" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium py-2.5 rounded-lg transition shadow-sm">Cancel</button>
                        <button type="submit" name="add_user" class="flex-1 bg-teal-600 hover:bg-teal-700 text-white font-medium py-2.5 rounded-lg transition shadow-md">Create User</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <!-- Interactive script -->
    <script>
        function switchTab(tabId) {
            // Hide all
            document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
            
            // Unstyle buttons
            const navBase = "w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200";
            const navInactive = navBase + " hover:bg-slate-800 hover:text-white text-slate-300";
            const navActive = navBase + " bg-teal-500/10 text-teal-400 font-medium";

            ['dashboard', 'donations', 'users', 'profile'].forEach(id => {
                const btn = document.getElementById('btn-' + id);
                if(btn) btn.className = (id === tabId) ? navActive : navInactive;
            });

            // Show selected
            const tab = document.getElementById('tab-' + tabId);
            if(tab) tab.classList.add('active');

            // Update title
            const titles = {
                'dashboard': 'Dashboard Overview',
                'donations': 'Financials & Donations',
                'users': 'Manage System Users',
                'profile': 'Administrator Profile Settings'
            };
            const titleEl = document.getElementById('page-title');
            if(titleEl) titleEl.innerText = titles[tabId];
        }
    </script>
</body>
</html>
