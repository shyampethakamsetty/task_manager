<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("Not logged in");
    }

    $task = $_POST['task'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO tasks (user_id, task) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $task);
    
    if ($stmt->execute()) {
        echo "Task added!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
