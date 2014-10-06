<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $comment = $_POST['comment'];
    $comment = str_replace("'", "''", $comment);
    $subid = $_POST['submissionid'];
    $subid = str_replace("'", "''", $subid);

    $myquery ="INSERT INTO sample VALUES
    ('NULL', '$_POST[sampletype]','$subid','$comment')";
    
    session_start();
    if(!mysql_query($myquery))
    {
        if(!isset($_SESSION['error']))
            $_SESSION['error'] = "set";
    }
    else
        $_SESSION['insert'] = "sample";
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

