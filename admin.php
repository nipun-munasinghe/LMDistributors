<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/admin.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main Container -->
    <div class="container">
        <!-- Hidden Sidebar -->
        <aside id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Dashboard</h2>
                <i class="fas fa-times" id="close-sidebar"></i>
            </div>
            <ul class="sidebar-menu">
                <li><a href="./manageManagers.php"><i class="fas fa-user-tie"></i> Manage Managers</a></li>
                <li><a href="./customer.php"><i class="fas fa-users"></i> View Users</a></li>
                <li><a href="./accSettings.php"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="./viewIncome.php"><i class="fas fa-chart-line"></i> View Income</a></li>
                <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar"></i>
                <h1>Welcome AdminName!</h1>
            </div>

            <!-- Admin Profile -->
            <section class="admin-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="images/default-profile.png" alt="Admin Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> Admin Name</p>
                        <p><strong>Email:</strong> admin@example.com</p>
                        <p><strong>Phone:</strong> +94 70 456 7890</p>
                        <button class="btn edit-profile">Edit Profile</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="./js/admin.js"></script>
</body>
</html>