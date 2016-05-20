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

            $id = $_POST['upID'];
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $result = mysqli_query($db, "UPDATE actor SET first_name = '$FirstName', last_name = '$LastName' WHERE actor_id = '$id';");

            if(!$result)
            {
                die('Could not update record from the Sakila Database: ' . mysqli_error($db));
            }
            else
            {
                echo "Number of records updated: " . mysqli_affected_rows($db);
            }
            closeDBConnection($db);
        ?>
        <p>
            <a href="insertPHP.php">Back to Actor List</a>
        </p>
    </body>
</html>