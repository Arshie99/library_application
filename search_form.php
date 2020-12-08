<?php
include('headers/connect.php');
?>

<?php
$title = "search";
include "headers/header.php";
?>

<!-- begin page content -->
<!-- Top Navigation Menu -->
	<div class="topnav">
		<h1 class="main_heading">Library</h1>
		<div class="menu">
			<button class="signup_but" onclick="location='profile.php'">Profile</button>
			<form action="reserve.php" method="get">
			</form>
		</div>
	</div>
<!--end of menu toggle-->
<!-- search form -->
<!-- form for searching -->
<form class="search-bar" action="search.php" method="POST">
	<label for="headings"> <h2>Category Search</h2></label>
	<select class="headings" name="headings">
		<option value="">Select an option </option>
		<option value="Health">1: Health </option>
		<option value="Business">2: Business </option>
		<option value="Biography">3: Biography </option>
		<option value="Technology">4: Technology </option>
		<option value="Travel">5: Travel </option>
		<option value="Self-help">6: Self-help</option>
		<option value="Cookery">7: Cookery</option>
		<option value="Fiction">8: Fiction</option>
	</select>
	<button type="submit" class="search_but1"><i class="fa fa-search"></i> Search</button>
</form>

<form class="search-bar" action="search.php" method="POST">
		<label for="searchall"><h2>Keyword Search</h2></label>
		<input type="text" placeholder="Use ISBN, Book title or Author name to search"  class="box" name="search">
		<button type="submit" class="search_but"><i class="fa fa-search"></i> Search</button>
</form>
<!-- end of form for search -->

		<?php
		include "headers/footer.php";
		?>
