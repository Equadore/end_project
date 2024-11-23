<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Beranda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Layout Utama */
        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #2d5a27 0%, #1a4314 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            color: white;
            font-size: 1.5rem;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .menu-item.active {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid #52c234;
        }

        /* Konten Utama */
        .main-content {
            flex: 1;
            margin-left: 250px;
            background: #f4f6f8;
        }

        /* Header */
        .header {
            background: white;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Dashboard Content */
        .dashboard-content {
            padding: 20px;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #52c234, #3ca529);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .card-title {
            font-size: 0.9rem;
            color: #666;
        }

        .card-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .recent-activity {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .activity-icon {
            width: 35px;
            height: 35px;
            background: #e8f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #52c234;
        }

        .activity-details h4 {
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 5px;
        }

        .activity-details p {
            font-size: 0.8rem;
            color: #666;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }

            .sidebar-header h2, .menu-item span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
            }

            .menu-item {
                justify-content: center;
                padding: 15px;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            .menu-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .menu-item:hover {
            background-color: #34495e;
        }

        .menu-item.active {
            background-color: #3498db;
        }

        .menu-item i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }

            /* Style khusus untuk submenu */
        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            background-color: #34495e;
            border-radius: 5px;
            margin-top: 5px;
            margin-left: 20px;
        }

        /* Menampilkan submenu saat menu item di hover */
        .menu-item:hover .submenu {
            max-height: 300px; /* Tinggi maksimal submenu */
        }

        .submenu-item {
            display: block;
            padding: 10px 15px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            border-left: 3px solid transparent;
        }

        .submenu-item:hover {
            background-color: #2c3e50;
            border-left-color: #3498db;
            padding-left: 20px;
        }

        .submenu-item span {
            position: relative;
            padding-left: 10px;
        }

        /* Efek hover untuk submenu item */
        .submenu-item:hover span {
            color: #3498db;
        }

        /* Animasi untuk submenu item */
        .submenu-item {
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }

        .menu-item:hover .submenu-item {
            opacity: 1;
            transform: translateX(0);
        }

        /* Delay bertingkat untuk animasi submenu items */
        .submenu-item:nth-child(1) { transition-delay: 0.1s; }
        .submenu-item:nth-child(2) { transition-delay: 0.2s; }
        .submenu-item:nth-child(3) { transition-delay: 0.3s; }
        .submenu-item:nth-child(4) { transition-delay: 0.4s; }

        /* Style untuk active state */
        .submenu-item.active {
            background-color: #3498db;
            border-left-color: #2ecc71;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .submenu {
                position: absolute;
                left: 70px;
                top: 0;
                width: 200px;
                margin-left: 0;
                background-color: #34495e;
                box-shadow: 2px 0 5px rgba(0,0,0,0.2);
                border-radius: 0 5px 5px 0;
            }

            .menu-item:hover .submenu {
                display: block;
            }

            .submenu-item {
                padding: 12px 15px;
            }
        }

        /* Tambahan untuk efek visual */
        .submenu::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(52, 73, 94, 0.1), transparent);
            pointer-events: none;
        }
        
            
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Dashboard</h2>
            </div>
            <nav class="sidebar-menu">
                <a href="#" class="menu-item active">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('employees.index') }}" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>Karyawan</span>
                </a>
                <!-- Di bagian sidebar-menu, ubah menu Divisi menjadi: -->
                <a href="#" class="menu-item">
                    <i class="fas fa-chart-bar"></i>
                    <span>Divisi</span>
                    <div class="submenu">
                    <a href="#" class="submenu-item">
                        <span> Marketing</span>
                    </a>
                    <a href="#" class="submenu-item">
                        <span> Keuangan</span>
                    </a>
                    <a href="#" class="submenu-item">
                        <span> IT</span>
                    </a>
                    <a href="#" class="submenu-item">
                        <span> HRD</span>
                    </a>
                    <li class="sidebar-item"><a href="icon-material.html"
class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Kategori 
</span></a>
</li>
    </div>
</a>

                </a>    
                <a href="#" class="menu-item">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </nav>
        </aside>
        

        <!-- Konten Utama -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="search-bar">
                    <input type="text" placeholder="Cari..." style="padding: 8px; border: 1px solid #ddd; border-radius: 5px; width: 250px;">
                </div>
                <div class="user-profile">
                    <span>Admin</span>
                    <img src="/api/placeholder/40/40" alt="Profile">
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <!-- Cards -->
                <div class="dashboard-cards">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="card-title">Jumlah   Karyawan</div>
                        <div class="card-value">1,234</div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                        <div class="card-title">Total Client</div>
                        <div class="card-value">5,678</div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                        <div class="card-title">Total PKS</div>
                        <div class="card-value">892</div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="card-title">Pendapatan Usaha</div>
                        <div class="card-value">Rp 45.6M</div>
                    </div>
                </div>
                
                
            </div>
        </main>
    </div>
</body>
</html>
