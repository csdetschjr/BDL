<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $myquery ="INSERT INTO submission VALUES
    (NULL, '$_POST[submissiondate]','$_POST[notification]','$_POST[submitterid]','$_POST[ownerid]')";


    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>
