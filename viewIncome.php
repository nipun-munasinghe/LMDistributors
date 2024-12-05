<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Income</title>
    <link rel="stylesheet" href="./css/manageOrders.css">
    <link rel="stylesheet" href="./css/viewIncome.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="manageOrders.html">Manage Orders</a></li>
                <li><a href="viewIncome.html" class="active">View Income</a></li>
                <!-- Add more menu items here -->
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <h1>View Income</h1>
            </div>

            <!-- Quick Action Cards -->
            <div class="quick">
                <div class="card">
                    <a href="addIncome.html">Add Income</a>
                </div>
                <div class="card">
                    <a href="manageOrders.html">Manage Orders</a>
                </div>
                <div class="card">
                    <a href="viewReports.html">View Reports</a>
                </div>
            </div>

            <!-- Income Table Section -->
            <div class="income-section">
                <h2>Income Overview</h2>
                <table class="income-table">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Total Income</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>January</td>
                            <td>$12,000</td>
                            <td>
                                <a href="#" class="view-details">View Details</a>
                            </td>
                        </tr>
                        <tr>
                            <td>February</td>
                            <td>$10,500</td>
                            <td>
                                <a href="#" class="view-details">View Details</a>
                            </td>
                        </tr>
                        <!-- Add more rows dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>