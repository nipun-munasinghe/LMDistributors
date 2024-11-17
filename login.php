<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- link the stylesheet -->
    <link rel="stylesheet" href="./css/login.css">

    <!-- set the logo into title -->
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
          
            <form>
                <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" placeholder="Enter your email" required>
                </div>
        
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password" required>
                
                <div class="show-password-container">
                    <input type="checkbox" id="show-password" class="showPwd">
                    <label for="show-password" class="showPwd">Show Password</label>
                </div>
        
                <button type="button" id="next-button">
                    NEXT <span class="arrow">&rarr;</span>
                </button>
                <p>Don't you have an account? <a href="./register.php">Sign Up</a></p>
            </form>
        </div>
    </div>

    <!-- link the script -->
    <script src="./js/login.js"></script>
</body>
</html>