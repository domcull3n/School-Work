<?php

    require_once('dbConnection.php');
    ifLoggedIn();
    $db = getDBConnection();

    //                    ini_set('display_errors',1);
    //                    error_reporting(E_ALL);

    $startFrom = isset($_POST['startFrom']) ? $_POST['startFrom'] : 0;

    if(isset($_POST['submitSearch'])) {
        require_once('dbFunctions.php');
        $queryResult = searchRecords($db);

    }elseif(isset($_POST['backPage'])){
        require_once('dbFunctions.php');

        if($startFrom==0){
            $queryResult = backPage($db,$startFrom);
        }else{
            $startFrom -= 25;
            $queryResult = backPage($db,$startFrom);
        }

    }elseif(isset($_POST['nextPage'])){
        require_once('dbFunctions.php');

        $startFrom += 25;
        $queryResult = nextPage($db,$startFrom);

    }else{
        $queryResult = mysqli_query($db, "SELECT * FROM employees ORDER BY emp_no LIMIT 0,25;");
    }
?>

<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title>Employee's Database</title>
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

        <h1>Welcome to the Employee's Database page!</h1>

        <h3>Search First & Last Names from Database:</h3><br>
        <form action = "" name="searchForm" method = "post">
            <label>Search: </label>
            <input type="hidden" name="startFrom" value="<?php echo $startFrom; ?>" />
            <input type = "text" name = "searchBox" id = "searchBox" value = "<?php echo isset($_POST['searchBox']) ? $_POST['searchBox'] : ''; ?>"><br><br> <!-- pulled from stackoverflow -->
            <input type = "submit" name = "submitSearch" value = "Submit Query"><br><br>
            <input type = "submit" name = "backPage" value = "<--"><input type = "submit" name = "nextPage" value = "-->"><br><br>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Emp. Number</th>
                    <th>Birth Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Hire Date</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    if(!$queryResult)
                    {
                        die('Could not retrieve records from the Employees Database: ' . mysqli_error($db));
                    }

                    while($row=mysqli_fetch_assoc($queryResult))
                    {

                        echo "<tr>";
                        echo "<td>" . $row['emp_no'] . "</td>";
                        echo "<td>" . $row['birth_date'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['hire_date'] . "</td>";
                        echo "<td>
                                    <form name='editForm' action = 'updateEmp.php' method='post'>
                                    <input type='hidden' name='editID' value='$row[emp_no]'>
                                    <input type='submit' name='editButton' value='Edit'>
                                    </form>
                            </td>";
                        echo "<td>
                                    <form name='deleteForm' action = 'deleteEmp.php' method='post'>
                                    <input type='hidden' name='deleteID' value='$row[emp_no]'>
                                    <input type='submit' name='deleteButton' value='Delete'>
                                    </form>
                            </td>";
                        echo "</tr>";
                    }

                    closeDBConnection($db);
                ?>
            </tbody>
        </table>
        <br><br>
        <form action = "insertEmp.php" name="linkBtn" method = "post">
            <input type = "submit" name = "insertLink" value = "Insert Employee">
        </form>
        <br><br>
        <form action = "logOut.php" name="logOut" method = "post">
            <input type="submit" name = "logOutBtn" value="Log Out">
        </form>

    </body>
</html>
