<?php
// mysqli_connect() function opens a new connection to the MySQL server.
include('headers/connect.php');
session_start();// Starting Session

// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT UserName, Password from users where username=? AND password=? LIMIT 1";

$query = "SELECT UserName from users where UserName = '$user_check'";
$ses_sql = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['UserName'];
?>
