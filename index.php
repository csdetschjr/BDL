<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <!--  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet"> -->
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/homePage.css" rel="stylesheet">

    <link href="TestCss/bootstrap.css" rel="stylesheet">
    <link href="TestCss/bootstrap.min.css" rel="stylesheet">
    <link href="TestCss/business-casual.css" rel="stylesheet">
 

    <title>BDL-Homepage</title>
  </head>
   <body style="background-image:url(background.jpg)">
   <nav class="navbar navbar-default" role="navigation" style="box-shadow: 5px 5px 5px gray; ">
    
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a class="navbar-brand" href="index.php" style="color:black;">Home</a></li>
      <?php
        session_start();
        if(!isset($_SESSION['in']))
        {
            echo "<li><a class='navbar-brand' href='login.html'>Insert</a></li>";
            echo "<li><a class='navbar-brand' href='login.html'>Search</a></li>";
            echo "<li><a class='navbar-brand' href='login.html'>Update</a></li>";
            echo "<li><a class='navbar-brand' href='login.html'>Delete</a></li>";
        }
        else
        {
            echo "<li><a class='navbar-brand' href='insert.php'>Insert</a></li>";
            echo "<li><a class='navbar-brand' href='search.php'>Search</a></li>";
            echo "<li><a class='navbar-brand' href='update.php'>Update</a></li>";
            echo "<li><a class='navbar-brand' href='delete.php'>Delete</a></li>";
        }
        if(!isset($_SESSION['in']))
            echo "<li><a class='navbar-brand' href='login.html'>Login</a></li>";
        else
            echo "<li><a class='navbar-brand' href='php/logout.php'>Logout</a></li>";
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </br>
  </nav> 
    <center><img width=45% height=45% src="beehive.jpg" style="box-shadow: 5px 5px 5px grey; margin:0 auto; border:3px solid teal;"></center>
     </br>
    <form class="form-container" id="form" name="form" style="font-weight:bold; font-size:large;">
    <center>Project: Bee Disease Diagnositc Lab Database</center></br>
    <center>CS 3430 - Dr. Rahman Tashakkori</center></br>
    <center>Team 6: Peyton Saunders, Chris Detsch, Evan Baker</center>
    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
