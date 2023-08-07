<?php
include 'path.php' ;
include 'app/controllers/users.php';
?>

<?php include 'app/include/header.php' ?>
<!-- MENU-->
<?php include 'app/include/menu.php' ?>

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

