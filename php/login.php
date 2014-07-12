<?php
    echo 'This is where username/password verification happens'; 
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    if($_POST['username'] == "username" && $_POST['password'] == "password")
    {
        echo "worked";
        session_start();
        $_SESSION['in'] = "set";
    }
    header("../index.php");
    echo '  header test';
?>
