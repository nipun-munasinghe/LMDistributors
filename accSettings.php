<?php
// Start sessions
session_start();

// Include database config file
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_fName'])) {
    header('Location: login.php');
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Initiate variables
$firstName = $_SESSION['user_fName'];
$lastName = $_SESSION['user_lName'];
$birthday = $_SESSION['user_dob'];
$email = $_SESSION['user_email'];
$phone1 = $_SESSION['user_phone'];
$phone2 = $_SESSION['user_phone2'];
$address = $_SESSION['user_address'];
$profilePic = "./images/default-profile.png"; // Default profile image
$error = "";

// Get user profile data from database
$sql = "SELECT * FROM user_info WHERE userID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $firstName = htmlspecialchars($row['fName']);
    $lastName = htmlspecialchars($row['lName']);
    $birthday = htmlspecialchars($row['dob']);
    $email = htmlspecialchars($row['email']);
    $phone1 = htmlspecialchars($row['phone1']);
    $phone2 = htmlspecialchars($row['phone2']);
    $address = htmlspecialchars($row['address']);
    $profilePic = !empty($row['image']) ? $row['image'] : $profilePic;
}

// Handle form submission for updating details
if (isset($_POST['detailsBtn'])) {
    $newFirstName = trim($_POST['first-name']);
    $newLastName = trim($_POST['last-name']);
    $newBirthday = trim($_POST['birthday']);
    $newEmail = trim($_POST['email']);
    $newPhone1 = trim($_POST['phone1']);
    $newPhone2 = trim($_POST['phone2']);
    $newAddress = trim($_POST['address']);
    
    // Handle profile picture upload
    if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "./images/profiles/";
        $file_name = basename($_FILES['profile-pic']['name']);
        $target_file = $target_dir . uniqid() . "-" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file type
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['profile-pic']['tmp_name'], $target_file)) {
                $profilePic = $target_file;
            }
        }
    }

    // Update details in the database
    $sql = "UPDATE user_info SET fName = ?, lName = ?, dob = ?, email = ?, phone1 = ?, phone2 = ?, address = ?, image = ? WHERE userID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssi", $newFirstName, $newLastName, $newBirthday, $newEmail, $newPhone1, $newPhone2, $newAddress, $profilePic, $user_id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Failed to update profile. Please try again!');</script>";
    }
}

// Handle form submission for changing password
if (isset($_POST['pwdBtn'])) {
    // Fetch the stored password
    $sql = "SELECT password FROM user_info WHERE userID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $storedPwd = $row['password'];
    }
    else {
        echo "<script>alert('Error fetching your current password.');</script>";
        exit();
    }

    // Retrieve entered passwords
    $enteredPwd = trim($_POST['currentPassword']);
    $newPassword = trim($_POST['password']);
    $confirmPassword = trim($_POST['reEnterPassword']);

    // Verify current password
    if ($enteredPwd !== $storedPwd) {
        $error = "Incorrect current password!";
    }
    elseif ($newPassword !== $confirmPassword) {
        $error = "Passwords do not match. Please try again.";
    }
    else {
        // Update password in the database
        $updateSql = "UPDATE user_info SET password = ? WHERE userID = ?";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_bind_param($updateStmt, "si", $newPassword, $user_id);

        if (mysqli_stmt_execute($updateStmt)) {
            echo "<script>alert('Password updated successfully!');</script>";
        } else {
            echo "<script>alert('Failed to update password. Please try again!');</script>";
        }
    }
}
?>

<!-- HTML Part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/accSettings.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Hidden Sidebar -->
        <aside id="sidebar" class="sidebar">
            <?php include 'sideBar.php'; ?>
        </aside>
        <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>

        <!-- Profile Section -->
        <section class="profile-section">
            <h2>Profile Details</h2>
            <form id="profile-form" method="POST" enctype="multipart/form-data" action="accSettings.php">
                <div class="form-group">
                    <center>
                        <img src="<?php echo $profilePic; ?>" alt="Profile Picture" class="profile-pic" id="profile-pic-preview">
                    </center>
                    <input type="file" name="profile-pic" id="profile-pic" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" value="<?php echo $firstName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" value="<?php echo $lastName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="birthday">Date of Birth</label>
                    <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone1">Phone Number 1</label>
                    <input type="tel" id="phone1" name="phone1" value="<?php echo $phone1; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone2">Phone Number 2</label>
                    <input type="tel" id="phone2" name="phone2" value="<?php echo $phone2; ?>" placeholder="Enter your alternate phone number">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" rows="3" name="address" required><?php echo $address; ?></textarea>
                </div>
                <center>
                    <button type="submit" id="detailsBtn" name="detailsBtn">Update Details</button>
                </center>
            </form>
        </section>

        <!-- Form for password changing -->
        <section class="change-pwd">
            <form action="accSettings.php" method="POST">
                <h2>Password Settings</h2>
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter current password" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password" required>
                </div>
                <div class="form-group">
                    <label for="reEnterPassword">Confirm New Password</label>
                    <input type="password" id="reEnterPassword" name="reEnterPassword" placeholder="Enter new password again" required>
                </div>
                <p class="error"><?php echo $error; ?></p>
                <center>
                    <button type="submit" id="pwdBtn" name="pwdBtn">Change Password</button>
                </center>
            </form>
        </section>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/profilePicPreview.js"></script>
</body>
</html>