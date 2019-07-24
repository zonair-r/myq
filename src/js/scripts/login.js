var fetchLoginBtn = document.getElementById("loginBtn");
if (fetchLoginBtn) {
  fetchLoginBtn.addEventListener("click", submitForm);
}

function submitForm(event) {
  event.preventDefault();

  var email = document.getElementById("femail").value;
  var password = document.getElementById("fpassword").value;

  var params = "email=" + email + "&" + "password=" + password;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../../controllers/login.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  //callback function when the response is received
  xhr.onload = function() {
    if (this.status == 200) {
      if (this.responseText == "success") {
        document.getElementById("info").innerHTML = "Login Successful";
        setTimeout(function() {
          $("#loginModal").modal("hide");
          location.reload();
        }, 1000);
      } else {
        document.getElementById("info").innerHTML =
          "Username or Password do not match, try again";
      }
      console.log("Inside the success Function");
      //  $('#loginModal').toggleClass('show');
    } else {
      document.getElementById("info").innerHTML = "No Response from Server";
    }
  };
  xhr.send(params);
}
