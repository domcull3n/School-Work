<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
        <?php

            if(!empty($_POST['fName']) && !empty($_POST['lName'])) {
                echo "Hello from " . $_POST['fName'] . " " . $_POST['lName'] . "!";
            }
            else{
                echo "No welcome for you";
            }

        ?>
    </body>
</html>