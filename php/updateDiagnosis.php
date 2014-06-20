<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $key = $_POST['diagnosiskey'];
    $sampleid = $_POST['sampleid'];
    $diagDate = $_POST['diagnosisdate'];
    $comment = $_POST['comment'];
    $terraZone = $_POST['terramycinreszone'];
    $tylanZone = $_POST['tylanreszone'];
    $sporecount = $_POST['sporecount'];
    $mitecount = $_POST['mitecount'];
    
    $arr = array();
    $i = 0;
    $myquery = "";
    if($key == "AFB"){
        $myquery = "UPDATE bact_diagnosis SET ";
        
        if(!empty($terraZone)){
            $arr[$i] = " terraymycinreszone = '$terraZone'";
            $i++;
        }
        if(!empty($tylanZone)){
            $arr[$i]= " tylanreszone = '$tylanZone'";
            $i++;
        }
    }
    else if($key == "NOS"){
        $myquery = "UPDATE fungal_diagnosis SET ";

        if(!empty($sporecount)){
            $arr[$i]= " sporecount = '$sporecount' ";
            $i++;
        }
    }
    else if($key == "VD-A" || $key == "VD-B"){
        $myquery = "UPDATE mite_diagnosis SET ";

        if(!empty($mitecount)){
            $arr[$i]= " mitecount = '$mitecount' ";
            $i++;
        }
    }
    else{
        $myquery = "UPDATE other_diagnosis SET ";
    }

    if(!empty($key)){
        $arr[$i]= " diagnosiskey = '$key' ";
        $i++;
    }
    if(!empty($diagDate)){
        $arr[$i]= " diagnosisdate = '$diagDate' ";
        $i++;
    }
    if($comment != " "){
        $arr[$i]= " casecomment = '$comment' ";
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

    echo($myquery);
    if(!empty($key)){
        @mysql_query($myquery, $mydb);
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

