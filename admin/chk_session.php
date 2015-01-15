<?php
if(!isset($_SESSION['usu']['auth']))
{
    header("location:login.php");
}

