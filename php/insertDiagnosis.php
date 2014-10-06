<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $key = $_POST['diagnosiskey'];
    $sampleid = str_replace("'", "''", $_POST['sampleid']);
    $diagnosisdate = str_replace("'", "''", $_POST['diagnosisdate']);
    $diagnosisBy = str_replace("'", "''", $_POST['diagnosisby']);
    $description = str_replace("'", "''", $_POST['description']);
    $comment = str_replace("'", "''", $_POST['comment']);

    if($key == "AFB"){
        $terramycinreszone = $_POST['terramycinreszone'];
        $terramycinreszone = str_replace("'", "''", $terramycinreszone);
        $tylanreszone = $_POST['tylanreszone'];
        $tylanreszone = str_replace(",", "''", $tylanreszone);
        $myquery ="INSERT INTO bact_diagnosis VALUES
        (NULL, '$sampleid','$_POST[diagnosiskey]','$diagnosisdate',
        '$comment','$terramycinreszone','$tylanreszone','$diagnosisBy', '$description')";
    }
    else if($key == "VD-B" || $key == "VD-A"){
        $mitecount = $_POST['mitecount'];
        $mitecount = str_replace("'", "''", $mitecount);
        $myquery ="INSERT INTO mite_diagnosis VALUES
        (NULL,'$sampleid','$_POST[diagnosiskey]','$diagnosisdate',
        '$comment','$mitecount','$diagnosisBy','$description')";
    }
    else if($key == "NOS"){
        $sporecount = $_POST['sporecount'];
        $sporecount = str_replace("'", "''", $sporecount);
        $myquery ="INSERT INTO fungal_diagnosis VALUES
        (NULL, '$sampleid','$_POST[diagnosiskey]','$diagnosisdate',
        '$comment','$sporecount','$diagnosisBy','$description')";
    }
    else{
        $myquery ="INSERT INTO other_diagnosis VALUES
        (NULL, '$sampleid','$_POST[diagnosiskey]','$diagnosisdate',
        '$comment','$diagnosisBy','$description')";
    }
    if(!mysql_query($myquery))
    {
        session_start();
        if(!isset($_SESSION['error']))
            $_SESSION['error'] = "set";
    }
    mysql_close($mydb);
    echo $myquery;
?>
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

