<?php
    session_start();

    // Include the database config file
    require_once 'config.php';

    if (isset($_POST['next-button'])) {
        // Retrieve the email and password from POST method
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user_info WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // Input validations
        if (mysqli_num_rows($result) == 1) {

            // Get the user's data
            $row = mysqli_fetch_assoc($result);
            $stored_pwd = $row['password'];

            // Check if table has only one email
            if ($result->num_rows == 1) {

                // Verify password
                if ($password == $stored_pwd) {
                    // Store user details in sessions
                    $_SESSION['user_id'] = $row['userID'];
                    $_SESSION['user_fName'] = $row['fName'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_phone'] = $row['phone1'];
                    $_SESSION['user_type'] = $row['type'];
                    $_SESSION['user_status'] = $row['status'];

                    // Redirect users based on their user types
                    switch ($row['type']) {
                        case 'admin':
                            header("Location: admin.php");
                            break;
                        case 'manager':
                            header("Location: manager.php");
                            break;
                        case 'customer':
                            header("Location: customer.php");
                            break;
                        case 'buyer':
                            header("Location: buyer.php");
                            break;
                        case 'supplier':
                            header("Location: supplier.php");
                            break;
                        default:
                            header("Location: login.php");
                            break;
                    }
                    exit;
                }
                else {
                    $error = "Invalid email or password! Please try again.";
                }
            }
            else {
                $error = "No active account with this email!";
            }
        }
        else {
            $error = "Please fill in all the fields!";
        }
        $conn->close();
    }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/login.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <div class="login-container">
        <!-- Background Image -->
        <div class="login-bg">
            <img src="./images/coconut-still-life.jpg" alt="Coconut">
        </div>

        <!-- Login Form -->
        <div class="login-form">
            <h1>Hello!</h1>
            <p>Welcome back! Please log in to your account.</p>

            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <div class="show-password-container">
                    <input type="checkbox" id="show-password" class="showPwd">
                    <label for="show-password" class="showPwd">Show Password</label>
                </div>

                <?php if (isset($error)): ?>
                    <p class="error"> <?php echo $error; ?> </p>
                <?php endif; ?>

                <button type="submit" id="next-button" name="next-button" title="Click to Login">
                    NEXT <span class="arrow">&rarr;</span>
                </button>
                <p>Don't you have an account? <a href="./register.php" title="Register">Sign Up</a></p>
            </form>
        </div>
    </div>

    <!-- Link the script -->
    <script src="./js/login.js"></script>
</body>
</html>
