<?php
    // start sessions
    session_start();

    // Include database config file
    require_once 'config.php';

    if(isset($_POST['submitMessage'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $description = $_POST['description'];
        $status = 'unread';

        // Prepare the SQL query
        $sql = "INSERT INTO `message` (`name`, `email`, `message`, `status`) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $description, $status);
        // Execute the query
        if($stmt->execute()) {
            // Message sent successfully
            echo "<script>alert('Message sent successfully!'); 
                  window.location.href = 'contact-msg.php';</script>";
        }
        else {
            // Error occurred
            echo "<script>alert('Error occurred while sending message. Please try again.');</script>";
        }
    }
?>

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
        <form method="POST" action="contact-msg.php">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="description">Message</label>
            <textarea id="description" name="description" rows="6" placeholder="Write your message" required></textarea>
            
            <center>
                <button type="submit" name="submitMessage" title="Submit Message">
                    Submit Message <i class="fa-regular fa-paper-plane"></i>
                </button>
            </center>
        </form>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>