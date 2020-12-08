<?php
$title = "Forgot Password";
include "headers/header.php";
?>
<!-- start of main body -->
  <script type="text/javascript">
    function comparePassword()
    {
      var Password = document.getElementById("Password").value;
      var comparepass = document.getElementById("comparepass").value;

      if(Password.value != comparepass.value)
      {
        printError("comparepass","Passwords do not match.")
      }
    }
  </script>

  <!-- Top Navigation Menu -->
    <div class="topnav">
      <h1 class="main_heading">Library</h1>
      <div class="menu">
        <button class="signup_but" onclick="location='signup.php'">Signup</button>
        <button class="signup_but" onclick="location='index.php'">Signin</button>
      </div>
    </div>
  <!--end of menu toggle-->

	<div class="form_design">
	<form action="login.php" method="post">
		<h1 id="login">Password reset</h1>
		<div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Username" name="UserName" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Password" id="Password" name="password"
      pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?])[A-Za-z\d@$!%*?]{,6}"
      title="Must contain at least one number, one uppercase, one lowercase letter,
      one symbol, length of 16 characters max" required>


      <label><b> Confirm Password</b></label>
			<input type="password" placeholder="Confirm Password" id="comparepass" name="confirm_pass" required>

			<button type="submit" name="reset" class="signinbtn" onclick="comparePassword()">RESET PASSWORD</button>
      <button type="button" class="signinbtn" onclick="location='index.php'"> Cancel</button>
    </div>
	</form>
	</div>
  <!-- end page content -->

  <?php
  include "headers/footer.php";
  ?>
