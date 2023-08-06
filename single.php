<?php
include 'path.php' ;
include 'app/controllers/categories.php';

$post = selectPostByIdWithAuthor( 'posts', 'users', $_GET['post'] );
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
<!--MENU-->
<?php include 'app/include/header.php' ?>


<!-- MAIN -->

<div class="container">
    <div class="content row">

        <div class="main-content col-md-9">
            <h2><?= $post['title'] ?></h2>

            <div class="single_post row ">
                <div class="img col-12">
                    <img src="<?php
                    if ( file_exists(BASE_URL . '/assets/images/posts/' . $post['img']) ) {
                        echo BASE_URL . '/assets/images/posts/' . $post['img'];
                    } else {
                        echo BASE_URL . '/assets/images/img2.png';
                    }

                    ?>"  alt="<?= $post['title'] ?>" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="fa-regular fa-user mr-3"></i>
                    <span><?= $post['username'] ?></span>
                   <i class="fa-solid fa-calendar-days ml-3 "></i>
                    <span><?= $post['created_date'] ?></span>
                </div>
                <div class="single_post_text col-12">
                    <?= $post['content'] ?>
                </div>
            </div>

        </div>
        <!--    SIDEBAR CONTENT-->
        <?php include 'app/include/sidebar.php' ?>

    </div>
</div>



<!--FOOTER-->
<?php include 'app/include/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>