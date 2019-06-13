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
    <title>Eat Smart | AddFood </title>
     <link rel="stylesheet" href="../public/css/addfood2.css">
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
                  <li class="active"><a href="">Add Food</a></li>
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

  <div class="container_recipe">
    <div class="form-box">
      <p style="margin-left: 30px;">What did you eat today?</p>
      <form class="my-form" action="" method="POST">
      <div class="form-group">
        	<input type="text" class="input-std"
                     name="searchTerm" type="text" placeholder="Search Term: butter"></div>

        <div class="form-group">
        <label>Category:</label>
        <select  name="foodGroup" class="dropdown" id="select_category">
               <option value="all">All Food Groups</option><option value="1100">Vegetables and Vegetable Products</option>
               <option value="0900">Fruits and Fruit Juices</option>
               <option value="0100">Dairy and Egg Products</option>
               <option value="0500">Poultry Products</option>
               <option value="0700">Sausages and Luncheon Meats</option>
               <option value="1300" >Beef Products</option>
               <option value="1700" >Lamb, Veal, and Game Products</option>
               <option value="2000" >Cereal Grains and Pasta</option>
               <option value="2100" >Fast Foods</option>
               <option value="2200">Meals, Entrees, and Side Dishes</option>
               <option value="0400">Fats and Oils</option>
               <option value="1800" >Baked Products</option>
               <option value="1600">Legumes and Legume Products</option>
               <option value="1200">Nut and Seed Products</option>
               <option value="1900">Sweets</option>
               <option value="0600">Soups, Sauces, and Gravies</option>
               <option value="0800">Breakfast Cereals</option>
               <option value="2500">Snacks</option>
               <option value="0200">Spices and Herbs</option>
        </select>
        </div>
        <div class="form-group">
          <select name="dataSource" class="dropdown" id="select_category">
                <option value="all" >
                  All Databases
                </option>
                <option value="Standard%20Reference" >
                  Standard Reference
                </option>
                <option value="Branded%20Food%20Products">
                  Branded Food Products
                </option>
              </select>
         </div>
          <div class="form-group">
          <input style="margin-top:-20px;" class =" btn btn-submit" type="submit" name="search-submit" value="Search">
        </div>
      </form>
    </div>
<div class="row" style="margin-top: -620px;" >
       <div class="col">
         <table class="table">
           <caption>Search Results: </caption>
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Group</th>
            </tr>
             </thead>
     <?php
         $i=0;
             while($i < 11):
         ?>
                <?php $id = $_SESSION['items']['list']['item'][$i]['ndbno']; ?>
                <?php $name = $_SESSION['items']['list']['item'][$i]['name'];?>
               <tbody>
               <tr>
                <td><a href='<?php echo "../public/item?id=$id&name=$name;" ?>'   style="color:#006d51;">
                  <?php echo $_SESSION['items']['list']['item'][$i]['ndbno']; ?></a></td>
                <td><?php echo $_SESSION['items']['list']['item'][$i]['name']; ?> </td>
                <td><?php echo $_SESSION['items']['list']['item'][$i]['group'];;?></td>
               </tr>
               <?php $i = $i+1; ?>
             <?php endwhile;?>
            </tbody>
              </table>
             </div>
            </div>
        </body>
</html>
