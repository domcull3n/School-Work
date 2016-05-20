<?php

function getDBConnection()
{
    $db = mysqli_connect('localhost', 'root', 'inet2005', 'sakila');

    if(!$db)
    {
        die("Could not connect to database");
    }
    return $db;
}

function closeDBConnection($db)
{
    mysql_close($db);
}