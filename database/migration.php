<?php

// connect to database
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    echo "Connection Error: " . mysqli_connect_error($conn);
}


// Create Database
$sql = "CREATE DATABASE IF NOT EXISTS todoapp";

$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);

mysqli_close($conn);        // End of this connection

//==========================================================================================

// Create Tables
$conn = mysqli_connect("localhost", "root", "", "todoapp");

if (!$conn) {
    echo "Connection Error: " . mysqli_connect_error($conn);
}

$sql = "
    CREATE TABLE IF NOT EXISTS tasks(
        id int PRIMARY KEY AUTO_INCREMENT ,
        title varchar(150) NOT NULL
    )
";

$result = mysqli_query($conn, $sql);

echo "<pre>";
print(mysqli_error($conn));
echo "</pre>";

mysqli_close($conn);        // Close This connection

//===============================================================================================