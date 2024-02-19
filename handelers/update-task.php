<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "todoapp");
if (!$conn) {
    $_SESSION['error'] = "Connection Error: " . mysqli_connect_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {

    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    $id = $_GET['id'];

    if (strlen($title) < 5) {
        $_SESSION['error'] = "The Task Title or content Cannot be less than 5 chars";
    }
}

if (empty($_SESSION['error'])) {

    $sql = "UPDATE `tasks` SET `title` = '$title' where `id` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success'] = "Data Updated Successfully ";
    }
} else {

    header("location:../update.php?id=$id");
}


header("location:../index.php");
