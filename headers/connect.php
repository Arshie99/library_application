<?php
$servername = 'localhost';
$username = 'root';
$password = '#F$7m5z&@&Ve$VMZz2j2Y1VE66ea%5fUF^Qpuc^7KR2F';
$dbname = 'assignment1';

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$db) {
  die('Connection failed: ' . mysqli_connect_error());
}
?>
