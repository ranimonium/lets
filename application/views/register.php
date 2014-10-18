<div id="main-content">
    <div class="segment">
        <div class="greeting">Join the LETS Community!</div>
        <?php if (isset($message)) { ?>
            <div class = "c red"><?php echo $message?></div>
        <?php } ?>

        <form id = "form" method = "post" action = "<?php echo site_url('users/register') ?>">
            <span class = "beside">Name</span><input type = "text" class = "input"  name="username" value="<?php if (isset($username)) { echo $username; } ?>"/><br>
            <span class = "beside">Password</span><input type="password" class="input" name="password"/><br>
            <span class = "beside">About</span><textarea name="about"/></textarea><br>
            <input type="submit" value = "Submit" id = "submit"/>
        </form>
    </div>
</div>