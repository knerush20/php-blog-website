<?php
require('connect.php');

function test($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function selectAll($table)
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    $query = $pdo->prepare($sql);
    $query->execute();
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }

    return $query->fetchAll();
}

test(selectAll('users'));