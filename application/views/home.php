<div id="main-content">

    <div class="greeting">
        Hello, <?php echo $this->session->userdata('current_user')->username ?>!!
    </div>

    <div id="points" style="margin-bottom:20px">
        You currently have <?php echo $points ?> points
    </div>

    <?php if (isset($this->session->userdata('current_user')->own_userid)) { ?>
        <form method = "post" class = "rtn c" id = "form" action = "<?php echo site_url('users/revert') ?>">
            <button type="submit">REVERT BACK TO USER</button>
        </form>
    <?php } ?>

    <div class="segment">
        <div class="greeting">
            Organizations I own
        </div>
        <form method = "post" class = "rtn c" id = "form" action = "<?php echo site_url('users/manage') ?>">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>About</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($organizations as $org) { ?>
                <tr>
                    <td><?php echo $org->name ?></td>
                    <td><?php echo $org->about ?></td>
                    <td><button type="submit" name="orgid" value="<?php echo $org->userid.'|'.$org->name ?>">Log in as this organization</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>