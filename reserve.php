<?php
 $title = "Reserve book";
 include "headers/header.php";
?>
<!-- start of page content -->
<!-- Top Navigation Menu -->
  <div class="topnav">
    <h1 class="main_heading">Library</h1>
    <div class="menu">
      <button class="signup_but" onclick="location='profile.php'">Profile</button>
      <button type="submit" class="login_but" name="search" onclick="location='search_form.php'">Search</button>
    </div>
  </div>

<!--end of menu toggle-->
<b id="welcome">Welcome <?php require_once('session.php'); echo $login_session; ?></b>
<?php
 // Includes Login Script
if(!isset($_SESSION['login_user']))
{
  header("Location: index.php");
}
else
{
    if ( isset($_POST['ISBN']))
    {

      $_SESSION["ISBN"] = $_POST["ISBN"] ;
      $key = $_POST["ISBN"] ;
      $result = mysqli_query($db,"SELECT * FROM books where ISBN = '$key' and  Reserved = 'N'");
      $flag = 0 ;
?>

  <div class="reserve_page">
<table border="1">
<tr><th colspan=7>
Reserve a Book
</th></tr>
<tr><td>
ISPN
</td><td>
Book Title
</td><td>
Author
</td><td>
Edition
</td><td>
Year
</td><td>
Category ID
</td><td>
Reservation State
</td></tr>

<?php
      while ( $row = mysqli_fetch_row($result))
      {
        echo ("<tr><td>");
        echo($row[0]);
        echo("</td><td>");
        echo($row[1]);
        echo("</td><td>");
        echo($row[2]);
        echo("</td><td>");
        echo($row[3]);
        echo("</td><td>");
        echo($row[4]);
        echo("</td><td>");
        echo($row[5]);
        echo("</td><td>");
        echo($row[6]);
        echo("</td></tr>\n");
        $flag = 1 ;
      }
      if ( $flag == 0 )
      {
?>
      </table>
        <table border="1">
        <tr><td>
          Book not availble now
        </td></tr>
      </table>
</div>
<?php
      }
      else
      {
?>
        <form method='post'>
        <button type='submit' class='signinbtn' name='Agree'><b>Agree</b></button>
        <button type='button' class='signinbtn' name='reset' onclick=location='search_form.php'><b>Reset</b></button>
        </form>
<?php
      }
    }

    if ( isset($_POST['Agree']) )
    {
      // declare variables and initialize them
      $date = date("j-m-yy");
      // Storing Session
      $isbn = $_SESSION['ISBN'];

      $query = "UPDATE books SET Reserved = 'Y' WHERE ISBN = '$isbn'";
      mysqli_query($db, $query);
      $sql = mysqli_query($db,"INSERT INTO reservations (ReservationID, ISBN, UserName, ReservedDate) VALUES (NULL, '$isbn', '$login_session', '$date')");
      if(mysqli_query($db,$sql))
      {
        echo "Please try again";
      }
      else
      {
        header("Location:profile.php");
      }
      mysqli_query($db,$sql);
    }

  mysqli_close($db);
}
?>
