<?php


    function searchRecords($db)
    {
        $search = $_POST['searchBox'];

        $sqlStatement = "SELECT * FROM employees WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' LIMIT 0,25";
        $queryResult = mysqli_query($db, $sqlStatement);

        return $queryResult;
    }

    function backPage($db, $startFrom)
    {
        $queryResult = mysqli_query($db, "SELECT * FROM employees ORDER BY emp_no LIMIT $startFrom,25;");

        return $queryResult;
    }

    function nextPage($db, $startFrom)
    {
        $countQuery = mysqli_query($db,"SELECT COUNT(1) FROM employees;");
        $row = mysqli_fetch_array($countQuery);


        $numRows = $row[0];

        if(($startFrom) >= $numRows)
        {
            $startFrom -= 25;
            $queryResult = mysqli_query($db, "SELECT * FROM employees ORDER BY emp_no LIMIT $startFrom,25;");
        }else{
            $queryPage = "SELECT * FROM employees ORDER BY emp_no LIMIT $startFrom,25;";
            $queryResult = mysqli_query($db, $queryPage) or trigger_error(mysql_error()." ".$queryPage);
        }

        return $queryResult;
    }