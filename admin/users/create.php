<?php
include '../../path.php' ;
include_once SITE_ROOT . '/app/controllers/users.php';

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
    <!--    <link rel="stylesheet" href="../../assets/css/style.css">-->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>My blog</title>
</head>
<body>
<!-- MENU-->
<?php include SITE_ROOT .'/app/include/header-admin.php' ?>


<div class="container">
    <div class="row">
        <?php include SITE_ROOT . '/app/include/sidebar-admin.php' ?>


        <div class="posts col-9">
            <div class="button row">
                <a href=" <?= BASE_URL . 'admin/users/create.php'?>" class="col-2 btn btn-success">Add</a>
                <span class="col-1"></span>
                <a href="<?= BASE_URL . 'admin/users/index.php'?>" class="col-3 btn btn-secondary">Manage</a>
            </div>

            <div class="row title-table">
                <h2>Add user</h2>
            </div>
            <div class="row posts-container">
                <div class="row add-post">

                    <form action="create.php" method="post">
                        <!--                       errors array include -->
                        <?php include SITE_ROOT .  '/app/helpers/errorInfo.php' ?>
                        <div class="mb-3 col">
                            <label for="login" class="form-label">Login</label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Enter login" value = "<?= $login ?>">
                        </div>
                        <div class="A-100"></div>
                        <div class="mb-3 col">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" value = "<?= $email ?>">
                        </div>
                        <div class="A-100"></div>
                        <div class="mb-3 col">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="A-100"></div>
                        <div class="mb-3 col">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control"  id="confirm_password" name="confirm_password">
                        </div>
                        <label for="role" class="form-label">User role</label>
                        <div class="form-check mb-3">
                            <label class="form-check-label m-1" for="admin">
                                Admin
                            </label>
                            <input class="form-check-input" type="checkbox" value="1" name="admin" id="admin" >
                        </div>

                        <button name="user_create" type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


