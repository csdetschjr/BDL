<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);


    $subid = str_replace("'", "''", $_POST['submissionid1']);
    $subdate = str_replace("'", "''", $_POST['submissiondate']);
    $notif = str_replace("'", "''", $_POST['notifcation']);
    $submitterid = str_replace("'", "''", $_POST['submitterid']);
    $ownerid = str_replace("'", "''", $_POST['ownerid']);
    
    $myquery = "DELETE FROM submission WHERE ";
    $arr = array();
    $i = 0;
    if(!empty($subid)){
        $arr[$i] = " submissionid = '$subid' ";
        $i++;
    }
    if(!empty($subdate)){
        $arr[$i] = " submissiondate = '$subdate' ";
        $i++;
    }
    if(!empty($notif)){
        $arr[$i] = " notification = '$notif' ";
        $i++;
    }
    if(!empty($submitterid)){
        $arr[$i] = " submitterid = '$submitterid' ";
        $i++;
    }
    if(!empty($ownerid)){
        $arr[$i] = " ownerid = '$ownerid' ";
        $i++;
    }

    $j = 0;
    $size = sizeof($arr);
    while($j < $size){
        $myquery .= $arr[$j];
        if($j + 1 != $size){
            $myquery .= " AND ";
        }
        $j++;
    }
    $myquery .= ";";
    if(!empty($subid) || !empty($subdate) || !empty($notif) || !empty($submitterid) || !empty($ownerid)){
        @mysql_query($myquery);
    }
    if(!mysql_query($myquery))
    {
      die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

