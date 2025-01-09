<?php
    // start sessions
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>

    <!-- Link the stylesheet -->
    <link rel="stylesheet" href="./css/faq.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- FAQ Section -->
    <section class="faq-container">
        <h1>Frequently Asked Questions</h1>
        <p>Find answers to the most common questions about L. M. Distributors.</p>
        <div class="faq-item">
            <div class="faq-question">
                <h3>What does L. M. Distributors offer?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>We connect coconut buyers and suppliers with the best quality coconuts. Our platform ensures a seamless buying and selling process.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                <h3>How do I register as a buyer or supplier?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>You can register on our platform by clicking on the Sign Up button on the home page and filling in your details.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                <h3>Are there different pricing options for buyers and suppliers?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Yes, our platform offers dynamic pricing for buyers and suppliers based on current market trends.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                <h3>How can I contact customer support?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>You can reach us via phone, email, or the Contact Us page on our website.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                <h3>Is my data secure with L. M. Distributors?</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <p>Yes, we prioritize the security of our users' data using modern encryption and privacy protocols.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
    <script src="./js/faq.js"></script>
</body>
</html>
