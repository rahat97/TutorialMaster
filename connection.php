<?php
$host ='localhost';
$user = 'TutorialMaster';
$pass = 'TutorialMaster';
$dbname = 'TutorialMaster';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
