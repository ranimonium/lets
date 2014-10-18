<!DOCTYPE html>
<html>
<head>
    <title><?php echo 'LETS UP' ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css') ?>">
</head>
    <body>
        <div class = "rtn c" id = "logo"><a href = "index.php">LETS UP</a></div>
        <div class="rtn c" id="login">
            <form method = "post" class = "rtn c" id = "form" action = "index.php?login=go">
            Username
            <input class = "c input" name = "username" type = "text" placeholder = "Username"/>
            Password
            <input class = "c input" name = "password" type = "password" placeholder = "Password"/>
            <input value = "Submit" type = "submit" class = "c" id = "submit"/>
            </form>
            <div class = "c" id = "register"><a href = "register.php">Register</a></div>
            <?php
                $error_show = "display: none";

                if(isset($_GET['error'])) {
                    if($_GET['error'] == "match") {
                        $error_message = "Username and password does not match";
                        $error_show = "display: block";
                    }
                    if($_GET['error'] == "notexist") {
                        $error_message = "User does not exist";
                        $error_show = "display: block";
                    }
                }
            ?>
            <div class = "c red" style = "<?php echo $error_show ?>"><?php echo $error_message?></div>
        </div>
    </body>
</html>