<?php

require "test.php";

isNotLogged();


if (isset($_POST['username']) && isset($_POST['password']))
{
    if (checkData())
    {
        if (!isset($_SESSION['logged']))
        {
            checkLoginUsernameAndPassword($_POST['username'], $_POST['password']);
            if (isset($_SESSION['logged']))
            {
                header("Location: index.php");
            }
        }
    }
}
function checkData()
{
    return preg_match('/^[A-Za-z0-9]*$/', $_POST['username']) && preg_match('/^[A-Za-z0-9]*$/', $_POST['password']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Golden Star: login</title>
<body onload="check();">
</body>

<link href="../Visual/login/login.css" rel="stylesheet" type="text/css">

<div class="img-background">
    <img class="img-background" src="../Visual/login/png/login. png"  alt="logo.png"/>
</div>

<a class="" href="index.php" target="_self">
    <div class="box-logo-holder">
        <img class="img-logo-big" src="../Visual/index/png/logo.png"  alt="logo.png"/>
    </div>
</a>

<form action = "" method = "post">

    <div class="box-login-holder">
        <div class="break"></div>
        <div class="box-register-login-holder">
            <a class="btn-sign-up-select" href="registration.php" target="_self">
                <div class="btn-sign-up-select">
                    <div class="text-sign-up">SIGN UP</div>
                </div>
            </a>
            <div class="break-login-register"></div>
            <div class="btn-sign-in-select">
                <div class="text-sign-in">SIGN IN</div>
            </div>
        </div>

        <div class="box-registration-text">
            <div class="text-login"</div>LOGIN</div>
    </div>
    <input type="text" name="username" id="username" onkeyup="check(this.value);" placeholder="Login">
    <div class="break"></div>
    <input type="password" name="password" id="password" onkeyup="check(this.value);" placeholder="Password">

    <div class="break"></div>
    <div class="break"></div>


    <button name="signin" id="signin" type="submit" class="btn-sign-in">
        <div class="text-btn-sign-in" id="textsignin" </div>SIGN IN</div>
    </button>

</form>

<body>


<script type="text/javascript">
    window.addEventListener('keydown',function(e) {
        if (e.keyIdentifier=='U+000A' || e.keyIdentifier=='Enter' || e.keyCode==13) {
            if (e.target.nodeName=='INPUT' && e.target.type=='text') {
                e.preventDefault();

                return false;
            }
        }
    }, true);
</script>

<script>
    function check()
    {
        if (document.getElementById("username").value.length > 0 && document.getElementById("password").value.length > 0) {
            document.getElementById("signin").style.pointerEvents = "visible";
            document.getElementById("signin").style.borderColor = "#ffcc00";
            document.getElementById("textsignin").style.color = "#ffcc00";
        }
        else {
            document.getElementById("signin").style.pointerEvents = "none";
            document.getElementById("textsignin").style.color = "#140e4a";
            document.getElementById("signin").style.borderColor = "#1f1f68";
        }
    }

</script>
</body>
</html>


<?php

$validUsername = false;
$validPassword = false;
