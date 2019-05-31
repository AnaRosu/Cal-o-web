<!DOCTYPE html>
<html lang="en">
  <head>
  <!--The <meta> tag provides metadata about the HTML document-->
  <!--  Meta elements are typically used to specify page description-->
    <meta charset="UTF-8">
    <!--A <meta> viewport element gives the browser instructions on how to control the page's dimensions and scaling.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat Smart | LogIn </title>
    <link rel="stylesheet" href="public/css/form.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    </head>
    <body>
    <!-- start header-->
  <header>
      <div class="container">
          <div id="branding">
              <h1><i class="fab fa-nutritionix"></i><span class="name">Eat Smart</span></h1>
          </div>
          <nav>
              <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="how.html">How it works</a></li>
                  <li  class="active"><a href="login.php">Login or register</a></li>
              </ul>
          </nav>
      </div>
  </header>
  <!-- end header-->
<div class="image-bk">
<div class="wrapper">
	<div class="btn-group" id="form-selector">
		<button type="button" class="btn btn-selector active" id="register-btn" >Register</button>
		<button type="button" class="btn btn-selector" id="log-in-btn">Log In</button>
	</div>
	<div class="form" id="register-form">
		<h2 class="form-title">Register</h2>
    <?php
      if(isset($_GET['error'])) {
        if($_GET['error'] == "emptyfields"){
          echo '<p class="signuperror"> Fill all the fields!</p>';
        }
        elseif ($_GET['error'] == "invaliduid") {
         echo '<p class="signuperror"> Your username is invalid! It should contain only letters and numbers!</p>';
        }
        elseif ($_GET['error'] == "passwordcheck") {
         echo '<p class="signuperror"> Passwords do not mach!</p>';
        }
        elseif ($_GET['error'] == "sqlerror") {
         echo '<p class="signuperror"> SQL error!</p>';
        }
        else {
         echo '<p class="signuperror"> The username is taken!</p>';
      }
    }
    ?>
      <form action="" method="post">
		<!-- <input type="text" class="input-std" placeholder="Email"> -->
		<input type="text" class="input-std"  name="uid" placeholder="Username">
		<input type="password" class="input-std" name="pwd"  placeholder="Password">
		<input type="password" class="input-std"  name="pwd-repeat"  placeholder="Password Confirmation">
	  <button type="submit" class="btn-signup" id="register" name="register-submit">Register</button>
    </form>
	</div>

  <div class="form" id="log-in-form">
  <h2 class="form-title">Log In</h2>
  <?php
      if(isset($_GET['error'])) {
        if($_GET['error'] == "emptyfields"){
          echo '<p class="signuperror"> Fill all the fields!</p>';
        }
        elseif ($_GET['error'] == "wrongpass") {
         echo '<p class="signuperror"> Wrong password!</p>';
        }
        elseif ($_GET['error'] == "nouser") {
         echo '<p class="signuperror"> The user does not exist!</p>';
        }
        elseif ($_GET['error'] == "sqlerror") {
         echo '<p class="signuperror"> SQL error!</p>';
        }
        else {
         echo '<p class="signuperror"> The username is taken!</p>';
      }
    }
    ?>
  <form action="" method="post">
		<input type="text" class="input-std"  name="logid" placeholder="Username" >
		<input type="password" class="input-std" name="logpass" placeholder="Password">
		<button type="submit" class="btn-login" id="log-in" name="login-submit">Log In</button>
	</form>
  </div>
</div>
</div>
  <script src="public/javaScript/login.js">  </script>
  </body>
  </html>