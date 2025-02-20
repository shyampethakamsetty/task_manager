<?php
    include 'db_connect.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
    
        if ($stmt->execute()) {
            echo "Registration successful. <a href='index.html'>Login</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    
        $stmt->close();
        $conn->close();
    }
    ?>