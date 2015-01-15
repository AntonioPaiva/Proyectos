<?php include_once("../app/db.php");
if(!empty($_POST['nick']))
{
    //print_r($_POST);
    $user = new User();
    $n = $_POST['nick'];
    $p = sha1(md5($_POST['pass']));
    $ch = $user->chk_user($n,$p);
    if($ch)
    {
        $_SESSION['usu']['auth']=md5("registerOK");
        $_SESSION['cliId'] = $ch;
        echo "ok";
    }

}