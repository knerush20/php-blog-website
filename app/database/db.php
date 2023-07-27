<?php

session_start();
require('connect.php');

function test($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function dbCheckError($query)
{
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}
//request data from one table
function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value" ;
            }else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }

    }

    $query = $pdo->prepare($sql);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    dbCheckError($query);

    return $query->fetchAll();
}

//request data one row from table
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value" ;
            }else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }

    }
//    $sql = $sql . " LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetch();
}
// insert data into database
function insert($table, $params)
{
    global $pdo;

    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0 ) {
            $coll = $coll . "$key" ;
            $mask = $mask . "'$value'";
        } else {
            $coll = $coll . ", $key" ;
            $mask = $mask . ", '$value'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $pdo->lastInsertId();
}
//update
function update($table, $id,  $params)
{
    global $pdo;
    $i = 0;
    $str = '';

    foreach ($params as $key => $value) {
        if ($i === 0 ) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id; ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
//delete
function delete($table, $id)
{
    global $pdo;
    $sql = "DELETE  FROM $table WHERE id = $id; ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

