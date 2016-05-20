<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
        <?php

            if(!empty($_GET['fName']) && !empty($_GET['lName'])) {
                echo "Hello from " . $_GET['fName'] . " " . $_GET['lName'] . "!";
            }
            else{
                echo "No welcome for you";
            }

        ?>
    </body>
</html>