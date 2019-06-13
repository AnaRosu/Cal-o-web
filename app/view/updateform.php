<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <!--The <meta> tag provides metadata about the HTML document-->
  <!--  Meta elements are typically used to specify page description-->
    <meta charset="UTF-8">
    <!--A <meta> viewport element gives the browser instructions on how to control the page's dimensions and scaling.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat Smart | Set up Your account </title>
    <link rel="stylesheet" href="../public/css/userform.css?v=<?php echo time(); ?>">
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
                <li><a href="">History</a></li>
                <li><a href="../public/addFood">Add Food</a></li>
                <li><a href="../public/logout">LogOut</a></li>
                <?php
                 if(isset($_SESSION['userName'])){
                   echo '<li id="login-status"> Logged in as ' . $_SESSION['userName'] .'.</li>';
                 }
                 else{
                   echo '<li id="login-status"> Logged out</li>';
                 }
               ?>
            </ul>
        </nav>
    </div>
</header>
<!-- end header-->
<div class="form-box">

  <p>General information</p>
  <div class="form-group">
  <form id="form-ajax" class="my-form" action="" method="post">
      <input type="radio" name="gender" value="Male">Male
      <input type="radio" name="gender" value="Female">Female<br>
      <input type="text" class="field1" name="firstname" placeholder="First Name...">
      <input type="text" class="field2" name="lastname" placeholder="Last Name...">
      <label class="field1">Weight:</label>
      <label class="field2-l">Height:</label>
      <br>
      <input type="text" class="field1" name="weight" placeholder="kg">
      <input type="text" class="field2" name="height" placeholder="cm"><br>
      <label class="field1">Date of birth:</label>
      <label class="field2-2">Activity level:</label>
      <br>
      <input type="date" class="field1" name="bday">
      <select class="dropdown2" id="dropdown2" name="activity">
        <option selected hidden value="">Select Code</option>
          <option value="sedentary">Sedentary</option>
          <option value="moderate">Moderately active</option>
          <option value="active">Active</option>
          <option value="vactive">Vigorously active</option>
          <option value="eactive">Extremely active</option>
      </select>
      <br>
      <label>What would you like to achieve?</label><br>
      <input type="radio" name="purpose" value="less">lose weight<br>
      <input type="radio" name="purpose" value="same">maintain the same weight<br>
      <input type="radio" name="purpose" value="more">gain weight<br>
      <input class ="btn" type="submit" name ="save">
  </form>
  </div>
</div>
  <script src="public/javaScript/updateform.js"></script>
</body>
</html>
