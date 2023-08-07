<?php
include '../../path.php' ;
include SITE_ROOT . '/app/controllers/categories.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  Bootstrap      -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!--    Fontawesome-->
    <script src="https://kit.fontawesome.com/4811f92f9b.js" crossorigin="anonymous"></script>

    <!--    Custom Styling-->
    <!--    <link rel="stylesheet" href="../../assets/css/style.css">-->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>My blog</title>
</head>
<body>
<!-- MENU-->
<?php include SITE_ROOT . '/app/include/header-admin.php' ?>


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

