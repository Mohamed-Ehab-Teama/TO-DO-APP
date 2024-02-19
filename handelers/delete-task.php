<?php
session_start();

if (isset($_GET['id'])) {
    $conn = mysqli_connect("localhost", "root", "", "todoapp");
    if (!$conn) {
        $_SESSION['error'] = "Connection Error: " . mysqli_connect_error($conn);
    }

    // Check if there ara matching rows or not!!
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);

    if (!$row) {
        $_SESSION['error'] = "Data Not Existed ";
    } else {
        $sql = "DELETE FROM tasks WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $_SESSION['success'] = "Data Deleted Successfully";
    }


    header("location:../index.php");
}
