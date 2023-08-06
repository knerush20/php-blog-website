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
    <link rel="stylesheet" href="../../assets/css/style.css">
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
            <div class="button row">
                <a href=" <?= BASE_URL . 'admin/categories/create.php'?>" class="col-2 btn btn-success">Add</a>
                <span class="col-1"></span>
                <a href=" <?= BASE_URL . 'admin/categories/index.php'?>" class="col-3 btn btn-secondary">Manage</a>
            </div>

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



