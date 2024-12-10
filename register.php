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
            
            <form action="./register_action.php" method="POST">
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

                <div class="input-group checkbox-group">
                    <label>
                        <input type="checkbox" id="terms" name="terms" required>
                        I agree to the <a href="./terms.php" title="View T&C">Terms & Conditions</a>
                    </label>
                </div>

                <button type="submit" id="register-button" title="Click to Register">Register</button>
                <p>Already have an account? <a href="./login.php" title="Login">Sign In</a></p>
            </form>
        </div>
    </div>

    <!--link the JavaScript -->
    <script src="./js/register.js"></script>
</body>
</html>
