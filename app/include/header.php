
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo BASE_URL ?>">My Blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">Home</a>  </li>
                    <li><a href="<?php echo BASE_URL . 'about.php' ?>">About</a> </li>
                    <li><a href="#">Services</a> </li>

                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="#">
                                <i class="fa-regular fa-user"></i>
                                <?= $_SESSION['login']?>
                            </a>

                            <ul>
                                <?php if ($_SESSION['admin']): ?>

                                <li><a href="<?php echo BASE_URL . 'admin/admin.php'?>">Admin panel</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . 'logout.php'?>">Exit</a> </li>
                            </ul>
                        <?php else: ?>
                            <a href="<?php echo BASE_URL . 'login.php'?>">
                                <i class="fa-regular fa-user"></i>
                                Login
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL . 'register.php'?>">Registration</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>