<?php
include "app/database/db.php";

$errMsg = '';

function authUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . 'admin/admin.php');
    } else {
        header('location: ' . BASE_URL);
    }
}

// registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registration_btn'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);



    if ($login === '' || $email === '' || $password === '') {
        $errMsg = 'Not all required fields are filled.';
    }elseif (mb_strlen($login, 'UTF-8') < 2 ) {
        $errMsg = 'Login length should be more then 2 symbols';
    }elseif ($confirmPassword !== $password) {
        $errMsg = 'Confirm the password correct.';
    } else {
        $existance = selectOne('users', ['email' => $email]);

        if ($existance['email'] === $email) {
            $errMsg = 'User with this email is already exist.';

        } else {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $post = [
                'admin' => '0',
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];

            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);

            authUser($user);


        }


    }

}else {
    $login =  '';
    $email =  '';
}

//for login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_btn'])) {
    $email = trim($_POST['email']);;
    $password = trim($_POST['password']);

    if ($email === ''  || $password === '') {
        $errMsg = 'Not all required fields are filled.';
    }else {
        $existance = selectOne('users', ['email' => $email]);

        if ($existance && password_verify($password, $existance['password'])) {
            authUser($existance);
        } else {
            $errMsg = 'Incorrect email or password.';
        }
    }
} else {
    $email =  '';
}



