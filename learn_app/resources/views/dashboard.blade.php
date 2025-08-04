<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Laravel Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #374151;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transition: all 0.3s ease;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-header h3 {
            font-size: 1.5rem;
            font-weight: 600;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .sidebar-header h3 {
            opacity: 0;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 5px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .sidebar-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: #fbbf24;
        }

        .nav-icon {
            width: 20px;
            margin-right: 15px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar.collapsed .nav-text {
            opacity: 0;
            visibility: hidden;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px;
        }

        .sidebar.collapsed .nav-icon {
            margin-right: 0;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 260px;
            transition: margin-left 0.3s ease;
            background-color: #f8fafc;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        .main-header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .main-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1f2937;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #6b7280;
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .notification-btn:hover {
            background-color: #f3f4f6;
            color: #374151;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .content-area {
            padding: 30px;
        }

        /* Dashboard Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-title {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stat-icon.blue {
            background-color: #dbeafe;
            color: #2563eb;
        }

        .stat-icon.green {
            background-color: #dcfce7;
            color: #16a34a;
        }

        .stat-icon.yellow {
            background-color: #fef3c7;
            color: #d97706;
        }

        .stat-icon.purple {
            background-color: #e9d5ff;
            color: #9333ea;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .stat-change {
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stat-change.positive {
            color: #16a34a;
        }

        .stat-change.negative {
            color: #dc2626;
        }

        /* Chart Section */
        .chart-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        .chart-placeholder {
            height: 300px;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 1.1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar .nav-text {
                opacity: 0;
                visibility: hidden;
            }

            .sidebar .nav-link {
                justify-content: center;
                padding: 12px;
            }

            .sidebar .nav-icon {
                margin-right: 0;
            }

            .sidebar-header h3 {
                opacity: 0;
            }

            .main-content {
                margin-left: 70px;
            }

            .main-header {
                padding: 15px 20px;
            }

            .content-area {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h3>Laravel Admin</h3>
                <button class="sidebar-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            
            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <span class="nav-text">Products</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <span class="nav-text">Orders</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <span class="nav-text">Analytics</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Header -->
            <header class="main-header">
                <h1>Dashboard</h1>
                <div class="user-menu">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="user-avatar">JD</div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content-area">
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-title">Total Users</span>
                            <div class="stat-icon blue">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="stat-value">2,847</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>+12.5% from last month</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-title">Revenue</span>
                            <div class="stat-icon green">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="stat-value">$45,230</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>+8.2% from last month</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-title">Orders</span>
                            <div class="stat-icon yellow">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                        <div class="stat-value">1,523</div>
                        <div class="stat-change negative">
                            <i class="fas fa-arrow-down"></i>
                            <span>-3.1% from last month</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-title">Conversion Rate</span>
                            <div class="stat-icon purple">
                                <i class="fas fa-percentage"></i>
                            </div>
                        </div>
                        <div class="stat-value">3.24%</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>+1.4% from last month</span>
                        </div>
                    </div>
                </div>

                <!-- Chart Section -->
                <div class="chart-section">
                    <div class="chart-header">
                        <h2 class="chart-title">Revenue Overview</h2>
                        <select style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; background: white;">
                            <option>Last 30 days</option>
                            <option>Last 90 days</option>
                            <option>Last year</option>
                        </select>
                    </div>
                    <div class="chart-placeholder">
                        <i class="fas fa-chart-line" style="margin-right: 10px;"></i>
                        Chart placeholder - integrate with Chart.js or similar
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        }

        // Add active state to navigation links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Update main header title
                const title = this.querySelector('.nav-text').textContent;
                document.querySelector('.main-header h1').textContent = title;
            });
        });

        // Add some interactivity to stat cards
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>