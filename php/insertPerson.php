<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $myquery ="INSERT INTO person VALUES
    ('$_POST[fname]','$_POST[mname]','$_POST[lname]','$_POST[suffix]',
    '$_POST[company]','$_POST[address]','$_POST[city]','$_POST[state]',
    '$_POST[postalcode]','$_POST[country]', '$_POST[workphone]',
    '$_POST[cellphone]','$_POST[email]', NULL)";

    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

