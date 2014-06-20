<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $submissionid = $_POST['submissionid2'];
    $subdate = $_POST['submissiondate'];
    $notif = $_POST['notification'];
    $submitterid = $_POST['submitterid2'];
    $ownerid = $_POST['ownerid2'];
    
    /*$myquery = "SELECT DISTINCT * from submission WHERE '$submissionid' = submissionid OR '$subdate' = submissiondate
               OR '$notif' = notification OR '$submitterid' = submitterid OR '$ownerid' = ownerid"; 
     */          

    $myquery = "SELECT DISTINCT * from submission WHERE ";
    $i = 0;
    $arr = array();
    $arr[$i] = " 1 ";
    $i++;
    
    if(!empty($submissionid)){
        $arr[$i] = "'$submissionid' = submissionid";
        $i++;
    }
    if(!empty($subdate)){
        $arr[$i] = "'$subdate' = submissiondate";
        $i++;
    }
    if(!empty($notif)){
        $arr[$i] = "'$notif' = notification";
        $i++;
    }
    if(!empty($submitterid)){
        $arr[$i] = "'$submitterid' = submitterid";
        $i++;
    }
    if(!empty($ownerid)){
        $arr[$i] = "'$ownerid' = ownerid";
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
    $result = @mysql_query($myquery, $mydb);
    
    $table = '<table style="margin:0 auto;" class="CSSTableGenerator" style="margin-left:15px;" border="1px">';
    $table .= '<tr><td>Submission ID</td> <td>Submission Date</td>'.
              '<td>Notification Date</td> <td>Submitter ID</td> <td>Owner ID</td></tr>';
    while( $row = mysql_fetch_array($result) )
    {
         $table .= '<tr>
                <td>'.  $row['submissionid'] . '</td> 
                <td>'.  $row['submissiondate'] . '</td>
                <td>'.  $row['notification'] . '</td>
                <td>'.  $row['submitterid'] .'</td>
                <td>'.  $row['ownerid'] .'</td>
            </tr>';
    }
    
    $table .= '</table>'; 
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    echo ($table);
    mysql_close($mydb);
?>
 

