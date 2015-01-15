<?php  session_start();
if(!isset($_SESSION['usu']['auth']))
{
    header("location:login.php");
}
else
{
    header("location:home.php");
}

?>