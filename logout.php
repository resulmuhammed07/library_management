<?php
session_start();
if (isset($_SESSION)) {
    unset($_SESSION['logged']);
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['user_type']);
    unset($_SESSION['time_stamp']);
    session_destroy();
}
header('location: login.php');