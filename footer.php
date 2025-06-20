<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>

    <!-- link the stylesheet -->
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <a href="./about.php"  title="About L.M. Distributors" id="aboutBoth">
                    <img src="./images/LMDistributors-logo-01.png" alt="L.M. Distributors Logo" id="aboutImg"><h3> About Us</h3>
                </a>
                <p>L. M. Distributors connects suppliers and buyers with the finest coconuts in the region. 
                    We're committed to quality, freshness, and reliable service, ensuring every order meets your standards. 
                    Partner with us for a seamless coconut trading experience!</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="./terms.php" title="View T&C">Terms & Conditions</a>
                <a href="./privacy.php" title="View Privacy Policy">Privacy Policy</a>
                <a href="./faq.php" title="View FAQ">FAQ</a>
            </div>
            <div class="footer-section">
                <a href="./about.php"  title="Contact Us"><h3>Contact Us</h3></a>
                <p><i class="fas fa-phone"></i> +94 76 7100 181</p>
                <p><i class="fas fa-envelope"></i> info@lm-distributors.com</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <hr>
            <p>&copy; <?php echo date("Y") ?> L. M. Distributors. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>