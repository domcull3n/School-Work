<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title>Area Calculator</title>
    </head>
    <body>

        <form method = "post">
            <fieldset>
                <legend>Circle</legend>
                Radius: <input type="text" name="circleR" value = "<?php echo isset($_POST['circleR']) ? $_POST['circleR'] : ''; ?>"><br>
            </fieldset>

            <fieldset>
                <legend>Rectangle</legend>
                Length: <input type="text" name="rectL" value = "<?php echo isset($_POST['rectL']) ? $_POST['rectL'] : ''; ?>">
                Width: <input type="text" name="rectW" value = "<?php echo isset($_POST['rectW']) ? $_POST['rectW'] : ''; ?>"><br>
            </fieldset>

            <fieldset>
                <legend>Triangle</legend>
                Base: <input type="text" name="triB" value = "<?php echo isset($_POST['triB']) ? $_POST['triB'] : ''; ?>">
                Height: <input type="text" name="triH" value = "<?php echo isset($_POST['triH']) ? $_POST['triH'] : ''; ?>"><br>
            </fieldset><br>
            <p>
                Resize (%):
                <input type="text" name="resize">
            </p><br><br>
            <input type="submit" value="Calculate" name="submit">
        </form>

        <p>Results:</p><br>

        <?php
            require_once("Shape.php");
            require_once("Circle.php");
            require_once("Rectangle.php");
            require_once("Triangle.php");

            if(!empty($_POST['circleR']))
            {
                $circle = new Circle("Circle", $_POST['circleR']);
                $cName = $circle->getName();
                $cArea = $circle->CalculateSize();
                if(!empty($_POST['resize']))
                {
                    $circle->Resize($_POST['resize']);
                    $cArea = $circle->CalculateSize();
                }
                ?><strong>Shape: <?php echo $cName ?></strong><br>
                <p>Area: <?php echo $cArea ?></p><br> <?php
            }

            if(!empty($_POST['rectL']) && !empty($_POST['rectW']))
            {
                $rectangle = new Rectangle("Rectangle", $_POST['rectL'], $_POST['rectW']);
                $rName = $rectangle->getName();
                $rArea = $rectangle->CalculateSize();
                ?><strong>Shape: <?php echo $rName ?></strong><br>
                <p>Area: <?php echo $rArea ?></p><br> <?php
            }

            if(!empty($_POST['triB']) && !empty($_POST['triH']))
            {
                $triangle = new Triangle("Triangle", $_POST['triB'], $_POST['triH']);
                $tName = $triangle->getName();
                $tArea = $triangle->CalculateSize();
                if(!empty($_POST['resize']))
                {
                    $triangle->Resize($_POST['resize']);
                    $tArea = $triangle->CalculateSize();
                }
                ?><strong>Shape: <?php echo $tName ?></strong><br>
                <p>Area: <?php echo $tArea ?></p><br> <?php
            }
        ?>

    </body>
</html>