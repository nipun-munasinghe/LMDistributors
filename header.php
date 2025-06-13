<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L. M. Distributors</title>

    <!-- link the stylesheet -->
    <link rel="stylesheet" href="./css/header.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a id="lm" href="./index.php">
                    <img src="./images/LMDistributors-logo2-01.png" alt="L. M. Distributors Logo">
                </a>
                <h1><a id="lm" href="./index.php">L. M. Distributors</a></h1>
            </div>
            
            <div class="bar">
                <nav class="nav-links">
                    <a href="./index.php" title="Home">Home</a>
                    <a href="./products.php" title="Products">Products</a>
                    <a href="./about.php" title="About L.M. Distributors">About Us</a>
                    <a href="./contact.php" title="Contact">Contact Us</a>
                </nav>
            </div>
            
            <!-- Mobile Menu Toggle Button -->
            <div class="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <!-- Desktop Login Buttons -->
        <?php
            // Check if user is logged in
            if(isset($_SESSION['user_fName'])) {
                echo "<div class='logout'>
                        <button>
                            <a href='./logout.php' title='Sign Out'><i class='fa-solid fa-right-from-bracket'></i> Sign Out</a>
                        </button>
                    </div>";
            }
            else {
                echo "<div class='loginBtns'>
                        <button id='hLogin' onclick=\"window.location.href='./login.php'\" title='Login'>Sign In</button>
                        <button id='hLSignup' onclick=\"window.location.href='./register.php'\" title='Register'>Sign Up</button>
                    </div>";
            }
        ?>

        <!-- Mobile Navigation Menu (hidden by default) -->
        <div class="mobile-nav-menu">
            <nav class="mobile-nav-links">
                <a href="./index.php" title="Home">Home</a>
                <a href="./products.php" title="Products">Products</a>
                <a href="./about.php" title="About L.M. Distributors">About Us</a>
                <a href="./contact.php" title="Contact">Contact Us</a>
            </nav>
            
            <!-- Mobile Login Buttons -->
            <div class="mobile-auth-buttons">
                <?php
                    // Check if user is logged in for mobile menu
                    if(isset($_SESSION['user_fName'])) {
                        echo "<button class='mobile-logout'>
                                <a href='./logout.php' title='Sign Out'><i class='fa-solid fa-right-from-bracket'></i> Sign Out</a>
                            </button>";
                    }
                    else {
                        echo "<button class='mobile-login' onclick=\"window.location.href='./login.php'\" title='Login'>Sign In</button>
                            <button class='mobile-signup' onclick=\"window.location.href='./register.php'\" title='Register'>Sign Up</button>";
                    }
                ?>
            </div>
        </div>
    </header>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileToggle = document.querySelector('.mobile-menu-toggle');
            const mobileNavMenu = document.querySelector('.mobile-nav-menu');
            const header = document.querySelector('.header');
            
            // Toggle mobile menu
            mobileToggle.addEventListener('click', function() {
                mobileNavMenu.classList.toggle('active');
                mobileToggle.classList.toggle('active');
                header.classList.toggle('menu-open');
            });

            // Close menu when clicking on navigation links
            const mobileNavLinks = document.querySelectorAll('.mobile-nav-links a');
            mobileNavLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileNavMenu.classList.remove('active');
                    mobileToggle.classList.remove('active');
                    header.classList.remove('menu-open');
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideNav = mobileNavMenu.contains(event.target);
                const isClickOnToggle = mobileToggle.contains(event.target);
                
                if (!isClickInsideNav && !isClickOnToggle && mobileNavMenu.classList.contains('active')) {
                    mobileNavMenu.classList.remove('active');
                    mobileToggle.classList.remove('active');
                    header.classList.remove('menu-open');
                }
            });
        });
    </script>
</body>
</html>
