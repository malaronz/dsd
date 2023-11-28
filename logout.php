<?php 
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['days']);
    header('Location: /index.php');
?>