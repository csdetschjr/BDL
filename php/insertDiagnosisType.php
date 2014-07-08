<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $class = $_POST['class'];
    $diagnosiskey1 = $_POST['diagnosiskey1'];
    $diagnosiskey1 = str_replace("'","''",$diagnosiskey1);
    $description = $_POST['description'];
    $description = str_replace("'","''",$description);
    if($class == "Bacteria"){
        $myquery ="INSERT INTO bacteria VALUES ('$diagnosiskey1','$description')";
    }
    else if($class == "Fungal"){
        $myquery ="INSERT INTO fungal VALUES ('$diagnosiskey1','$description')";
    }
    else if($class == "Mite"){
        $myquery ="INSERT INTO mite VALUES ('$diagnosiskey1','$description')";
    }
    else{
        $myquery ="INSERT INTO other VALUES ('$diagnosiskey1','$description')";
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

