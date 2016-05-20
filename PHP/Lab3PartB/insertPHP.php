<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
        <style type ="text/css">
            table, td, th {
                border: 1px solid red;
            }
            th {
                text: bold;
            }
        </style>
    </head>
    <body>
        <table>
            <?php

                require_once('dbConnection.php');
                $db = getDBConnection();
                if(!empty($_POST['fName']) && !empty($_POST['lName'])){
                    $sqlStatement = insertRecords($_POST['fName'],$_POST['lName']);
                    $result = mysqli_query($db,$sqlStatement);
                }

                $queryResult = mysqli_query($db, "SELECT * FROM actor ORDER BY actor_id DESC LIMIT 0,10;");
                if(!$queryResult)
                {
                    die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
                }

                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Last Updated</th>";
                echo "<tr>";

                while($row=mysqli_fetch_assoc($queryResult))
                {

                    echo "<tr>";
                    echo "<td>" . $row['actor_id'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['last_update'] . "</td>";
                    echo "</tr>";
                }

                closeDBConnection($db);
            ?>
        </table>


        <form action="deletePHP.php" method="post" name="actorDelete">
            <p>
                ID to Delete: <input type="text" name="delID" id="IDBox">
            </p>
            <p>
                <input type="submit" value="Delete">
            </p>
        </form>

        <form action="updatePHP.php" method="post" name="actorUpdate">
            <p>
                ID to Update: <input type="text" name="upID" id="upIDBox">
            </p>
            <p>
                <input type="submit" value="Update">
            </p>
        </form>


    </body>
</html>