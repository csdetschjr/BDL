<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $key = $_POST['diagnosiskey'];
    $sampleid = $_POST['sampleid'];
    $sampleid = str_replace("'", "''",$sampleid);
    $diagnosisdate = $_POST['diagnosisdate'];
    $diagnosisdate = str_replace("'", "''", $diagnosisdate);
    $comment = $_POST['comment'];
    $comment = str_replace("'", "''", $diagnosisdate);

    if($key == "AFB"){
        $terramycinreszone = $_POST['terramycinreszone'];
        $terramycinreszone = str_replace("'", "''", $terramycinreszone);
        $tylanreszone = $_POST['tylanreszone'];
        $tylanreszone = str_replace(",", "''", $tylanreszone);
        $myquery ="INSERT INTO bact_diagnosis VALUES
        ('$sampleid','$_POST[diagnosiskey]','$diagnosisdate',
        '$comment','$terramycinreszone','$tylanreszone')";
    }

    else if($key == "VD-B" || $key == "VD-A"){
        $mitecount = $_POST['mitecount'];
        $mitecount = str_replace("'", "''", $mitecount);
        $myquery ="INSERT INTO mite_diagnosis VALUES
        ('$sampleid','$_POST[diagnosiskey]','$diagnosisdate',
        '$comment','$mitecount')";
    }
    else if($key == "NOS"){
        $sporecount = $_POST['sporecount'];
        $sporecount = str_replace("'", "''", $sporecount);
        $myquery ="INSERT INTO fungal_diagnosis VALUES
        ('$sampleid','$_POST[diagnosiskey]','$diagnosisdate',
        '$comment','$sporecount')";
    }
    else{
        $myquery ="INSERT INTO other_diagnosis VALUES
        ('$sampleid','$_POST[diagnosiskey]','$diagnosisdate',
        '$comment')";
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

