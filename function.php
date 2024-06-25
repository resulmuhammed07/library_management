<?php
function get_user_type() {
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
    return $user_type;
}

function secure_input($data): string {
    return trim(htmlspecialchars(stripslashes(strip_tags($data))));
}

function get_all_books(): bool|array {
    $database = new Database();
    $db = $database->conn;
    $books = $db->prepare('SELECT * FROM books');
    $books->execute();
    return $books->fetchAll();
}

function get_all_genre(): bool|array {
    $database = new Database();
    $db = $database->conn;
    $genre = $db->prepare('SELECT * FROM genre');
    $genre->execute();
    return $genre->fetchAll();
}

function check_status(): void {
    ob_start();
    session_start();
    if (!$_SESSION["logged"]) {
        unset($_SESSION["logged"]);
        unset($_SESSION["id"]);
        unset($_SESSION["username"]);
        unset($_SESSION["email"]);
        unset($_SESSION["timestamp"]);
        session_destroy();
        header("location: login.php");
        exit();
    }
}