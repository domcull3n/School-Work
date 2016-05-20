<!DOCTYPE html>
<html>
    <head lang="en">
          <meta charset="UTF-8">
          <title></title>
            <style type="text/css">
                table, th, td {
                    border: 1px solid black;
                }
            </style>
    </head>
    <body>
        <form action="FahrenheitConversion.php">
            <input type="submit" value="Switch">
        </form>
        <br>

        <table>

            <thead>
                <tr>
                    <th>Celsius</th>
                    <th>Fahrenheit</th>
                </tr>
            </thead>

            <tbody>
                <?php
                for($i=0;$i<=100;$i++)
                {
                    $convert =  number_format(farConvert($i))  ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $convert ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>

        <?php
            function farConvert($temp)
            {
                $far = ($temp * (9/5)) + 32;
                return $far;
            }
        ?>
    </body>
</html>