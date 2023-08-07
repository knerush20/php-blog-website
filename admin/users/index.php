<?php
include '../../path.php' ;
include_once SITE_ROOT . '/app/controllers/users.php';

?>


<?php include SITE_ROOT . '/app/include/header.php' ?>
<!-- MENU-->
<?php include SITE_ROOT . '/app/include/menu-admin.php' ?>


<div class="container">
    <div class="row">
        <?php include SITE_ROOT . '/app/include/sidebar-admin.php' ?>

        <div class="posts col-9">
            <?php  include SITE_ROOT . '/app/include/manage-btn-admin.php' ?>

            <div class="row title-table">
                <h2>Manage users</h2>
                <div class="id col-1">ID</div>
                <div class="title col-2">Login</div>
                <div class="email col-3">Email</div>
                <div class="role col-2">Role</div>
                <div class="actions col-4">Actions</div>

            </div>
            <div class="row posts-container">
                <?php foreach ( $users as $key => $user ): ?>
                    <div class="row post">
                        <div class="id col-1"><?= $key + 1 ?></div>
                        <div class="login col-2"><?= $user['username'] ?></div>
                        <div class="email col-3"><?= $user['email'] ?></div>
                        <?php if ( $user['admin'] == 1 ): ?>
                            <div class="role col-2">Admin</div>
                        <?php else: ?>
                            <div class="role col-2">User</div>
                        <?php endif;?>
                        <div class="col-2"><a href="edit.php?id=<?= $user['id']?>" class="btn btn-primary">
                                <i class="bi bi-pencil"></i>
                            </a></div>
                        <div class="col-2"><a href="edit.php?delete_id=<?= $user['id']?>"  class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </a></div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

