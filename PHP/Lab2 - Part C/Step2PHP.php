<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">
      <title></title>
    </head>
    <body>
        <h2>Hello, <?php echo $_GET['fName'] ." " .$_GET['lName'] ."!" ?></h2>
        <br>
        <?php
            if($_GET['month']=="1"){
                if($_GET['day']<="19"){
                    echo "<h2>Your zodiac sign is: Capricorn</h2>";
                }elseif($_GET['day']>="20"){
                    echo "<h2>Your zodiac sign is: Aquarius</h2>";
                }
            }elseif($_GET['month']=="2"){
                if($_GET['day']<="18"){
                    echo "<h2>Your zodiac sign is: Aquarius</h2>";
                }elseif($_GET['day']>="19"){
                    echo "<h2>Your zodiac sign is: Pisces</h2>";
                }
            }elseif($_GET['month']=="3"){
                if($_GET['day']<="20"){
                    echo "<h2>Your zodiac sign is: Pisces</h2>";
                }elseif($_GET['day']>="21"){
                    echo "<h2>Your zodiac sign is: Aries</h2>";
                }
            }elseif($_GET['month']=="4"){
                if($_GET['day']<="19"){
                    echo "<h2>Your zodiac sign is: Aries</h2>";
                }elseif($_GET['day']>="20"){
                    echo "<h2>Your zodiac sign is: Taurus</h2>";
                }
            }elseif($_GET['month']=="5"){
                if($_GET['day']<="20"){
                    echo "<h2>Your zodiac sign is: Taurus</h2>";
                }elseif($_GET['day']>="21"){
                    echo "<h2>Your zodiac sign is: Gemini</h2>";
                }
            }elseif($_GET['month']=="6"){
                if($_GET['day']<="20"){
                    echo "<h2>Your zodiac sign is: Gemini</h2>";
                }elseif($_GET['day']>="21"){
                    echo "<h2>Your zodiac sign is: Cancer</h2>";
                }
            }elseif($_GET['month']=="7"){
                if($_GET['day']<="22"){
                    echo "<h2>Your zodiac sign is: Cancer</h2>";
                }elseif($_GET['day']>="23"){
                    echo "<h2>Your zodiac sign is: Leo</h2>";
                }
            }elseif($_GET['month']=="8"){
                if($_GET['day']<="22"){
                    echo "<h2>Your zodiac sign is: Leo</h2>";
                }elseif($_GET['day']>="23"){
                    echo "<h2>Your zodiac sign is: Virgo</h2>";
                }
            }elseif($_GET['month']=="9"){
                if($_GET['day']<="22"){
                    echo "<h2>Your zodiac sign is: Virgo</h2>";
                }elseif($_GET['day']>="23"){
                    echo "<h2>Your zodiac sign is: Libra</h2>";
                }
            }elseif($_GET['month']=="10"){
                if($_GET['day']<="22"){
                    echo "<h2>Your zodiac sign is: Libra</h2>";
                }elseif($_GET['day']>="23"){
                    echo "<h2>Your zodiac sign is: Scorpio</h2>";
                }
            }elseif($_GET['month']=="11"){
                if($_GET['day']<="21"){
                    echo "<h2>Your zodiac sign is: Scorpio</h2>";
                }elseif($_GET['day']>="22"){
                    echo "<h2>Your zodiac sign is: Sagittarius</h2>";
                }
            }elseif($_GET['month']=="12"){
                if($_GET['day']<="21"){
                    echo "<h2>Your zodiac sign is: Sagittarius</h2>";
                }elseif($_GET['day']>="22"){
                    echo "<h2>Your zodiac sign is: Capricorn</h2>";
                }
            }

        ?>
    </body>
</html>