<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    /*$myquery ="UPDATE person SET fname = '$_POST[fname]',
               mname = '$_POST[mname]', lname = '$_POST[lname]',
               suffix = '$_POST[suffix]', company = '$_POST[company]',
               address = '$_POST[address]', city = '$_POST[city]', state = '$_POST[state]',
               postalcode = '$_POST[postalcode]', country = '$_POST[country]', workphone = '$_POST[workphone]',
               cellphone = '$_POST[cellphone]', email = '$_POST[email]'
               WHERE personalid = '$_POST[personalid]'";
    */
    
    $fname = str_replace("'", "''", $_POST['fname']);
    $mname = str_replace("'", "''", $_POST['mname']);
    $lname = str_replace("'", "''", $_POST['lname']);
    $suffix = str_replace("'", "''", $_POST['suffix']);
    $company = str_replace("'", "''", $_POST['company']);
    $address = str_replace("'", "''", $_POST['address']);
    $city = str_replace("'", "''", $_POST['city']);
    $state = str_replace("'", "''", $_POST['state']);
    $postalcode = str_replace("'", "''", $_POST['postalcode']);
    $country = str_replace("'", "''", $_POST['country']);
    $workphone = str_replace("'", "''", $_POST['workphone']);
    $cellphone = str_replace("'", "''", $_POST['cellphone']);
    $email = str_replace("'", "''", $_POST['email']);
    $personalid = str_replace("'", "''", $_POST['personalid']);
    
    $myquery = "UPDATE person SET ";
    $i = 0;
    $arr = array();
    
    if(!empty($fname)){
        $arr[$i] = "fname = '$fname'";
        $i++;
    }
    if(!empty($mname)){
        $arr[$i] = "mname = '$mname'";
        $i++;
    }
    if(!empty($lname)){
        $arr[$i] = "lname = '$lname'";
        $i++;
    }
    if(!empty($suffix)){
        $arr[$i] = "suffix = '$suffix'";
        $i++;
    }
    if(!empty($company)){
        $arr[$i] = "company = '$company'";
        $i++;
    }
    if(!empty($address)){
        $arr[$i] = "address = '$address'";
        $i++;
    }
    if(!empty($city)){
        $arr[$i] = "city = '$city'";
        $i++;
    }
    if(!empty($state)){
        $arr[$i] = "state = '$state'";
        $i++;
    }
    if(!empty($postalcode)){
        $arr[$i] = "postalcode = '$postalcode'";
        $i++;
    }
    if(!empty($country)){
        $arr[$i] = "country = '$country'";
        $i++;
    }
    if(!empty($workphone)){
        $arr[$i] = "workphone = '$workphone'";
        $i++;
    }
    if(!empty($cellphone)){
        $arr[$i] = "cellphone = '$cellphone'";
        $i++;
    }
    if(!empty($email)){
        $arr[$i] = "email = '$email'";
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
    
    $myquery .= " WHERE personalid = '$personalid';";
    
    if(!empty($fname) || !empty($mname) || !empty($lname) || !empty($suffix)
       || !empty($company) || !empty($address) || !empty($city) || !empty($state) 
       || !empty($postalcode) || !empty($country) || !empty($workphone) || !empty($cellphone)
       || !empty($email)){
        @mysql_query($myquery, $mydb);
    }
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($mydb);
?> 
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

