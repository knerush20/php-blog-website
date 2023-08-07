<?php
include SITE_ROOT .  '/app/database/db.php';

$errMsg = [];
$users = selectAll('users');
$routeName = 'users';
function authUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];

    if ( $_SESSION['admin'] ) {
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    } else {
        header('location: ' . BASE_URL);
    }
}

//------------REGISTRATION-------------------------
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registration_btn']) ) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);



    if ( $login === '' || $email === '' || $password === '' ) {
        $errMsg[] = 'Not all required fields are filled.';
    } elseif ( mb_strlen($login, 'UTF-8') < 2 ) {
        $errMsg[] = 'Login length should be more then 2 symbols';
    } elseif ( $confirmPassword !== $password ) {
        $errMsg[] = 'Confirm the password correct.';
    } else {
        $existance = selectOne('users', ['email' => $email]);

        if ( $existance['email'] === $email ) {
            $errMsg[] = 'User with this email is already exist.';

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

} else {
    $login =  '';
    $email =  '';
}

//login
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_btn']) ) {

    $email = trim($_POST['email']);;
    $password = trim($_POST['password']);

    if ( $email === ''  || $password === '' ) {
        $errMsg[] = 'Not all required fields are filled.';
    } else {
        $existance = selectOne('users', ['email' => $email]);

        if ( $existance && password_verify($password, $existance['password']) ) {
            authUser($existance);
        } else {
            $errMsg[] = 'Incorrect email or password.';
        }
    }
} else {
    $email =  '';
}

//add users from admin panel
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_create']) ) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);



    if ( $login === '' || $email === '' || $password === '' ) {
        $errMsg[] = 'Not all required fields are filled.';
    } elseif (mb_strlen($login, 'UTF-8') < 2 ) {
        $errMsg[] = 'Login length should be more then 2 symbols';
    } elseif ( $confirmPassword !== $password ) {
        $errMsg[] = 'Confirm the password correct.';
    } else {
        $existance = selectOne('users', ['email' => $email]);

        if ( $existance['email'] === $email ) {
            $errMsg[] = 'User with this email is already exist.';

        } else {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            if ( isset($_POST['admin']) ) $admin = 1;
            $user = [
                'admin' => '0',
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];

            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);
            header('location: ' . BASE_URL . 'admin/users/index.php');

        }
    }

} else {
    $login =  '';
    $email =  '';
}

//update users from admin panel
if ( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) ) {
    $user = selectOne('users', ['id' =>  $_GET['id']]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];

}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_edit']) ) {

    $id = $_POST['id'];
    $admin = isset($_POST['admin']) ? 1 : 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if ( $login === '' ) {
        $errMsg[] = 'Not all required fields are filled.';
    } elseif ( mb_strlen($login, 'UTF-8') < 2 ) {
        $errMsg[] = 'Login length should be more then 2 symbols';

    //if password was edited
    } elseif ( !empty($password) ) {
        if ( $confirmPassword !== $password ) {
            $errMsg[] = 'Confirm the password correct.';
        } else {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $user = [
                'admin' => $admin,
                'username' => $login,
                'password' => $pass
            ];
            update('users', $id, $user);
            header('location: ' . BASE_URL . 'admin/users/index.php');
        }
    //if password was not edited
    } else {
        $user = [
            'admin' => $admin,
            'username' => $login,
        ];

        update('users', $id, $user);
        header('location: ' . BASE_URL . 'admin/users/index.php');

    }
}


//delete user
if ( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id']) ) {

    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'admin/users/index.php');

}



