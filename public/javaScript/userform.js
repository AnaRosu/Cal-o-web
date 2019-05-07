$( document ).ready(function() {
  var currentTime = new Date();
  var minday = 1, maxday = 31,
  select_day = document.getElementById('select_day');

  var minmonth = 1, maxmonth = 12,
  select_month = document.getElementById('select_month');

  var minyear = 1900, maxyear = 2019,
  select_year = document.getElementById('select_year');

  for (var i = minday; i<=maxday; i++){
      var opt = document.createElement('option');
      opt.value = i;
      opt.innerHTML = i;
      select_day.appendChild(opt);
  }
  select_day.value = String(currentTime.getDate()).padStart(2, '0');

  for (var i = minmonth; i<=maxmonth; i++){
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select_month.appendChild(opt);
  }
  select_month.value = String(currentTime.getMonth() + 1);

  for (var i = minyear; i<=maxyear; i++){
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select_year.appendChild(opt);
  }
  select_year.value = currentTime.getFullYear();

});
