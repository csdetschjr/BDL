<?php
    echo 'This is where username/password verification happens'; 
    include("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysql_real_escape_string($username);
    $query = "SELECT password, salt
            FROM login
            WHERE username = '$username';";
    
    $result = mysql_query($query);
    if(mysql_num_rows($result) == 0)
    {
        header('Location: ../login.html');
    }
    
    $userData = mysql_fetch_array($result, MYSQL_ASSOC);
    $salt = $userData['salt'];
    $tablepass = $userData['password'];
    $hash = hash('sha256', $password);
    $givenpass = hash('sha256', $salt . $hash);
    
    if($tablepass != $givenpass)
    {
        header('Location: ../registration.html'); // Incorrect Password
    }
    else
    {
        session_start();
        $_SESSION['in'] = "set";
        header('Location: ../index.php'); // Correct Password redirecting to homepage for now.
    }
?>
