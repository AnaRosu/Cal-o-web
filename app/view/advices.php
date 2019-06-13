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
    <title>Eat Smart | LogIn </title>
    <link rel="stylesheet" href="../public/css/tips.css">
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
                  <li class="active"><a href="">Advices</a></li>
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
  <div class="wrapper">
    <div class="form">
        <h2 class="form-title">What we recommend: </h2>
        <table id="userdata">
        <tr>
            <td>Calories</td>
            <td><?php echo  $_SESSION['calories']?> kcal</td>
        </tr>
        <tr>
            <td>Proteins</td>
            <td><?php echo $_SESSION['proteins']?> g</td>
        </tr>
        <tr>
            <td>Carbs</td>
            <td><?php echo  $_SESSION['carbs']?> g</td>
        </tr>
        <tr>
            <td>Fats</td>
            <td><?php echo $_SESSION['lip']?> g</td>
        </tr>
        <tr>
            <td>Fibers</td>
            <td><?php echo$_SESSION['fiber']?> g</td>
        </tr>
        </table>
    </div>
  </div>
  <div class="tips">
    <div class="date">
        <h2> Choose a period of time and we can give you some tips: </h2>
        <form method="post">
        <select class="dropdown2" id="dropdown2" name="time">
           <option selected hidden value="">Period</option>
             <option value="day">Day</option>
            <option value="week">Week</option>
        </select>
      <button type="submit" class="btn btn-submit" id="submit" name="submit">Submit</button>
      </form>
    </div>
  </div>

  <div  id= "tipsText">
   <p> <?php echo $_SESSION['userName']. ", ";
     if(isset($_SESSION['sugestii'][0]) == 'true' & isset( $_SESSION['sugestii'][1]) == 'true' & isset($_SESSION['sugestii'][2])=='true' &
      isset( $_SESSION['sugestii'][3])):?> dupa ce ti-am analizat toate datele am ajuns la concluzia ca ai consumat mai
    <?php echo  $_SESSION['sugestii'][0]; ?> calorii decat necesarul zilnic.</p>
    <p>Uitandu-ne mai atent peste datele tale am analizat si aportul celorlalte substante iar numarul proteinelor este mai
    <?php
    echo  $_SESSION['sugestii'][1];
   ?>.  Iti sugeram sa consumi <?php
   echo  $_SESSION['food'][0]. ".";
  ?></p>
  <p>  Cantitatea de carbohidrati este mai <?php
     echo  $_SESSION['sugestii'][2];
    ?>, iti recomandam sa consumi <?php
    echo  $_SESSION['food'][1];
   ?>
     iar aportul de grasimi este mai <?php
      echo  $_SESSION['sugestii'][3];
     ?> decat numarul recomandat de noi. Pentru a  balansa cantitatea de grasimi consuma  <?php
      echo  $_SESSION['food'][2] .".";
     ?>
     <?php else: ?>
       alege o perioada de timp pentru a primi niste sfaturi pe baza datelor inregistrate de tine.
       <?php endif; ?>
       <br>
      </p>
  </div>

</body>
</html>
