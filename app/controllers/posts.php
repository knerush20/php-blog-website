<?php

include SITE_ROOT . '/app/database/db.php';
if ( !$_SESSION ) {
    header('location:' . BASE_URL . 'login.php');
}

$errMsg = [];

$id = '';
$title = '';
$content = '';
$img = '';
$category = '';

$categories = selectAll('categories');
$posts = selectAll('posts');
$postsUserName = selectAllFromPostWithUsers('posts', 'users');

function imageUpload()
{
    if ( !empty($_FILES['img']['name']) ) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "/assets/images/posts/" . $imgName;

        if ( !str_contains($fileType, 'image') ) {
            $errMsg[] = 'Only images can be uploaded';
            return false;
        } else {
            $result = move_uploaded_file($fileTmpName, $destination);

            if ( $result ) {
                $_POST['img'] = $imgName;
            } else {
                $errMsg[] = 'Server uploading error.';

                return false;
            }
        }

    } else {
        $errMsg[] = 'Error while get image';
        return false;
    }

}

//create post
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_create']) ) {

    $errMsg[] = imageUpload();

    $title = trim($_POST['title']);
    $content= trim($_POST['content']);
    $category = trim($_POST['category']);

    $publish = trim($_POST['publish']) !== null ? 1 : 0;

    if ( $title === '' || $content === '' || $category === '' ) {
        $errMsg[] = 'Not all required fields are filled.';
    } elseif ( mb_strlen($title, 'UTF-8') < 7 ) {
        $errMsg[] = 'Post name length should be more then 7 symbols';
    } else {
            $post = [
                'user_id' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'img' => $_POST['img'],
                'status' => $publish,
                'category_id' => $category,
            ];

            $id = insert('posts', $post);
            $category = selectOne('posts', ['id' => $id]);
            header('location: ' . BASE_URL . 'admin/posts/index.php');

        }

} else {
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $category = '';

}

//update post
if ( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) ) {

    $post = selectOne('posts', ['id' =>  $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $img = $post['img'];
    $category = $post['category_id'];
    $publish = $post['status'];
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_edit']) ) {

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category = trim($_POST['category']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if ( $title === '' || $content === '' || $category === '' ) {
        $errMsg[] = 'Not all required fields are filled.';
    } elseif ( mb_strlen($title, 'UTF-8') < 7 ) {
        $errMsg[] = 'Post name length should be more then 7 symbols';
    } else {
        if ( $_POST['img'] === '' || $_POST['img'] === NULL ) {
            $post = [
                'user_id' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'status' => $publish,
                'category_id' => $category,
            ];
        } else {
            $post = [
                'user_id' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'img' => $_POST['img'],
                'status' => $publish,
                'category_id' => $category,
            ];
        }
        update('posts', $id , $post);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }

}
//update post status
if ( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['publish_id']) ) {

    $id = $_GET['publish_id'];
    $status = $_GET['publish'];
    update('posts', $id , ['status' => $status]);

    header('location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}

//delete post
if ( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id']) ) {

    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');

}
