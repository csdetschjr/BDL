<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $key = $_POST['key'];
    
    $myquery = "Select distinct "
    if($key == 'AFB'){
        $myquery .= "s.sampleid, s.comment, b.casecomment from sample as s, bact_diagnosis as b where s.sampleid = b.sampleid;"    
    }
    else if($key == 'NOS'){
        $myquery .= "s.sampleid, s.comment, f.casecomment from sample as s, fungal_diagnosis as f where s.sampleid = f.sampleid;"
    }
    else if($key == 'VD-A' || $key == 'VD-B'){
        $myquery .= "s.sampleid, s.comment, m.casecomment from sample as s, mite_diagnosis as m where s.sampleid = m.sampleid;"
    }
    else{
        $myquery .= "s.sampleid, s.comment, o.casecomment from sample as s, other_diagnosis as o where s.sampleid = o.samplide and o.diagnosiskey = '$key';"
    }
    $result = @mysql_query($myquery, $mydb);
    
    $table = '<table style="margin:0 auto;" class="CSSTableGenerator" style="margin-left:15px;" border="1px">';
    $table .= '<tr><td>ID</td><td>Sample Comment</td><td>Case Comment</td></tr>';
    while( $row = mysql_fetch_array($result) )
    {
         $table .= '<tr>
                <td>'.  $row['sampleid'] .'</td>
                <td>'.  $row['comment'] . '</td> 
                <td>'.  $row['casecomment'] . '</td>
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
 

