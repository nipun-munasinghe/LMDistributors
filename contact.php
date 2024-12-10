<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/contact.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Contact Section -->
    <div class="contact-container">
        <div class="contact-image">
            <img src="./images/green-phone.jpg" alt="Contact Us">
        </div>

        <div class="contact-details">
            <h1>Contact Us</h1>
            <p>We are here to assist you. Feel free to reach out via any of the following methods:</p>
            <ul>
                <li><i class="fa fa-phone"></i> +94 76 7100 181</li>
                <li><i class="fa fa-envelope"></i> info@lm-distributors.com</li>
                <li><i class="fa fa-map-marker"></i> Dankotuwa, Sri Lanka</li>
            </ul>
            <div class="social-media">
                <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
            
            <center><button id="ask-button" onclick="window.location.href='./contact-msg.php'" title="Click to Ask">Ask Anything?</button></center>
            
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Link Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Link the script -->
    <script src="./js/contact-us.js"></script>
</body>
</html>
