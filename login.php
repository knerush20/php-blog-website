<?php
include 'path.php' ;
include 'app/controllers/users.php';
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
    <title>My blog - Login </title>
</head>
<body>
<!-- MENU-->
<?php include 'app/include/header.php' ?>

<div class="container register_form">
    <h2 class="">Login</h2>
    <div class="text-center">
        <?php include 'app/helpers/errorInfo.php' ?>
    </div>
    <form class="row justify-content-center " action="login.php" method="post">
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleFormControlInput1" class="form-label">Login</label>
            <input type="email" class="form-control" name="email"  placeholder="Enter your email" value = "<?= $email ?>">
        </div>
        <div class="A-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="A-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <a href="register.php">Register</a>
            <button type="submit" class="btn btn-secondary" name="login_btn">Login</button>
        </div>
    </form>
</div>


<!--FOOTER-->
<?php include 'app/include/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

