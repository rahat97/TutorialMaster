<?php
$host ='localhost';
$user = 'TutorialNow';
$pass = 'TutorialNow';
$dbname = 'TutorialNow';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
