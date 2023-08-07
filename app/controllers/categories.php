<?php
include SITE_ROOT . '/app/database/db.php';


$errMsg = [];
$categories = selectAll('categories');
$name = '';
$id = '';
$description = '';
$routeName = 'categories';


//create category
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_create'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);


    if ( $name === '' || $description === '' ) {
        $errMsg[] = 'Not all required fields are filled.';
    } elseif ( mb_strlen($name, 'UTF-8') < 2 ) {
        $errMsg[] = 'Category name length should be more then 2 symbols';
    } else {
        $existance = selectOne('categories', ['name' => $name]);

        if ( strtolower($existance['name']) === strtolower($name) ) {
            $errMsg[] = 'This category is already exist.';

        } else {
            $post = [
                'name' => $name,
                'description' => $description,
            ];

            $id = insert('categories', $post);
            $category = selectOne('categories', ['id' => $id]);
            header('location: ' . BASE_URL . 'admin/categories/index.php');

        }

    }

}  else {
    $name =  '';
    $description =  '';
}


//edit category
if ( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = selectOne('categories', ['id' => $id]);
    $id = $category['id'];
    $name = $category['name'];
    $description = $category['description'];

}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_edit'])) {

    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === '' || $description === '' ) {
        $errMsg[] = 'Not all required fields are filled.';
    } elseif ( mb_strlen($name, 'UTF-8') < 2 ) {
        $errMsg[] = 'Category name length should be more then 2 symbols';
    } else {
            $post = [
                'name' => $name,
                'description' => $description,
            ];
            update('categories', $id, $post);
            header('location: ' . BASE_URL . 'admin/categories/index.php');

    }
}

//delete category
if ( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

    $id = $_GET['delete_id'];
    $category = selectOne('categories', ['id' => $id]);
    $name = $category['name'];

    delete('categories', $id);
    header('location: ' . BASE_URL . 'admin/categories/index.php');

}
