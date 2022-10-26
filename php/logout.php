<?php
    include("conecta.php");
    
    session_destroy();
    header("location:../login.html");
?>