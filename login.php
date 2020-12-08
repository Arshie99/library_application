<?php
require_once('headers/connect.php');
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
// from signin page
if (isset($_POST['signin']))
{
  if (empty($_POST['UserName']) || empty($_POST['password']))
  {
    $error = "Username or Password is Empty";
  }
  else
  {
    // Define $username and $password
    $username = $_POST['UserName'];
    $password = $_POST['password'];

      // SQL query to fetch information of registerd users and finds user match.
      $query = "SELECT UserName, Password from users where username=? AND password=? LIMIT 1";

      // To protect MySQL injection for Security purpose
      $stmt = $db->prepare($query);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $stmt->bind_result($username, $password);
      $stmt->store_result();
      if($stmt->fetch()) //fetching the contents of the row
      {
        $_SESSION['login_user'] = $username; // Initializing Session
        header("location: profile.php"); // Redirecting To Profile Page
      }
      else {
        echo '<script type="text/javascript">';
        echo ' alert("Details not Found. Please Register To LOGIN")';
        echo '</script>';
      }
    mysqli_close($db); // Closing Connection
  }
}
// from reset page
elseif (isset($_POST['reset']))
{
  if (empty($_POST['UserName']) || empty($_POST['password']))
  {
    $error = "Username or Password is Empty";
  }
  else
  {
    // Define $username and $password
    $username = $_POST['UserName'];
    $password = $_POST['password'];


    // SQL query to fetch information of registerd users and finds user match.
    $sql = "UPDATE users SET Password = '$password' WHERE users.UserName = '$username' LIMIT 1";
    if(!mysqli_query($db,$sql))
    {
      echo "incorrect details. try again";

      // to avoid reposting on refresh and changing or deleting data
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
      }
    }
    else
    {
      echo "Password successfully updated. please login.";
      echo "<button class='signinbtn' onclick=location='index.php'>LOGIN</button>";
    }
    mysqli_close($db); // Closing Connection
  }
}

?>
