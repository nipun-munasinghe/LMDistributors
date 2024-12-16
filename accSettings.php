<!-- php part -->
 <?php
    //start sessions
    session_start();

    //include database config file
    require_once 'config.php';

    // Check if user is logged in
    if (!isset($_SESSION['user_fName'])) {
        header('Location: login.php');
        exit();
    }

    //get user id from session
    $user_id = $_SESSION['user_id'];

    //initiate variables
    $firstName = $_SESSION['user_fName'];
    $lastName = $_SESSION['user_lName'];
    $birthday = $_SESSION['user_dob'];
    $email =  $_SESSION['user_email'];
    $phone1 = $_SESSION['user_phone'];
    $phone2 = $_SESSION['user_phone2'];
    $address = $_SESSION['user_address'];
    $profilePic = "./images/default-profile.png"; //default profile image

    //get user profile data from database
    $sql = "SELECT * FROM users WHERE userID = $user_id";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);

        $firstName = htmlspecialchars($row['fName']);
        $lastName = htmlspecialchars($row['lName']);
        $birthday = htmlspecialchars($row['dob']);
        $email = htmlspecialchars($row['email']);
        $phone1 = htmlspecialchars($row['phone1']);
        $phone2 = htmlspecialchars($row['phone2']);
        $address = htmlspecialchars($row['address']);
        $profilePic = !empty($row['image']) ? $row['image'] : $profilePic;
    }

    //handle form submission for update details
    if (isset($_POST['detailsBtn'])) {
        $firstName = trim($_POST['fName']);
        $lastName = trim($_POST['lName']);
        $birthday = trim($_POST['dob']);
        $email = trim($_POST['email']);
        $phone1 = trim($_POST['phone1']);
        $phone2 = trim($_POST['phone2']);
        $address = trim($_POST['address']);

        //handle profile pic
        if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "./images/profiles/";
            $file_name = basename($_FILES['profile-pic']['name']);
            $target_file = $target_dir.uniqid()."-".$file_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            //Check file type
            if (in_array($imageFileType, ['jpg', 'png', 'gif'])) {
                if (move_uploaded_file($_FILES['profile-pic']['tmp_name'], target_file)) {
                    $profilePic = $target_file;
                }
            }
        }

        //update details in the database
        $sql = "UPDATE user_info SET fName = $firstName, lName = $lastName, 
                dob = $birthday, email = $email, phone1 = $phone1, phone2 = $phone2,
                address = $address, image = $profilePic WHERE userID = $user_id";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<script>alert('Profile updated successfully!')</script>";
        }
        else {
            echo "<script>alert('Failed to update profile. Please try again!')</script>";
        }
    }
    
 ?>

<!-- html parts -->
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
            <?php include 'sideBar.php' ?>
        </aside>
        <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>

        <section class="profile-section">
            <h2>Profile Details</h2>
            <form id="profile-form">
                <div class="form-group">
                    <center>
                        <img src="<?php echo $profilePic; ?>" alt="Profile Picture" class="profile-pic" id="profile-pic-preview">
                    </center>
                    <input type="file" id="profile-pic" accept="image/*">
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
                    <input type="tel" id="phone2" name="phone2" value="<?php echo $phone1; ?>" placeholder="Enter your alternate phone number">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" rows="3" name="address" required><?php echo $address; ?></textarea>
                </div>
                
                <center>
                    <button type="submit" id="detailsBtn" name="detailsBtn" >Update Details</button>
                </center>
            </form>
        </section>

        <section class="change-pwd">
            <form>
                <h2>Password Settings</h2>

                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter current password">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password">
                </div>

                <div class="form-group">
                    <label for="reEnterPassword">New Password Again</label>
                    <input type="password" id="reEnterPassword" name="reEnterPassword" placeholder="Enter new password again">
                </div>

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