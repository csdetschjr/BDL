<?php
    session_start();
    unset($_SESSION['in']);
    header("Location:{$_SERVER['HTTP_REFERER']}");
    exit;
?>
