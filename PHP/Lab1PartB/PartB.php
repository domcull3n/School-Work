<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>

        <!--Step 1-->
        <?php
            echo "<h1>Greetings from Lab 1</h1>";
        ?>

        <p>blah blah blah</p>

        <?php
            echo "<h3>Dominic Cullen</h3>";
        ?>

        <!--Step 2-->
        <?php
            $myName = "Dominic Cullen";
            echo "<p>$myName</p>";
        ?>

        <!--Step 3-->
        <?php
            $concatStr = "I"." like"." pie";
            echo "<p>$concatStr</p>";
        ?>

        <!--Step 4-->
        <?php
            $multiply = (32 * 14) + 83;
            echo "<p>$multiply</p>";

            $division = (1024 / 128) - 7;
            echo "<p>$division</p>";

            $remainder = 769 % 6;
            echo "<p>$remainder</p>";
        ?>

        <!--Step 5-->
        <?php
            for($i = 10; $i >= 1; $i--){
                $loopVar .= "$i"."...";
            }
            $loopVar .= "Blast Off";

            echo "<p>$loopVar</p>";
        ?>

        <!--Step 6-->
        <?php
            $array = array("Burgundy", "Blue", "Green", "Orange", "Cyan", "Purple", "Pink");

            for($i=0;$i <= count($array); $i++) {
                echo $array[$i] . "<br>";
            }

            foreach($array as $arr){
                echo $arr . "<br>";
            }

            echo "<br>";
            print_r($array);
        ?>

    </body>
</html>