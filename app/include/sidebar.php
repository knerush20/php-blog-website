<div class="sidebar col-md-3">

    <div class="section search">
        <h3> Search</h3>
        <form action="<?= BASE_URL . 'search.php' ?>" method="post" >
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
