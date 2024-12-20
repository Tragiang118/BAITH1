<?php
$servername = "localhost"; 
$username = "root";       
$password = "";            
$quiz_db = "quiz_db";     

$conn = new mysqli($servername, $username, $password, $quiz_db);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
