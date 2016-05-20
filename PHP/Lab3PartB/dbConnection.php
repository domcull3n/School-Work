<?php

function getDBConnection()
{
    $db = mysqli_connect('localhost', 'root', 'inet2005', 'sakila');

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

function insertRecords($fName, $lName)
{
    $sqlStatement = "INSERT INTO actor (first_name, last_name) VALUES ('";
    $sqlStatement .= $fName;
    $sqlStatement .= "','";
    $sqlStatement .= $lName;
    $sqlStatement .= "');";
    return $sqlStatement;

}
