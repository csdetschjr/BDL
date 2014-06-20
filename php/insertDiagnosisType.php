<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $class = $_POST['class'];
    
    if($class == "Bacteria"){
        $myquery ="INSERT INTO bacteria VALUES ('$_POST[diagnosiskey1]','$_POST[description]')";
    }
    else if($class == "Fungal"){
        $myquery ="INSERT INTO fungal VALUES ('$_POST[diagnosiskey1]','$_POST[description]')";
    }
    else if($class == "Mite"){
        $myquery ="INSERT INTO mite VALUES ('$_POST[diagnosiskey1]','$_POST[description]')";
    }
    else{
        $myquery ="INSERT INTO other VALUES ('$_POST[diagnosiskey1]','$_POST[description]')";
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

