<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $myquery ="UPDATE submission SET submissiondate = '$_POST[submissiondate]',
               notification = '$_POST[notification]', submitterid = '$_POST[submitterid]',
               ownerid = '$_POST[ownerid]' 
               WHERE submissionid = $_POST[submissionid2]";

    $submissiondate = $_POST['submissiondate'];
    $notif = $_POST['notification'];
    $submitterid = $_POST['submitterid'];
    $ownerid =$_POST['ownerid'];
    $submissionid = $_POST['submissionid2'];
    $myquery ="UPDATE submission SET ";

    $i = 0;
    $arr = array();

    if(!empty($submissiondate)){
        $arr[$i] = "submissiondate = '$submissiondate'";
        $i++;
    }
    if(!empty($notif)){
        $arr[$i] = "notification = '$notif'";
        $i++;
    }
    if(!empty($submitterid)){
        $arr[$i] = "submitterid = '$submitterid'";
        $i++;
    }
    if(!empty($ownerid)){
        $arr[$i] = "ownerid = '$ownerid'";
        $i++;
    }

    $j = 0;
    $size = sizeof($arr);
    while($j < $size){
        $myquery .= $arr[$j];
        if($j + 1 != $size){
            $myquery .= " , ";
        }
        $j++;
    }
    $myquery .= " WHERE submissionid = '$submissionid';";

    if(!empty($submissiondate) || !empty($notif) || !empty($submitterid)
       || !empty($ownerid) || !empty($submissionid)){
       @mysql_query($myquery, $mydb);
    }
 


    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
     }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

