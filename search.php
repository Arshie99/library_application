
<?php
include('headers/connect.php');
?>

<?php
$title = "search results";
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

	<div class="search_page">
		<h1>Available Books</h1>

<?php
if (isset($_POST['search']))
{
				$query = $_POST['search'];
			$query = stripslashes($query);
	    $query = strip_tags($query);
	    $query = htmlspecialchars($query);


			$result = mysqli_query($db,"SELECT * FROM books WHERE ISBN LIKE '%".$query."%' OR BookTitle LIKE '%".$query."%' OR Author LIKE '%".$query."%'");
				echo('<table>');
				echo("<tr><th colspan=8>");
				echo("Result");
				echo ('</th></tr>');
	      echo ('<tr><th>');
	      echo "ISBN";
	      echo ('</th><th>');
	      echo "BookTitle";
	      echo ('</th><th>');
	      echo "Author";
	      echo ('</th><th>');
				echo "Edition";
	      echo ('</th><th>');
	      echo "Year";
	      echo ('</th><th>');
	      echo "CategoryID";
	      echo ('</th><th>');
	      echo "Reserved";
				echo ('</th><th>');
				echo "Options";
	      echo ('</th></tr>');
	      while ( $row = mysqli_fetch_row($result))
	      {
					echo ('<form action="reserve.php" method="post">');
	        echo('<tr><td>');
	        echo ($row[0]);
	        echo('</td><td>');
	        echo ($row[1]);
	        echo('</td><td>');
	        echo ($row[2]);
	        echo('</td><td>');
	        echo ($row[3]);
	        echo('</td><td>');
	        echo ($row[4]);
	        echo('</td><td>');
					echo ($row[5]);
					echo('</td><td>');
	        echo ($row[6]);
					echo('</td><td>');
					echo ("<input type='hidden' name='ISBN' value='$row[0]'>");
					echo ('<button type="submit" name="reserve"><b>Reserve</b></button>');
					echo ('</form>');
	        echo('</td></tr>');
	      }
	      echo('</table>');

?>
<?php
}
elseif (isset($_POST['headings']))
{
		$query1 = $_POST['headings'];
	$query1 = stripslashes($query1);
	$query1 = strip_tags($query1);
	$query1 = htmlspecialchars($query1);

				$result1 = mysqli_query($db,"SELECT * FROM books INNER JOIN categories ON books.CategoryID = categories.CategoryID WHERE CategoryDesc = '$query1'");
					echo('<table>');
					echo("<tr><th colspan=8>");
					echo("Result");
					echo ('</th></tr>');
		      echo ('<tr><th>');
		      echo "ISBN";
		      echo ('</th><th>');
		      echo "BookTitle";
		      echo ('</th><th>');
		      echo "Author";
		      echo ('</th><th>');
					echo "Edition";
		      echo ('</th><th>');
		      echo "Year";
		      echo ('</th><th>');
		      echo "CategoryID";
		      echo ('</th><th>');
		      echo "Reserved";
					echo ('</th><th>');
					echo "Options";
		      echo ('</th></tr>');
		      while ( $row = mysqli_fetch_row($result1))
		      {
						echo ('<form action="reserve.php" method="post">');
		        echo('<tr><td>');
		        echo ($row[0]);
		        echo('</td><td>');
		        echo ($row[1]);
		        echo('</td><td>');
		        echo ($row[2]);
		        echo('</td><td>');
		        echo ($row[3]);
		        echo('</td><td>');
		        echo ($row[4]);
		        echo('</td><td>');
						echo ($row[5]);
						echo('</td><td>');
		        echo ($row[6]);
						echo('</td><td>');
						echo ("<input type='hidden' name='ISBN' value='$row[0]'>");
						echo ('<button type="submit" name="reserve"><b>Reserve</b></button>');
						echo ('</form>');
		        echo('</td></tr>');
		      }
		      echo('</table>');
}

?>
		<!-- end page content -->
</div>
		<?php
		include "headers/footer.php";
		?>
