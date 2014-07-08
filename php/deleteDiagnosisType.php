<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $class = $_POST['class'];
    $diagnosiskey1 = str_replace("'", "''", $_POST['diagnosiskey1']);
        
    if($class == "Bacteria"){
        $myquery ="DELETE FROM bacteria WHERE diagnosiskey = '$diagnosiskey1'";
    }
    else if($class == "Fungal"){
        $myquery ="DELETE FROM fungal WHERE diagnosiskey = '$diagnosiskey1'";
    }
    else if($class == "Mite"){
        $myquery ="DELETE FROM mite WHERE diagnosiskey = '$diagnosiskey1'";
    }
    else{
        $myquery ="DELETE FROM other WHERE diagnosiskey = '$diagnosiskey1'";
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

