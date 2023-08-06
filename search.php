<?php
include 'path.php';
include SITE_ROOT .  '/app/database/db.php';
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term']) ) {
    $posts = searchInTitleAndContent( $_POST['search-term'], 'posts', 'users' );
}


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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>My blog</title>
</head>
<body>
<!-- MENU-->
<?php include 'app/include/header.php' ?>


    <!-- MAIN -->
    <div class="container">
        <div class="content row">
            <!--    MAIN CONTENT-->
            <div class="main-content col-12">
                <div class="section search mt-3 mb-4">
                    <form action="search.php" method="post" class="input-group ">
                        <input type="text" name="search-term" class="form-control"  placeholder="Search" value="<?= $_POST['search-term']?>">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </form>
                </div>
                <?php if ( empty($posts) ): ?>
                    <h3 class="text-center">Opps. Nothing found.</h3>
                <?php else: ?>
                    <h2>Search results</h2>
                    <?php  foreach ( $posts as $key => $post ): ?>
                    <div class="post row ">
                        <div class="img col-12 col-md-4">
                            <img src="<?= BASE_URL . '/assets/images/posts/' . $post['img']?>" alt="<?= $post['title'] ?>" class="img-thumbnail">
                        </div>
                        <div class="post_text col-12 col-md-8">
                            <h3>
                                <a href="<?= BASE_URL . 'single.php?post=' . $post['id']?>">
                                    <?= substr($post['title'], 0, 40) . '...' ?>
                                </a>
                            </h3>
                            <i class="fa-regular fa-user"></i> <?= $post['username'] ?>
                            <i class="fa-solid fa-calendar-days"></i> <?= $post['created_date'] ?>
                            <p class="preview-text">
                                <?= mb_substr($post['content'], 0, 150, 'UTF-8').'...' ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!--FOOTER-->
    <?php include 'app/include/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>