<?php
$user_type = $_SESSION['user_type'];
if ($user_type == 1) {
    $user_type = "Admin";
} else if ($user_type == 2) {
    $user_type = "User";
} else if ($user_type == 3) {
    $user_type = "Teacher";
} else if ($user_type == 4) {
    $user_type = "Student";
}