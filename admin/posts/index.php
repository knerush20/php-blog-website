<?php
include '../../path.php' ;
include_once SITE_ROOT . '/app/controllers/posts.php';

?>

<?php include SITE_ROOT .'/app/include/header.php'  ?>
<!-- MENU-->
<?php include SITE_ROOT .'/app/include/menu-admin.php'  ?>


<div class="container">
    <div class="row">
        <?php include SITE_ROOT . '/app/include/sidebar-admin.php' ?>

        <div class="posts col-9">
            <?php  include SITE_ROOT . '/app/include/manage-btn-admin.php' ?>

            <div class="row title-table">
                <h2>Manage posts</h2>
                <div class="id col-1">ID</div>
                <div class="title col-5">Title</div>
                <div class="author col-2">Author</div>
                <div class="actions col-4">Actions</div>

            </div>
            <div class="row posts-container">
                <?php foreach ( $postsUserName as $key => $post ): ?>
                <div class="row post">
                    <div class="id col-1"><?= $key+1; ?></div>
                    <div class="title col-5"><?= mb_substr( $post['title'], 0, 20, 'UTF-8' ).'...'; ?></div>
                    <div class="author col-2"><?= $post['username']; ?></div>
                    <div class="col-1"><a href="edit.php?id=<?= $post['id'] ?>" class="btn btn-primary">
                            <i class="bi bi-pencil"></i>
                        </a></div>
                    <div class="col-1"><a href="edit.php?delete_id=<?= $post['id'] ?>"  class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </a></div>
                    <?php if ( $post['status'] ): ?>
                        <div class="col-2"><a href="edit.php?publish=0&publish_id=<?= $post['id'] ?>" class="">
<!--                                <i class="bi bi-x-circle"></i>-->
                                Unpublish</a></div>
                    <?php else: ?>
                        <div class="col-2"><a href="edit.php?publish=1&publish_id=<?= $post['id'] ?>"  class="">
<!--                                <i class="bi bi-send"></i>-->
                                Publish</a></div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

