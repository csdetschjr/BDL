<?php
$mydb = @mysql_connect("localhost", "saunderspw", "reighn1234");
if( !$mydb)
{
    echo( "Connection to database server failed <br>");
    exit( );
}
?>
