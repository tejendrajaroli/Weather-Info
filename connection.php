<?php
$conn = mysqli_connect('localhost','root');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Select database
mysqli_select_db($conn,'weather');
?>