<?php
$title = "Signup";
include "headers/header.php";
?>

<!-- begin page content -->
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
      <button class="signup_but" onclick="location='profile.php'">Profile</button>
      <form action="reserve.php" method="get">
      <button type="submit" class="login_but" name="reserve">Reserve</button>
      </form>
    </div>
  </div>
<!--end of menu toggle-->

    <div class="form_design1">
      <!--html signup form element-->
      <form action="user_signup.php" method="post">
        <div class="container">
          <h1 class="signup_text">Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <label><b>User Name</b></label>
          <input type="text" placeholder="Username" name="UserName" maxlength="15" required>

          <label><b>Password</b></label>
		      <input type="password" placeholder="Password" id="Password" name="password"
		      pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?])[A-Za-z\d@$!%*?]{,6}"
		      title="Must contain at least one number, one uppercase, one lowercase letter, one symbol, length of 16 characters max" required>

          <label> <b>Confirm Password</b> </label>
          <input type="password" placeholder="Confirm Password" id="comparepass" name="comparePassword" maxlength="15" required>

          <label> <b>First Name</b> </label>
          <input type="text" placeholder="First name" name="FirstName" maxlength="15" required>

          <label> <b>Last Name</b> </label>
          <input type="text" placeholder="Last name"name="SurName" maxlength="15" required>

          <label> <b>Address Line 1</b> </label>
          <input type="text" placeholder="Address Line 1" name="AddressLine1" maxlength="50">

          <label> <b>Address Line 2</b> </label>
          <input type="text" placeholder="Address Line 2" name="AddressLine2" maxlength="50">

          <label> <b>City</b> </label>
          <input type="text" placeholder="City" name="City" maxlength="15">

          <label> <b>Telephone</b> </label>
          <input type="tel" placeholder="Telephone number" name="Telephone">

          <label> <b>Mobile</b> </label>
          <input type="tel" placeholder="Mobile number" name="Mobile">

          <div class="bot_buttons">
            <button type="submit" name="signup" class="signupbtn" onclick="comparePassword()">Sign Up</button>
            <button type="button" class="cancelbtn" onclick="location='index.php'"> Cancel</button>
          </div>

        </div>

      </form>
    </div>

    <!-- end page content -->

    <?php
    include "headers/footer.php";
    ?>
