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
    <?php }
	if (!isset($this->session->userdata('current_user')->own_userid)) { ?>
    <div class="segment">
		<?php if(count($organizations)>0) { ?>
        <div class="greeting">
            Organizations I own
        </div>
        <form method = "post" class = "rtn c" id = "form" action = "<?php echo site_url('users/manage') ?>">
		<table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Points</th>
                    <th>About</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($organizations as $org) { ?>
                <tr>
                    <td><?php echo $org->name; ?></td>
                    <td><?php echo $org->points; ?></td>
                    <td><?php echo $org->about; ?></td>
                    <td>
					<?php 
						$string = $org->userid.'|'.$org->name.'|'.$org->points;
					?>
					<button type="submit" name="orgid" value="<?php	echo $string; ?>">Log in as <?php echo $org->name; ?></button>
					<button type="submit" name="delete" value="<?php echo $string; ?>">Delete</button>
					</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
		<?php
		} else {?>
		<div class="greeting">
			You do not own any organizations
        </div>
		<?php }
		}?>
    </div>
</div>