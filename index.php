<?php
    include 'path.php';
    include 'app/controllers/categories.php';

    $page  = $_GET['page'] ?? 1;
    $limit = 2;
    $offset = $limit * ($page - 1);
    $totalPages= round(countRow('posts') / $limit, 0);

    if ( $_GET['page'] > $totalPages || $_GET['page'] <= 0 ) {
        $page = 1;
    }

    $posts = selectAllPublishPostsWithUsers('posts', 'users', $limit, $offset );
    $topPosts = selectAll('posts', ['status' => 1, 'category_id' => 14] );
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

<!--Carousel -->
<div class=" container ">
    <div class="row">
        <h2 class="slider-title"> Top posts </h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner " style="">
            <?php foreach ( $topPosts as $key => $post ): ?>
                <?php if ( $key == 0 ): ?>
                    <div class="carousel-item active ">
                <?php else: ?>
                        <div class="carousel-item  ">
                <?php endif; ?>
                <img src="
                    <?php
                        if ( file_exists(BASE_URL . '/assets/images/posts/' . $post['img']) ) {
                            echo BASE_URL . '/assets/images/posts/' . $post['img'];
                        } else {
                            echo BASE_URL . '/assets/images/img2.png';
                        }

                    ?>" class="cover d-block w-100 " alt=" <?=$post['title'] ?>">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5>
                        <a href="<?= BASE_URL . 'single.php?post=' . $post['id']?>">
                            <?= mb_substr($post['title'], 0, 30, 'UTF-8').'...' ?>
                        </a>
                    </h5>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!--Carousel-->


<!-- MAIN -->
<div class="container">
    <div class="content row">
        <!--    MAIN CONTENT-->
        <div class="main-content col-md-9">
            <h2>Latest posts </h2>
            <?php foreach ( $posts as $key => $post ): ?>
            <div class="post row ">
                <div class="img col-12 col-md-4">
                    <img src="
                    <?php
                    if ( file_exists(BASE_URL . '/assets/images/posts/' . $post['img']) ) {
                        echo BASE_URL . '/assets/images/posts/' . $post['img'];
                    } else {
                        echo BASE_URL . '/assets/images/img2.png';
                    }

                    ?>" alt="<?= $post['title'] ?>" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?= BASE_URL . 'single.php?post=' . $post['id']?>">
                            <?php echo substr($post['title'], 0, 40)?>
                        </a>
                    </h3>

                    <span class="mr-3"><i class="fa-regular fa-user mr-2"></i> <?= $post['username'] ?></span>

                    <span><i class="fa-solid fa-calendar-days mr-2 "></i> <?= $post['created_date'] ?></span>
                    <p class="preview-text">
                        <?= $post['content'] ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>

            <!-----PAGINATION------------>
            <?php include  'app/include/pagination.php'?>
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