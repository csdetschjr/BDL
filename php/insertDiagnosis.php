<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $key = $_POST['diagnosiskey'];

    if($key == "AFB"){
        $myquery ="INSERT INTO bact_diagnosis VALUES
        ('$_POST[sampleid]','$_POST[diagnosiskey]','$_POST[diagnosisdate]',
        '$_POST[comment]','$_POST[terramycinreszone]','$_POST[tylanreszone]')";
    }

    else if($key == "VD-B" || $key == "VD-A"){
        $myquery ="INSERT INTO mite_diagnosis VALUES
        ('$_POST[sampleid]','$_POST[diagnosiskey]','$_POST[diagnosisdate]',
        '$_POST[comment]','$_POST[mitecount]')";
    }
    else if($key == "NOS"){
        $myquery ="INSERT INTO fungal_diagnosis VALUES
        ('$_POST[sampleid]','$_POST[diagnosiskey]','$_POST[diagnosisdate]',
        '$_POST[comment]','$_POST[sporecount]')";
    }
    else{
        $myquery ="INSERT INTO other_diagnosis VALUES
        ('$_POST[sampleid]','$_POST[diagnosiskey]','$_POST[diagnosisdate]',
        '$_POST[comment]')";
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

