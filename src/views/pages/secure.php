<?php session_start();?>
<?php 
    include('../components/head.php');
	include('../components/catMenuSecure.php'); ?>


<?php
	include('../components/card_results.php');
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

</body>

</html>