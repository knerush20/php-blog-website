<?php

session_start();
require 'connect.php';

//debug function
function test( $value )
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit();
}

function dbCheckError( $query )
{
    $errInfo = $query->errorInfo();

    if ( $errInfo[0] !== PDO::ERR_NONE ) {
        echo $errInfo[2];
        exit();
    }

    return true;
}
//request data from one table
function selectAll( $table, $params = [] )
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if ( !empty($params) ) {
        $i = 0;
        foreach ( $params as $key => $value ) {
            if ( !is_numeric($value) ){
                $value = "'" . $value . "'";
            }
            if ( $i === 0 ){
                $sql = $sql . " WHERE $key=$value" ;
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }

    }

    $query = $pdo->prepare($sql);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    dbCheckError( $query );

    return $query->fetchAll();
}

//request data one row from table
function selectOne( $table, $params = [] )
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if ( !empty($params) ) {
        $i = 0;
        foreach ( $params as $key => $value ) {
            if ( !is_numeric($value) ){
                $value = "'" . $value . "'";
            }
            if ( $i === 0 ){
                $sql = $sql . " WHERE $key=$value" ;
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }

    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetch();
}
// insert data into database
function insert( $table, $params )
{
    global $pdo;

    $i = 0;
    $coll = '';
    $mask = '';
    foreach ( $params as $key => $value ) {
        if ( $i === 0 ) {
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
//update one row in selected table
function update( $table, $id,  $params )
{
    global $pdo;
    $i = 0;
    $str = '';

    foreach ( $params as $key => $value ) {
        if ( $i === 0 ) {
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
//delete item in table
function delete( $table, $id )
{
    global $pdo;
    $sql = "DELETE  FROM $table WHERE id = $id; ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
//Select posts with author name
function selectAllFromPostWithUsers( $table1, $table2 )
{
    global $pdo;
    $sql = "
        SELECT 
            t1.id, 
            t1.title, 
            t1.img, 
            t1.content, 
            t1.status, 
            t1.category_id, 
            t1.created_date, 
            t2.username
        FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.user_id = t2.id;";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchAll();


}
//Select published posts with author name
function selectAllPublishPostsWithUsers( $table1, $table2, $limit, $offset ): bool|array
{
    global $pdo;
    $sql = "
        SELECT p.*, u.username 
        FROM $table1 AS p JOIN $table2 AS u 
            ON p.user_id = u.id 
        WHERE p.status = 1
        LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchAll();

}
//select post's title or|and content for search query
function searchInTitleAndContent( $search, $table1, $table2 )
{
    global $pdo;
    $search = trim(strip_tags(stripcslashes(htmlspecialchars($search))));
    $sql = "
        SELECT p.*, u.username 
        FROM $table1 AS p 
            JOIN $table2 AS u 
            ON p.user_id = u.id 
        WHERE p.status = 1
        AND p.title LIKE '%$search%' OR p.content LIKE '%$search%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchAll();

}
//select post by id with author name for single page
function selectPostByIdWithAuthor( $table1, $table2, $id )
{
    global $pdo;
    $sql = "
        SELECT p.*, u.username 
        FROM $table1 AS p JOIN $table2 AS u 
            ON p.user_id = u.id 
        WHERE p.id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetch();
}

//count row in posts table for pagination
function countRow( $table )
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table WHERE status = 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchColumn();
}
