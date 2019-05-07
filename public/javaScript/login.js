window.onload = function(){
    var signUpTab = document.getElementById("register-btn");
    signUpTab.onclick = function(){
      document.getElementById("register-form").style.display="block";
      document.getElementById("log-in-form").style.display="none";
      document.getElementById("register-btn").setAttribute("class", "btn btn-selector active");
      document.getElementById('log-in-btn').setAttribute("class", "btn btn-selector", "btn-group");
    }
    var signInTab = document.getElementById("log-in-btn");
    signInTab.onclick = function(){
      document.getElementById("register-form").style.display="none";
      document.getElementById("log-in-form").style.display="block";
     document.getElementById("log-in-btn").setAttribute("class", "btn btn-selector active");
    document.getElementById('register-btn').setAttribute("class", "btn btn-selector", "btn-group");
    }
  }
