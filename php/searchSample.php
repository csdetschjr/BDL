<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $sampleid = $_POST['sampleid'];
    $sampletype = $_POST['sampletype'];
    $subid = $_POST['submissionid'];
    $myquery = "SELECT DISTINCT * from sample WHERE ";
    $i = 0;
    $arr = array();
    $arr[$i] = " 1 ";
    $i++;
    if(!empty($sampleid)){
        $arr[$i] = " '$sampleid' = sampleid ";
        $i++;
    }
    if(!empty($sampletype)){
        $arr[$i] = " '$sampletype' = sampletype ";
        $i++;
    }
    if(!empty($subid)){
        $arr[$i] = " '$subid' = submissionid ";
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
    $table .= '<tr><td>Sample ID</td><td>Type</td><td>Submission ID</td>'.
              '<td>Comment</td><td>Diagnosis Type</td><td>Generate PDF</td></tr>';
    $sampEntered = !empty($sampleid);
    if($sampEntered){
        $bactQuery = "SELECT * FROM bact_diagnosis WHERE sampleid = '$sampleid';";
        $fungalQuery = "SELECT * FROM fungal_diagnosis WHERE sampleid = '$sampleid';";
        $miteQuery = "SELECT * FROM mite_diagnosis WHERE sampleid = '$sampleid';";
        $otherQuery = "SELECT * FROM other_diagnosis WHERE sampleid = '$sampleid';";
    }
    else{
        $bactQuery = "SELECT * FROM bact_diagnosis;";
        $fungalQuery = "SELECT * FROM fungal_diagnosis;";
        $miteQuery = "SELECT * FROM mite_diagnosis;";
        $otherQuery = "SELECT * FROM other_diagnosis;";
    }
     
    while( $row = mysql_fetch_array($result) )
    {
        $bactRes = @mysql_query($bactQuery, $mydb);
        $fungalRes = @mysql_query($fungalQuery, $mydb);
        $miteRes = @mysql_query($miteQuery, $mydb);
        $otherRes = @mysql_query($otherQuery, $mydb);
        $otherRows = mysql_num_rows($otherRes) >= 1;
        $bactRows = mysql_num_rows($bactRes) >= 1;
        $fungRows = mysql_num_rows($fungalRes) >= 1;
        $miteRows = mysql_num_rows($miteRes) >= 1; 

        $table .= '<tr>
                <td>'.  $row['sampleid'] . '</td> 
                <td>'.  $row['sampletype'] . '</td>
                <td>'.  $row['submissionid'] . '</td>
                <td>'.  $row['comment'] .'</td>';
                 
                $table .= '<td>';
                if($otherRows){
                    while($inRow = mysql_fetch_array($otherRes)){
                         if($inRow['sampleid'] == $row['sampleid']){
                            $table .= '' . $inRow['diagnosiskey'] . '';
                            $table .= ", ";
                         }
                    }
                }

                if($bactRows){
                    while($inRow = mysql_fetch_array($bactRes)){
                         if($inRow['sampleid'] == $row['sampleid']){
                             $table .= '' . $inRow['diagnosiskey'] . '';
                             $table .= ", ";
                         }
                    }
                } 

                if($fungRows){
                    while($inRow = mysql_fetch_array($fungalRes)){
                         if($inRow['sampleid'] == $row['sampleid']){
                            $table .= '' . $inRow['diagnosiskey'] . '';
                            $table .= ", ";
                         }
                    }
                }

                if($miteRows){
                    while($inRow = mysql_fetch_array($miteRes)){
                         if($inRow['sampleid'] == $row['sampleid']){
                            $table .= '' . $inRow['diagnosiskey'] . '';
                            $table .= ", ";
                          }
                    }
                }
                if(!$miteRows && !$fungRows && !$bactRows && !$otherRows){
                        $table .= '----';
                }
                $table .= '</td>';
                $table .= '<td><form action="php/pdfInfo.php" method="post"><button type="submit" name="sampleid" value="' . $row['sampleid'] . '">Generate PDF</button></form></td>';
         $table .= '</tr>'; 
    }
    
    $table .= '</table>'; 
    if(!mysql_query($myquery))
    {
        die('Error: ' . mysql_error());
    }
    echo ($table);
    mysql_close($mydb);
?>
 

