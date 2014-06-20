<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $class = $_POST['class'];
    
    if($class == "Bacteria"){
        $myquery ="DELETE FROM bacteria WHERE diagnosiskey = '$_POST[diagnosiskey1]'";
    }
    else if($class == "Fungal"){
        $myquery ="DELETE FROM fungal WHERE diagnosiskey = '$_POST[diagnosiskey1]'";
    }
    else if($class == "Mite"){
        $myquery ="DELETE FROM mite WHERE diagnosiskey = '$_POST[diagnosiskey1]'";
    }
    else{
        $myquery ="DELETE FROM other WHERE diagnosiskey = '$_POST[diagnosiskey1]'";
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

