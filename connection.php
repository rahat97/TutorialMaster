<<<<<<< HEAD
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
=======
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
>>>>>>> 5f1514ab2a16995d7ac3d69526879f5a41ebe8f4
