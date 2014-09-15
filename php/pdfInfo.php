<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.javascript.js"></script>
<script type="text/javascript" src="../jsPDF-master/jspdf.js"></script>
<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.from_html.js"></script>
<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.png_support.js"></script>
<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.split_text_to_size.js"></script>
<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.addimage.js"></script>
<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.addhtml.js"></script>
<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.autoprint.js"></script>   
<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.cell.js"></script>
<script type="text/javascript" src="../jsPDF-master/jspdf.plugin.standard_fonts_metrics.js"></script>

<script type="text/javascript" src="../js/makePDF.js"></script>
<?php
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);

    $myquery = "SELECT DISTINCT * FROM person ";
    $myquery .= "INNER JOIN submission ON submission.ownerid = person.personalid ";
    $myquery .= "INNER JOIN sample ON sample.submissionid = submission.submissionid ";
    $myquery .= "WHERE sample.sampleid = " . $_POST['sampleid'];

    $result = @mysql_query($myquery, $mydb);
    if($result != FALSE)
    {
        while($row = mysql_fetch_array($result))
        {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $address = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['postalcode'];
            $submissionDate = $row['submissiondate'];
            $notifyDate = $row['notification'];
            $sampleType = $row['sampletype'];
            $submitterID = $row['submitterid'];
            $comment = $row['comment'];
        }
    }
    $myquery = "SELECT DISTINCT * FROM person ";
    $myquery .= "WHERE personalid LIKE " . $submitterID;

    $result = @mysql_query($myquery, $mydb);
    if($result != FALSE)
    {
        while($row = mysql_fetch_array($result))
        {
            $subfname = $row['fname'];
            $sublname = $row['lname'];
            $subaddress = $row['address'];
            $subcity = $row['city'];
            $substate = $row['state'];
            $subzip = $row['postalcode'];
        }
    }

    $diagDate = "";
    $caseComm = "";
    $extraInfo = "";
    $diagKey = "";

    $myquery = "SELECT DISTINCT * FROM bact_diagnosis ";
    $myquery .= "INNER JOIN sample ON sample.sampleid = bact_diagnosis.sampleid ";
    $myquery .= "WHERE sample.sampleid LIKE " . $_POST['sampleid'];
    $result = @mysql_query($myquery, $mydb);
    if($result != FALSE)
    {
        while($row = mysql_fetch_array($result))
        {
            $diagDate = $row['diagnosisdate'];
            $caseComm = $row['casecomment'];
            $extraInfo = "Terramycin Res Zone: " . $row['terraymycinreszone'] . " Tylan Res Zone: " . $row['tylanreszone'] . " ";
            $diagKey = $row['diagnosiskey'];
        }
    }

    $myquery = "SELECT DISTINCT * FROM fungal_diagnosis ";
    $myquery .= "INNER JOIN sample ON sample.sampleid = fungal_diagnosis.sampleid ";
    $myquery .= "WHERE sample.sampleid LIKE " . $_POST['sampleid'];
    $result = @mysql_query($myquery, $mydb);
    if($result != FALSE)
    {
        while($row = mysql_fetch_array($result))
        {
            $diagDate = $row['diagnosisdate'];
            $caseComm = $row['casecomment'];
            $extraInfo = "Spore Count: " . $row['sporecount'] . " ";
            $diagKey = $row['diagnosiskey'];
        }
    }

    $myquery = "SELECT DISTINCT * FROM mite_diagnosis ";
    $myquery .= "INNER JOIN sample ON sample.sampleid = mite_diagnosis.sampleid ";
    $myquery .= "WHERE sample.sampleid LIKE " . $_POST['sampleid'];
    $result = @mysql_query($myquery, $mydb);
    if($result != FALSE)
    {
        while($row = mysql_fetch_array($result))
        {
            $diagDate = $row['diagnosisdate'];
            $caseComm = $row['casecomment'];
            $extraInfo = "Mite Count: " . $row['mitecount'] . " ";
            $diagKey = $row['diagnosiskey'];
        }
    }

    $myquery = "SELECT DISTINCT * FROM other_diagnosis ";
    $myquery .= "INNER JOIN sample ON sample.sampleid = other_diagnosis.sampleid ";
    $myquery .= "WHERE sample.sampleid LIKE " . $_POST['sampleid'];
    $result = @mysql_query($myquery, $mydb);
    if($result != FALSE)
    {
        while($row = mysql_fetch_array($result))
        {
            $diagDate = $row['diagnosisdate'];
            $caseComm = $row['casecomment'];
            $extraInfo = "";
            $diagKey = $row['diagnosiskey'];
        }
    }

    $params = "\"".$fname."\", \"".$lname."\", \"".$address."\", \"".$city."\", \"".$state."\", \"".$zip;
    $params .= "\", \"".$submissionDate."\", \"".$notifyDate."\", \"".$sampleType."\", \"".$comment."\", \"".$subfname;
    $params .= "\", \"".$sublname."\", \"".$subaddress."\", \"".$subcity."\", \"".$substate."\", \"".$subzip;
    $params .= "\", \"".$diagDate."\", \"".$caseComm."\", \"".$extraInfo."\", \"".$diagKey."\"";
?>
<script>
    runPDF(<?php echo $params ?>);
</script>

