<?php
include('headers/connect.php'); // Includes Login Script

function validate_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
}

//declare variables and initialize them
$un = $p = $fn = $sn = $ad1 = $ad2 = $c = $tp = $mp = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $un = validate_data( $_POST['UserName'] );
  $p = validate_data( $_POST['password'] );
  $fn = validate_data( $_POST['FirstName'] );
  $sn = validate_data( $_POST['SurName'] );
  $ad1 = validate_data( $_POST['AddressLine1'] );
  $ad2 = validate_data( $_POST['AddressLine2'] );
  $c = validate_data( $_POST['City'] );
  $tp = validate_data( $_POST['Telephone'] );
  $mp = validate_data( $_POST['Mobile'] );
}

// insert into database
$sql = "INSERT INTO users (UserName, Password, FirstName, SurName, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES ('$un','$p', '$fn', '$sn', '$ad1' ,'$ad2','$c','$tp','$mp')";
if(!mysqli_query($db,$sql))
{
  header("Location: signup.php");
}
else{
  header("Location: profile.php"); // Redirecting To Profile Page
}
mysqli_close($db);
?>
