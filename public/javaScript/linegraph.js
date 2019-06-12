<script>
$(document).ready(function(){
  $.ajax({
    url : "http://localhost/another-tw/Cal-o-web/public/weightdata.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var data_inreg = [];
      var weight_inreg = [];

      for(var i in data) {
        data_inreg.push(data[i].date);
        weight_inreg.push(data[i].weight);
      }

      var chartdata = {
        labels: data_inreg,
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

</script>