<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        session_start();
        if(!isset($_SESSION['in']))
        {
            echo "<meta http-equiv='refresh' content='0; url=./login.html'/>";
        }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/tables.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/display.css" rel="stylesheet">
    <link href="css/dropDown.css" rel="stylesheet">

    <link href="TestCss/business-casual.css" rel="stylesheet">
    
    <!-- jsPDF -->
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.javascript.js"></script>
    <script type="text/javascript" src="jsPDF-master/jspdf.js"></script>
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.from_html.js"></script>
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.png_support.js"></script>
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.split_text_to_size.js"></script>
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.addimage.js"></script>
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.addhtml.js"></script>
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.autoprint.js"></script>   
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.cell.js"></script>
    <script type="text/javascript" src="jsPDF-master/jspdf.plugin.standard_fonts_metrics.js"></script>
    
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/makePDF.js"></script>
    <script src="js/search.js"></script>

  <title>BDL-Search</title>
  </head>
  <body style="background-image:url(background.jpg)">
   <nav class="navbar navbar-default" role="navigation" style="box-shadow: 5px 5px 5px gray; ">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a class="navbar-brand" href="index.php">Home</a></li>
        <li><a class="navbar-brand" href="insert.php">Insert</a></li>
        <li class="navbar-brand" style="list-style:none;">Search Type:
            <form id="form">
            <select name="toggle" style="margin: 0 auto; color:black; font-size:large; width: 155px;">
                <option>Sample</option>
                <option>Submission</option>
                <option>Person</option>
            </select>
            </form>
      <li>
      <li><a class="navbar-brand" href="update.php">Update</a></li>
      <li><a class="navbar-brand" href="delete.php">Delete</a></li>
      <li><a class='navbar-brand' href='php/logout.php'>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </br>
  </nav> 
   
  </br>
    <div id="display" style="margin:0 auto;">
    </div>
  </br>
  </br>

  <!-- Begin Person Search Form -->
  <form class="form-container" hidden id="personForm" name="personForm" action="php/searchPerson.php" method="post">
      <fieldset>
      <legend>Search for Owner / Submitter:</legend>
      <label>First Name:</label>
      <input class="form-field" id="fname" type="text" maxlength="20" placeholder="First Name" name="fname" />
      <label>Last Name:</label>
      <input class="form-field" id="lname" type="text" maxlength="20" placeholder="Last Name" name="lname" />
      <label>Owner ID:</label>
      <input class="form-field" type="text" maxlength="11" placeholder="Owner ID" name="ownerid" />
      <label>Submitter ID:</label>
      <input class="form-field" type="text" maxlength="11" placeholder="Submitter ID" name="submitterid" />
      <label>Business Name:</label>
      <input class="form-field" type="text" maxlength="30" placeholder="Business Name" name="businessname" />
      <label>City:&nbsp&nbsp</label>
      <input class="form-field" type="text" maxlength="20" placeholder="City" name="city" />
      <label>Postal Code:</label>
      <input class="form-field" type="text" maxlength="5" placeholder="Postal Code" name="postalcode" />
      <label>Work/Cell Phone Number:</label>
      <input class="form-field" type="text" maxlength="8" placeholder="Phone Number" id="workphone" name="workphone" />
      <label>Email:</label>
      <input class="form-field" type="text" maxlength="40" placeholder="Email" id="email" name="email" />
      </fieldset>
      <input class="submit-button" id='submit1' type="submit" />
      </br>
      </br>
  </form>
  <!-- End Entry Form -->

  <!-- Begin Sample Search Form -->
  <form class="form-container" id="sampleForm" action="php/searchSample.php" method="post">
      <fieldset>
      <legend>Search for Sample:</legend> 
      <label>Sample ID:</label>
      <input class="form-field" id="sampleid" type="text" maxlength="11" placeholder="Sample ID" name="sampleid" />
      <label>Sample Type:</label>
      <select class="form-field" id="sampletype" name="sampletype">
        <option value="">Select Type</option>
        <option>Smear</option>
        <option>Comb</option>
        <option>Immature Bee</option>
        <option>Adult Bee</option>
        <option>Beetle</option>
        <option>Frass</option>
        <option>Other</option>
      </select>
      <label>Submission ID:</label>
      <input class="form-field" id="submissionid" type="text" maxlength="11" placeholder="Submission ID" name="submissionid" />
      </fieldset>
      </br>
      <input class="submit-button" id='submit2' type="submit"/>
      </br>
      </br>
  </form>
  <!-- End Entry Form -->

  <!-- Begin Submission Search Form -->
  <form class="form-container" hidden id="subForm" action="php/searchSubmission.php" method="post">
      <fieldset>
      <legend>Search for Submission:</legend>
      <label>Submission ID:</label>
      <input class="form-field" id="submissionid2" type="text" maxlength="11" placeholder="Submission ID" name="submissionid2" />
      <label>Submission Date:</label>
      <input class="form-field" id="submissiondate" type="text" maxlength="10" placeholder="YYYY/MM/DD" name="submissiondate" />
      <label>Notification Date:</label>
      <input class="form-field" id="notification" type="text" maxlength="10" placeholder="YYYY/MM/DD" name="notification" />
      <label>Submitter ID:</label>
      <input class="form-field" id="submitterid2" type="text" maxlength="11" placeholder="Submitter ID" name="submitterid2" />
      <label>Owner ID:</label>
      <input class="form-field" id="ownerid2" type="text" maxlength="11" placeholder="Owner ID" name="ownerid2" />
      </fieldset>
      <input class="submit-button" id='submit3' type="submit"/>
      </br>
      </br>
  </form> 

  <!-- End Entry Form -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
