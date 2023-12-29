<?php
// Create connection
$conn = new mysqli($"localhost", "root", "2003199", "backend");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
