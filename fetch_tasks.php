<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die(json_encode([]));
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT id, task, created_at FROM tasks WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);
$stmt->close();
$conn->close();
?>
