<?php
require_once('session.php');
// to check if the session is started
if (!isset($_SESSION))
{
    session_start();
}

if ( isset($_POST['ISBN']))
{
  // update the reserved column in the books table
  $isbn = $_POST['ISBN'];
  $query = "UPDATE books SET Reserved = 'N' WHERE ISBN = '$isbn'";
  mysqli_query($db, $query);

  $sql = "DELETE FROM reservations WHERE UserName = ? LIMIT 1";
  $stmt = $db->prepare($sql);
  $stmt->bind_param("s", $login_session);
  $stmt->execute();
  mysqli_query($db,$sql);

  // to avoid reposting on refresh and changing or deleting data
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
  }
}
header("Location: profile.php");
?>
