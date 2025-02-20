<?php
    $servername = "localhost";
    $username = "root";
    $password = "Q1212qw!";
    $dbname = "test_db";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>