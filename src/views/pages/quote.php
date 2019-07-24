<?php 
session_start();?>
<?php
    require('../../db.php');
    include('../components/head.php');
    include('../../controllers/catMenuController.php'); 
    $quoteID = $_GET['quote'];

    //* the $value has q_id's for which we will now retrieve the quote texts
    //! MARK QUOTE TEXT SECTION

    $query = "SELECT * FROM `quote_table` WHERE `q_id` = '$quoteID'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    //while(){
    // //* brining the categories for the quote_id now in the loop to populate the field.
    $queryCatName = "SELECT general_cats.cat_id, general_cats.cat_name FROM general_cats INNER JOIN quote_categories ON general_cats.cat_id = quote_categories.cat_id where quote_categories.q_id ='$quoteID'";

    $resultCats = mysqli_query($conn, $queryCatName);
    while($rowCats = mysqli_fetch_assoc($resultCats)){
        $lastCatName = $rowCats['cat_name'];
        $lastCatId = $rowCats['cat_id'];
        //$lastCatID isnt used yet.
    }

    //* check if the author of the current quote is already followed by the logged in user or not
    $user_id = $_SESSION['id'];
    $query = "SELECT * from `user_followers` where `user_id` = '$user_id'";
    $followedUsersArray = mysqli_query($conn, $query);
    // print_r($followedUsersArray);
    $classIcon="";
    while ($followedUser = mysqli_fetch_assoc($followedUsersArray)){
    if($row['user_id']==$followedUser['following_user_id']){
    // print_r("ID is followed");
        $classIcon= "fas fa-user-check text-danger";
        break;
    } else {
    // print_r("ID is not followed");
        $classIcon= "fas fa-user-plus";
    }
    }
    //! User Saved Quotes Check, checking if the quote has already been saved in the board
    $query = "SELECT user_cats.userCat_id, user_cats.name from user_cats INNER JOIN userCat_quotes ON user_cats.userCat_id=userCat_quotes.userCat_id WHERE userCat_quotes.user_id = '$user_id' AND userCat_quotes.quote_id= '$quoteID'";
    $resultOfSavedQuotes = mysqli_query($conn,$query);
    $rowCountOfSavedQuote = mysqli_num_rows($resultOfSavedQuotes);
    $rowOfSavedQuote = mysqli_fetch_assoc($resultOfSavedQuotes);

    $quoteText = $row['q_text'];
?>
<div class="row d-flex">
<div class="col-1 text-center"><a class="btn btn-outline-primary" href="secure.php"> Back</a></div>
<div class="card col-6 offset-2" id="<?php echo $row['q_id']; ?>" >
    <a href="<?php echo 'quote.php?quote=' . $row['q_id'] ?>" > <img class="card-img" src="../../../storage/uploads/<?php echo $row['image_path'];?>" alt="Card image cap" ></a>

    <div class="card-body" id="<?php echo 'card-body_' . $row['q_id']; ?> ">
<?php
    if($rowCountOfSavedQuote>=1){
    //! this quote has already been saved by the user in his boards
?>
        <div><small> SAVED TO <a href='#'> change </a></small>
        <p> <?php echo $rowOfSavedQuote['name']; ?></p>
        </div>
<?php } else { ?>
    <!-- //!if the quote was not already saved the logged in user -->
    <div class="input-group mb-3" id="<?php echo 'InputGroup_' . $row['q_id']; ?>" >
        <input type="text" class="form-control" placeholder="Category name" value ="<?php echo $lastCatName; ?>" id="<?php echo 'CatInputField_' . $row['q_id']; ?> ">
        <div class="input-group-append">
        <button class="btn btn-outline-primary" type="button" id="<?php echo 'InputBtn_' . $row['q_id']; ?>" onclick="saveToMyCat(this.id)">Save</button>
    </div> 
    </div>

<?php } ?>

        <div class="container d-flex justify-content-between mt-2">
        <button onclick="followUser(this.id)" class="rounded-circle" id = "<?php echo 'userId_'.$row['user_id']; ?>" ><i class=" <?php echo $classIcon; ?>" ></i>
        </button>

        <a class="btn"><i class="fas fa-share text-primary"></i></a>
        <a class="btn" href="<?php echo '../../../storage/uploads/' . $row['image_path']?>" download><i class="fas fa-download text-primary"></i></a>

        <button id = "<?php echo 'copyBtnId_'.$row['q_id'];?>" class="copyBtn btn btn-outline-secondary" data-clipboard-text="<?php echo $row['q_text'];?>" data-toggle="tooltip" title="Copied" onclick="showToolTip(this.id)">Copy
        </button>

        <input type="hidden" class="" value ="<?php echo $row['q_text']; ?>" id= "<?php echo 'quoteTextField_' . $row['q_id'];?> ">
        </div>
    </div>
</div>
</div>
<div class="row py-5 bg-light">
    <div class="col-6 mx-auto text-center"><h3 class="">More like this</h3></div>
</div>
<!-- //!More Like This cards below it -->


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