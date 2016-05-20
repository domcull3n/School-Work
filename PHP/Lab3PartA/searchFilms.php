<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title>Search through film records</title>
        <style type ="text/css">
            table, td, th {
                border: 1px solid red;
            }
        </style>
        <?php include 'dbFunctions.php' ?>
    </head>
    <body>


        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
            </thead>

            <tbody>

            <?php
            $search = $_POST['search'];
            getDBConnection();

            $sqlStatement = "SELECT * FROM film WHERE description LIKE '%$search%' LIMIT 0,20";
            $result = mysqli_query($db,$sqlStatement);
            if(!$result)
            {
                die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
            }

            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "</tr>";
            }

            closeDBConnection($db);
            ?>
            </tbody>

        </table>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="filmstuff">
            <p>Search:
                <input type="text" name="search">
            </p>
            <p>
                <input type="submit" name="">
            </p>
        </form>
    </body>
</html>