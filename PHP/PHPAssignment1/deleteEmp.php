<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
        <?php
            $id = $_POST['deleteID'];
        ?>
        <form action="deleteEmp2.php" name="deleteForm">
            <p>
                Are you sure you want to delete this record?<br>
                <input type="submit" name="deleteYes" value="Yes"><br><br>
                <input type="hidden" name="editID" value="<?php echo $id?>">
            </p>
        </form>

        <a href="index.php">Return to employees list</a>
    </body>
</html>