<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
    <?php
        if(!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['feet']) && !empty($_POST['inches']) )
        {
        ?>
            <h1>Your first name is: <?php echo $_POST['fName'] ?></h1>
            <br>
            <h1>Your last name is: <?php echo $_POST['lName']?></h1>
            <br>
            <h1>Your height in metres is: <?php echo number_format((($_POST['feet']/3.2808) + ($_POST['inches']/39.370)), 2) ?></h1>
        <?php
        }
        else
        {
            echo "Please enter data into the fields";
        }
        ?>

    </body>
</html>