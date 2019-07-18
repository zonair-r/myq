<?php session_start();?>
<?php 
    include('../components/head.php');
	include('../components/catMenuSecure.php'); 
    
	include('../../controllers/feed.php');
    include('../components/upload_media_modal.php'); 
    include('../components/login_modal.php');
    include('../components/notifications_modal.php');
?>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="../../js/vendor/typeahead/bootstrap-tagsinput.js"></script>
<script src="../../js/vendor/typeahead/bloodhound.js"></script>
<script src="../../js/vendor/typeahead/typeahead.bundle.js"></script>
<script src="../../js/vendor/dropzone/dropzone.js"></script>

<script src="../../js/scripts/tags.js"></script>
<script src="../../js/scripts/login.js"></script>
<script src="../../js/scripts/uploadMedia.js"></script>

<!-- Script with preloaded categories to suggest tags -->

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
       if(this.responseText == "success"){
        $("button[id$="+id+"]>i").removeClass("fa-user-plus").addClass("fa-user-check text-danger");
       } else {

        alert(this.responseText);
        $("button[id$="+id+"]>i").removeClass("fa-user-plus").addClass("fa-user-alt-slash text-warning");
       }
       
    } else {
       alert("ajax request status not 200");
    }
    }

 xhr.send(params);

}
</script>

</body>

</html>