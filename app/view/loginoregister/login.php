<!DOCTYPE html>
<html lang="en">
  <head>
  <!--The <meta> tag provides metadata about the HTML document-->
  <!--  Meta elements are typically used to specify page description-->
    <meta charset="UTF-8">
    <!--A <meta> viewport element gives the browser instructions on how to control the page's dimensions and scaling.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat Smart | LogIn </title>
    <link rel="stylesheet" href="/another-tw/Cal-o-web/public/css/login.css">
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
                  <li class="active"><a href="login.php">Login</a></li>
              </ul>
          </nav>
      </div>
  </header>
  <!-- end header-->
<div class="image-bk">
<div class="wrapper">
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
  </body>
  </html>
