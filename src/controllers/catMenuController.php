<div class="row bg-light mx-3 mb-2">
    <!-- //* User Personal Boards Saving his uploads and saves -->
    <div class="col-4">
        <div class=""><small class="text-muted mb-0">Boards</small></div>
        <!-- //TODO set this up for my boards, code is currently for followed topics, we need to change it to users own boards. Such that it joins the user_cats and the userCat_quotes to get quote Ids and Cat Names.boards -->
        <?php
        $user_id = $_SESSION['id'];

        $query = "SELECT general_cats.cat_id, general_cats.cat_name FROM general_cats INNER JOIN user_followed_general_cats ON user_followed_general_cats.cat_id=general_cats.cat_id WHERE user_followed_general_cats.user_id=$user_id LIMIT 3";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-success"> <?php echo $row['cat_name']; ?></button>
                <button type="button" onclick="followCat(this.id)" id="<?php echo "catId_" . $row['cat_id']; ?>" class="btn btn-outline-success">
                    <i class="fas fa-check text-success"></i>
                </button>
            </div>
        <?php } ?>
        <!-- //!The anchor below is pointing to the favorites collapsible div, make a new one for the Boards Section and then assign it here. -->
        <a href="#collapseFavorite" data-toggle="collapse"><span><i class="fas  fa-arrow-alt-circle-down text-primary"></i></span></a>
    </div>

    <!-- //* This is the start of the Favortie Cats -->
    <div class="col-4">
        <div class=""><small class="text-muted mb-0">Followed Topics</small></div>

        <?php
        $user_id = $_SESSION['id'];

        $query = "SELECT general_cats.cat_id, general_cats.cat_name FROM general_cats INNER JOIN user_followed_general_cats ON user_followed_general_cats.cat_id=general_cats.cat_id WHERE user_followed_general_cats.user_id=$user_id LIMIT 3";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-success"> <?php echo $row['cat_name']; ?></button>
                <button type="button" onclick="followCat(this.id)" id="<?php echo "catId_" . $row['cat_id']; ?>" class="btn btn-outline-success">
                    <i class="fas fa-check text-success"></i>
                </button>
            </div>
        <?php } ?>
        <a href="#collapseFavorite" data-toggle="collapse"><span><i class="fas  fa-arrow-alt-circle-down text-primary"></i></span></a>
    </div>
    <!-- //*This is the end of the Trending Cat Menus -->


    <!-- //*This is the start of the All trending Cats -->
    <div class="col-4">
        <div class=""><small class="text-muted mb-0">Trending</small></div>
        <?php

        $query = "SELECT * FROM `general_cats` WHERE 1 LIMIT 3";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary"> <?php echo $row['cat_name']; ?></button>
                <button type="button" onclick="followCat(this.id)" id="<?php echo "catId_" . $row['cat_id']; ?>" class="btn btn-outline-primary">
                    <i class="fas fa-plus-square text-primary"></i>
                </button>
            </div>
        <?php } ?>
        <a href="#collapseTrending" data-toggle="collapse"><span><i class="fas  fa-arrow-alt-circle-down text-primary"></i></span></a>
    </div>

</div>
<!-- This is the end of the entire Menu Row -->

<!-- Collapsible Followed Region -->

<div class="collapse" id="collapseFavorite">
    <div class="row bg-light mx-3">
        <div class="col-12">
            <div class=""><small class="text-muted mb-0">Followed</small></div>
            <?php
            $query = "SELECT general_cats.cat_id, general_cats.cat_name FROM general_cats INNER JOIN user_followed_general_cats ON user_followed_general_cats.cat_id=general_cats.cat_id WHERE user_followed_general_cats.user_id=$user_id LIMIT 20 OFFSET 3";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-success"> <?php echo $row['cat_name']; ?></button>
                    <button type="button" onclick="followCat(this.id)" id="<?php echo "catId_" . $row['cat_id']; ?>" class="btn btn-outline-success">
                        <i class="fas fa-check text-success"></i>
                    </button>
                </div>

            <?php } ?>
        </div>
    </div>
</div>


<!-- Collapsible Trending Menus -->
<div class="collapse" id="collapseTrending">
    <div class="row bg-light mx-3">
        <div class="col-12">
            <div class=""><small class="text-muted mb-0">Trending</small></div>
            <?php
            $query = "SELECT * FROM `general_cats` WHERE 1 LIMIT 20 OFFSET 3";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" onclick="followCat(this.id)" class="btn btn-outline-primary"> <?php echo $row['cat_name']; ?></button>
                    <button type="button" onclick="followCat(this.id)" id="<?php echo "catId_" . $row['cat_id']; ?>" class="btn btn-outline-primary">
                        <i class="fas fa-plus-square text-primary"></i>
                    </button>
                </div>

            <?php } ?>
        </div>
    </div>
</div>
<!-- This is the end of the Trending Cat Menus -->