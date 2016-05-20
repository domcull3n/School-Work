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

            $queryResult = mysqli_query($db, "SELECT * FROM actor WHERE actor_id LIKE '$id';");
            $row = mysqli_fetch_assoc($queryResult);

            $FirstName = $row['first_name'];
            $LastName = $row['last_name'];
        ?>
        <form action="updatePHP2.php" method="post" name="updateActors">
            <p>
                First Name: <input type="text" name="FirstName" value="<?php echo $FirstName ?>">
            </p>
            <p>
                Last Name: <input type="text" name="LastName" value="<?php  echo $LastName ?>">
            </p>
            <p>
                <input type="submit" value="Update">
            </p>
            <p>
                <input type="hidden" name="upID" id="upID" value="<?php echo $id?>">
            </p>
        </form>


    </body>
</html>