<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
        <?php
            require_once('dbConnection.php');
            $db = getDBConnection();

            $id = $_POST['delID'];
            $result = mysqli_query($db, "DELETE FROM employees WHERE emp_no = '$id';");

            if(!$result)
            {
                die('Could not delete record from the Employees Database: ' . mysqli_error($db));
            }
            else
            {
                echo "Number of records deleted: " . mysqli_affected_rows($db);
            }

        ?>
    </body>
</html>