<?php
/**
 * Created by PhpStorm.
 * User: Bernardito
 * Date: 10/4/14
 * Time: 1:48 PM
 */
session_start();
session_unset();
session_destroy();
header("location:index.php");