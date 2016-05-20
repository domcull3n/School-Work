<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 11/8/15
 * Time: 7:37 PM
 */

    $searchValue = "";

    if(!empty($_GET['q']))
    {
        $searchValue = $_GET['q'];

        include("dbConn.php");

        connectToDB();

        selectEmpWithNameStartingWith($searchValue);


        while ($row = fetchFilms())
        {
            echo $row['first_name'] . " " . $row['last_name'] . "<br/>";
        }

        closeDB();
    }