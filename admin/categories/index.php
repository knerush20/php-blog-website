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
            <?php include SITE_ROOT . '/app/include/manage-btn-admin.php' ?>

            <div class="row title-table">
                <h2>Manage categories</h2>
                <div class="id col-1">ID</div>
                <div class="title col-3">Title</div>
                <div class="description col-4">Description</div>
                <div class="actions col-4">Actions</div>
            </div>
            <div class="row posts-container">
                <?php foreach ( $categories as $key => $category ): ?>
                <div class="row post">
                    <div class="id col-1"><?= $key + 1; ?></div>
                    <div class="title col-3"><?= $category['name']; ?></div>
                    <div class="description col-4"><?= $category['description']; ?></div>
                    <div class="col-2"><a href="edit.php?id=<?= $category['id'] ?>" class="btn btn-primary">Edit</a></div>
                    <div class="col-2"><a href="edit.php?delete_id=<?= $category['id'] ?>"  class="btn btn-danger">Delete</a></div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

