document.getElementById('loginBtn').addEventListener('click', submitForm);
  function submitForm(event){
      event.preventDefault();

  var email = document.getElementById('femail').value;
  var password = document.getElementById('fpassword').value;

  var params = "email=" + email + "&" + "password=" + password;

      var xhr = new XMLHttpRequest();
      xhr.open('POST', '../../controllers/login.php', true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  //callback function when the response is received  
      xhr.onload = function(){
      if(this.status==200){
          var output = "";
          output = this.responseText;
          document.getElementById('info').innerHTML = output;
      } else {
          document.getElementById('info').innerHTML = "No Response from Server";
      }
      }
      xhr.send(params);
  }
