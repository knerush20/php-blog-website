
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?= BASE_URL ?>">My Blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li>
                        <a href="<?= BASE_URL . 'admin/posts/index.php' ?>">
                            <i class="fa-regular fa-user"></i>
                            <?= $_SESSION['login'] ?>
                        </a>
                    </li>
                    <li><a href="<?= BASE_URL . 'logout.php' ?>">Exit</a> </li>

                </ul>
            </nav>
        </div>
    </div>
</header>