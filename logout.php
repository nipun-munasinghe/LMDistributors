<?php
    session_start();

    // Unset all of the session variables
    $_SESSION = array();

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