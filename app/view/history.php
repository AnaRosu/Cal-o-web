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
    <link rel="stylesheet" href="../public/css/hst.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <style>
      .chart-container {
        width: 375px;
        height: auto;
      }
    </style>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#updateonclick').click(function() {
            $('.show-onclick').toggle();
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#updateonclick2').click(function() {
            $('.today2').toggle();
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#updateonclick3').click(function() {
            $('.today3').toggle();
        });
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $.ajax({
          url : "http://localhost/another-tw/Cal-o-web/public/weightdata.php",
          type : "GET",
          success : function(data){
            console.log(data);

            var data_inreg1 = [];
            var weight_inreg = [];

            for(var i in data) {
              data_inreg1.push(data[i].date_inreg);
              weight_inreg.push(data[i].weight);
            }
            var chartdata = {
              labels: data_inreg1,
              datasets: [
                {
                  label: "Weight",
                  fill: false,
                  lineTension: 0.1,
                  backgroundColor: "rgba(59, 89, 152, 0.75)",
                  borderColor: "rgba(59, 89, 152, 1)",
                  pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
                  pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                  data: weight_inreg
                }
              ]
            };

            var ctx = $("#mycanvas");

            var LineGraph = new Chart(ctx, {
              type: 'line',
              data: chartdata
            });
          },
          error : function(data) {

          }
        });
      });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
        $.ajax({
          url : "http://localhost/another-tw/Cal-o-web/public/caloriestoday.php",
          type : "GET",
          success : function(data){
            console.log(data);

            var data_columns = [];
            var data_inreg = [];

            for(var i in data) {
              data_inreg.push(data[i].inreg);
              data_columns.push(data[i].column);
            }
            var barChartData = {
              labels:data_columns,
              datasets: [
                {
                  label: "Eaten",
                  backgroundColor: "lightgreen",
                  borderColor: "green",
                  borderWidth: 1,
                  data: data_inreg
                },
                {
                  label: "Recommended",
                  backgroundColor: "lightblue",
                  borderColor: "blue",
                  borderWidth: 1,
                  data: ["<?php echo $_SESSION['calories']?>","<?php echo $_SESSION['proteins']?>","<?php echo $_SESSION['lip']?>","<?php echo $_SESSION['carbs']?>","<?php echo $_SESSION['fiber']?>","0"]
                }
              ]
            };

            var chartOptions = {
              responsive: true,
              legend: {
                position: "top"
              },
              title: {
                display: true,
                text: "You ate today"
              },
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }

            var ctx = $("#barchart");

            var LineGraph = new Chart(ctx, {
              type: 'bar',
              data: barChartData,
              options: chartOptions
            });
          },
          error : function(data) {

          }
        });
      });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
        $.ajax({
          url : "http://localhost/another-tw/Cal-o-web/public/calorieslastweek.php",
          type : "GET",
          success : function(data){
            console.log(data);

            var data_columns = [];
            var data_inreg = [];

            for(var i in data) {
              data_inreg.push(data[i].inreg);
              data_columns.push(data[i].column);
            }
            var barChartData = {
              labels:data_columns,
              datasets: [
                {
                  label: "Eaten",
                  backgroundColor: "lightgreen",
                  borderColor: "green",
                  borderWidth: 1,
                  data: data_inreg
                },
                {
                  label: "Recommended",
                  backgroundColor: "lightblue",
                  borderColor: "blue",
                  borderWidth: 1,
                  data: ["<?php echo $_SESSION['calories']?>","<?php echo $_SESSION['proteins']?>","<?php echo $_SESSION['lip']?>","<?php echo $_SESSION['carbs']?>","<?php echo $_SESSION['fiber']?>","0"]
                }
              ]
            };

            var chartOptions = {
              responsive: true,
              legend: {
                position: "top"
              },
              title: {
                display: true,
                text: "Last week"
              },
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }

            var ctx = $("#barchart2");

            var LineGraph = new Chart(ctx, {
              type: 'bar',
              data: barChartData,
              options: chartOptions
            });
          },
          error : function(data) {

          }
        });
      });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
        $.ajax({
          url : "http://localhost/another-tw/Cal-o-web/public/calorieslastmonth.php",
          type : "GET",
          success : function(data){
            console.log(data);

            var data_columns = [];
            var data_inreg = [];

            for(var i in data) {
              data_inreg.push(data[i].inreg);
              data_columns.push(data[i].column);
            }
            var barChartData = {
              labels:data_columns,
              datasets: [
                {
                  label: "Eaten",
                  backgroundColor: "lightgreen",
                  borderColor: "green",
                  borderWidth: 1,
                  data: data_inreg
                },
                {
                  label: "Recommended",
                  backgroundColor: "lightblue",
                  borderColor: "blue",
                  borderWidth: 1,
                  data: ["<?php echo $_SESSION['calories']?>","<?php echo $_SESSION['proteins']?>","<?php echo $_SESSION['lip']?>","<?php echo $_SESSION['carbs']?>","<?php echo $_SESSION['fiber']?>","0"]
                }
              ]
            };

            var chartOptions = {
              responsive: true,
              legend: {
                position: "top"
              },
              title: {
                display: true,
                text: "Last month"
              },
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }

            var ctx = $("#barchart3");

            var LineGraph = new Chart(ctx, {
              type: 'bar',
              data: barChartData,
              options: chartOptions
            });
          },
          error : function(data) {

          }
        });
      });
      </script>
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
                <li class="active"><a href="">History</a></li>
                <li><a href="../public/advices">Advices</a></li>
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
        <h2 class="form-title">Your personal information</h2>

        <p><?php echo 'Your Basal methabolic rate is ' . $_SESSION['rbm']?></p>

        <p><?php echo 'You need to consume ' . $_SESSION['calories'] . " calories daily."?></p>
        <table id="userdata">
        <tr>
            <td>First name</td>
            <td><?php echo $_SESSION['firstname']?></td>
        </tr>
        <tr>
            <td>Weight</td>
            <td><?php echo $_SESSION['weight']?> kg</td>
        </tr>
        <tr>
            <td>Height</td>
            <td><?php echo $_SESSION['height']?> cm</td>
        </tr>
        <tr>
            <td>Age</td>
            <td><?php echo $_SESSION['age']?></td>
        </tr>
        <tr>
            <td>Your level of avtivity</td>
            <td><?php echo $_SESSION['activity']?></td>
        </tr>
        <tr>
            <td>You want to</td>
            <td><?php echo $_SESSION['purpose']?></td>
        </tr>
        </table>
        <form action="" method="post">
          <button type="submit" class="btn" name="generatexml">Generate XML</button>
        </form>
        <button id="updateonclick" type="submit" class="btn" name="update">Update</button>
        <div class="show-onclick form-group">
          <form action="" method="post">
            <input type="text" class="update-weight" name="UpdateWeight" placeholder="Update Weight">
            <button type="submit" class="btn-1" name="updateWeightBtn">Save</button>
          </form>
        </div>

        <div class="show-onclick form-group">
          <form action="" method="post">
          <select class="dropdown2" id="dropdown2" name="activity">
            <option selected hidden value="">Update Activity</option>
            <option value="sedentary">Sedentary</option>
            <option value="moderate">Moderately active</option>
            <option value="active">Active</option>
            <option value="vactive">Vigorously active</option>
            <option value="eactive">Extremely active</option>
          </select>
          <button type="submit" class="btn-1" name="updateActivityBtn">Save</button>
          </form>
        </div>

        <div class="show-onclick form-group">
          <form action="" method="post">
            <select class="dropdown2" id="dropdown3" name="purpose">
              <option selected hidden value="">Update Purpose</option>
              <option value="less">lose weight</option>
              <option value="same">same weight</option>
              <option value="more">gain weight</option>
            </select>
            <button type="submit" class="btn-1" name="updatePurposeBtn" >Save</button>
          </form>
        </div>
    </div>
    <div class="today">
      <canvas id="barchart"></canvas>
      <button type="submit" id="updateonclick2" class="btn" name="weekBtn" >Last week</button>
      <button type="submit" id="updateonclick3" class="btn" name="monthBtn" >Last month</button>
    </div>
    <div class="today2">
      <canvas class="show-onclick2 form-group" id="barchart2"></canvas>
    </div>
    <div class="today3">
      <canvas class="show-onclick3 form-group" id="barchart3"></canvas>
    </div>
    <div class="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>
  </div>
</body>
</html>
