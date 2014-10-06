<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $class = str_replace("'", "''", $_POST['class']);
    $descript = str_replace("'", "''", $_POST['description']);
    $key = str_replace("'", "''", $_POST['diagnosiskey1']);
    
    $myquery = "";
    echo($descript ." YEAH");
    if($descript != " "){
        $myquery = "UPDATE "; 
        if($class == "Bacteria"){
            $myquery .= "bacteria ";
        }
        else if($class == "Fungal"){
            $myquery .= "fungal ";
        }
        else if($class == "Mite"){
            $myquery .= "mite ";
        }
        else{
            $myquery .= "other ";
        }
        $myquery .= " SET ";
        $myquery .= " description = '$descript' ";
        $myquery .= " WHERE diagnosiskey = '$key';";
        @mysql_query($myquery, $mydb);
    }

    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

