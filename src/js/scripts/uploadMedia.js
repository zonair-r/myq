var fetchUploadBtn = document.getElementById("uploadBtn");
if (fetchUploadBtn) {
  fetchUploadBtn.addEventListener("click", uploadForm);
}

function uploadForm() {
  console.log("Button Clicked");
  var quoteText = document.getElementById("quoteText").value;
  var msg = document.getElementById("msg").value;
  var cats = document.getElementById("tags-input").value;

  var params =
    "quoteText=" + quoteText + "&" + "msg=" + msg + "&" + "cats=" + cats;
  console.log(params);
  //+ "&"+"cats="+cats;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../../controllers/insertQuote.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  console.log(xhr.status);
  xhr.onload = function() {
    if ((this.status = 200)) {
      console.log(this.responseText);
      if (this.responseText == "success") {
        $("#uploadResultInfo").html("Quote Uploaded Successfully");

        setTimeout(function() {
          $("#uploadMediaModal").modal("hide");
          location.reload();
        }, 2000);
      } else {
        $("#uploadResultInfo").html(this.responseText);
      }
    } else {
      document.getElementById("uploadResultInfo").innerHTML =
        "Please check your internet Connection";
    }
  };
  xhr.send(params);
}
