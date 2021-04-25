<?php
    session_start();
    // Destroy session
    session_destroy();
    // RedirectTo Home Page
    header("Location: login.php");
?>