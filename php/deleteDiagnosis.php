<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $key = str_replace("'", "''", $_POST['diagid']);
    $sampleid = str_replace("'", "''", $_POST['sampid']);
    $diagDate = str_replace("'", "''", $_POST['diagnosisdate']);
    
    $arr = array();
    $i = 0;
    $myquery = "";
    if($key == "AFB"){
        $myquery = "DELETE FROM bact_diagnosis WHERE ";
    }
    else if($key == "NOS"){
        $myquery = "DELETE FROM fungal_diagnosis WHERE ";
    }
    else if($key == "VD-A" || $key == "VD-B"){
        $myquery = "DELETE FROM mite_diagnosis WHERE ";
    }
    else{
        $myquery = "DELETE FROM other_diagnosis WHERE ";
    }

    if(!empty($key)){
        $arr[$i]= " diagnosiskey = '$key' ";
        $i++;
    }
    if(!empty($diagDate)){
        $arr[$i]= " diagnosisdate = '$diagDate' ";
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

    if(!empty($key) || !empty($sampleid) || !empty($diagDate)){
        @mysql_query($myquery, $mydb);
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

