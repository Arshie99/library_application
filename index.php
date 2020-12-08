<?php
$title = "Homepage";
include('headers/header.php');
?>

<!-- begin page content -->
<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user']))
{
	header("profile.php"); // Redirecting To Profile Page
}
?>

<!-- Top Navigation Menu -->
	<div class="topnav">
		<h1 class="main_heading">Library</h1>
		<div class="menu">
			<button type="button" class="login_but" name="search" onclick="location='search_form.php'">Browse</button>
		</div>
	</div>
<!--end of menu toggle-->

	<div class="form_design">
	<form action="" method="post">
		<h1 id="login">Member Login</h1>
		<div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Username" name="UserName" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Password" name="password" required>

			<button type="submit" name="signin" class="signinbtn">LOGIN</button>
			<span class="error"><?php echo $error; ?></span>

			<label> OR </label>
			<button type="button" name="signup" class="signinbtn" onclick="location='signup.php'">SIGNUP</button>
			<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
			</label>
		</div>

		<div class="container1" style="background-color:#f1f1f1">
			<button type="reset" class="cancelbtn"> RESET</button>
			<span class="password">Forgot <a href="forgot_pass.php">password?</a></span>
		</div>
	</form>
	</div>

	<!-- end page content -->

	<?php
	include "headers/footer.php";
	?>
