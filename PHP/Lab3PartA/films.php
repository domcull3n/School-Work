<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
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
                    getDBConnection();

                    $sqlStatement = "SELECT * FROM film LIMIT 0,10";
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
    </body>
</html>