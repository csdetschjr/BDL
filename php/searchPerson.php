<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ownerid = $_POST['ownerid'];
    $subid = $_POST['submitterid'];
    $bname = $_POST['businessname'];
    $city = $_POST['city'];
    $pcode = $_POST['postalcode'];
    $phonenum = $_POST['workphone'];
    $email = $_POST['email'];

    $myquery = "SELECT DISTINCT * from person WHERE ";
    $i = 0;
    $arr = array();
    $arr[$i] = " 1 ";
    $i++;
    if(!empty($fname)){
        $arr[$i] = "'$fname' = fname ";
        $i++;
    }

    if(!empty($lname)){
        $arr[$i] = "'$lname' = lname ";
        $i++;
    }
    if(!empty($ownerid)){
        $arr[$i] = "'$ownerid' = personalid ";
        $i++;
    }
    if(!empty($subid)){
        $arr[$i] = "'$subid' = personalid ";
        $i++;
    }
    if(!empty($bname)){
        $arr[$i] = "'$bname' = company ";
        $i++;
    }
    if(!empty($city)){
        $arr[$i] = "'$city' = city ";
        $i++;
    }
    if(!empty($pcode)){
        $arr[$i] = "'$pcode' = postalcode ";
        $i++;
    }
    if(!empty($phonenum)){
        $arr[$i] = "('$phonenum' = workphone OR '$phonenum' = cellphone) ";
        $i++;
    }
    if(!empty($email)){
        $arr[$i] = "'$email' = email ";
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
    $result = @mysql_query($myquery, $mydb);
    
    $table = '<table style="margin:0 auto;" class="CSSTableGenerator" style="margin-left:15px;" border="1px">';
    $table .= '<tr><td>ID</td><td>First Name</td><td>Middle Name</td><td>Last Name</td>'.
              '<td>Suffix</td><td>Company</td><td>Address</td><td>City</td><td>State</td>'.
              '<td>Postal Code</td><td>Country</td><td>Work Phone</td><td>Cell Phone</td>'.
              '<td>Email</td></tr>';
    while( $row = mysql_fetch_array($result) )
    {
         $table .= '<tr>
                <td>'.  $row['personalid'] .'</td>
                <td>'.  $row['fname'] . '</td> 
                <td>'.  $row['mname'] . '</td>
                <td>'.  $row['lname'] . '</td>
                <td>'.  $row['suffix'] . '</td>
                <td>'.  $row['company'] . '</td>
                <td>'.  $row['address'] . '</td>
                <td>'.  $row['city'] . '</td>
                <td>'.  $row['state'] . '</td>
                <td>'.  $row['postalcode'] . '</td>
                <td>'.  $row['country'] . '</td>
                <td>'.  $row['workphone'] . '</td>
                <td>'.  $row['cellphone'] . '</td>
                <td>'.  $row['email'] . '</td>
            </tr>';
    }
    
    $table .= '</table>'; 
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    echo ($table);
    mysql_close($mydb);
?>
 

