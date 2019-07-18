document.getElementById('uploadBtn').addEventListener('click', uploadForm);

function uploadForm(){
console.log("Button Clicked");
var quoteText = document.getElementById('quoteText').value;
var msg = document.getElementById('msg').value;
var cats = document.getElementById('tags-input').value;

var params = "quoteText="+quoteText+"&"+"msg="+msg; 
console.log(params);
//+ "&"+"cats="+cats;

var xhr = new XMLHttpRequest();
xhr.open("POST", "../../controllers/insert.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
console.log(xhr.status);
        xhr.onload = function(){
            if (this.status = 200){
            document.getElementById('insertResult').innerHTML = this.responseText;
        } else {
            document.getElementById('insertResult').innerHTML = "Please check your internet Connection";
        }
        }
xhr.send(params);
}
