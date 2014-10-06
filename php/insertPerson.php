<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $fname = str_replace("'", "''", $_POST['fname']);
    $mname = str_replace("'", "''", $_POST['mname']);
    $lname = str_replace("'", "''", $_POST['lname']);
    $suffix = str_replace("'", "''", $_POST['suffix']);
    $company = str_replace("'", "''", $_POST['company']);
    $address = str_replace("'", "''", $_POST['address']);
    $city = str_replace("'", "''", $_POST['city']);
    $state = str_replace("'", "''", $_POST['state']);
    $postalcode = str_replace("'", "''", $_POST['postalcode']);
    $country = str_replace("'", "''", $_POST['country']);
    $workphone = str_replace("'", "''", $_POST['workphone']);
    $cellphone = str_replace("'", "''", $_POST['cellphone']);
    $email = str_replace("'", "''", $_POST['email']);


    $myquery ="INSERT INTO person VALUES
    ('$fname','$mname','$lname','$suffix',
    '$company','$address','$city','$state',
    '$postalcode','$country', '$workphone',
    '$cellphone','$email', NULL)";

    session_start();
    if(!mysql_query($myquery))
    { 
        if(!isset($_SESSION['error']))
            $_SESSION['error'] = "set";
    }
    else
        $_SESSION['insert'] = "person";
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

