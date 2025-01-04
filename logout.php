<?php
    session_start();

    // Set the correct time zone
    date_default_timezone_set('Asia/Colombo');

    include_once 'config.php';

    // Update last logout time in the database
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $logoutTime = date('Y-m-d H:i:s');
        
        // Update query to store logout time in the database
        $query = "UPDATE user_info SET last_logout = '$logoutTime' WHERE userID = '$userId'";
        mysqli_query($conn, $query) or die("Error updating logout time: " . mysqli_error($conn));
    }

    // Unset all of the session variables
    $_SESSION = array();

    // Close the database connection
    if (isset($conn)) {
        mysqli_close($conn);
    }

    //destroy sessions
    session_destroy();

    // Prevent caching on the logout redirect page
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Redirect to the home page
    header('Location: index.php');
    exit();
?>