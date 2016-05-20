<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/14/15
 * Time: 9:12 AM
 */
session_start();
session_destroy();
header("location:login.php");
