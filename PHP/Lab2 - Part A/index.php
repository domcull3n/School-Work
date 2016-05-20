<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
        <h1>Step 1</h1>
        <?php
            ;

            function stringNum($string, $num)
            {
                switch($num)
                {
                    case 1:
                        ?><h1><?php echo $string ?></h1><?php
                        break;
                    case 2:
                        ?><h2><?php echo $string ?></h2><?php
                        break;
                    case 3:
                        ?><h3><?php echo $string ?></h3><?php
                        break;
                    case 4:
                        ?><h4><?php echo $string ?></h4><?php
                        break;
                    case 5:
                        ?><h5><?php echo $string ?></h5><?php
                        break;
                    case 6:
                        ?><h6><?php echo $string ?></h6><?php
                        break;
                    default:
                        echo "Error Message";

                }
            }

            for($i=1; $i<=7; $i++)
            {
                stringNum("Heading $i",$i);
            }
        ?>

        <h1>Step 2</h1>
        <?php

            $step2 = "Hello, World";

            function byValue($step2)
            {
                $step2 .= "...blah";
            }

            function byReference(&$step2)
            {
                $step2 .= "...blah";
            }

        ?><h1><?php echo $step2 ?></h1><?php
        byValue($step2);
        ?><h1><?php echo $step2 ?></h1><?php
        byReference($step2);
        ?><h1><?php echo $step2 ?></h1>


        <h1>Step 3</h1>

        <?php

            $age = 30;
            function printAge()
            {
                global $age;
                ?><h1>You are <?php echo $age ?> years old</h1><?php
            }

            printAge();
        ?>
    </body>
</html>