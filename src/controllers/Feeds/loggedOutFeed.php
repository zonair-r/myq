<div class="card-columns px-5 my-2">
    <?php
    $query = "SELECT quote_table.q_id, quote_table.user_id,quote_table.image_path,quote_table.q_text,general_cats.cat_id,general_cats.cat_name FROM quote_table INNER JOIN quote_categories ON quote_table.q_id = quote_categories.q_id INNER JOIN general_cats ON quote_categories.cat_id = general_cats.cat_id";

    $result = mysqli_query($conn, $query);
    ?>
    <!-- //*Card Mark Up -->
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card" id="<?php echo $row['q_id']; ?>">
            <a href="<?php echo 'quote.php?quote=' . $row['q_id'] ?>">
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
    <?php } ?>
</div>