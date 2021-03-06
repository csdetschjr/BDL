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
    <!-- Booif(!isset($_SESSION['in']))tstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/display.css" rel="stylesheet">
    <link href="css/dropDown.css" rel="stylesheet">
    
    <link href="TestCss/business-casual.css" rel="stylesheet">

    <script src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/updateToggle.js"></script>
    <script type="text/javascript" src="js/diagnosis.js"></script>
  <title>BDL-Delete</title>
  </head>
  <body style="background-image:url(background.jpg)">
   <nav class="navbar navbar-default" role="navigation" style="box-shadow: 5px 5px 5px gray; ">
  
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a class="navbar-brand"href="index.php">Home</a></li>
           <li><a class="navbar-brand" href="insert.php">Insert</a></li>
           <li><a class="navbar-brand" href="search.php">Search</a></li>
           <li><a class="navbar-brand" href="update.php">Update</a></li>
           <li class="navbar-brand" style="list-style:none;">Delete Type:
             <form id="form">
               <select name="toggle" style="margin:0 auto; color:black; font-size:large;">
                    <option>Sample</option>
                    <option>Submission</option>
                    <option>Person</option>
                    <option>Diagnosis</option>
               <!--     <option>Diagnosis Type</option> -->
               </select>
             </form>
             <li><a class='navbar-brand' href='php/logout.php'>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </br>
  </nav> 
   
  <!-- Begin Sample Delete Form -->
  </br>
  </br>
  <form style="box-shadow: 10px 10px 10px #006B6B;" name="sampForm" id="sampForm" action="php/deleteSample.php" method="post" class="form-container">
    <legend style="color:white;">Delete Sample Information:</legend>
    <fieldset>
    <!--
    <label>Submission ID:</label>
    <input class="form-field" type="text" name="submissionid" maxlength="11"size="25" placeholder="Submission ID" />
    -->
    <label>Sample ID:</label>
    <input class="form-field" type="text" name="sampleid" maxlength="11"size="25" placeholder="Sample ID" />
    <input class="submit-button" type="submit"/>
    </fieldset>
  </form>
  <!-- End Delete Form -->

  <!-- Begin Submission Delete Form -->
  <form hidden class="form-container" name="subForm" id="subForm" action="php/deleteSubmission.php" method="post">
    <fieldset>
    <legend style="color:white;">Delete Submission Information:</legend>
    <label>Submission ID:</label>
    <input class="form-field" type="text" name="submissionid1" maxlength="11"size="25" placeholder="Submission ID" />
    <!--
    <label>Submission Date: </label>
    <input class="form-field" type="text" name="submissiondate" maxlength="10" placeholder="YYYY/MM/DD" />
    <label>Notification Date: </label>
    <input class="form-field" type="text" name="notification" maxlength="10" placeholder="YYYY/MM/DD" />
    <label>Submitter ID: </label>
    <input class="form-field" type="text" name="submitterid" maxlength="11" placeholder="Submitter ID" />
    <label>Owner ID: </label>
    <input class="form-field" type="text" name="ownerid" maxlength="11"  placeholder="Owner ID"/>
    -->
    <input class="submit-button" type="submit" />
    </fieldset>
  </form>
  <!-- End Delete Form -->

  <!-- Begin Person Delete Form -->
  <form hidden class="form-container" name="personForm" id="personForm" action="php/deletePerson.php" method="post">
    <fieldset>
    <legend >Delete Owner/Submitter Information:</legend>
    <label>Personal ID: </label>
    <input class="form-field" type="text" name="personalid" maxlength="11" placeholder="Personal ID" />
    <!--
    <label>First Name: </label>
    <input class="form-field" type="text" name="fname" maxlength="20" placeholder="First Name" />
    <label>Last Name: </label>
    <input class="form-field" type="text" name="lname" maxlength="20" placeholder="Last Name" />
    -->
    <input class="submit-button" type="submit"/>
    </fieldset>
  </form>
  <!-- End Delete Form -->
  
  <!-- Begin Diagnosis Delete Form -->
  <form hidden class="form-container" id="diagForm" name="diagForm" action="php/deleteDiagnosis.php" method="post">
    <fieldset>
    <legend style="color:white;">Delete Diagnosis Information:</legend>
    <!--
    <label>Sample ID: </label>
    <input class="form-field" id="sampid" type="text" name="sampid" maxlength="11" placeholder="Sample ID" />
    -->
    <label>Diagnosis ID: </label>
    <input class="form-field" id="diagid" type="text" name="diagid" maxlength="11" placeholder="Diagnosis ID" />
    <!--
    <label>Diagnosis Date: </label>
    <input class="form-field" id="diagnosisdate" type="text" name="diagnosisdate" maxlength="10" placeholder="YYYY/MM/DD" />
    -->
    </br>
    <input class="submit-button" type="submit" />
    </fieldset>
  </form>
  <!-- End Delete Form -->

  <!-- Begin Diagnosis Type Delete Form -->
  <form hidden class="form-container" id="dTypeForm" name="dTypeForm" action="php/deleteDiagnosisType.php" method="post">
    <fieldset>
    <legend style="color:white;">Delete Diagnosis Type:</legend>
    <label>Diagnosis Classification: </label>
    <select class="form-field" id='class' name="class" required>
        <option>Bacteria</option>
        <option>Fungal</option>
        <option>Mite</option>
        <option>Other</option>
    </select>
    <label>Diagnosis ID: </label>
    <input class="form-field" id="diagnosiskey1" type="text" name="diagnosiskey1" maxlength="5" required placeholder="Diagnosis Key" />
    <input class="submit-button" type="submit"/>
    </fieldset>
  </form>
  <!-- End Delete Form -->

   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
