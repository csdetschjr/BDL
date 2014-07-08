<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $fname = str_replace("'", "''", $_POST['fname']);
    $mname = str_replace("'", "''", $_POST['mname']);
    $lname = str_replace("'", "''", $_POST['lname']);
    $suffix = str_replace("'", "''", $POST['suffix']);
    $company = str_replace("'", "''", $POST['company']);
    $address = str_replace("'", "''", $POST['address']);
    $city = str_replace("'", "''", $POST['city']);
    $state = str_replace("'", "''", $POST['state']);
    $postalcode = str_replace("'", "''", $POST['postalcode']);
    $country = str_replace("'", "''", $POST['country']);
    $workphone = str_replace("'", "''", $POST['workphone']);
    $cellphone = str_replace("'", "''", $POST['cellphone']);
    $email = str_replace("'", "''", $POST['email']);


    $myquery ="INSERT INTO person VALUES
    ('$fname','$mname','$lname','$suffix',
    '$company','$address','$city','$state',
    '$postalcode','$country', '$workphone',
    '$cellphone','$email', NULL)";

    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

