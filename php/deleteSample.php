<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $subID = str_replace("'", "''", $_POST['submissionid']);
    $sampID = str_replace("'", "''", $_POST['sampleid']);

    $myquery = "DELETE FROM sample WHERE ";
    $arr = array();
    $i = 0;
    if(!empty($subID)){
        $arr[$i] = " submissionid = '$subID' ";
        $i++;
    }
    if(!empty($sampID)){
        $arr[$i] = " sampleid = '$sampID' ";
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
    if(!empty($subID) || !empty($sampID)){
        @mysql_query($myquery);
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

