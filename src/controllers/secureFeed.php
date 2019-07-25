<div class="card-columns px-5 my-2">
    <?php
    $lastCatName = "";
    $lastCatId = 0;
    if (isset($_SESSION['id'])) {
        //* this will run when the user is logged in and the session id has already been set.
        $user_id = $_SESSION['id'];
        //* making a query to check for the categories user has followed to show quotes of relevant cats only
        $query = "SELECT `cat_id` FROM `user_followed_general_cats` WHERE `user_id` = $user_id";
        $result = mysqli_query($conn, $query);
        $catArray = [];
        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
            array_push($catArray, $row['cat_id']);
        }
        //* Now fetch all the followed users by the current logged in user thru his session ['id']
        // echo "<br><br>";
        // print_r($catArray);
        // echo "<br><br> Quote Array Below It<br>";
        //! finding quote ids for the chosen categories
        $quoteArray = [];
        foreach ($catArray as $value) {
            //TODO the below array will return multiple q_id for every cat_id. just show unique quotes with multiple cats in it.

            $query = "SELECT `q_id` FROM `quote_categories` WHERE `cat_id` = $value";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($quoteArray, $row['q_id']);
            }
        }
    } else {
        // This will be run if the user is not logged in
        $quoteArray = [];
        $query = "SELECT * FROM `quote_table`";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($quoteArray, $row['q_id']);
        }
    }
    //* Both set the quote array the only difference is in the number of the quotes selected, one selects all. the other selects only the cat followed by the user
    //* and both use the same markup to render
    foreach ($quoteArray as $value) {
        //* the $value has q_id's for which we will now retrieve the quote texts
        //! MARK QUOTE TEXT SECTION
        $query = "SELECT * FROM `quote_table` WHERE `q_id` = $value";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $quoteID = $row['q_id'];
            // //* 1...brining the categories for the quote_id now in the loop to populate the field.
            $queryCatName = "SELECT general_cats.cat_id, general_cats.cat_name FROM general_cats INNER JOIN quote_categories ON general_cats.cat_id = quote_categories.cat_id where quote_categories.q_id =$quoteID";

            $resultCats = mysqli_query($conn, $queryCatName);
            while ($rowCats = mysqli_fetch_assoc($resultCats)) {
                $lastCatName = $rowCats['cat_name'];
                $lastCatId = $rowCats['cat_id'];
                //$lastCatID isnt used yet.
            }

            //* 2... check if the author of the current quote is already followed by the logged in user or not
            if (isset($_SESSION['id'])) {
                $user_id = $_SESSION['id'];
                $query = "Select * from `user_followers` where `user_id` = $user_id";
                $followedUsersArray = mysqli_query($conn, $query);
                // print_r($followedUsersArray);
                $classIcon = "";
                while ($followedUser = mysqli_fetch_assoc($followedUsersArray)) {
                    if ($row['user_id'] == $followedUser['following_user_id']) {
                        // print_r("ID is followed");
                        $classIcon = "fas fa-user-check text-danger";
                        break;
                    } else {
                        // print_r("ID is not followed");
                        $classIcon = "fas fa-user-plus";
                    }
                }
            } else {
                $classIcon = "fas fa-user-plus";
            }
            //! 3... User Saved Quotes Check, checking if the quote has already been saved in the board
            if (isset($_SESSION['id'])) {
                $query = "SELECT user_cats.userCat_id, user_cats.name from user_cats INNER JOIN userCat_quotes ON user_cats.userCat_id=userCat_quotes.userCat_id WHERE userCat_quotes.user_id = '$user_id' AND userCat_quotes.quote_id= '$quoteID'";
                $resultOfSavedQuotes = mysqli_query($conn, $query);
                $rowCountOfSavedQuote = mysqli_num_rows($resultOfSavedQuotes);
                $rowOfSavedQuote = mysqli_fetch_assoc($resultOfSavedQuotes);
            } else {
                $rowCountOfSavedQuote = 0;
            }

            $quoteText = $row['q_text'];
            ?>
            <div class="card" id="<?php echo $row['q_id']; ?>">
                <a href="<?php echo "quote.php?quote=" . $row['q_id'] ?>"> <img class="card-img" src="../../../storage/uploads/<?php echo $row['image_path']; ?>" alt="Card image cap"></a>

                <div class="card-body" id="<?php echo "card-body_" . $row['q_id']; ?>">
                    <?php
                    if ($rowCountOfSavedQuote >= 1) {
                        //! this quote has already been saved by the user in his boards
                        ?>
                        <div><small> SAVED TO <a href='#'> change </a></small>
                            <p> <?php echo $rowOfSavedQuote['name']; ?></p>
                        </div>
                    <?php } else { ?>
                        <!-- //!if the quote was not already saved the logged in user -->
                        <div class="input-group mb-3" id="<?php echo "InputGroup_" . $row['q_id']; ?>">
                            <input type="text" class="form-control" placeholder="Category name" value="<?php echo $lastCatName; ?>" id="<?php echo "CatInputField_" . $row['q_id']; ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="<?php echo 'InputBtn_' . $row['q_id']; ?>" onclick="saveToMyCat(this.id)">Save
                                </button>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="container d-flex justify-content-between mt-2">
                        <button onclick="followUser(this.id)" class="rounded-circle" id="<?php echo "userId_" . $row['user_id']; ?>"><i class=" <?php echo $classIcon; ?>"></i></button>
                        <a class="btn"><i class="fas fa-share text-primary"></i></a>
                        <a class="btn" href="../../../storage/uploads/<?php echo $row['image_path']; ?>" download><i class="fas fa-download text-primary"></i></a>
                        <button id="<?php echo "copyBtnId_" . $row['q_id']; ?>" class="copyBtn btn btn-outline-secondary" data-clipboard-text="<?php echo $row['q_text']; ?>" data-toggle="tooltip" title="Copied" onclick="showToolTip(this.id)">Copy
                        </button>

                        <input type="hidden" class="" value="<?php echo $row['q_text']; ?>" id="<?php echo 'quoteTextField_' . $row['q_id']; ?>">
                    </div>


                </div>
            </div>
        <?php
        }
    }
    ?>
</div>