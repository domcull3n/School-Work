<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title>Updating Employees</title>
        <script type="text/javascript" src="employeeValidation.js">
        </script>
    </head>
    <body>
    <h1>Edit Employee Info</h1>
    <?php

        require_once('dbConnection.php');
        ifLoggedIn();
        $db = getDBConnection();

        $id = $_POST['editID'];

        $queryResult = mysqli_query($db, "SELECT * FROM employees WHERE emp_no LIKE '$id';");
        $row = mysqli_fetch_assoc($queryResult);

        $bDate = $row['birth_date'];
        $fName = $row['first_name'];
        $lName = $row['last_name'];
        $hDate = $row['hire_date'];
        ?>

        <form action = "updateEmp2.php" name = "EmpForm" id="EmpForm" method = "post" onsubmit="return validateForm('bDateWarning', 'fNameWarning', 'lNameWarning', 'selectWarning', 'hDateWarning')">
            <p>
                Birth Date: <input type = "date" name = "bDate" id = "bDate" value = <?php echo $bDate?>>
                &nbsp;&nbsp;<span id="bDateWarning"></span>
            </p>
            <p>
                First Name: <input type = "text" name = "fName" id = "fName" value = <?php echo $fName?>>
                &nbsp;&nbsp;<span id="fNameWarning"></span>
            </p>
            <p>
                Last Name: <input type = "text" name = "lName" id = "lName" value = <?php echo $lName?>>
                &nbsp;&nbsp;<span id="lNameWarning"></span>
            </p>
            <p>
                Gender: <select name="gender">
                    <option value ="1">Pick a gender</option>
                    <option value ="2">M</option>
                    <option value ="3">F</option>
                </select>
                &nbsp;&nbsp;<span id="selectWarning"></span>
            </p>
            <p>
                Hire Date: <input type = "date" name = "hireDate" id= "hireDate" value = <?php echo $hDate?>>
                &nbsp;&nbsp;<span id="hDateWarning"></span>
            </p>
            <p>
                <input type = "submit" name = "submitUpdate" value = "Update Employee">
            </p>
            <p>
                <input type="hidden" name="editID" value="<?php echo $id?>">
            </p>
        </form>
    </body>
</html>