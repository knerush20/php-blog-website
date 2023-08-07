<?php

include 'path.php';
include 'app/controllers/categories.php';

?>

<?php include 'app/include/header.php' ?>
<!-- MENU-->
<?php include 'app/include/menu.php' ?>


<!--MAIN-->
<div class="container">
    <div class="content row">
        <!--    MAIN CONTENT-->
        <div class="main-content col-md-9">
            <h2> How we work </h2>
            <div class="about_text">
                <p>Oh feel if up to till like. He an thing rapid these after going drawn or. Timed she his law the spoil round defer. In surprise concerns informed betrayed he learning is ye. Ignorant formerly so ye blessing.</p>
                <p class="text-md">He as spoke avoid given downs money on we. Of properly carriage shutters ye as wandered up repeated moreover.</p>
            </div>


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