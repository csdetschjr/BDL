<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $submissiondate = str_replace("'", "''", $_POST['submissiondate']);
    $notification = str_replace("'", "''", $_POST['notification']);
    $submitterid = str_replace("'", "''", $_POST['submitterid']);
    $ownerid = str_replace("'", "''", $_POST['ownerid']);

    $myquery ="INSERT INTO submission VALUES
    (NULL, '$submissiondate','$notification','$submitterid','$ownerid')";
    
    session_start();
    if(!mysql_query($myquery))
    { 
        if(!isset($_SESSION['error']))
            $_SESSION['error'] = "set";
    }
    else
        $_SESSION['insert'] = "submission";           
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

