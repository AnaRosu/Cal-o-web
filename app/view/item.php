
<!DOCTYPE html>
<html lang="en">
  <head>
  <!--The <meta> tag provides metadata about the HTML document-->
  <!--  Meta elements are typically used to specify page description-->
    <meta charset="UTF-8">
    <!--A <meta> viewport element gives the browser instructions on how to control the page's dimensions and scaling.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat Smart | Item Details </title>
    <link rel="stylesheet" href="../public/css/item.css">
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
   <p style="font-size: 20px;"><?php
     if (isset($_GET['name'])){
       echo "Food Composition for: " . $_GET['name'];
     }else{
       echo "No result found!";
     }

    ?>
          <input class ="btn" type="submit" name ="save">
   </p>
  </div>


   <?php
     $id = $_GET['id'];
     $url = "https://api.nal.usda.gov/ndb/reports/?ndbno=$id&type=b&format=json&api_key=1T07Yipi3avcF9MxQabvWURyhIbRbiAugfZdqTPY";
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $url);
     curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
     $result = curl_exec($curl);
     curl_close($curl);
     $json = json_decode($result);
     if (!isset($json->errors)):
   ?>

   <div class="row">
    <div class="col">
      <table class="table">
       <thead>
         <tr>
           <th>Name</th>
           <th>Value</th>
           <th>Unit</th>
           <th>Group</th>
         </tr>
       </thead>
       <tbody>
         <?php  $j=0; ?>
         <?php foreach($json->report->food->nutrients as $nutrient):
           if ($j > 10){
             break;
           }
          ?>
           <tr>
            <td><?php echo $nutrient->name;?></td>
            <td><?php echo $nutrient->value;?></td>
            <td><?php echo $nutrient->unit;?></td>
            <td><?php echo $nutrient->group;?> </td>
           </tr>
            <?php $j = $j+1; ?>
         <?php endforeach; //end foreach($json->report->food->nutrients as $nutrient): ?>
       </tbody>
      </table>
    </div>
   </div>

 <?php else: ?>
   <?php foreach($json->errors->error as $error): ?>
     <?php echo $error->message; ?>
   <?php endforeach; ?>
 <?php endif; // !isset($json->errors) ?>
</div>
</body>
</html>
