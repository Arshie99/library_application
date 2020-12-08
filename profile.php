<?php
include('session.php');
if(!isset($_SESSION['login_user']))
{
  header("Location: index.php"); // Redirecting To login Page
}
else
{
?>

<?php
$title = "Profile";
include "headers/header.php";
?>

<!-- begin page content -->
<!-- Top Navigation Menu -->
  <div class="topnav">
    <h1 class="main_heading">Library</h1>
    <div class="menu">
      <button class="signup_but" onclick="location='profile.php'">Profile</button>
      <button type="submit" class="login_but" name="search" onclick="location='search_form.php'">Search</button>
    </div>
  </div>
<!--end of menu toggle-->

    <div class="reserve_table">
      <b id="welcome">Welcome <?php echo $login_session; ?></b>

        <!--start of header-->
        <header>
              <h1>Profile</h1>
        </header>
        <!--end of Header-->

        <!-- start of reserved books output -->
        <?php
        $query =("SELECT reservations.ISBN,books.BookTitle, books.Author, reservations.ReservedDate, reservations.UserName
          FROM reservations INNER JOIN books ON reservations.ISBN = books.ISBN WHERE UserName = ?");
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $login_session);
        $stmt->execute();
        $result = $stmt->get_result();
        // display the reserved books for the member
        echo '<table border="1">'."\n";
        echo("<tr><th colspan=7>");
        echo("Reservations");
        echo ('<tr><th>');
        echo "ISBN";
        echo ('</th><th>');
        echo "Book Title";
        echo ('</th><th>');
        echo "Author";
        echo ('</th><th>');
        echo "Reservation Date";
        echo ('</th><th>');
        echo "Options";
        echo ('</th></tr>');
        while ( $row = mysqli_fetch_row($result) )
        {
          echo ('<form action="delete.php" method="post">');
          echo('<tr><td>');
          echo ($row[0]);
          echo('</td><td>');
          echo ($row[1]);
          echo('</td><td>');
          echo ($row[2]);
          echo('</td><td>');
          echo ($row[3]);
          echo('</td><td>');
          echo ("<input type='hidden' name='ISBN' value='$row[0]'>");
          echo ('<button type="submit" name="delete"><b>Return</b></button>');
          echo ('</form>');
          echo('</td></tr>');
        }
        echo('</table>');
        ?>

          <button type="button" class="signinbtn" name="Logout" onclick="location='logout.php'"><b>Log Out</b></button>
    </div>
    <?php
    }
     ?>
    <!-- end page content -->

    <?php
    include "headers/footer.php";
    ?>
