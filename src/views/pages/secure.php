<?php session_start();?>
<?php 
    include('../components/head.php');
	include('../../controllers/catMenuController.php'); 
    
	include('../../controllers/feed.php');
    include('../components/upload_media_modal.php'); 
    include('../components/login_modal.php');
    include('../components/notifications_modal.php');
?>
<!--  Secure page is the homepage for logged in users -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="../../js/vendor/ClipboardJS/clipboard.min.js"></script>
<script src="../../js/vendor/typeahead/bootstrap-tagsinput.js"></script>
<script src="../../js/vendor/typeahead/bloodhound.js"></script>
<script src="../../js/vendor/typeahead/typeahead.bundle.js"></script>
<script src="../../js/vendor/dropzone/dropzone.js"></script>

<script src="../../js/scripts/tags.js"></script>
<script src="../../js/scripts/login.js"></script>
<script src="../../js/scripts/uploadMedia.js"></script>


<!-- Script with preloaded categories to suggest tags -->
<!-- //*To toggle other users following by the logged in user -->

<script>

    function followUser(id){
        var xhr = new XMLHttpRequest();
        console.log(id);
        var user_id = id.substr(7)
        console.log(user_id);
        var params= "following_user_id=" + user_id;
        console.log(params);
        xhr.open('POST', '../../controllers/followingUser.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        //callback function when the response is received  
        xhr.onload = function(){
        if(this.status==200){
            console.log(this.status);
        if(this.responseText == "unfollowed"){
        // alert(this.responseText);
            $("button[id$="+id+"]>i").removeClass("fa-user-check text-danger").addClass("fa-user-plus");
        } else if (this.responseText="followed"){

            //alert(this.responseText);
            $("button[id$="+id+"]>i").removeClass("fa-user-plus").addClass("fa-user-check text-danger");
        }
        
        } else {
        alert("ajax request status not 200");
        }
        }

    xhr.send(params);

    }
</script>

 <!--//* To Toggle following General Topics or Categories by the logged in USer -->
<script>

    function followCat(id){
        var xhr = new XMLHttpRequest();
        console.log(id);
        var cat_id = id.substr(6)
        console.log(cat_id);
        var params= "cat_id=" + cat_id;
        console.log(params);
        xhr.open('POST', '../../controllers/followGeneralCategories.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        //callback function when the response is received  
        xhr.onload = function(){
        if(this.status==200){
            console.log(this.status);
        if(this.responseText == "unfollowed"){
         alert(this.responseText);
            $("button[id$="+id+"]>i").removeClass("fa-check text-success").addClass("fa-plus-square text-primary");
        } else if (this.responseText="followed"){
            alert(this.responseText);
            $("button[id$="+id+"]>i").removeClass("fa-plus-square text-primary").addClass("fa-check text-success");
        }
        } else {
        alert("ajax request status not 200");
        }
        }
    xhr.send(params);
    }
</script>
<!-- //* To save quote to the user board -->
<script>
    function saveToMyCat(completeId){
    var xhr = new XMLHttpRequest();
    console.log(completeId);
    var id = completeId.substr(9);
    console.log(id);
    var InputGroupSelector = "InputGroup_" + id;
    var CardBodySelector = "card-body_" +id;

    var selector = "CatInputField_" + id;
    
    var catName = document.getElementById(selector).value;
    console.log(catName);
    var params= "catName=" + catName + "&" +"quote_id=" + id;
        console.log(params);
        xhr.open('POST', '../../controllers/saveToMyCat.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        //callback function when the response is received  
        xhr.onload = function(){
        if(this.status==200){
            console.log(this.status);
            console.log(this.responseText);
            if(this.responseText == "saved"){
            //alert(this.responseText);
                var output ="";
                //Output html string
                output += "<div> <small> SAVED TO  <a href='#'> change</a></small> <p>" +catName+ "</p> </div> ";
                $("div[id$=" + InputGroupSelector +"]").remove();
                $("div[id$=" + CardBodySelector +"]").prepend(output);
            } 
            } else {
            alert("ajax request status not 200");
            }
        }
    xhr.send(params);
    }
</script>
<!-- Script to copy to clipbord & change the Copy Button-->
<script>
    var clipboard = new ClipboardJS('.copyBtn');
    clipboard.on('success', function(e) {
        console.log(e);
       // alert("copied");
        //  $('.copyBtn').tooltip('show');
        //  setTimeout(function(){$('.copyBtn').tooltip('hide');}, 1000);
    });
    clipboard.on('error', function(e) {
        console.log(e);
    });
    function showToolTip(id){
        $("button[id$="+id+"]").html("Copied!");
        setTimeout(function(){
            $("button[id$="+id+"]").html("Copy");
        },3000);
    }
</script>

<!-- Next Script here -->
<script>




</script>


</body>

</html>