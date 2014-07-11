<?php
    include ("../bees.php");
    mysql_select_db("3430-s14-t6", $mydb);
    //retrieve data from the post
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];

    if($password1 != $password2)
        header('Location: registration.html');

    if(strlen($username) > 30)
        header('Location: registration.html');

    $hash = hash('sha256', $password1);

    function createSalt()
    {
        $text = md5(uniqid(rand(), true));
        return substr($text, 0, 3);
    }

    $salt = createSalt();
    $password = hash('sha256', $salt . $hash);

    $username = mysql_real_escape_string($username);

    $query = "insert into login ( username, password, email, salt )
            values ( '$username', '$password', '$email', '$salt' ); ";

    mysql_query($query);

    mysql_close($mydb);
?>
<?php header("Location:{$_SERVER['HTTP_REFERER']}");exit; ?>

