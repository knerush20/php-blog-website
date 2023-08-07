<?php
include '../../path.php' ;
include SITE_ROOT . '/app/controllers/categories.php';
?>


<?php include SITE_ROOT . '/app/include/header.php' ?>
<!-- MENU-->
<?php include SITE_ROOT . '/app/include/menu-admin.php' ?>


<div class="container">
    <div class="row">
        <?php include SITE_ROOT . '/app/include/sidebar-admin.php' ?>


        <div class="posts col-9">
            <?php  include SITE_ROOT . '/app/include/manage-btn-admin.php' ?>

            <div class="row title-table">
                <h2>Edit category</h2>
            </div>
            <div class="row posts-container">
                <div class="row add-post">

                    <form action="edit.php" method="post">
                        <!--                       errors array include -->
                        <?php include SITE_ROOT .  '/app/helpers/errorInfo.php' ?>
                        <input name="id" value="<?= $id ?>" type="hidden" class="form-control" placeholder="Enter category name" >
                        <div class="mb-3">
                            <label  class="form-label">Category name</label>
                            <input name="name" value="<?= $name ?>" type="text" class="form-control" placeholder="Enter category name" >
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Category description</label>
                            <textarea name="description" class="form-control" id="content" rows="6" placeholder="Enter category description" >
                                <?= $description ?>
                            </textarea>
                        </div>
                        <button name="category_edit" type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>



