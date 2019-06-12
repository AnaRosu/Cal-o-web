<!DOCTYPE html>
<html lang="en">
  <head>
  <!--The <meta> tag provides metadata about the HTML document-->
  <!--  Meta elements are typically used to specify page description-->
    <meta charset="UTF-8">
    <!--A <meta> viewport element gives the browser instructions on how to control the page's dimensions and scaling.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat Smart | Register </title>
    <link rel="stylesheet" href="/another-tw/Cal-o-web/public/css/register.css">
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
                  <li><a href="../public/">Home</a></li>
                  <li  class="active"><a href="register.php">Register</a></li>
              </ul>
          </nav>
      </div>
  </header>
  <!-- end header-->
<div class="image-bk">
<div class="wrapper">
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
  </div>
</div>

  </body>
  </html>
