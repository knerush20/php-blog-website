<?php
include 'path.php' ;
include 'app/controllers/categories.php';

$post = selectPostByIdWithAuthor( 'posts', 'users', $_GET['post'] );
?>

<?php include 'app/include/header.php' ?>
<!--MENU-->
<?php include 'app/include/menu.php' ?>


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