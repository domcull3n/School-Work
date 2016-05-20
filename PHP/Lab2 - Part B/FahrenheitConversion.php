<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            table, th, td {
                border: 1px solid black;
            }
            th,tr:nth-child(even){
                background-color: grey;
            }
        </style>
    </head>
    <body>
        <form action="CelsiusConversion.php">
            <input type="submit" value="Switch">
        </form>
        <br>

        <table>

            <thead>
                <tr>
                    <th>Fahrenheit</th>
                    <th>Celsius</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    for($i=0;$i<=100;$i++)
                    {
                        $convert =  number_format(celsiusConvert($i)); ?>
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
            function celsiusConvert($temp)
            {
                $celsius = ($temp - 32) * (5/9);
                return $celsius;
            }
        ?>

    </body>
</html>