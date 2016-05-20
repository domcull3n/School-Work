<?php

function getDBConnection()
{
    $db = mysqli_connect('localhost', 'root', 'inet2005', 'employees');

    if(!$db)
    {
        die("Could not connect to database: " . mysqli_error($db));
    }
    return $db;
}

function closeDBConnection($db)
{
    mysql_close($db);
}

function ifLoggedIn()
{
    session_start();
    if(empty($_SESSION['LoginUser'])  || empty($_SESSION['LoginPwd'])){
        header("location:login.php");
    }
}