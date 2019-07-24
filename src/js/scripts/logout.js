var fetchLoginBtn = document.getElementById("logoutBtn");
if (fetchLoginBtn) {
  fetchLoginBtn.addEventListener("click", logout);
}
function logout() {
  console.log("clicked");
  var xhr = new XMLHttpRequest();

  var params = "logout=" + logout;

  xhr.open("POST", "../../controllers/logout.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  //callback function when the response is received
  console.log(this.status);
  xhr.onload = function() {
    if (this.status == 200) {
      if (this.responseText == "success") {
        document.getElementById("info").innerHTML = "Logged out successfully";
        setTimeout(function() {
          $("#loginModal").modal("hide");
          window.location.href = "index.php";
        }, 2000);
      } else {
        document.getElementById("info").innerHTML = "script issue";
      }
      //console.log("Inside the success Function");
      //  $('#loginModal').toggleClass('show');
    } else {
      document.getElementById("info").innerHTML = "No Response from Server";
    }
  };
  xhr.send(params);
}
