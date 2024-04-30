<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (empty($username) || empty($password) || empty($email)) {
        echo json_encode(array('msg' => 'Fields cannot be empty', 'type' => 'error'));
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array('msg' => 'E-mail is not valid', 'type' => 'error'));
        return;
    }

    if (strlen($password) < 8) {
        echo json_encode(array('msg' => 'Password must be at least 8 characters long', 'type' => 'error'));
        return;
    }

    $username = htmlspecialchars(stripslashes($username));
    $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    $time = time();
    $user_type = 2;

    include 'database.php';
    $db = new Database();
    $database = $db->conn;
    $thereis = $database->prepare('SELECT * FROM users WHERE user_name = ?');
    $thereis->execute([$username]);
    if ($thereis->rowCount() > 0) {
        echo json_encode(array('msg' => 'Username already taken', 'type' => 'error'));
    } else {
        $stmt = $database->prepare('INSERT INTO users (user_name, user_password, user_mail, user_type, time_stamp ) VALUES (:username, :password, :email,:user_type,:time_stamp)');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 60);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':user_type', $user_type, PDO::PARAM_INT);
        $stmt->bindParam(':time_stamp', $time, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            echo json_encode(array('msg' => 'User not registered', 'type' => 'error'));
        } else
            echo json_encode(array('msg' => 'User registered successfully', 'type' => 'success'));
    }
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        echo json_encode(array('msg' => 'Fields cannot be empty', 'type' => 'error'));
        return;
    }
    if (strlen($password) < 8) {
        echo json_encode(array('msg' => 'Password must be at least 8 characters long', 'type' => 'error'));
        return;
    }
    if (strlen($username) < 6) {
        echo json_encode(array('msg' => 'Username must be at least 6 characters long', 'type' => 'error'));
        return;
    }

    $username = htmlspecialchars(stripslashes(strip_tags($username)));
    $hash_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

    include 'database.php';
    $db = new Database();
    $database = $db->conn;
    $thereis = $database->prepare('SELECT * FROM users WHERE user_name = :username limit 1');
    $thereis->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $thereis->execute();
    $row = $thereis->fetchAll(PDO::FETCH_ASSOC);
    if ($thereis->rowCount() > 0) {
        if (password_verify($password, $row[0]['user_password'])) {
            echo json_encode(array('msg' => 'Login successful', 'type' => 'success'));
            session_start();
            session_regenerate_id();
            $_SESSION['logged'] = true;
            $_SESSION['id'] = $row[0]['user_id'];
            $_SESSION['username'] = $row[0]['user_name'];
            $_SESSION['email'] = $row[0]['user_mail'];
            $_SESSION['user_type'] = $row[0]['user_type'];
            $_SESSION['time_stamp'] = time();
        } else
            echo json_encode(array('msg' => 'Username or password is wrong', 'type' => 'error'));
    } else
        echo json_encode(array('msg' => 'Try again', 'type' => 'error'));


    $db = null;
}
exit();