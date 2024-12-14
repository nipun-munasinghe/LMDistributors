<!-- backend -->
<?php
    //start sessions
    session_start();
    
    //include database config file
    require_once 'config.php';

    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //get form data
        $type = trim($_POST['type']);
        $fName = trim($_POST['first_name']);
        $lName = trim($_POST['last_name']);
        $dob = trim($_POST['birthday']);
        $email = trim($_POST['email']);
        $phone1 = trim($_POST['phone1']);
        $phone2 = trim($_POST['phone2']);
        $address = trim($_POST['address']);
        $password = trim($_POST['password']);
        $confirmPwd = trim($_POST['confirm_password']);
        $status = 'active';

        //validate form data
        if (empty($type) || empty($fName) || empty($lName) || empty($dob) ||
            empty($email) || empty($phone1) || empty($address) || 
            empty($password)){
                $error = "Please fill in all required fields.";
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        }
        else if ($password !== $confirmPwd) {
            $error = "Passwords do not match. Please try again.";
        }
        else {
            //check if email already exists
            $sql = "SELECT * FROM user_info WHERE email = '$email' LIMIT 1;";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO user_info (email, password, fName, lName, 
                                               dob, phone1, phone2, address, type, 
                                               status) 
                        VALUES ('$email', '$password', '$fName', '$lName',
                                '$dob', '$phone1', '$phone2', '$address', '$type',
                                '$status');";

                if (mysqli_query($conn, $sql)) {
                    //redirect to login page after successful registration
                    header("Location: login.php");
                    exit();//stop further executions
                }
                else {
                    $error = "Error: ". mysqli_error($conn);
                }
            }
            else {
                $error = "Email already exists. Please try a different one.";
            }
        }
        $conn->close();
    }
?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="./css/register.css">

    <!-- Set favicon -->
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
</head>
<body>
    <div class="register-container">

        <div class="register-animation">
            <img src="./images/register-page-pic.jpg" alt="Coconut Background">
        </div>

        <!-- Register Form -->
        <div class="register-form">
            <h1>Join With Us</h1>
            <p>Join us and explore the world of coconut trading!</p>
            
            <form action="./register.php" method="POST">
                <div class="input-group">
                    <label for="type">Register as:</label>
                    <select id="type" name="type" required>
                        <option value="" disabled selected>Select</option>
                        <option value="customer">Customer</option>
                        <option value="supplier">Supplier</option>
                        <option value="buyer">Buyer</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>
                </div>

                <div class="input-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
                </div>

                <div class="input-group">
                    <label for="birthday">Date of Birth</label>
                    <input type="date" id="birthday" name="birthday" placeholder="dd/mm/yyyy" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="input-group">
                    <label for="phone1">Phone Number</label>
                    <input type="text" id="phone1" name="phone1" placeholder="Enter your phone number" required>
                </div>

                <div class="input-group">
                    <label for="phone2">Alternate Phone Number</label>
                    <input type="text" id="phone2" name="phone2" placeholder="Optional">
                </div>

                <div class="input-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" placeholder="Enter your address" required></textarea>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="input-group">
                    <label for="confirmPassword">Re-enter Password</label>
                    <input type="password" id="confirmPassword" name="confirm_password" placeholder="Enter your password" required>
                </div>

                <div class="input-group checkbox-group">
                    <label>
                        <input type="checkbox" id="terms" name="terms" required>
                        I agree to the <a href="./terms.php" title="View T&C">Terms & Conditions</a>
                    </label>
                </div>

                <?php if (!empty($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>

                <button type="submit" id="register-button" name="registerButton" title="Click to Register">Register</button>
                <p>Already have an account? <a href="./login.php" title="Login">Sign In</a></p>
            </form>
        </div>
    </div>

    <!--link the JavaScript -->
    <script src="./js/register.js"></script>
</body>
</html>