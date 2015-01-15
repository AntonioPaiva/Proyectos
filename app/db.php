<?php
session_start();
require_once(realpath(dirname(__FILE__))."/config.php");
require_once(ROOT_APP."medoo/medoo.min.php");

spl_autoload_register(function($clase){include ROOT_APP.'model/'.$clase.'.model.php';}) ;
