<?php
    require_once('assets/config.php');
    $login = new USER();

    if($login->is_loggedin()!="") {
        $login->redirect('index.php');
    }

    if(isset($_POST['btn-login'])) {
        $uname = strip_tags($_POST['txt_uname_email']);
        $umail = strip_tags($_POST['txt_uname_email']);
        $upass = strip_tags($_POST['txt_password']);

        if($login->doLogin($uname,$umail,$upass)) {
            $login->redirect('index.php');
        }
        else {
            $error = "Wrong Details!";
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="assets/styles.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <h1>Login or <a href="register.php">Register</a></h1>
            <hr/>
            <div class="error">
                <?php
                    if(isset($error)) {
                        echo "<p class='error'>$error</p>";
                    }
                    if(isset($_GET['joined'])) {
                        echo "<p class='success'>Successfully registered please login</p>";
                    }
                ?>
            </div>
            <form method="post" id="login-form">
                <input type="text" name="txt_uname_email" placeholder="Username or Email"/>
                <input type="password" name="txt_password" placeholder="Password" />
                <button type="submit" name="btn-login">Login</button>
             </form>
        </div>
    </body>
</html>
