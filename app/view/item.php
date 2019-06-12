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
    <title>Eat Smart | Item Details </title>
    <link rel="stylesheet" href="../public/css/i.css">
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
                <li><a href="../public/history">History</a></li>
                  <li><a href="../public/advices">Advices</a></li>
                <li  class="active"><a href="../public/addFood">Add Food</a></li>
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
<div class="container">
  <div class="details">
   <p style="font-size: 20px;">
     <?php
     if (isset($_GET['name'])){
       echo "Food Composition for: " . $_GET['name'];
     }else{
       echo "No result found!";
     }

    ?>
    <br>
    <form method="post">
    <input type="text" class="input-std"  name="meal" placeholder="Meal" >
    <label style="font-size: 20px;">Date:</label>
    <input style="" type="date"  class="input-std" name="datee">
    <button type="submit" class="btn btn-submit" name="save">Save</button>
  </form>
   </p>
  </div>
   <div class="row">
    <div class="col">
      <table class="table" style="margin-bottom: 20px;">
       <thead>
         <tr>
           <th>Name</th>
           <th>Value</th>
           <th>Unit</th>
           <th>Group</th>
         </tr>
       </thead>
       <tbody>
         <?php
             $i=0;
                 while($i < 11):
             ?>
           <tr>
            <td><?php echo $_SESSION['item']['report']['food']['nutrients'][$i]['name'];?></td>
            <td><?php echo $_SESSION['item']['report']['food']['nutrients'][$i]['value'];?></td>
            <td><?php echo $_SESSION['item']['report']['food']['nutrients'][$i]['unit']?></td>
            <td><?php echo $_SESSION['item']['report']['food']['nutrients'][$i]['group']?> </td>
           </tr>
            <?php $i = $i+1; ?>
         <?php endwhile; ?>
       </tbody>
      </table>
    </div>
   </div>
</div>
</body>
</html>
