<?php
include 'path.php';
include 'app/controllers/categories.php';
$posts = selectAll('posts', ['category_id' => $_GET['id']]);
$category = selectOne('categories', ['id' => $_GET['id']]);
?>

<?php include 'app/include/header.php' ?>
<!-- MENU-->
<?php include 'app/include/menu.php' ?>


    <!-- MAIN -->
    <div class="container">
        <div class="content row">
            <!--    MAIN CONTENT-->
            <div class="main-content col-md-9">
                <?php if ( empty($posts) ): ?>
                    <h2>No posts in this category: <strong><?= $category['name'] ?></strong> </h2>
                <?php else: ?>
                    <h2>Posts in category: <strong><?= $category['name'] ?></strong></h2>
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
                                    <!--                     TODO!!!!!   ADD CHECK IF TITLE SIZE MORE THAN 120 THEN ADD ... ELSE NOTHING ADD-->
                                    <a href="<?= BASE_URL . 'single.php?post=' . $post['id'] ?>"><?= substr($post['title'], 0, 40) ?></a>
                                </h3>

                                <span class="mr-3"><i class="fa-regular fa-user mr-2"></i> <?= $post['username'] ?></span>

                                <span><i class="fa-solid fa-calendar-days mr-2 "></i> <?= $post['created_date'] ?></span>
                                <p class="preview-text">
                                    <?= $post['content'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>

            <!--    SIDEBAR CONTENT-->
            <div class="sidebar col-md-3">

                <div class="section search">
                    <h3> Search</h3>
                    <form action="search.php" method="post" >
                        <input type="text" name="search-term" class="text-input"  placeholder="Search">
                    </form>

                </div>

                <div class="section topics">
                    <h3>Categories</h3>
                    <ul>
                        <?php foreach ( $categories as $key => $category ): ?>
                            <li>
                                <a href="<?= BASE_URL . 'category.php?id=' . $category['id'] ?>"><?= $category['name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

        </div>
    </div>


<!--FOOTER-->
<?php include 'app/include/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>