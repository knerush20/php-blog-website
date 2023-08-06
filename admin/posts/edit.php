<?php

include '../../path.php' ;
include_once SITE_ROOT . '/app/controllers/posts.php';
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
            <div class="button row">
                <a href=" <?=BASE_URL . 'admin/categories/create.php'?> " class="col-2 btn btn-success">Add</a>
                <span class="col-1"></span>
                <a href="<?=BASE_URL . 'admin/categories/index.php'?>" class="col-2 btn btn-secondary">Manage</a>
            </div>
            <div class="row title-table">
                <h2>Edit post</h2>
            </div>
            <div class="row posts-container">
                <div class="row add-post">

                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <!--                       errors array include -->
                        <?php include SITE_ROOT .  '/app/helpers/errorInfo.php' ?>
                        <input name="id" value="<?= $id; ?>" type="hidden" class="form-control" >
                        <div class="mb-3">
                            <label  class="form-label">Post name</label>
                            <input name="title" value="<?= $title; ?>" type="text" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="editor" class="form-label">Post content</label>
                            <textarea name="content" class="form-control" id="editor" rows="6" ><?= $content; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Post image</label>
                            <input name="img" value="<?= $img; ?>" class="form-control" type="file" id="formFile">
                        </div>
                        <select name="category" class="form-select mb-3" >
                            <?php foreach( $categories as $key => $category ): ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name']?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-check mb-3">
                            <label class="form-check-label" for="publish">
                                Publish
                            </label>
                            <?php if ( empty($publish) && $publish == 0 ): ?>
                                <input class="form-check-input" type="checkbox" name="publish" id="publish" >
                            <?php else: ?>
                                <input class="form-check-input" type="checkbox" name="publish" id="publish" checked>
                            <?php endif; ?>
                        </div>
                        <button name="post_edit" type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- add visual text editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>

<script src="../../assets/js/script.js"></script>
</body>
</html>
