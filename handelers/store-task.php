<?php       // To Add new Tasks

session_start();

// Create Connection
$conn = mysqli_connect("localhost", "root", "", "todoapp");
if (!$conn) {
    echo "Connection Error: " . mysqli_connect_error($conn);
}

// Check POST method && Insert data to database
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['title'])) {
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));

    if (strlen($title) < 5) {

        $_SESSION['error'] = "Task Title cannot be less that 5 chars";
        header("location:../index.php");
    } else {

        $sql = "
        INSERT INTO tasks (title)  VALUES ('$title')
        ";

        $result = mysqli_query($conn, $sql);

        // To Know if the database is affected or not
        if (mysqli_affected_rows($conn) == 1) {
            $_SESSION['success'] = " Data Inserted Successfully ";
        }

        // Redirect to the Task Main Page
        header("location:../index.php");
    }
}
