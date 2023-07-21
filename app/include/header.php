
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
                        <a href="#">
                            <i class="fa-regular fa-user"></i>
                            Login
                        </a>
                        <ul>
                            <li><a href="<?php echo BASE_URL . 'register.php'?>">Admin panel</a></li>
                            <li><a href="#">Exit</a> </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>