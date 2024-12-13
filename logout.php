<?php
    session_start();

    // Unset all of the session variables
    $_SESSION = array();

    //destroy sessions
    session_destroy();

    // Redirect to the home page
    header('Location: index.php');
    exit();
?>