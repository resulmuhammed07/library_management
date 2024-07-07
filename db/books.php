<?php
include_once 'database.php';
include_once '../function.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
    exit(404);
}
$database = new Database();
$db = $database->conn;

/**
 * @param $data
 * @return string
 */

if (isset($_POST)) {
    if (isset($_POST['add_new_book'])) {
        $book_name = secure_input($_POST['book_name']);
        $author_name = secure_input($_POST['author']);
        $genre_name = secure_input($_POST['genre']);
        $page = (int)secure_input($_POST['page']);
        $user_name = secure_input($_SESSION['username']);
        $created_time = time();
        if (empty($book_name) || empty($author_name) || empty($page)) {
            echo json_encode(array('msg' => 'Fields cannot be empty', 'type' => 'error'));
        } else if (!is_int($page)) {
            echo json_encode(array('msg' => 'Invalid page number', 'type' => 'error'));
        } else {
            $ins_book = $db->prepare('INSERT INTO books (book_title, book_genre, book_page, book_authors, book_created_user, book_created_time) values (:book_title,:book_genre,:book_page,:book_authors,:book_created_user,:book_created_time)');
            $ins_book->bindParam(':book_title', $book_name);
            $ins_book->bindParam(':book_genre', $genre_name);
            $ins_book->bindParam(':book_page', $page, PDO::PARAM_INT);
            $ins_book->bindParam(':book_authors', $author_name);
            $ins_book->bindParam(':book_created_user', $user_name);
            $ins_book->bindParam(':book_created_time', $created_time, PDO::PARAM_INT);
            $ins_book->execute();
            if ($ins_book->rowCount() > 0) {
                echo json_encode(array('msg' => 'Added successfully', 'type' => 'success'));
            } else
                echo json_encode(array('msg' => 'Fields cannot be empty', 'type' => 'error'));
        }
    } else if (isset($_POST['delete_book'])) {
        $book_id = secure_input($_POST['books_id']);
        $book_id = (int)$book_id;
        $ins_book = $db->prepare('DELETE FROM books WHERE books_id = :book_id');
        $ins_book->bindParam(':book_id', $book_id);
        $ins_book->execute();
        if ($ins_book->rowCount() > 0) {
            echo json_encode(array('msg' => 'Deleted successfully', 'type' => 'success'));
        } else
            echo json_encode(array('msg' => 'Not Successfully', 'type' => 'error'));
    } else if (isset($_POST['edit_book'])) {
        $book_id = secure_input($_POST['books_id']);
        $book_name = secure_input($_POST['book_name']);
        $author_name = secure_input($_POST['author']);
        $genre_name = secure_input($_POST['genre']);
        $page = intval(secure_input($_POST['page']));
        $update_time = time();
        if (empty($book_name) || empty($author_name) || empty($page) || empty($book_id) || empty($genre_name)) {
            echo json_encode(array('msg' => 'Fields cannot be empty', 'type' => 'error'));
        } else {
            echo json_encode(array('msg' => $book_id, 'type' => 'success'));
        }
        $database = null;
        $db = null;
    } else if (isset($_POST['add_genre'])) {
        $genre_name = secure_input($_POST['genre_name']);
        if (empty($genre_name)) {
            echo json_encode(array('msg' => 'WRONG', 'type' => 'error'));
            return;
        }
        $created_time = time();
        require_once 'database.php';
        $database = new Database();
        $db = $database->conn;
        $ins_genre = $db->prepare('INSERT INTO genre(genre_name,genre_created_time) values (:genre_name,:created_time)');
        $ins_genre->bindParam(':genre_name', $genre_name, PDO::PARAM_STR);
        $ins_genre->bindParam(':created_time', $created_time, PDO::PARAM_INT);
        $ins_genre->execute();
        if ($ins_genre->rowCount() > 0) {
            echo json_encode(array('msg' => 'Added successfully', 'type' => 'success'));
        } else {
            echo json_encode(array('msg' => 'Fields cannot be empty', 'type' => 'error'));
        }
    } else if (isset($_POST['edit_genre'])) {
        $genre_id = secure_input($_POST['genre_id']);
        $genre_name = secure_input($_POST['genre_name']);
        if (empty($genre_id) || empty($genre_name)) {
            echo json_encode(array('msg' => $genre_name, 'type' => 'error'));
        } else {
            $update_time = time();
            $ins_edit_category = $db->prepare('UPDATE genre SET genre_name= :genre_name,genre_updated_date=:update_time WHERE genre_id = :genre_id');
            $ins_edit_category->bindParam(':genre_name', $genre_name);
            $ins_edit_category->bindParam(':update_time', $update_time, PDO::PARAM_INT);
            $ins_edit_category->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
            $ins_edit_category->execute();
            if ($ins_edit_category->rowCount() > 0) {
                echo json_encode(array('msg' => 'Updated successfully', 'type' => 'success'));
            } else
                echo json_encode(array('msg' => 'Not Successfully', 'type' => 'error'));
        }
        $database = null;
        $db = null;
    } else if (isset($_POST['delete_genre'])) {
        $genre_id = secure_input($_POST['genre_id']);
        $genre_id = intval($genre_id);
        $ins_genre = $db->prepare('DELETE books, genre FROM genre INNER JOIN books ON genre.genre_name = books.book_genre WHERE genre.genre_id = :genre_id');
        $ins_genre->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
        $ins_genre->execute();
        if ($ins_genre->rowCount() > 0) {
            echo json_encode(array('msg' => 'Deleted successfully', 'type' => 'success'));
        } else
            echo json_encode(array('msg' => 'Not Successfully', 'type' => 'error'));
    } else {
        echo json_encode(array('msg' => 'Invalid page number', 'type' => 'error'));
    }
}
$database = null;
$db = null;
exit(404);