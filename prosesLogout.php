<?php
    session_start();
    session_destroy();
    echo ("<script LANGUAGE='JavaScript'> window.alert('Logout Berhasil !');window.location.href='./welcome.php';</script>");
?>