<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $sampletype = str_replace("'", "''", $_POST['sampletype']);
    $submissionid = str_replace("'", "''", $_POST['submissionid']);
    $comment = str_replace("'", "''", $_POST['comment']);
    $sampleid = str_replace("'", "''", $_POST['sampleid']);
    $myquery ="UPDATE sample SET ";
    $i = 0;
    $arr = array();
    
    if(!empty($sampletype)){
        $arr[$i] = "sampletype = '$sampletype'";
        $i++;
    }
    if(!empty($submissionid)){
        $arr[$i] = "submissionid = '$submissionid'";
        $i++;
    }
    if(!empty($comment)){
        $arr[$i] = "comment = '$comment'";
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

    $myquery .= " WHERE sampleid = '$sampleid';";

    if(!empty($sampletype) || !empty($sampleid) || !empty($submissionid) || !empty($comment)){
       @mysql_query($myquery, $mydb); 
    }

    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

