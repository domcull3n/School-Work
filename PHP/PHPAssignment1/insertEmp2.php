<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
        <?php
            require_once('dbConnection.php');
            ifLoggedIn();
            $db = getDBConnection();

            function calcEmpNo($db)
            {
                $queryResult = mysqli_query($db, "SELECT MAX(emp_no) as id FROM `employees`;");
                $row = mysqli_fetch_array($queryResult);
                $lastID = $row['id'];
                $empNo = $lastID + 1;
                return $empNo;
            }

            $empNo = calcEmpNo($db);
            $birthDate = $_POST['bDate'];
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $gender = $_POST['gender'];
            $hireDate = $_POST['hireDate'];

            if($gender == 2){
                $gender = 'M';
            }elseif($gender == 3){
                $gender = 'F';
            }


            $sqlStatement = "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) VALUES ('";
            $sqlStatement .= $empNo;
            $sqlStatement .= "','";
            $sqlStatement .= $birthDate;
            $sqlStatement .= "','";
            $sqlStatement .= $fName;
            $sqlStatement .= "','";
            $sqlStatement .= $lName;
            $sqlStatement .= "','";
            $sqlStatement .= $gender;
            $sqlStatement .= "','";
            $sqlStatement .= $hireDate;
            $sqlStatement .= "');";

            $queryResult = mysqli_query($db, $sqlStatement);

            if(!$queryResult)
            {
                die('Could not insert record in the Employees Database: ' . mysqli_error($db));
            }
            else
            {
                echo "Number of records updated: " . mysqli_affected_rows($db);
            }
            closeDBConnection($db);
        ?>
        <p>
            <a href="index.php">Back to Employee List</a>
        </p>

    </body>
</html>