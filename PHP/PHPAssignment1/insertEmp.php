<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title>Insert Employee Form</title>
        <h1>Please Enter Employee Info</h1>
        <script type="text/javascript" src="employeeValidation.js">
        </script>
    </head>
    <body>
        <?php
            require "dbConnection.php";
            ifLoggedIn();
        ?>

        <form action = "insertEmp2.php" name = "EmpForm" id = "EmpForm" method = "post" onsubmit="return validateForm('bDateWarning', 'fNameWarning', 'lNameWarning', 'selectWarning', 'hDateWarning')">
            <p>
                Birth Date: <input type = "date" name = "bDate" id = "bDate">
                &nbsp;&nbsp;<span id="bDateWarning"></span>
            </p>
            <p>
                First Name: <input type = "text" name = "fName" id = "fName">
                &nbsp;&nbsp;<span id="fNameWarning"></span>
            </p>
            <p>
                Last Name: <input type = "text" name = "lName" id = "lName">
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
                Hire Date: <input type = "date" name = "hireDate" id= "hireDate">
                &nbsp;&nbsp;<span id="hDateWarning"></span>
            </p>
            <p>
                <input type = "submit" name = "submitInsert" value = "Insert Employee">
            </p>
        </form>

    </body>
</html>