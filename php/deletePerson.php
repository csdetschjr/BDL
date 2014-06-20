<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = $_POST['personalid'];

    $myquery = "DELETE FROM person WHERE ";
    $arr = array();
    $i = 0;

    if(!empty($fname)){
        $arr[$i]= "fname = '$fname' ";
        $i++;
    }
    if(!empty($lname)){
        $arr[$i]= "lname = '$lname' ";
        $i++;
    }
    if(!empty($id)){
        $arr[$i]= "personalid = '$id' ";
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
    if(!empty($fname) || !empty($lname) || !empty($id)){
        @mysql_query($myquery);
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

