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
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/display.css" rel="stylesheet">
    <link href="css/dropDown.css" rel="stylesheet">

    <link href="TestCss/business-casual.css" rel="stylesheet">
 

    <script src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/updateToggle.js"></script>

  <title>BDL-Update</title>
  </head>
  <body style="background-image:url(background.jpg)">
   <nav class="navbar navbar-default" role="navigation" style="box-shadow: 5px 5px 5px gray; ">
  
  <div class="container-fluid"> 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
           <li><a class="navbar-brand"href="index.php">Home</a></li>
           <li><a class="navbar-brand" href="insert.php">Insert</a><li>
           <li><a class="navbar-brand" href="search.php">Search</a></li>
           <li class="navbar-brand" style="list-style:none;">Update Type: 
           <form id="form">
           <select name="toggle" style="margin:0 auto; color:black; font-size:large;">
                <option>Sample</option>
                <option>Submission</option>
                <option>Person</option>
                <option>Diagnosis</option>
            <!--    <option>Diagnosis Type</option> -->
            </select>
            </form>
          <li>
          <li><a class="navbar-brand" href="delete.php">Delete</a></li>
          <li><a class='navbar-brand' href='php/logout.php'>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
      </br>
  </nav> 
   
  <!-- Begin Sample Update Form -->
  </br>
  </br>
  <form class="form-container" name="sampForm" id="sampForm" action="php/updateSample.php" method="post">
    <fieldset>
    <legend>Update Sample Information:</legend>
    <label>Sample Type:</label>
    <select class="form-field" name="sampletype">
        <option>Smear</option>
        <option>Comb</option>
        <option>Immature Bee</option>
        <option>Adult Bee</option>
        <option>Beetle</option>
        <option>Frass</option>
        <option>Other</option>
    </select>
    <label>Submission ID</label>
    <input class="form-field" type="text" name="submissionid" size="25" maxlength="11" required placeholder="Submission ID (Required)" />
    <label>Sample ID:</label>
    <input class="form-field" type="text" name="sampleid" size="25" maxlength="11" required placeholder="Sample ID (Required)" />
    <label>Comment:</label>
    <textarea class="form-field" name="comment" cols="75" rows="10" maxlength="5000" placeholder="Enter Comment Here..."></textarea>
    </fieldset>
    <fieldset>
    <input class="submit-button" type="submit" />
    </fieldset>
  </form>
  <!-- End Entry Form -->

  <!-- Begin Submission Update Form -->
  <form class="form-container" hidden name="subForm" id="subForm" action="php/updateSubmission.php" method="post">
    <fieldset>
    <legend>Update Submission Information:</legend>
    <label>Submission ID:</label>
    <input class="form-field" type="text" name="submissionid2" maxlength="11" placeholder="Submission ID" />
    <label>Submission Date:</label>
    <input class="form-field" type="text" name="submissiondate" maxlength="10" placeholder="YYYY/MM/DD" />
    <label>Notification Date:</label>
    <input class="form-field" type="text" name="notification" maxlength="10" placeholder="YYYY/MM/DD" />
    <label>Submitter ID:</label>
    <input class="form-field" type="text" name="submitterid" maxlength="11" required placeholder="Submitter ID (Required)" />
    <label>Owner ID:</label>
    <input class="form-field" type="text" name="ownerid" maxlength="11" placeholder="Owner ID"/>
    <input class="submit-button" type="submit" />
    </fieldset>
  </form>
  <!-- End Entry Form -->

  <!-- Begin Person Update Form -->
  <form class="form-container" hidden name="personForm" id="personForm" action="php/updatePerson.php" method="post">
    <fieldset>
    <legend>Update Owner/Submitter Information:</legend>
    <legend style="font-size:large;">Name / Company:</legend>
    <label>Personal ID:</label>
    <input class="form-field" type="text" name="personalid" maxlength="11" required placeholder="ID (Required)" />
    <label>First Name:</label>
    <input class="form-field" type="text" name="fname" maxlength="20" placeholder="First" />
    <label>Middle Name:</label>
    <input class="form-field" type="text" name="mname" maxlength="20" placeholder="Middle" />
    <label>Last Name:</label>
    <input class="form-field" type="text" name="lname" maxlength="20" placeholder="Last" />
    <label>Suffix:</label>
    <input class="form-field" type="text" name="suffix" maxlength="4" placeholder="Suffix"/>
    <label>Company:</label>
    <input class="form-field" type="text" name="company" maxlength="30" placeholder="Company"/></br>
    <legend style="font-size:large;">Address:</legend>
    <label>Street:</label>
    <input class="form-field" type="text" name="address" maxlength="50" placeholder="Street"/>
    <label>City:&nbsp&nbsp&nbsp</label>
    <input class="form-field" type="text" name="city" maxlength="20" placeholder="City"/>
    <label>State:&nbsp</label>
    <input class="form-field" type="text" name="state" maxlength="2" maxlength="2" placeholder="State"/>
    <label>Country:</label>
    <input class="form-field" type="text" name="country" maxlength="50" placeholder="Country"/>
    <label>Postal Code:</label>
    <input class="form-field" type="text" name="postalcode" placeholder="Postal Code"/></br>
    </br>
    <legend style="font-size:large;">Contact Information:</legend>
    <label>Work Phone:</label>
    <input class="form-field" type="text" name="workphone" maxlength="10" placeholder="Work Phone"/>
    <label>Cell Phone:</label>
    <input class="form-field" type="text" name="cellphone" maxlength="10" placeholder="Cell Phone"/>
    <label>Email:</label>
    <input class="form-field" type="text" name="email" maxlength="40" placeholder="Email"/></br>
    <input class="submit-button" type="submit"/>
    </fieldset>
  </form>
  <!-- End Entry Form -->
  
  <!-- Begin Diagnosis Update Form -->
  <form class="form-container" hidden id="diagForm" name="diagForm" action="php/updateDiagnosis.php" method="post">
    <fieldset>
    <legend>Update Diagnosis Information:</legend>
    <label>Diagnosis Type: </label>
    <select class="form-field" id='diagnosiskey' name="diagnosiskey"required>
        <option>NDF</option>
        <option>AFB</option>
        <option>EFB</option>
        <option>VD-B</option>
        <option>CB</option>
        <option>SB</option>
        <option>VD-A</option>
        <option>HBTM</option>
        <option>NOS</option>
        <option>SHB</option>
        <option>GWM</option>
        <option>Other</option>
    </select>
    <label>Sample ID: </label>
    <input class="form-field" type="text" name="sampleid" maxlength="11" required placeholder="Sample ID(Required)" />
    <label>Diagnosis Date: </label>
    <input class="form-field" type="text" name="diagnosisdate" maxlength="10" placeholder="YYYY/MM/DD" />
    <label>Diagnosis By: </label>
    <input class="form-field" type="text" name="diagnosisby" maxlength="50" placeholder="Name of Diagnoser" /> 
    <label>Diagnosis Description: </label>
    <textarea class="form-field" name="description" cols="75" rows="3" maxlength="150" placeholder="Enter Diagnosis Description Here..."></textarea>
    <label style="padding-right:60%;">Extra Information: </label></br>
    <input class="form-field" id="terra" hidden style="padding-left:2%;" maxlength="11" type="text" name="terramycinreszone" placeholder="Terramycin Res Zone"/>
    <input class="form-field" id="tylan" hidden style="padding-left:2%;" maxlength="11" type="text" name="tylanreszone" placeholder="Tylan Res Zone"/>
    <input class="form-field" id="mite" hidden style="padding-left:2%;" maxlength="11" type="text" name="mitecount" placeholder="Mite Count"/>
    <input class="form-field" id="spore" hidden style="padding-left:2%;" type="text" name="sporecount" placeholder="Spore Count"/></br>
    <label>Comment: </label>
    <textarea class="form-field" name="comment" cols="75" rows="10" maxlength="5000" placeholder="Enter Comment Here..."></textarea>
    </br>
    <input class="submit-button" type="submit" />
    </fieldset>
  </form>
  <!-- End Entry Form -->

  <!-- Begin Diagnosis Type Update Form -->
  <form class="form-container" hidden id="dTypeForm" name="dTypeForm" action="php/updateDiagnosisType.php" method="post">
    <fieldset>
    <legend>Update Diagnosis Type Information:</legend>
    <label>Diagnosis Classification: </label>
    <select class="form-field" id='class' name="class" required>
    <option>Bacteria</option>
    <option>Fungal</option>
    <option>Mite</option>
    <option>Other</option>
    </select>
    <label>Diagnosis ID: </label>
    <input class="form-field" id="diagnosiskey1" type="text" name="diagnosiskey1" maxlength="5" required placeholder="Diagnosis Key (Required)" />
    <label>Description: </label>
    <textarea class="form-field" name="description" cols="75" rows="10" maxlength="150" placeholder="Enter Description Here..."></textarea>
    </fieldset>
    <fieldset>
    <input class="submit-button" type="submit" />
    </fieldset>
  </form>
  <!-- End Entry Form -->

   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
