<!-- backend -->
 <?php
    require_once 'config.php';

// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }


 ?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>

    <!-- link css -->
    <link rel="stylesheet" href="./css/customer.css">

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
                <h2>Customer Profile</h2>
                <i class="fas fa-times" id="close-sidebar" title="Close Dashboard"></i>
            </div>
            
            <ul class="sidebar-menu">
                <li><a href="./customer.php"><i class="fas fa-user"></i> My Profile</a></li>
                <li><a href="./products.php"><i class="fas fa-box-open"></i> Products</a></li>
                <li><a href="./accSettings.php"><i class="fa-solid fa-wrench"></i> Account Settings</a></li>
                <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>
                <h1>Welcome <?php echo $_SESSION['user_fName']; ?>!</h1>
            </div>

            <!-- Customer Profile -->
            <section class="customer-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <img src="images/default-profile.png" alt="Admin Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> <?php echo $_SESSION['fullName']; ?></p>
                        <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $_SESSION['user_phone']; ?></p>
                        <button class="btn edit-profile" onclick="window.location.href='./accSettings.php'"  title="Edit Profile"><i class="fa-solid fa-pen"></i> Edit Profile</button>
                    </div>
                </div>
            </section>

            <h2>Some of Our Products</h2>
            <div class="slideshow-container">
                <!-- Slide 1 -->
                <div class="slide fade">
                    <a href="./products.php"><img src="./images/slide1.jpg" alt="Slide 1"></a>
                </div>
                <!-- Slide 2 -->
                <div class="slide fade">
                    <a href="./products.php"><img src="./images/slide2.jpg" alt="Slide 2"></a>
                </div>
                <!-- Slide 3 -->
                <div class="slide fade">
                    <a href="./products.php"><img src="./images/slide3.jpg" alt="Slide 3"></a>
                </div>
                <!-- Slide 4 -->
                <div class="slide fade">
                    <a href="./products.php"><img src="./images/slide4.jpg" alt="Slide 4"></a>
                </div>
            </div>

            <h2>Quick Actions</h2>
            <div class="actions">
                <div class="card">
                    <a href="./products.php" title="Browse Products"><i class="fas fa-box-open"></i><br>Products</a>
                </div>
                <div class="card">
                    <a href="./accSettings.php" title="Edit profile & Change password"><i class="fa-solid fa-wrench"></i><br>Account Settings</a>
                </div>
                <div class="card">
                    <a href="./logout.php" title="Logout"><i class="fas fa-sign-out-alt"></i><br>Logout</a>
                </div>
            </div>
            <br>
        </div>
    </div>
    
    <script src="./js/sideBar.js"></script>
</body>
</html>