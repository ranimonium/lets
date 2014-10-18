<!DOCTYPE html>
<html>
<head>
    <title><?php echo 'LETS UP' ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css') ?>">
</head>
    <body>
        <div class = "rtn c" id = "logo"><a href = "index.php">LETS UP</a></div>
        <div class="rtn c" id="login">
            <form method = "post" class = "rtn c" id = "form" action = "<?php echo site_url() ?>">
            Username
            <input class = "c input" name = "username" type = "text" placeholder = "Username"/>
            Password
            <input class = "c input" name = "password" type = "password" placeholder = "Password"/>
            <input value = "Submit" type = "submit" class = "c" id = "submit"/>
            </form>
            <div class = "c" id = "register"><a href = "<?php echo site_url('users/register') ?>">Register</a></div>

            <?php if (isset($message)) { ?>
                <div class = "c red" style="display:block"><?php echo $message?></div>
            <?php } ?>
        </div>
    </body>
</html>