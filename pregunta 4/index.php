<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("Location: login.php");
        exit;
    }
    else{
        if($_SESSION["user"]=="nohay")
        {
            header("Location: login.php");
            exit;
        }
    }
?>
<?php
include "part.cabezera.php";
include "part.banner.php";
include "part.informacion.php";
include "part.footer.php";
?>