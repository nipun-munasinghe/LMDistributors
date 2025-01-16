<!-- Backend -->
<?php
//start sessions
session_start();
require_once 'config.php';

// Check if user is logged in
if (isset($_SESSION['user_fName']) && $_SESSION['user_type'] == 'customer') {

    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Fetch user data using prepared statement
    $sql = "SELECT fname, lname, dob, image, email, phone1 FROM user_info WHERE userID = $user_id;";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result->num_rows == 1) {
        // Fetch user data
        $row = mysqli_fetch_assoc($result);
        $fName = $row['fname'];
        $lname = $row['lname'];
        $dob = $row['dob'];
        $user_image = $row['image'] ?? 'images/default-pic.png';
        $email = $row['email'];
        $phone = $row['phone1'];

        // Save to session for use in HTML
        $_SESSION['user_image'] = $user_image;
        $_SESSION['fullName'] = $fName." ".$lname;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_phone'] = $phone;

        // Check for user's birthday
        $currentDate = date('m-d');
        $birthday = date('m-d', strtotime($dob));

        if ($currentDate === $birthday) {
            $greeting = "Happy birthday " . htmlspecialchars($_SESSION['user_fName']) . "!";
        }
        else {
            $greeting = "Welcome " . htmlspecialchars($_SESSION['user_fName']) . "!";
        }
    }
    else {
        // Redirect to login if user not found
        header("Location: login.php");
        exit();
    }
}
else {
    // Redirect to login if user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!-- HTML Part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>

    <!-- CSS File -->
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
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar">
            <?php include 'sideBar.php'; ?>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>
                <h1><?php echo htmlspecialchars($greeting); ?></h1>
            </div>

            <!-- Customer Profile Section -->
            <section class="customer-profile">
                <h2>Your Profile</h2>
                <div class="profile-card">
                    <!-- Display User Profile Picture -->
                    <img src="<?php echo htmlspecialchars($_SESSION['user_image']); ?>" 
                         alt="Profile Picture" class="profile-pic">
                    <div class="profile-info">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['fullName']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['user_phone']); ?></p>
                        <button class="btn edit-profile" 
                                onclick="window.location.href='./accSettings.php'" title="Edit Profile">
                            <i class="fa-solid fa-pen"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </section>

            <!-- Slideshow Section -->
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

            <!-- Quick Actions -->
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
    
    <!-- Sidebar Toggle Script -->
    <script src="./js/sideBar.js"></script>
</body>
</html>
