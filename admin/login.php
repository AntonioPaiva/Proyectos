<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Identificarse</title>
    <?php include("head_files.php");?>
    <link rel="stylesheet" href="css/form-style.css">
</head>
<body>

<div class="container">
    <div class="alert alert-danger" role="alert" id="msgAlert">
        <strong>Error! </strong>Los datos ingresados son incorrectos!
    </div>
    <form class="login-form">
        <h3>Identificarse</h3>
        <input type="email" name="nick" id="nick" placeholder="Ingrese su email" class="form-control" required autofocus>
        <input type="password" name="pass" id="pass" placeholder="Contraseña" class="form-control" required>
        <input type="button" class="btn btn-lg btn-primary btn-block" id="btn_i" value="Ingresar">
    </form>

</div>
<script>
    $(document).ready(function(){
        $("#btn_i").click(function(e){
            sendForm();
        });
        $("#pass").keydown(function(e){
           if(e.keyCode == 13)
           {
                sendForm();
           }
        });
    });
    function sendForm(){
        var n = $("#nick").val();
        var p= $("#pass").val();
        if(n.length < 8 || p.length <= 6)
        {
            $("#msgAlert").show("slow");
        }
        else
        {
            $.ajax({
                type:"post",
                url:"chk_user.php",
                data:"nick="+n+"&pass="+p,
                success:function(data)
                {
                    if(data=="ok")
                    {
                        location.href="home.php";
                }
                    else
                    {
                        $("#msgAlert").show("slow");
                    }
            }
        });
    }
}

</script>
</body>
</html>