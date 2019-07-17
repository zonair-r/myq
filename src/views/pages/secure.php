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
<script src="../../js/dropzone.js"></script>
<!-- Type Ahead JS Scripts -->
<!-- <script src="../../js/typeahead.js"></script>
<script src="../../js/bootstrap-tagsinput.js"></script> -->
<!-- Custom Login &  Upload Media Scripts -->
<script src="../../js/login.js"></script>
<script src="../../js/uploadMedia.js"></script>

<script src="../../js/vendor/typeahead/bloodhound.js"></script>
<script src="../../js/vendor/typeahead/typeahead.bundle.js"></script>
<script src="../../js/vendor/typeahead/typeahead.bundle.min.js"></script>
<script src="../../js/vendor/typeahead/typeahead.jquery.js"></script>


<script>

$(document).ready(function(){
    // Defining the local dataset
    var cars = ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'];
    
    // Constructing the suggestion engine
    var cars = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: cars
    });
    
    // Initializing the typeahead
    $('.typeahead').typeahead({
        hint: true,
        highlight: true, /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing suggestions */
    },
    {
        name: 'cars',
        source: cars
    });
});


</script>
</body>

</html>