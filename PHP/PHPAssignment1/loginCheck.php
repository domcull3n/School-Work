<?php
    session_start();
    require_once('dbConnection.php');
    $db = getDBConnection();

    $username=$_POST['myusername'];
    $password=$_POST['mypassword'];

    $username = stripslashes($username);
    $password = stripslashes($password);
    //$username = mysql_real_escape_string($username);
    //$password = mysql_real_escape_string($password);
    $password = hash('sha256', $password);

    $sqlStatement="SELECT * FROM users WHERE username='$username' and pswd='$password'";
    $result= mysqli_query($db,$sqlStatement);

    $count = mysqli_num_rows($result);

    if($count==1)
    {
        $_SESSION['LoginUser'] = $username;
        $_SESSION['LoginPwd'] = $password;
        header("location:index.php");
    }else{
        echo "<h1>Wrong Username or Password</h1>";
        echo "<a href='login.php'>Return to login</a>";
    }

