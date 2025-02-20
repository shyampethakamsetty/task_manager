<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("Not logged in");
    }

    $task_id = $_POST['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM tasks WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $task_id, $user_id);

    if ($stmt->execute()) {
        echo "Task deleted!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
