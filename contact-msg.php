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
    
    <div class="form-container" id="form-section">
        <h2>Ask anything?</h2>
        <form>
            <label for="name">Your Name</label>
            <input type="text" id="name" placeholder="Enter your name" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" placeholder="Enter your email" required>

            <label for="description">Message</label>
            <textarea id="description" rows="6" placeholder="Write your message" required></textarea>
            
            <center>
                <button type="submit">Submit</button>
            </center>
        </form>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>