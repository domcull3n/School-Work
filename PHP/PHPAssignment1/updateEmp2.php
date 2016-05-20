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

            $id = $_POST['editID'];
            $bDate = $_POST['bDate'];
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $hDate = $_POST['hireDate'];
            $gender = $_POST['gender'];

            if($gender == 2){
                $gender = 'M';
            }elseif($gender == 3){
                $gender = 'F';
            }

            $sqlStatement = "UPDATE employees SET ";
            $sqlStatement .= "birth_date = '$bDate', ";
            $sqlStatement .= "first_name = '$fName', ";
            $sqlStatement .= "last_name = '$lName', ";
            $sqlStatement .= "gender = '$gender', ";
            $sqlStatement .= "hire_date = '$hDate' ";
            $sqlStatement .= "WHERE emp_no = '$id';";

            $result = mysqli_query($db,$sqlStatement);

            if(!$result)
            {
                die('Could not update record from the Employees Database: ' . mysqli_error($db));
            }
            else
            {
                echo "Number of records updated: " . mysqli_affected_rows($db);
            }
            closeDBConnection($db);
        ?>
        <p>
            <a href="index.php">Back to Employees List</a>
        </p>
    </body>
</html>