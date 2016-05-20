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
                $result = mysqli_query($db, "DELETE FROM actor WHERE actor_id = '$id';");

                if(!$result)
                {
                    die('Could not delete record from the Sakila Database: ' . mysqli_error($db));
                }
                else
                {
                    echo "Number of records deleted: " . mysqli_affected_rows($db);
                }

        ?>
        <p>
            <a href="insertPHP.php">Back to Actor List</a>
        </p>

    </body>
</html>