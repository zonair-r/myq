<div class="card-columns px-5 my-2">
<?php
if (isset ($_SESSION['id'])){
    //* this will run when the user is logged in and the session id has already been set.
    $user_id = $_SESSION['id'];
    $query = "SELECT `cat_id` FROM `user_cats` WHERE `user_id` = $user_id";
    $result = mysqli_query($conn, $query);
    $catArray = [];
    while ($row = mysqli_fetch_assoc($result)){
    // print_r($row);
        array_push($catArray, $row['cat_id']);
    }
    // echo "<br><br>";
    // print_r($catArray);
    // echo "<br><br> Quote Array Below It<br>";
//! finding quote ids for the chosen categories
    $quoteArray = [];
    foreach ($catArray as $value){
        $query = "SELECT `q_id` FROM `quote-categories` WHERE `cat_id` = $value";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            array_push($quoteArray, $row['q_id']);
        }
    }
} else {

    // This will be run if the user is not logged in
    $quoteArray = [];
    $query = "SELECT * FROM `quote_table`";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        array_push($quoteArray, $row['q_id']);
    }
}
//* Both set the quote array the only difference is in the number of the quotes selected, one selects all. the other selects only the cat followed by the user
//* and both use the same markup to render
foreach($quoteArray as $value){
    $query = "SELECT * FROM `quote_table` WHERE `q_id` = $value";

	$result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){?>
   
     <div class="card" id="<?php echo $row['q_id']; ?>">
            <img class="card-img" src="../../../storage/uploads/<?php echo $row['image_path'];?>" alt="Card image cap">
            <div class="card-img-overlay">
                 <h5 class="card-title"></h5>
                <button onclick="followUser(this.id)" class="rounded-circle" id = "<?php echo "userId_".$row['user_id']; ?>"><i class="fas fa-user-plus text-primary"></i></button>
    
            </div>
            <div class="card-body">
            <div class="container d-flex justify-content-between">
                <label class="border-bottom mr-3 w-100" for="">Good Morning</label>
                <div class="">
                <a class=""><i class="fas fa-plus-circle text-primary"></i></a>
                </div>
                
            </div>
            <div class="container d-flex justify-content-between mt-2">
            <div class=""><a><i class="fas fa-share text-primary"></i></a></div>
                <div class=""><a><i class="fas fa-download text-primary"></i></a></div>
                <div class=""><a><i class="fas fa-copy text-primary"></i></a></div>
            </div>
            </div>
        </div>
    <?php
    }
}
?>
</div>