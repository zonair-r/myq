<?php
session_start(); ?>
<?php
require('../../db.php');
include('../components/head.php');
include('../components/catMenuUnsecure.php');
$quoteID = $_GET['quote'];

//* This query will extract the quote content and the last or first category for it
$query = "SELECT quote_table.q_id, quote_table.user_id,quote_table.image_path,quote_table.q_text,general_cats.cat_id,general_cats.cat_name FROM quote_table INNER JOIN quote_categories ON quote_table.q_id = quote_categories.q_id INNER JOIN general_cats ON quote_categories.cat_id = general_cats.cat_id WHERE quote_table.q_id = $quoteID ";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<div class="row d-flex">
    <div class="col-1 text-center">
        <button onclick="goBack()" class="btn btn-outline-primary">Back</button>
    </div>
    <div class="card col-6 offset-2" id="<?php echo $row['q_id']; ?>">
        <a href="#">
            <img class="card-img" src="<?php echo '../../../storage/uploads/' . $row['image_path'] ?>" alt="<?php echo $row['q_text'] ?>">
        </a>
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary" type="button" id="" onclick="">Save to
                    </button>
                </div>
                <input type="text" class="form-control" placeholder="Category name" value="<?php echo $row['cat_name'] ?>" id="<?php echo "CatInputField_" . $row['q_id']; ?>">
            </div>
            <div class="container d-flex justify-content-between mt-2">
                <button onclick="" class="rounded-circle" id=">"><i class="fas fa-user-plus"></i></button>
                <a class="btn"><i class="fas fa-share text-primary"></i></a>
                <a class="btn" href="../../../storage/uploads/<?php echo $row['image_path']; ?>" download>
                    <i class="fas fa-download text-primary"></i></a>

                <button id="<?php echo "copyBtnId_" . $row['q_id']; ?>" class="copyBtn btn btn-outline-secondary" data-clipboard-text="<?php echo $row['q_text']; ?>" data-toggle="tooltip" title="Copied" onclick="showToolTip(this.id)">Copy
                </button>
            </div>
        </div>
    </div>

</div>



<div class="row py-5 bg-light">
    <div class="col-6 mx-auto text-center">
        <h3 class="">More like this</h3>
    </div>
</div>

<?php
//include('../../controllers/Feeds/moreLikeThisLoggedOut.php'); 

$queryCats = "SELECT * from quote_categories where q_id = $quoteID";

$resultCats = mysqli_query($conn, $queryCats);
?> <div class="card-columns px-5 my-2">
    <!-- //*Extract Quote (thru Quote IDS) for the all cats extracted from the above query -->
    <?php while ($rowCats = mysqli_fetch_assoc($resultCats)) {
        //print_r($rowCats['cat_id'] . "<br>");
        $catID = $rowCats['cat_id'];

        $queryQuote = "SELECT quote_table.q_id, quote_table.user_id, quote_table.image_path,quote_table.q_text FROM quote_table INNER JOIN quote_categories WHERE quote_categories.cat_id = $catID";
        $resultQuote = mysqli_query($conn, $queryQuote);

        ?>


        <?php while ($row = mysqli_fetch_assoc($resultQuote)) {

            ?>

            <div class="card" id="<?php echo $row['q_id']; ?>">
                <a href="<?php echo 'quoteLoggedOut.php?quote=' . $row['q_id'] ?>">
                    <img class="card-img" src="<?php echo '../../../storage/uploads/' . $row['image_path'] ?>" alt="<?php echo $row['q_text'] ?>">
                </a>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary" type="button" id="" onclick="">Save to
                            </button>
                        </div>
                        <input type="text" class="form-control" placeholder="Board name" id="<?php echo "CatInputField_" . $row['q_id']; ?>">
                    </div>
                    <div class="container d-flex justify-content-between mt-2">
                        <button onclick="" class="rounded-circle" id=">"><i class="fas fa-user-plus"></i></button>
                        <a class="btn"><i class="fas fa-share text-primary"></i></a>
                        <a class="btn" href="../../../storage/uploads/<?php echo $row['image_path']; ?>" download>
                            <i class="fas fa-download text-primary"></i></a>

                        <button id="<?php echo "copyBtnId_" . $row['q_id']; ?>" class="copyBtn btn btn-outline-secondary" data-clipboard-text="<?php echo $row['q_text']; ?>" data-toggle="tooltip" title="Copied" onclick="showToolTip(this.id)">Copy
                        </button>
                    </div>
                </div>
            </div>
        <?php }
    }
    ?>
</div>


<script>
    function goBack() {
        window.history.back();
    }
</script>