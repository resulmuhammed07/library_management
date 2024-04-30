<?php
if ($user_type == 1) {
    $user_type = "admin";
}else if ($user_type == 2) {
    $user_type = "user";
}else if ($user_type == 3) {
    $user_type = "teacher";
}else if ($user_type == 4) {
    $user_type = "student";
}