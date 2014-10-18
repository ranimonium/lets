<div id="main-content">
    <div class="segment">
        <div class="greeting">Create an Organization</div>
        <?php if (isset($message)) { ?>
            <div class = "c red" style="display:block"><?php echo $message?></div>
        <?php } ?>

        <form id = "form" method = "post" action = "<?php echo site_url('users/create_org') ?>">
            <span class = "beside">Name</span><input type = "text" class = "input"  name="username" value="<?php if (isset($username)) { echo $username; }/><br>
            <span class = "beside">About</span><textarea name="about"/></textarea><br>
            <input type="submit" value = "Submit" id = "submit"/>
        </form>
    </div>
</div>